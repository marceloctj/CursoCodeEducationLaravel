<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table 	= 'produto';

    protected $fillable = ['nome','descricao','preco'];
}
