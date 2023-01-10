<?php

namespace Admin\Http\Controllers;

use Admin\Http\Indexes\EventIndex;
use Admin\Http\Resources\EventResource;
use Admin\Http\Resources\StoredResource;
use App\Models\Event;
use App\Services\CacheService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EventController
{
    /**
     * Get Page items.
     *
     * @param  Page $page
     * @return Page
     */
    public function index(Request $request, EventIndex $index)
    {
        $query = Event::query();

        return $index->items(
            $request,
            $query,
            EventResource::class
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request                   $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'attributes'       => 'array',
            'attributes.title' => 'required',
            'slug'             => 'required|string|unique:events,slug',
            'starts_at'        => 'required|date',
            'ends_at'          => 'sometimes|date|nullable',
        ]);

        // Enforce sluggified slug
        if (array_key_exists('slug', $validated)) {
            $validated['slug'] = Str::slug($validated['slug']);
        }

        $event = Event::create([
            ...$validated,
            'author_id' => auth()->id(),
        ]);

        app(CacheService::class)->forget(Event::class);

        return StoredResource::make($event);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event         $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return new EventResource($event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request                   $request
     * @param  \App\Models\Event         $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'attributes' => 'array',
            'slug'       => 'sometimes|string|unique:events,slug',
            'starts_at'  => 'required|date',
            'ends_at'    => 'sometimes|date|nullable',
        ]);

        app(CacheService::class)->forget(Event::class);

        $event->update($validated);

        return EventResource::make($event);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event         $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();

        app(CacheService::class)->forget(Event::class);

        return response()->noContent();
    }
}
