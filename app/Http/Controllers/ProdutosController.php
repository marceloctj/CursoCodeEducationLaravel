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
        $produtos = $this->produtoModel->paginate($this->porPagina);

        return view('produtos.index', compact('produtos'));
    }

    public function cadastrar()
    {
        $action = 'produtos.adicionar';
        return view('produtos.cadastrar');
    }
    
    public function adicionar(Request $request)
    {
        if($request->isMethod('post')){            
            $this->produtoModel->create($request->all());
            return redirect()->route('produtos');
        }
    }

    public function editar(Request $request, $id)
    {
        $produto = $this->produtoModel->find($id);          
        if(!$produto){
            return redirect()->route('produtos');
        }        

        return view('produtos.editar', compact('produto'));
    }

    public function atualizar(Request $request, $id)
    {
        if($request->isMethod('put')){
            $this->produtoModel->find($id)->update($request->all());
            return redirect()->route('produtos');
        }
    }

    public function deletar($id)
    {
        $this->produtoModel->find($id)->delete();
        return redirect()->route('produtos');
    }

}
