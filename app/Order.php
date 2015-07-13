<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table    = 'order';
    protected $fillable = ['user_id','total','status'];

    public function itens()
    {
    	return $this->hasMany('CodeCommerce\OrderItem');
    }

    public function user()
    {
    	return $this->belongTo('CodeCommerce\User');
    }
}
