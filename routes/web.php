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
Route::post('/chamados/cadastro','ChamadoUserController@store')->name('chamados.cadastrar');
Route::delete('/chamados/apagar','ChamadoUserController@destroy')->name('chamados.apagar');

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
