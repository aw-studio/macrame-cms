<?php

namespace Admin\Http\Controllers;

use Admin\Http\Indexes\AnnouncementIndex;
use Admin\Http\Resources\AnnouncementResource;
use App\Models\Announcement;
use App\Services\CacheService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AnnouncementController
{
    /**
     * Get Page items.
     *
     * @param  Page  $page
     * @return Page
     */
    public function index(Request $request, AnnouncementIndex $index)
    {
        $query = Announcement::query();

        return $index->items(
            $request,
            $query,
            AnnouncementResource::class
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
            'slug' => 'required|string|unique:announcements,slug',
            'publish_at' => 'sometimes|date|nullable',
            'unpublish_at' => 'sometimes|date|nullable',
            'feature_until' => 'sometimes|date|nullable',
            'is_pinned' => 'sometimes|boolean',
        ]);

        // Enforce sluggified slug
        if (array_key_exists('slug', $validated)) {
            $validated['slug'] = Str::slug($validated['slug']);
        }

        $announcement = Announcement::create([
            ...$validated,
            'author_id' => auth()->id(),
        ]);

        app(CacheService::class)->forget(Anouncement::class);

        return AnnouncementResource::make($announcement);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement)
    {
        return new AnnouncementResource($announcement);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Announcement $announcement)
    {
        $validated = $request->validate([
            'attributes' => 'array',
            'content' => 'array',
            'slug' => 'sometimes|string|unique:announcements,slug',
            'publish_at' => 'sometimes|date|nullable',
            'unpublish_at' => 'sometimes|date|nullable',
            'feature_until' => 'sometimes|date|nullable',
            'is_pinned' => 'sometimes|boolean',
        ]);

        $announcement->update($validated);

        app(CacheService::class)->forget(Announcement::class);

        return AnnouncementResource::make($announcement);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement)
    {
        $announcement->delete();

        app(CacheService::class)->forget(Announcement::class);

        return response()->noContent();
    }
}
