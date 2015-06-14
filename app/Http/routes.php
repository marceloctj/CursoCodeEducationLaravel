<?php
//Validação

Route::pattern('id','[0-9]+');

Route::get('/', 'WelcomeController@index');

Route::get('teste', 'WelcomeController@teste');

Route::get('categorias', 'CategoriasController@index');
Route::get('categorias/cadastrar', 'CategoriasController@cadastrar');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);