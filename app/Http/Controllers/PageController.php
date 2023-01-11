<?php

namespace App\Http\Controllers;

use App\Http\Resources\AnnouncementResource;
use App\Http\Resources\EventResource;
use App\Http\Resources\PageResource;
use App\Models\Announcement;
use App\Models\Event;
use App\Models\Page;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PageController extends Controller
{
    /**
     * Show the page.
     *
     * @return void
     */
    public function __invoke(Request $request)
    {
        $page = Page::fromRequestOrFail($request);

        $this->abortIfPageCannotBeViewed($request, $page);

        return Inertia::render($this->resolveTemplate($page), [
            'page' => (new PageResource($page))->toArray($request),
            'data' => $page->template->data(),
        ]);
    }

    /**
     * Resolve the page template.
     *
     * @param  Page  $page
     * @return string
     */
    protected function resolveTemplate(Page $page): string
    {
        return match ((string) $page->template) {
            'home' => 'Pages/Home',
            'announcements' => 'Pages/Announcements',
            'events' => 'Pages/Events',
            'contact' => 'Pages/Contact',
            default => 'Pages/Show',
        };
    }

    public function showAnnouncement(Request $request, Announcement $announcement)
    {
        return Inertia::render('Announcements/Show', [
            'announcement' => (new AnnouncementResource($announcement))->toArray($request),
            'page' => [
                'meta' => [
                    'title' => $announcement['title'],
                    'description' => 'Lorem ipsum dolor',
                ],
            ],
        ]);
    }

    public function showEvent(Request $request, Event $event)
    {
        return Inertia::render('Events/Show', [
            'event' => (new EventResource($event))->toArray($request),
            'page' => [
                'meta' => [
                    'title' => $event['title'],
                    'description' => 'Lorem ipsum dolor',
                ],
            ],
        ]);
    }

    /**
     * Determines whether a page can be viewed, aborts 404 otherwise.
     *
     * @param  Request  $request
     * @param  Page  $page
     * @return void
     */
    protected function abortIfPageCannotBeViewed(Request $request, Page $page)
    {
        if ($page->is_live) {
            if (is_null($page->publish_at) || $page->publish_at < now()) {
                return;
            }
        }

        // If the page is not live and not published, it can only be viewed when
        // the correct preview_key is used.
        if ($request->preview == $page->preview_key
            && ! is_null($page->preview_key)) {
            return;
        }

        abort(404);
    }
}
