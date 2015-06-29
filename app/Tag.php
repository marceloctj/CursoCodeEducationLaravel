<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table 	= 'tag';

    protected $fillable = ['name'];

    public function produtos()
    {
    	return $this->belongsToMany('CodeCommerce\Produto');
    }
}
