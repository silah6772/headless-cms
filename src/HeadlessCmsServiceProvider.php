<?php

namespace Sharacms\font;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use HeadlessCms\App\Commands\Initialize;

class HeadlessCmsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // if ($this->app->runningInConsole()) {
        //     $this->commands([
        //         Initialize::class
        //     ]);
        // }
        Route::middleware('api')->prefix('api')->group(function () {
            $this->loadRoutesFrom(__DIR__ . '/App/Routes/api.php');
        });

        $this->loadRoutesFrom(__DIR__ . '/App/Routes/web.php');

        $this->loadViewsFrom(__DIR__ . '/resources/views', 'headlessCms');

        $this->publishes([
            __DIR__ . '/resources/views' => resource_path('views/headlessCms')
        ]);

        $this->publishes([
            __DIR__ . '/public' => public_path(''),
        ]);
        $this->publishes([
            __DIR__ . '/App/Jobs' => app_path('jobs'),
        ]);
        $this->publishes([
            __DIR__ . '/App/config' => config_path(''),
        ]);
    }
}
