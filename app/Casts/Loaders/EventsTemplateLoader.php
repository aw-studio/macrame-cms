<?php

namespace App\Casts\Loaders;

use Admin\Http\Indexes\EventIndex;
use App\Http\Resources\EventResource;
use App\Models\Event;

class EventsTemplateLoader extends BaseTemplateLoader
{
    /**
     * An array of events that are listed on the template.
     *
     * @var array
     */
    protected $events;

    /**
     * Load the data.
     *
     * @return void
     */
    public function load()
    {
        // Load events
        // $this->events = $this->rememberIndex(
        //     key:        'eventsIndex',
        //     classes:    [Event::class],
        //     resource:   EventResource::class,
        //     index:      EventIndex::class,
        //     query:      fn () => Event::orderByDesc('starts_at')
        // );
        $this->events = (new EventIndex())->items(
            request(),
            Event::orderByDesc('starts_at'),
            EventResource::class
        );
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'events' => $this->events,
        ];
    }

    /**
     * Get the view / contents that represents the template.
     */
    public function view(): string
    {
        return 'pages.events';
    }
}
