<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Categoria;
use CodeCommerce\Tag;
use CodeCommerce\Produto;

class StoreController extends Controller
{
	private $produtoModel;
	private $categoriaModel;
    private $tagModel;

	public function __construct(Produto $produto, Categoria $categoria, Tag $tag)
	{
		$this->produtoModel   = $produto;
		$this->categoriaModel = $categoria;
        $this->tagModel       = $tag;
	}

    public function index(Request $request)
    {
        file_put_contents('topqwpodkq.txt', var_export($request->all(), true));
    	$categoriasSideBar 	  = $this->categoriaModel->all();

    	$produtosEmDestaque   = $this->produtoModel->emDestaque()->get();
    	$produtosRecomendados = $this->produtoModel->recomendados()->get();

    	return view('store.index', compact('categoriasSideBar', 'produtosEmDestaque', 'produtosRecomendados'));
    }

    public function produtosPorCategoria($categoriaId)
    {
    	$categoriasSideBar = $this->categoriaModel->all();
    	$categoria 		   = $this->categoriaModel->find($categoriaId);

        if($categoria){
        	$produtos = $categoria->produtos()->paginate(9);
        	return view('store.produtosPorCategoria', compact('categoriasSideBar','categoria','produtos'));
        }else{
            return redirect()->route('store.index');
        }
    }

    public function produtosPorTags($tagId)
    {
        $categoriasSideBar = $this->categoriaModel->all();
        $tag               = $this->tagModel->find($tagId);
        
        if($tag){
            $produtos = $tag->produtos()->paginate(9);            
            return view('store.produtosPorTag', compact('categoriasSideBar','tag','produtos'));
        }else{
            return redirect()->route('store.index');
        }
    }

    public function produto($id)
    {

        $categoriasSideBar = $this->categoriaModel->all();
        $produto           = $this->produtoModel->find($id);

        return view('store.produto', compact('categoriasSideBar','produto'));
    }
}
