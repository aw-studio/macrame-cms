<?php

namespace App\Templates;

use App\Models\Event;

class EventsTemplate extends BaseTemplate
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

    public function render()
    {
        $this->load();

        return view('pages.events', [
            'page' => $this->page,
            'events' => $this->events,
        ]);
    }
}
