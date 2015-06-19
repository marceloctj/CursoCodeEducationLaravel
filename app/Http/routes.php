<?php
//Validação

Route::pattern('id','[0-9]+');

Route::get('/', 'WelcomeController@index');

Route::get('home', 'WelcomeController@teste');

Route::group(['prefix'=>'admin'], function(){
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
	});
});


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);