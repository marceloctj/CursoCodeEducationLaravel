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
            0  => 'Aguardando Pagamento',
            1  => 'Aguardando Pagamento',
            2  => 'Em análise',
            3  => 'Pagamento Confirmado',
            4  => 'Disponível',
            5  => 'Em disputa',
            6  => 'Pagamento Devolvido',
            7  => 'Transação Cancelada',
            8  => 'Pagamento Devolvido',
            9  => 'Em contestação',
            15 => 'Produto(s) sendo Separado(s) no Estoque',
            16 => 'Produto(s) Enviado(s) para Transportadora',
            17 => 'Produto(s) em Transporte',
            18 => 'Produto(s) entregues',
        ];

        $replace = ($this->itens()->count() == 1) ? '' : 's';

        return str_replace('(s)', $replace, $options[$this->status]);

    }

    public function getStatusText($json = true)
    {
       return [
            0  => 'Aguardando Pagamento',
            1  => 'Aguardando Pagamento',
            2  => 'Em análise',
            3  => 'Pagamento Confirmado',
            4  => 'Disponível',
            5  => 'Em disputa',
            6  => 'Pagamento Devolvido',
            7  => 'Transação Cancelada',
            8  => 'Pagamento Devolvido',
            9  => 'Em contestação',
            15 => 'Produto(s) sendo Separado(s) no Estoque',
            16 => 'Produto(s) Enviado(s) para Transportadora',
            17 => 'Produto(s) em Transporte',
            18 => 'Produto(s) entregues',
        ];
    }

    public function getPagSeguroReferencia()
    {
        return sha1($this->user_id . '#' . $this->id);
    }
}
