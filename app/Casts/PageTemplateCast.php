<?php

namespace App\Casts;

use Macrame\Content\TemplateCast;
use App\Casts\Loaders\HomeTemplateLoader;
use App\Casts\Loaders\EventsTemplateLoader;
use App\Casts\Loaders\ContactTemplateLoader;
use App\Casts\Loaders\DefaultTemplateLoader;
use App\Casts\Loaders\AnnouncementsTemplateLoader;

class PageTemplateCast extends TemplateCast
{
    /**
     * Map of templates to the corresponding parsers.
     *
     * @var array
     */
    protected $parsers = [
        'home' => HomeTemplateLoader::class,
        'announcements' => AnnouncementsTemplateLoader::class,
        'events' => EventsTemplateLoader::class,
        'contact' => ContactTemplateLoader::class,
        'default' => DefaultTemplateLoader::class,
    ];
}
