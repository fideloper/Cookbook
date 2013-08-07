<?php namespace Cookbook\Log;

use Illuminate\Support\ServiceProvider;
use Cookbook\Log\LaravelLogger;

class LogServiceProvider extends ServiceProvider {

	/**
     * Register the binding
     *
     * @return void
     */
    public function register()
    {
    	$app = $this->app;

        $app['cookbook.log'] = $app->share(function() use ($app)
        {
            return new LaravelLogger( $app['log'] );
        });
	}
}