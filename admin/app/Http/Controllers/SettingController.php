<?php

namespace Admin\Http\Controllers;

use Admin\Ui\Page;
use App\Actions\FlushDatabaseAction;
use Illuminate\Http\Request;

class SettingController
{
    /**
     * Show the ship index page for the admin application.
     *
     * @return void
     */
    public function index(Request $request)
    {
        // return $page
        // ->page('Settings/Index');
    }

    /**
     * Show the ship index page for the admin application.
     *
     * @return void
     */
    public function resetSystem(Request $request)
    {
        (new FlushDatabaseAction())->execute();
    }
}
