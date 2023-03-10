<?php

namespace Admin;

use Admin\Support\Feature;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Admin\Console\Commands\MakeCrudCommand;
use Admin\Console\Commands\MakeContentCommand;
use Admin\Console\Commands\MakeTemplateCommand;

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
        View::addNamespace('admin', base_path().'/admin/resources/views');

        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeContentCommand::class,
                MakeCrudCommand::class,
                MakeTemplateCommand::class,
            ]);
        }
    }
}
