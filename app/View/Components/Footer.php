<?php

namespace App\View\Components;

use App\Models\Menu;
use App\Models\Partial;
use Illuminate\View\Component;

class Footer extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        // dd(Partial::where('template', 'footer')->first());
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layouts.footer', [
            'data' => Partial::where('template', 'footer')->first()->attributes,
            'navigation' => Menu::where('type', 'footer')->first()->items()->whereRoot()->get()
        ]);
    }
}
