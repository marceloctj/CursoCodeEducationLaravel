<?php
//Validação

Route::pattern('id', '[0-9]+');
Route::pattern('categoriaId', '[0-9]+');

Route::get('/', 'StoreController@index');

Route::get('/produtos/{categoriaId}/categoria', ['as'=>'store.produtos.categorias', 'uses'=>'StoreController@produtosPorCategoria']);

Route::group(['prefix'=>'admin'], function(){
	Route::get('', function(){		
		return view('app');		
	});
	Route::group(['prefix'=>'categories'], function(){
		Route::get('/', ['as'=>'categorias', 'uses'=>'CategoriasController@index']);
		Route::get('/create',['as'=>'categorias.cadastrar', 'uses'=> 'CategoriasController@cadastrar']);
		Route::post('/store', ['as'=>'categorias.adicionar', 'uses'=>'CategoriasController@adicionar']);
		Route::get('/{id}/destroy', ['as'=>'categorias.deletar', 'uses'=>'CategoriasController@deletar']);
		Route::get('/{id}/edit', ['as'=>'categorias.editar', 'uses'=>'CategoriasController@editar']);
		Route::put('/{id}/update', ['as'=>'categorias.atualizar', 'uses'=>'CategoriasController@atualizar']);
	});

	Route::group(['prefix'=>'products'], function(){

		Route::get('/', ['as'=>'produtos', 'uses'=>'ProdutosController@index']);
		Route::get('/create',['as'=>'produtos.cadastrar', 'uses'=> 'ProdutosController@cadastrar']);
		Route::post('/store', ['as'=>'produtos.adicionar', 'uses'=>'ProdutosController@adicionar']);
		Route::get('/{id}/destroy', ['as'=>'produtos.deletar', 'uses'=>'ProdutosController@deletar']);
		Route::get('/{id}/edit', ['as'=>'produtos.editar', 'uses'=>'ProdutosController@editar']);
		Route::put('/{id}/update', ['as'=>'produtos.atualizar', 'uses'=>'ProdutosController@atualizar']); 

		Route::group(['prefix'=>'images'], function(){

			Route::get('/{id}/product', ['as'=>'produtos.imagens', 'uses'=>'ProdutosController@imagens']);
			Route::get('create/{id}/product', ['as'=>'produtos.imagens.cadastrar', 'uses'=>'ProdutosController@cadastrarImagem']);
			Route::post('storage/{id}/product', ['as'=>'produtos.imagens.adicionar', 'uses'=>'ProdutosController@adicionarImagem']);
			Route::get('destroy/{id}/imagem', ['as'=>'produtos.imagens.deletar', 'uses'=>'ProdutosController@deletarImagem']);

		});
	});
});


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);