<?php

namespace Content\TextImage;

use Illuminate\View\Component;

class TextImageComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $content)
    {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('content::text_image', [
            'content' => $this->content,
        ]);
    }
}
