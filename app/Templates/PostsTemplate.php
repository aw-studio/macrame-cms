<?php

namespace App\Templates;

use App\Models\Post;

class PostsTemplate extends BaseTemplate
{
    /**
     * An array of posts that are listed on the template.
     *
     * @var array
     */
    public $posts;

    /**
     * Load the data.
     *
     * @return void
     */
    public function load()
    {
        $this->posts = Post::published()->orderByDesc('publish_at')->paginate(15);
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'posts' => $this->posts,
        ];
    }

    public function render()
    {
        $this->load();

        return view('pages.posts', [
            'page' => $this->page,
            'posts' => $this->posts,
        ]);
    }
}
