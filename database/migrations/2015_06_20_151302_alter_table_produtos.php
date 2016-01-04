<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableProdutos extends Migration
{
    
    public function up()
    {
        Schema::table('produto', function($table){
            $table->boolean('featured')->default(0);
            $table->boolean('recommend')->default(0);
        });
    }

    public function down()
    {
    	Schema::table('produto', function (Blueprint $table) {
            $table->removeColumn('featured');
            $table->removeColumn('recommend');
        });
    }
}
