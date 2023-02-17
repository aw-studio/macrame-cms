<?php

namespace App\Casts;

use App\Casts\BaseCasts\BaseTemplateCast;
use App\Templates\PostsTemplate;
use App\Templates\ContactTemplate;
use App\Templates\DefaultTemplate;
use App\Templates\EventsTemplate;
use App\Templates\HomeTemplate;

class PageTemplateCast extends BaseTemplateCast
{
    /**
     * Map of templates to the corresponding parsers.
     *
     * @var array
     */
    protected $templates = [
        'home' => HomeTemplate::class,
        'events' => EventsTemplate::class,
        'default' => DefaultTemplate::class,
        'posts' => PostsTemplate::class,
        'contact' => ContactTemplate::class,
    ];
}
