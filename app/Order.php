<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table    = 'order';
    protected $fillable = ['user_id','total','status','pag_seguro_referencia', 'pag_seguro_transacao'];

    public function itens()
    {
    	return $this->hasMany('CodeCommerce\OrderItem');
    }

    public function user()
    {
    	return $this->belongTo('CodeCommerce\User');
    }

    public function getStatusTextAttribute()
    {

        $options = [
            'Aguardando Pagamento',
            'Pagamento Confirmado',
            'Produto(s) sendo Separado(s) no Estoque',  
            'Produto(s) Enviado(s) para Transportadora',
            'Produto(s) em Transporte',
            'Produto(s) entregues'
        ];

        $replace = ($this->itens()->count() == 1) ? '' : 's';

        return str_replace('(s)', $replace, $options[$this->status]);
        
    }

    public function getStatusText($json = true)
    {
       return [
            'Aguardando Pagamento',
            'Pagamento Confirmado',
            'Produto(s) sendo Separado(s) no Estoque',  
            'Produto(s) Enviado(s) para Transportadora',
            'Produto(s) em Transporte',
            'Produto(s) entregues'
        ];
    }

    public function getPagSeguroReferencia()
    {
        return sha1($this->user_id . '#' . $this->id);
    }
}
