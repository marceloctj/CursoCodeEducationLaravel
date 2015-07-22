<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table 	= 'order_item';
    protected $fillable = [
    	'produto_id',
    	'price',
    	'qtd'
    ];

    public function order()
    {
    	return $this->belongsTo('CodeCommerce\Order');
    }

    public function produto()
    {
        return $this->belongsTo('CodeCommerce\Produto');
    }
}
