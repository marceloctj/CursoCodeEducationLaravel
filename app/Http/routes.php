<?php
//Validação

Route::pattern('id','[0-9]+');

Route::get('/', 'WelcomeController@index');

Route::get('home', 'WelcomeController@teste');

Route::group(['prefix'=>'admin'], function(){
	Route::group(['prefix'=>'categories'], function(){
		Route::get('/', ['as'=>'categorias', 'uses'=>'CategoriasController@index']);
		Route::get('/cadastrar',['as'=>'categorias.cadastrar', 'uses'=> 'CategoriasController@cadastrar']);
		Route::get('/{id}/deletar', ['as'=>'categorias.deletar', 'uses'=>'CategoriasController@deletar']);
		Route::get('/{id}/editar', ['as'=>'categorias.editar', 'uses'=>'CategoriasController@editar']);
		Route::post('/adicionar', ['as'=>'categorias.adicionar', 'uses'=>'CategoriasController@adicionar']);
		Route::put('/{id}/atualizar', ['as'=>'categorias.atualizar', 'uses'=>'CategoriasController@atualizar']);
	});

	Route::group(['prefix'=>'products'], function(){
		Route::get('/', ['as'=>'produtos', 'uses'=>'ProdutosController@index']);
	});
});


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);