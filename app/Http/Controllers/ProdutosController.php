<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Http\Requests;
use CodeCommerce\Produto;
use CodeCommerce\ProdutoImagem;
use CodeCommerce\Categoria;
use CodeCommerce\Tag;

use Illuminate\Http\Request;
use Storage;
use File;

class ProdutosController extends Controller
{    
    private $produtoModel;
    private $tagModel;

    public function __construct(Produto $produto, Tag $tags)
    {
        $this->produtoModel = $produto;
        $this->tagModel     = $tags;
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

            $tagsInput      = $request->input('tags');
            $tagsInput      = explode(',', trim($tagsInput));

            $tagsParaSalvar = $this->_getIdTags($tagsInput);

            $produto = $this->produtoModel->create($request->all());

            if($produto){
                $produto->tags()->attach($tagsParaSalvar);
                $request->session()->flash('success','Produto cadastrado com sucesso!');
                return redirect()->route('produtos');
            }            
        }
    }

    public function editar(Categoria $categoria, $id)
    {
        $produto = $this->produtoModel->find($id);          
        if(!$produto){
            return redirect()->route('produtos');
        }        

        $categorias = $categoria->lists('name','id');
        $tags       = $produto->tagsList;        

        return view('produtos.editar', compact('produto','categorias','tags'));
    }

    public function atualizar(Request $request, $id)
    {
        if($request->isMethod('put')){

            $tagsInput      = $request->input('tags');
            $tagsInput      = explode(',', trim($tagsInput));

            $tagsParaSalvar = $this->_getIdTags($tagsInput);

            $produto = $this->produtoModel->find($id);
            
            $update = $produto->update($request->all());            
            
            if($update){
                $produto->tags()->sync($tagsParaSalvar);
                $request->session()->flash('success','Produto foi editado com sucesso!');
                return redirect()->route('produtos');
            }
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

        $produto->tags()->detach();

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

        Storage::disk('public_local')->put($id.'/imagem_' . $imagem->id . '.' . $extensao, File::get($file));

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

    private function _getIdTags($tagsInput)
    {
        //Eu fiz assim porque ele retorna um objeto e por isso da erro quando uso funções de "array"
        $tagsExistentes = json_decode(json_encode($this->tagModel->lists('name','id')),true);                        
        $tagsParaSalvar = [];

        foreach($tagsInput as $tag){         
            $tag = ucfirst(trim($tag));
             
            if($tag != ''){
                $key = array_search($tag, $tagsExistentes);
                if(!$key){
                    $id                  = $this->tagModel->create(['name'=>$tag])->id;
                    $tagsParaSalvar[]    = $id;                               
                    $tagsExistentes[$id] = $tag;
                }else{
                    $tagsParaSalvar[] = $key;
                }
            }
        }

        return $tagsParaSalvar;
    }

}
