<?php

namespace App\Casts\Loaders;

use App\Http\Resources\AnnouncementResource;
use App\Models\Announcement;

class AnnouncementsTemplateLoader extends BaseTemplateLoader
{
    /**
     * An array of announcements that are listed on the template.
     *
     * @var array
     */
    public $announcements;

    /**
     * Load the data.
     *
     * @return void
     */
    public function load()
    {
        // Load announcements
        $this->announcements = Announcement::published()->orderByDesc('publish_at')->paginate(15);
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

    /**
     * Get the view / contents that represents the template.
     */
    public function view(): string
    {
        return 'pages.announcements';
    }
}
