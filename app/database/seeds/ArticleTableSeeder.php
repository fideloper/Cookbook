<?php

class ArticleTableSeeder extends Seeder {

    public function run()
    {
        DB::table('articles')->delete();

        Article::create(array(
        	'title' => 'Laravel Cookbook',
        	'slug' => 'laravel_cookbook',
        	'content' => "## Read my Laravel Cookbook\nThis is my first paragraph of information"
        ));

        Article::create(array(
        	'title' => 'Laravel Error Handling',
        	'slug' => 'laravel_error_handling',
        	'content' => "## Error Handling\nThis is my first and maybe even my second paragraph of information."
        ));

        Article::create(array(
        	'title' => 'Laravel API Creation',
        	'slug' => 'laravel_api_creation',
        	'content' => "## API Creation\nThis is my yet another paragraph of very useful information."
        ));
    }

}