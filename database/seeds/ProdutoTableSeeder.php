<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ProdutoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('produto')->truncate();

        factory('CodeCommerce\Produto', 100)->create();
    }
}
