<?php

namespace CodeCommerce\Http\Controllers;

use Request;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Categoria;

class CategoriasController extends Controller
{
	private $categoriaModel;

	public function __construct(Categoria $categoriaModel){
		$this->categoriaModel = $categoriaModel;
	}

    public function index()
    {
    	$categorias = $this->categoriaModel->all();
    	return view('categorias.index', compact('categorias'));
    }

    public function cadastrar()
    {
    	return view('categorias.cadastrar');
    }
}
