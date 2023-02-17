<?php

namespace Admin\Http\Controllers;

use Admin\Http\Indexes\PostIndex;
use Admin\Http\Resources\PostResource;
use App\Models\Post;
use App\Services\CacheService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController
{
    /**
     * Get Page items.
     *
     * @param  Page  $page
     * @return Page
     */
    public function index(Request $request, PostIndex $index)
    {
        $query = Post::query();

        return $index->items(
            $request,
            $query,
            PostResource::class
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'attributes' => 'array',
            'attributes.title' => 'required',
            'slug' => 'required|string|unique:posts,slug',
            'publish_at' => 'sometimes|date|nullable',
            'unpublish_at' => 'sometimes|date|nullable',
            'feature_until' => 'sometimes|date|nullable',
            'is_pinned' => 'sometimes|boolean',
        ]);

        // Enforce sluggified slug
        if (array_key_exists('slug', $validated)) {
            $validated['slug'] = Str::slug($validated['slug']);
        }

        $post = Post::create([
            ...$validated,
            'author_id' => auth()->id(),
        ]);

        app(CacheService::class)->forget(Anouncement::class);

        return PostResource::make($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'attributes' => 'array',
            'content' => 'array',
            'slug' => 'sometimes|string|unique:posts,slug',
            'publish_at' => 'sometimes|date|nullable',
            'unpublish_at' => 'sometimes|date|nullable',
            'feature_until' => 'sometimes|date|nullable',
            'is_pinned' => 'sometimes|boolean',
        ]);

        $post->update($validated);

        app(CacheService::class)->forget(Post::class);

        return PostResource::make($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        app(CacheService::class)->forget(Post::class);

        return response()->noContent();
    }
}
