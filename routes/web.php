<?php

Route::resource('/painel/categorias', 'Painel\CategoriaController');
Route::resource('/painel/produtos', 'Painel\ProdutoController');
Route::resource('/painel/medidas', 'Painel\MedidaController');
Route::resource('/painel/empresa', 'Painel\EmpresaController');
Route::resource('/painel/fornecedores', 'Painel\FornecedorController');
Route::resource('/painel/transportadoras', 'Painel\TransportadoraController');



Route::resource('/painel/cidades', 'Painel\CidadeController');
Route::resource('/painel/bairros', 'Painel\BairroController');
Route::resource('/painel/logradouros', 'Painel\LogradouroController');

Route::get('/painel', 'Painel\PainelController@index');
Route::get('/painel/categorias', 'Painel\CategoriaController@index');
Route::get('/painel/medidas', 'Painel\MedidaController@index');
Route::get('/painel/imagens', 'Painel\ImagemController@index');
Route::get('/painel/empresa', 'Painel\EmpresaController@index');
Route::get('/painel/configuracoes', 'Painel\ConfiguracoesController@index');
Route::get('/painel/fornecedores', 'Painel\FornecedorController@index');
Route::get('/painel/transportadoras', 'Painel\TransportadoraController@index');


Route::get('/painel/cidades', 'Painel\CidadeController@index');
Route::get('/painel/bairros', 'Painel\BairroController@index');
Route::get('/painel/logradouros', 'Painel\LogradouroController@index');



/* pesquisa cidade */
Route::get('/painel/cidades/busca', 'Painel\CidadeController@busca');
Route::post('/painel/cidades/busca', 'Painel\CidadeController@busca');
/* pesquisa bairro */
Route::get('/painel/bairros/busca', 'Painel\BairroController@busca');
Route::post('/painel/bairros/busca', 'Painel\BairroController@busca');
/* pesquisa logradouro */
Route::get('/painel/logradouros/busca', 'Painel\LogradouroController@busca');
Route::post('/painel/logradouros/busca', 'Painel\LogradouroController@busca');



/* pesquisa fornecedor */
Route::get('/painel/fornecedores/busca', 'Painel\FornecedorController@busca');
Route::post('/painel/fornecedores/busca', 'Painel\FornecedorController@busca');

/* pesquisa transportadora */
Route::get('/painel/transportadoras/busca', 'Painel\TransportadoraController@busca');
Route::post('/painel/transportadoras/busca', 'Painel\TransportadoraController@busca');


/* Rota Ajax busca bairros pertecentes a uma cidade */
Route::get('/painel/get-bairros/{idCidade}', 'Painel\BuscaController@getBairros');




Route::group(['namespace' => 'Site'], function() {

    Route::get('/', 'SiteController@index');
    Route::get('/contato', 'SiteController@contato');
    Route::get('/categoria/{id}', 'SiteController@categoria');
    Route::get('/categoria2/{id?}', 'SiteController@categoriaop');

});
