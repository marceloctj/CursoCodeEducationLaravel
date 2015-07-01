<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Categoria;
use CodeCommerce\Produto;

class StoreController extends Controller
{
	private $produtoModel;
	private $categoriaModel;

	public function __construct(Produto $produto, Categoria $categoria)
	{
		$this->produtoModel   = $produto;
		$this->categoriaModel = $categoria;
	}

    public function index()
    {
    	$categoriasSideBar 	  = $this->categoriaModel->all();

    	$produtosEmDestaque   = $this->produtoModel->emDestaque()->get();
    	$produtosRecomendados = $this->produtoModel->recomendados()->get();

    	return view('store.index', compact('categoriasSideBar', 'produtosEmDestaque', 'produtosRecomendados'));
    }

    public function produtosPorCategoria($categoriaId)
    {
    	$categoriasSideBar = $this->categoriaModel->all();

    	$categoria 		   = $this->categoriaModel->find($categoriaId);

    	$produtos  		   = $this->produtoModel->where('categoria_id','=',$categoriaId)->paginate(9);

    	return view('store.produtosPorCategoria', compact('categoriasSideBar','categoria','produtos'));
    }
}
