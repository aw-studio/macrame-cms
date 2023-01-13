<?php

namespace App\Casts\Loaders;

use App\Http\Resources\PageResource;
use Inertia\Inertia;

class HomeTemplateLoader extends BaseTemplateLoader
{

    /**
     * Load the data.
     *
     * @return void
     */
    public function load()
    {
        //
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            // ...
        ];
    }

    /**
     * Get the view / contents that represents the template.
     */
    public function view(): string
    {
        return 'pages.home';
    }
}
