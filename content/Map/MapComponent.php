<?php

namespace Content\Map;

use Illuminate\View\Component;

class MapComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $content)
    {
        // dd('test');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('content::map', [
            'content' => $this->content,
        ]);
    }
}
