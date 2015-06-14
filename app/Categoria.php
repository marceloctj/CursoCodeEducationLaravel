<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{    
    protected $table 	= 'categoria';

    protected $fillable = ['nome','descricao'];
}
