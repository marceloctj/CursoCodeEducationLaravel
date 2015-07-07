<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Model\Categoria;
use CodeCommerce\Http\Requests;

use Illuminate\Http\Request;

class CategoriasController extends Controller
{
	private $categoriaModel;

	public function __construct(Categoria $categoriaModel)
    {
		$this->categoriaModel = $categoriaModel;		
	}

    public function index()
    {
    	$categorias = $this->categoriaModel->paginate($this->porPagina);
    	return view('categorias.index', compact('categorias'));
    }

    public function cadastrar()
    {
    	return view('categorias.cadastrar');
    }

    public function adicionar(Requests\CategoriasRequest $request)
    {
    	$input = $request->all();

    	$categoria = $this->categoriaModel->fill($input);

    	$categoria->save();

    	return redirect()->route('categorias');
    }

    public function editar($id)
    {
    	$categoria = $this->categoriaModel->find($id);

    	return view('categorias.editar', compact('categoria'));
    }

    public function atualizar(Requests\CategoriasRequest $request, $id)
    {
    	$this->categoriaModel->find($id)->update($request->all());

    	return redirect()->route('categorias');
    }

    public function deletar($id)
    {
    	$this->categoriaModel->find($id)->delete();

    	return redirect()->route('categorias');
    }
}
