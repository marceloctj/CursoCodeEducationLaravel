<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Produto;
use CodeCommerce\Http\Requests;

use Illuminate\Http\Request;

class ProdutosController extends Controller
{    
    private $produtoModel;

    public function __construct(Produto $produto)
    {
        $this->produtoModel = $produto;
    }

    public function index()
    {
        $produtos = $this->produtoModel->all();

        return view('produtos.index', compact('produtos'));
    }

    public function cadastrar()
    {
        return 'Create';
    }
    
    public function adicionar()
    {
        return 'Store';
    }

    public function editar($id)
    {
        return 'Edit';
    }

    public function atualizar($id)
    {
        return 'Update';
    }

    public function deletar($id)
    {
        return 'Destroy';
    }

}
