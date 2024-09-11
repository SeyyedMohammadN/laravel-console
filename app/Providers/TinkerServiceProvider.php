<?php

namespace App\Providers;

use App\Application;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use Laravel\Tinker\Console\TinkerCommand;

class TinkerServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        if( $this->app instanceof Application ) {
            $this->app->configure('tinker');

            $source = realpath($raw = $this->app->vendorPath('laravel'.DIRECTORY_SEPARATOR.'tinker'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'tinker.php')) ?: $raw;
            $this->mergeConfigFrom($source, 'tinker');
        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('command.tinker', function () {
            return new TinkerCommand;
        });

        $this->commands(['command.tinker']);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['command.tinker'];
    }
}
