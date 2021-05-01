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

Route::get('/','HomeController');

Route::prefix('/config')->group(function(){

    Route::get('/','Admin\ConfigController@index');
    Route::post('/','Admin\ConfigController@index');
    Route::get('menu','Admin\ConfigController@menu');
    Route::get('exit','Admin\ConfigController@exit');
});

Route::prefix('/admin')->group(function(){
    Route::get('/','FornecedoresController@list')->name('fornecedores.list');

    Route::get('fornecedores/add','FornecedoresController@add')->name('fornecedores.add');
    Route::post('fornecedores/add','FornecedoresController@addAction');
    Route::get('fornecedores/edit/{id}','FornecedoresController@edit')->name('fornecedores.edit');
    Route::post('fornecedores/edit/{id}','FornecedoresController@editAction');
    Route::get('fornecedores/delete/{id}','FornecedoresController@del')->name('fornecedores.del');

    Route::get('produtos','ProdutosController@list')->name('produtos.list');
    Route::get('produtos/add','ProdutosController@add')->name('produtos.add');
    Route::post('produtos/add','ProdutosController@addAction');
    Route::get('produtos/edit/{id}','ProdutosController@edit')->name('produtos.edit');
    Route::post('produtos/edit/{id}','ProdutosController@editAction');
    Route::get('produtos/delete/{id}','ProdutosController@del')->name('produtos.del');
});

Route::prefix('/compras')->group(function(){
    Route::get('/','ComprasController@list')->name('compras.list');
    Route::get('checkout','ComprasController@checkout')->name('checkout');
    Route::post('checkout','ComprasController@checkoutAction');
    Route::get('/{id}','ComprasController@addAction')->name('compras.add');
    Route::get('/carrinho','ComprasController@carrinho')->name('carrinho');
    Route::get('/carrinho/cep/{cep}','ComprasController@getCep')->name('consultar.cep');
    Route::get('/carrinho/{id}','ComprasController@carrinhoDelete')->name('carrinho.delete');
});

Route::fallback(function(){
    return view('404');
});
