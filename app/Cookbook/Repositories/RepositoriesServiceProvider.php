<?php namespace Cookbook\Repositories;

use Illuminate\Support\ServiceProvider;
use Cookbook\Cache\LaravelCache;
use Cookbook\Repositories\Article\EloquentArticle;
use Article; // Eloquent article

class RepositoriesServiceProvider extends ServiceProvider {

	/**
     * Register the binding
     *
     * @return void
     */
    public function register()
    {
    	$app = $this->app;

        $app->bind('Cookbook\Repositories\Article\ArticleInterface', function() use($app)
	    {
    	    return new EloquentArticle( 
                new Article, 
                new LaravelCache( $app['cache'], 'articles', 10 )
            );
        });
	}
}