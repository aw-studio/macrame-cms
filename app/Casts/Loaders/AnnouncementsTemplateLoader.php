<?php

namespace App\Casts\Loaders;

use Admin\Http\Indexes\AnnouncementIndex;
use App\Http\Resources\AnnouncementResource;
use App\Models\Announcement;

class AnnouncementsTemplateLoader extends BaseTemplateLoader
{
    /**
     * An array of announcements that are listed on the template.
     *
     * @var array
     */
    protected $announcements;

    /**
     * Load the data.
     *
     * @return void
     */
    public function load()
    {
        // Load announcements
        $this->announcements = (new AnnouncementIndex())->items(
            request(),
            Announcement::published()->orderByDesc('publish_at'),
            AnnouncementResource::class
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
            'announcements' => $this->announcements,
        ];
    }
}
