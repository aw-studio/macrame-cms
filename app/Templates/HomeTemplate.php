<?php

namespace App\Templates;

use App\Models\Announcement;

class HomeTemplate extends BaseTemplate
{
    public $posts;

    /**
     * Load the data.
     *
     * @return void
     */
    public function load()
    {
        $this->posts = Announcement::query()
            ->limit($this->page->attributes->posts_count ?? 12)
            ->get();
    }

    /**
     * Define template specific attributes.
     *
     * @param  array  $attributes
     * @return array
     */
    public function parseAttributes($attributes)
    {
        return array_merge(
            $attributes,
            []
        );
    }

    public function toArray(): array
    {
        return [
            'posts' => $this->posts,
        ];
    }

    public function render()
    {
        $this->load();

        return view('pages.home', [
            'page' => $this->page,
            'posts' => $this->posts,
        ]);
    }
}
