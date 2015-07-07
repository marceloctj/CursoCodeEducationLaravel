<?php

namespace CodeCommerce\Model;

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
    	return $this->belongsTo('CodeCommerce\Model\Categoria');
    }
    
    public function imagens()
    {
        return $this->hasMany('CodeCommerce\Model\ProdutoImagem');
    }

    public function tags()
    {
        return $this->belongsToMany('CodeCommerce\Model\Tag');
    }

    //Atributes
    public function getTagsListAttribute()
    {
        $tags = json_decode(json_encode($this->tags->lists('name','id')), true);        
        
        return join(', ', $tags);
    }
    //End Atributes

    public function scopeEmDestaque($query)
    {
        return $query->where('featured','=','1');
    }

    public function scopeRecomendados($query)
    {
        return $query->where('recommend','=','1');
    }

    public function scopeOfCategoria($query, $type)
    {
        return $query->where('categoria_id', '=', $type);
    }
}
