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
Route::get('/chamados','ChamadoController@index')->name('chamados');

//unidades
Route::get('/unidades','UnidadeController@index')->name('unidades');

//tipo de chamados
Route::get('/tipoChamados','TipoChamadoController@index')->name('tipoChamado');
