<?php namespace Cookbook\Form;

use Illuminate\Support\ServiceProvider;
use Cookbook\Form\Article\ArticleForm;
use Cookbook\Form\Article\ArticleValidation;

class FormServiceProvider extends ServiceProvider {

    /**
     * Register the binding
     *
     * @return void
     */
    public function register()
    {
        $app = $this->app;

        $app->bind('Cookbook\Form\Article\ArticleForm', function() use($app)
        {
            return new ArticleForm( new ArticleValidation( $app['validator'] ), $app->make('Cookbook\Repositories\Article\ArticleInterface') );
        });
    }

}