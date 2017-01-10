<?php

namespace MarcusCampos\LaravelSocket;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Container\Container as Application;
use Illuminate\Foundation\Application as LaravelApplication;
use MarcusCampos\LaravelSocket\Emitter\Emitter;

class SocketServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->setupConfig($this->app);
    }

    protected function setupConfig(Application $app)
    {
        $source = realpath(__DIR__.'/../config/socket.php');

        if ($app instanceof LaravelApplication && $app->runningInConsole()) {
            $this->publishes([$source => config_path('socket.php')]);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app['config']->get('socket');

        $this->app['emmiter'] = $this->app->share(function ($app){
            return new Emitter();
        });

        $this->app->booting(function(){
            $loader = AliasLoader::getInstance();
            $loader->alias('Emitter', 'MarcusCampos\LaravelSocket\Facades\Emitter');
        });

    }

}
