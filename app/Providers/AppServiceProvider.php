<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * Here we will register all of the application's service providers which
     * are used to bind services into the container. Service providers are
     * totally optional, so you are not required to uncomment this line.
     *
     * @return void
     */
    public function register(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Register Config Files
        |--------------------------------------------------------------------------
        |
        | Now we will register the "app" configuration file. If the file exists in
        | your configuration directory it will be loaded; otherwise, we'll load
        | the default version. You may register other files below as needed.
        |
        */
        $this->app->configure('app');

        $this->app->withEloquent();
        $this->app->withFacades();

        /*
        |--------------------------------------------------------------------------
        | Register Service Providers
        |--------------------------------------------------------------------------
        |
        | Here we will register all of the application's service providers which
        | are used to bind services into the container. Service providers are
        | totally optional, so you are not required to uncomment this line.
        |
        */
        $this->app->register(TinkerServiceProvider::class);
        // $this->app->register(EventServiceProvider::class);
    }
}
