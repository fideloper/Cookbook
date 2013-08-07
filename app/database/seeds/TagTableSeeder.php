<?php

class TagTableSeeder extends Seeder {

    public function run()
    {
        DB::table('tags')->delete();

        Tag::create(array(
        	'title' => 'Laravel',
        	'slug' => 'laravel',
        ));

        Tag::create(array(
        	'title' => 'PHP',
        	'slug' => 'php',
        ));
    }

}