<?php

namespace CodeCommerce\Model;

use Illuminate\Database\Eloquent\Model;

class ProdutoImagem extends Model
{
    protected $table 	= 'produto_imagem';

    protected $fillable = ['produto_id', 'extension'];

    public function produto()
    {
    	return $this->belongsTo('CodeCommerce\Model\Produto');
    }
}
