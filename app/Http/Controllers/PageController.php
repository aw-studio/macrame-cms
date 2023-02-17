<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Http\Resources\EventResource;
use App\Models\Post;
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

        return $page->template->render();
    }

    // public function showPost(Request $request, Post $post)
    // {
    //     return Inertia::render('Posts/Show', [
    //         'post' => (new PostResource($post))->toArray($request),
    //         'page' => [
    //             'meta' => [
    //                 'title' => $post['title'],
    //                 'description' => 'Lorem ipsum dolor',
    //             ],
    //         ],
    //     ]);
    // }

    // public function showEvent(Request $request, Event $event)
    // {
    //     return Inertia::render('Events/Show', [
    //         'event' => (new EventResource($event))->toArray($request),
    //         'page' => [
    //             'meta' => [
    //                 'title' => $event['title'],
    //                 'description' => 'Lorem ipsum dolor',
    //             ],
    //         ],
    //     ]);
    // }

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
