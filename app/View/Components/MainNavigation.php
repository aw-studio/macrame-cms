<?php

namespace App\View\Components;

use App\Models\Menu;
use Illuminate\View\Component;
use App\Http\Resources\NavResource;

class MainNavigation extends Component
{

    public NavResource $menu;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->menu = new NavResource(
            Menu::where('type', 'main')->first()->items()->whereRoot()->get()
        );
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layouts.main-navigation', ['navigation' => json_decode($this->menu->toJson())]);
    }
}
