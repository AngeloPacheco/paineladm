<?php

Route::resource('/painel/categorias', 'Painel\CategoriaController');
Route::resource('/painel/produtos', 'Painel\ProdutoController');
Route::resource('/painel/medidas', 'Painel\MedidaController');
Route::resource('/painel/empresa', 'Painel\EmpresaController');
Route::resource('/painel/fornecedores', 'Painel\FornecedorController');

Route::get('/painel', 'Painel\PainelController@index');
Route::get('/painel/categorias', 'Painel\CategoriaController@index');
Route::get('/painel/medidas', 'Painel\MedidaController@index');
Route::post('/painel/categorias/pesquisa', 'Painel\CategoriaController@pesquisa');
Route::get('/painel/imagens', 'Painel\ImagemController@index');
Route::get('/painel/empresa', 'Painel\EmpresaController@index');
Route::get('/painel/configuracoes', 'Painel\ConfiguracoesController@index');
Route::get('/painel/fornecedores', 'Painel\FornecedorController@index');










Route::group(['namespace' => 'Site'], function() {

    Route::get('/', 'SiteController@index');
    Route::get('/contato', 'SiteController@contato');
    Route::get('/categoria/{id}', 'SiteController@categoria');
    Route::get('/categoria2/{id?}', 'SiteController@categoriaop');

});
