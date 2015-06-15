<?php
//Validação

Route::pattern('id','[0-9]+');

Route::get('/', 'WelcomeController@index');

Route::get('teste', 'WelcomeController@teste');


Route::get('categorias', ['as'=>'categorias', 'uses'=>'CategoriasController@index']);
Route::get('categorias/cadastrar',['as'=>'categorias.cadastrar', 'uses'=> 'CategoriasController@cadastrar']);
Route::get('categorias/{id}/deletar', ['as'=>'categorias.deletar', 'uses'=>'CategoriasController@deletar']);
Route::get('categorias/{id}/editar', ['as'=>'categorias.editar', 'uses'=>'CategoriasController@editar']);
Route::post('categorias/adicionar', ['as'=>'categorias.adicionar', 'uses'=>'CategoriasController@adicionar']);
Route::put('categorias/{id}/atualizar', ['as'=>'categorias.atualizar', 'uses'=>'CategoriasController@atualizar']);


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);