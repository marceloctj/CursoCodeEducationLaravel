<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{    
    protected $table 	= 'categoria';

    protected $fillable = ['name','description'];

    public function produtos()
    {
    	return $this->hasMany('CodeCommerce\Produto');
    }
}
