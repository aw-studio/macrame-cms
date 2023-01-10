<?php

namespace Admin;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::addNamespace('admin', base_path() . '/admin/resources/views');
        // $this->loadViewsFrom(__DIR__.'/resources/views', 'admin');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
        $this->registerRoutes();
    }

    protected function registerRoutes()
    {
        Route::get('/admin/{any?}', function () {
            return view('admin::app');
        });
    }

}
