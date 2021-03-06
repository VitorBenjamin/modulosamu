<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::post('/chamado/store', 'ChamadoController@store');	

Auth::routes();
Route::get('/', function () {
	return view('/home');
});


Route::get('/home', 'HomeController@index');
Route::group(['middleware' => ['auth.basic']],function()
{
	Route::get('coordenador-dashboard', ['uses' => 'UserController@coordenadorDash','middleware' => 'auth', 'as' => 'user.coordenadorDash']);
	Route::get('set-reprovar/{id}', ['uses' => 'SolicitacaoController@reprovar', 'as' => 'solicitacao.reprovar']);

	// Rotas dos Chamados
	Route::get('chamado', ['uses' => 'ChamadoController@index' ,'as' => 'chamado.index']);
	Route::put('edit/{id}', ['uses'=>'ChamadoController@edit', 'as'=>'chamados.edit']);
	Route::get('destroy/{id}', ['uses'=>'ChamadoController@destroy', 'as'=>'chamados.destroy']);
	Route::get('detalhe/{id}', ['uses'=>'ChamadoController@detalhe', 'as'=>'chamados.detalhe']);
	Route::get('chamado/show/{idCham}', 'ChamadoController@show');
	Route::get('chamado/showTwo/{idCham}', 'ChamadoController@showTwo');
	Route::post('chamado/update/{idCham}', 'ChamadoController@update');

	//Rotas para aterar
	Route::get('chamado/updateTwo/{fila}/{id}', 'ChamadoController@updateTwo');
	Route::get('chamado/updateTree/{resolvedor}/{id}', 'ChamadoController@updateTree');
	Route::get('chamado/updateFour/{statuscham}/{id}', 'ChamadoController@updateFour');
	Route::get('chamado/updateFive/{prioridade}/{id}', 'ChamadoController@updateFive');


	/*ROTAS PARA FILAS*/
	Route::get('fila', 'FilasController@index');
	Route::get('fila/create', 'FilasController@create');
	Route::post('fila/store', 'FilasController@store');
	Route::post('fila/update/{id}', 'FilasController@update');
	Route::get('fila/edit/{id}', 'FilasController@edit');
	Route::get('fila/show/{id}', 'FilasController@show');
	Route::get('fila/destroy/{id}', 'FilasController@destroy');
});