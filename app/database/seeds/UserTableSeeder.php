<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(array(
        	'email' => 'demo@cookbook.com',
        	'password' => Hash::make('demo'),
        ));
    }

}