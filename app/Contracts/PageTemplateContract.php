<?php

namespace App\Contracts;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Renderable;

interface PageTemplateContract extends Arrayable, Renderable
{
    /**
     * Load the data.
     *
     * @return void
     */
    public function load();

    public function parseAttributes($attributes);
}
