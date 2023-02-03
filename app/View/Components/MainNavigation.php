<?php

namespace App\View\Components;

use App\Models\Menu;
use Illuminate\View\Component;

class MainNavigation extends Component
{
    public $menu;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->menu = Menu::where('type', 'main')->first()->items()->whereRoot()->orderBy('order_column')->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layouts.main-navigation', ['navigation' => $this->menu]);
    }
}
