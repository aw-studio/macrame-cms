<?php

namespace Admin\Http\Controllers;

use Admin\Http\Indexes\RedirectIndex;
use Admin\Http\Resources\RedirectResource;
use Admin\Http\Resources\StoredResource;
use AwStudio\Redirects\Models\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class RedirectController
{
    /**
     * Page index page.
     *
     * @param  Page $redirect
     * @return Page
     */
    public function index(Request $request, RedirectIndex $index)
    {
        return $index->items(
            $request,
            Redirect::query()
        );
    }

    /**
     * Show the Redirect.
     *
     * @param  Redirect         $redirect
     * @return RedirectResource
     */
    public function show(Redirect $redirect)
    {
        return RedirectResource::make($redirect);
    }

    /**
     * Update the Redirect.
     *
     * @param  Request          $request
     * @param  Redirect         $redirect
     * @return RedirectResource
     */
    public function update(Request $request, Redirect $redirect)
    {
        $validated = $request->validate([
            'from_url'         => 'string',
            'to_url'           => 'string',
            'http_status_code' => 'numeric',
            'active'           => 'boolean',
        ]);

        $redirect->update($validated);

        Cache::forget('redirects');

        return RedirectResource::make($redirect);
    }

    /**
     * Store a new Redirect.
     *
     * @param  Request          $request
     * @return RedirectResource
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'from_url'         => 'string',
            'to_url'           => 'string',
            'http_status_code' => 'numeric',
        ]);

        $redirect = Redirect::make($validated);

        $redirect->save();

        Cache::forget('redirects');

        return new StoredResource($redirect);
    }

    /**
     * Destroy the given Redirect.
     *
     * @param  Request  $request
     * @param  Redirect $redirect
     * @return void
     */
    public function destroy(Request $request, Redirect $redirect)
    {
        $redirect->delete();

        return response()->noContent();
    }
}
