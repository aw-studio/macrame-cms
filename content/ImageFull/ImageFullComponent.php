<?php

namespace Content\ImageFull;

use Illuminate\View\Component;

class ImageFullComponent extends Component
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
        return view('content::image_full', [
            'content' => $this->content,
        ]);
    }
}
