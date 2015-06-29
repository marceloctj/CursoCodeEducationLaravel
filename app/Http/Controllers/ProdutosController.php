<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Http\Requests;
use CodeCommerce\Produto;
use CodeCommerce\ProdutoImagem;
use CodeCommerce\Categoria;

use Illuminate\Http\Request;
use Storage;
use File;

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
    
    public function adicionar(Requests\ProdutoRequest $request)
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

        $produto = $this->produtoModel->find($id);

        foreach($produto->imagens as $imagem){            
            $nomeImagem = 'produto_' . $id . '_imagem_' . $imagem->id.'.'.$imagem->extension;            
            if(file_exists(public_path() . '/uploads/' . $nomeImagem))  
                Storage::disk('public_local')->delete($nomeImagem);
        }

        $produto->delete();

        $request->session()->flash('success','Produto excluido com sucesso!');        

        return redirect()->route('produtos');
    }

    public function imagens($id)
    {
        $produto = $this->produtoModel->find($id);

        return view('produtos.imagens', compact('produto'));
    }

    public function cadastrarImagem($id)
    {
        $produto = $this->produtoModel->find($id);

        return view('produtos.cadastrar_imagem', compact('produto'));
    }

    public function adicionarImagem(Requests\ProdutoImagemRequest $request, $id, ProdutoImagem $produtoImagem)
    {
        $file     = $request->file('imagem');
        $extensao = $file->getClientOriginalExtension();

        $imagem   = $produtoImagem->create(['produto_id'=>$id, 'extension'=>$extensao]);

        Storage::disk('s3')->put($id.'/imagem_' . $imagem->id . '.' . $extensao, File::get($file));

        return redirect()->route('produtos.imagens', ['id'=>$id]);
    }

    public function deletarImagem(ProdutoImagem $produtoImagem, $id)
    {
        $imagem = $produtoImagem->find($id);
        $nomeImagem = $imagem->produto->id . '/imagem_' . $imagem->id.'.'.$imagem->extension;

        if(file_exists(public_path() . '/uploads/' . $nomeImagem))  
            Storage::disk('public_local')->delete($nomeImagem);

        $produto = $imagem->produto;
        $imagem->delete();

        return redirect()->route('produtos.imagens',['id'=>$produto->id]);
    }

}
