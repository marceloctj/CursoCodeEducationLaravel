<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Http\Requests;
use CodeCommerce\Produto;
use CodeCommerce\Categoria;

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
        $produtos = $this->produtoModel->orderBy('id','DESC')->paginate($this->porPagina);

        return view('produtos.index', compact('produtos'));
    }

    public function cadastrar(Categoria $categoria)
    {
        $categorias = $categoria->lists('name','id');        
        return view('produtos.cadastrar', compact('categorias'));
    }
    
    public function adicionar(Request $request)
    {
        if($request->isMethod('post')){            
            $this->produtoModel->create($request->all());
            $request->session()->flash('success','Produto cadastrado com sucesso!');
            return redirect()->route('produtos');
        }
    }

    public function editar(Categoria $categoria, $id)
    {
        $produto = $this->produtoModel->find($id);          
        if(!$produto){
            return redirect()->route('produtos');
        }        

        $categorias = $categoria->lists('name','id');        

        return view('produtos.editar', compact('produto','categorias'));
    }

    public function atualizar(Request $request, $id)
    {
        if($request->isMethod('put')){
            $this->produtoModel->find($id)->update($request->all());
            $request->session()->flash('success','Produto foi editado com sucesso!');
            return redirect()->route('produtos');
        }
    }

    public function deletar(Request $request, $id)
    {
        $this->produtoModel->find($id)->delete();
        $request->session()->flash('success','Produto excluido com sucesso!');
        return redirect()->route('produtos');
    }

}
