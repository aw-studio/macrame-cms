<?php

namespace App\Casts\Loaders;

use Admin\Http\Indexes\EventIndex;
use App\Http\Resources\EventResource;
use App\Models\Event;

class DefaultTemplateLoader extends BaseTemplateLoader
{


    /**
     * Load the data.
     *
     * @return void
     */
    public function load()
    {

    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
        ];
    }

    /**
     * Get the view / contents that represents the template.
     */
    public function view(): string
    {
        return 'pages.default';
    }
}
