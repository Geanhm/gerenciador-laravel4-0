<?php

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
Route::get('/', function(){
    return view('home');
});

Route::get('/clientes', 'ClientesController@index')  ->name('listar_clientes') ->middleware('auth');
Route::get('/clientes/criar', 'ClientesController@create')  ->name('form_criar_cliente') ->middleware('auth');
Route::post('/clientes/criar', 'ClientesController@store') ->middleware('auth');
Route::delete('/clientes/{id}', 'ClientesController@destroy') ->middleware('auth');

Route::get('/clientes/{clienteId}/enderecos', 'EnderecosController@index') ->name('listar_enderecos') ->middleware('auth');
Route::get('/clientes/{clienteId}/enderecos/criar', 'EnderecosController@create')  ->name('form_criar_enderecos') ->middleware('auth');
Route::post('/clientes/{clienteId}/enderecos/criar', 'EnderecosController@store') ->middleware('auth');

Route::get('/clientes/{clienteId}/telefones', 'TelefonesController@index') ->name('listar_telefones') ->middleware('auth');
Route::get('/clientes/{clienteId}/telefones/criar', 'TelefonesController@create')  ->name('form_criar_telefones') ->middleware('auth');
Route::post('/clientes/{clienteId}/telefones/criar', 'TelefonesController@store') ->middleware('auth');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
