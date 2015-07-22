<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('cep', 10);
            $table->string('logradouro', 150);
            $table->string('numero', 50);
            $table->string('complemento', 150);
            $table->string('bairro', 150);
            $table->string('cidade', 150);
            $table->string('uf', 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->removeColumn('cep');
            $table->removeColumn('logradouro');
            $table->removeColumn('bairro');
            $table->removeColumn('cidade');
            $table->removeColumn('uf');            
        });
    }
}
