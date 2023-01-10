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
        // return Inertia::render('Pages/Show', [
        //     'page' => (new PageResource($page))->toArray($request),
        // ]);
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
}
