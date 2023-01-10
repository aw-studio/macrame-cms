<?php

namespace App\Casts\Loaders;

use Admin\Http\Indexes\PersonIndex;
use App\Http\Resources\PersonResource;
use App\Models\Person;

class ContactTemplateLoader extends BaseTemplateLoader
{
    /**
     * An array of people that are listed on the template.
     *
     * @var array
     */
    protected $people;

    /**
     * Load the data.
     *
     * @return void
     */
    public function load()
    {
        // Load people
        // $this->people = $this->rememberIndex(
        //     key:        'peopleIndex',
        //     classes:    [Person::class],
        //     resource:   PersonResource::class,
        //     index:      PersonIndex::class,
        //     query:      fn () => Person::orderByDesc('name')
        // );
        $this->people = (new PersonIndex())->items(
            request(),
            Person::orderBy('name'),
            PersonResource::class
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
            'people' => $this->people,
        ];
    }
}
