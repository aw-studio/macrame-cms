<?php

namespace Content;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class ContentServiceProvider extends ServiceProvider
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
        $directories = File::directories(__DIR__);

        // $this->loadViewsFrom(__DIR__, 'content');

        foreach ($directories as $directory) {
            $files = File::files($directory);
            foreach ($files as $file) {
                if (! str_contains($filename = $file->getFilename(), 'Component')) {
                    continue;
                }
                $componentName = str_replace('.php', '', $filename);

                $moduleName = (string) Str::of($componentName)->replaceLast('Component', '');
                $class = 'Content\\'.$moduleName.'\\'.$componentName;
                $componentName = (string) Str::of($moduleName)->snake();

                // Add the current directory to the view namespace
                View::addNamespace('content', $directory);
                // Register the component
                Blade::component($class, 'content::'.$componentName);
            }
        }

        View::addNamespace('content', base_path('content'));
        Blade::component(ContentResolver::class, 'content::resolver');
    }
}
