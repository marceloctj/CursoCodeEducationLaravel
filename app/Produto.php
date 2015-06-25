<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table 	= 'produto';

    protected $fillable = [
    	'name',
    	'description',
    	'price',
    	'featured',
    	'recommend',
    	'categoria_id'
    ];

    public function categoria()
    {
    	return $this->belongsTo('CodeCommerce\Categoria');
    }
    
    public function imagens()
    {
        return $this->hasMany('CodeCommerce\ProdutoImagem');
    }
}
