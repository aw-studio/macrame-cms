<?php

namespace App\Templates;

use App\Models\Person;

class ContactTemplate extends BaseTemplate
{
    /**
     * An array of people that are listed on the template.
     *
     * @var array
     */
    public $people;

    /**
     * Load the data.
     *
     * @return void
     */
    public function load()
    {
        $this->people = Person::orderBy('name')->paginate(15);
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

    public function render()
    {
        $this->load();

        return view('pages.contact', [
            'page' => $this->page,
            'people' => $this->people,
        ]);
    }
}
