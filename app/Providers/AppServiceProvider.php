<?php

namespace App\Providers;

use App\Services\CacheService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CacheService::class, function ($app) {
            return new CacheService(
                $app['cache.store']
            );
        });

        $this->app['chache.keys'] = [
            'announcements' => [
                'home.featured',
                'home.association',
            ],
        ];
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        // \Illuminate\Database\Eloquent\Model::preventLazyLoading(! app()->isProduction());
    }
}
