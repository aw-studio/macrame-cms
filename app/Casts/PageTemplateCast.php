<?php

namespace App\Casts;

use App\Casts\Loaders\AnnouncementsTemplateLoader;
use App\Casts\Loaders\ContactTemplateLoader;
use App\Casts\Loaders\EventsTemplateLoader;
use App\Casts\Loaders\HomeTemplateLoader;
use Macrame\Content\TemplateCast;

class PageTemplateCast extends TemplateCast
{
    /**
     * Map of templates to the corresponding parsers.
     *
     * @var array
     */
    protected $parsers = [
        'home'          => HomeTemplateLoader::class,
        'announcements' => AnnouncementsTemplateLoader::class,
        'events'        => EventsTemplateLoader::class,
        'contact'       => ContactTemplateLoader::class,
    ];
}
