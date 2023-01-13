<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Image extends Component
{
    public $thumb;

    public $sizes;

    public $srcset = '';

    public $cover;

    public $image;

    public $overflow;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($sizes = null, $image = null, $overflow = false, $cover = false)
    {
        $this->sizes = $sizes ?? [10, 300, 500, 900, 1400];
        $this->cover = $cover ?? false;
        $this->overflow = $overflow ?? false;
        $this->image = $image ?? null;
        $this->thumb = $this->setThumb();
        $this->srcset = $this->setSrcset();
    }

    public function setThumb()
    {
        $w = min($this->sizes);

        return $this->image['url'].'?w='.$w;
    }

    public function setSrcset()
    {
        $srcset = '';
        foreach ($this->sizes as $size) {
            $srcset = $srcset.$this->image['url'].'?w='.$size.' '.$size.'w, ';
        }

        return $srcset;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.image');
    }
}
