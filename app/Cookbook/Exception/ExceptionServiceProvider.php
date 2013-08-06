<?php namespace Cookbook\Exception;

use Illuminate\Support\ServiceProvider;
use Cookbook\Log\LaravelLogger;

class ExceptionServiceProvider extends ServiceProvider {

	/**
     * Register the binding
     *
     * @return void
     */
    public function register()
    {
    	$app = $this->app;

        $app['cookbook.exception'] = $app->share(function() use ($app)
        {
            return new LaravelLogger( $app['log'] );
        });
	}

    public function boot()
    {
        $app = $this->app;

        $app->error(function(CookbookException $e) use ($app)
        {
            $app['cookbook.exception']->log('error', $e);
        });
    }
}