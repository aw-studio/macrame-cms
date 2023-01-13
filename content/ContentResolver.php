<?php


namespace Content;

use App\Casts\ContentCast;
use Illuminate\View\Component;

class ContentResolver extends Component
{
    public $content;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(ContentCast $content)
    {
        $this->content = (object) $content->parse()->toArray(request());
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('content::resolver', ['items' => $this->content]);
    }
}
