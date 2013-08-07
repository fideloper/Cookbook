<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');
		$this->call('ArticleTableSeeder');
		$this->call('TagTableSeeder');

		// insert into articles_tags (article_id, tag_id) VALUES (1,1), (1,2), (2,1), (3,2);
	}

}