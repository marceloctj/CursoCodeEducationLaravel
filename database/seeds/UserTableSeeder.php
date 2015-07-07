<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->truncate();
        
        factory('CodeCommerce\Model\User')->create([
        	'name'=>'Marcelo Castro',
        	'email'=>'marceloctj@gmail.com',
        	'password'=>Hash::make('123456')
        ]);

        factory('CodeCommerce\Model\User', 20)->create();

    }
}
