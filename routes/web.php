<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/login','AuthController@formLogin')->name('login');
Route::post('/login/do','AuthController@autenticacao')->name('login.aut');


//chamados usuario
Route::get('/chamados','ChamadoUserController@index')->name('chamados');
Route::post('/chamados/cadastro','ChamadoUserController@store')->name('chamados.cadastrar');
Route::delete('/chamados/apagar','ChamadoUserController@destroy')->name('chamados.apagar');

//chamados Atendente
Route::get('/atendente/chamados','ChamadoAtendenteController@index')->name('atendente.chamados');
Route::get('/atendente/{id}/visualizar','ChamadoAtendenteController@show')->name('chamado.visualizar');
Route::put('/status/atualizar/{id}','ChamadoAtendenteController@update')->name('atualizar.status');

//unidades
Route::get('/unidades','UnidadeController@index')->name('unidades');
Route::post('/unidades/cadastrar', 'UnidadeController@store')->name('unidade.cadastrar');
Route::put('/unidades/editar','UnidadeController@update')->name('unidade.editar');
Route::delete('/unidades/apagar','UnidadeController@destroy')->name('unidade.apagar');

//tipo de chamados
Route::get('/tipoChamados','TipoChamadoController@index')->name('tipoChamado');
Route::post('/tipoChamados/cadastrar','TipoChamadoController@store')->name('tipoChamado.cadastrar');
Route::put('/tipoChamados/editar','TipoChamadoController@update')->name('tipoChamado.editar');
Route::delete('/tipoChamados/apagar','TipoChamadoController@destroy')->name('tipoChamado.apagar');


//Usuários
Route::get('/usuarios','UserController@index')->name('usuarios');
Route::put('/usuarios/editar','UserController@update')->name('usuarios.editar');
Route::delete('/usuarios/apagar','UserController@destroy')->name('usuarios.apagar');
