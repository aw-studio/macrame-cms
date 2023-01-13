<?php

namespace App\View\Components;

use App\Models\Page;
use Illuminate\View\Component;

class Meta extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public Page $page)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        // dd($this->page->attributes->meta_title);
        return view('components.meta', [
            'title' => !empty($this->page->attributes->meta_title) ? $this->page->attributes->meta_title : $this->page->name ?? null,
            'description' => null,
            'ogImage' => $this->page->attributes->meta_og_image_url ?? null,
            'ogUrl' => $this->page->attributes->meta_og_url ?? null,
            'ogTitle' => $this->page->attributes->meta_title ?? null,
            'ogType' => null,
            'ogDescription' => null,
        ]);
    }
}
