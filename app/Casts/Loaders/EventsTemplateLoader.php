<?php

namespace App\Casts\Loaders;

use App\Http\Resources\EventResource;
use App\Models\Event;

class EventsTemplateLoader extends BaseTemplateLoader
{
    /**
     * An array of events that are listed on the template.
     *
     * @var array
     */
    public $events;

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

        $this->events = Event::published()->orderByDesc('starts_at')->paginate(15);
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
