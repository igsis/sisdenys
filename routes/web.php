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


//chamados usuario
Route::get('/chamados','ChamadoUserController@index')->name('chamados');
Route::post('/chamados','ChamadoUserController@store')->name('chamados.cadastro');

//unidades
Route::get('/unidades','UnidadeController@index')->name('unidades');
Route::post('/cadastrarUnidade', 'UnidadeController@store')->name('unidade.cadastrar');

//tipo de chamados
Route::get('/tipoChamados','TipoChamadoController@index')->name('tipoChamado');
Route::post('/tipoChamados/cadastrar','TipoChamadoController@store')->name('tipoChamado.cadastrar');
Route::put('/tipoChamados/editar','TipoChamadoController@update')->name('tipoChamado.editar');
Route::delete('/tipoChamados/apagar','TipoChamadoController@destroy')->name('tipoChamado.apagar');
