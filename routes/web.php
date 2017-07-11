<?php

/*      HOME    */
Route::get('/painel', 'Painel\PainelController@index');


/*   CATEGORIAS */
Route::resource('/painel/categorias', 'Painel\CategoriaController');

/*   MEDIDAS  */
Route::resource('/painel/medidas', 'Painel\MedidaController');


/*   PRODUTOS    */
Route::resource('/painel/produtos', 'Painel\ProdutoController');

/*   FORNECEDORES */
Route::resource('/painel/fornecedores', 'Painel\FornecedorController');
Route::get('/painel/fornecedores/busca', 'Painel\FornecedorController@busca');
Route::post('/painel/fornecedores/busca', 'Painel\FornecedorController@busca');


/*   CONFIGURAÇÕES  */
Route::get('/painel/configuracoes', 'Painel\ConfiguracoesController@index');

/*   EMPRESA  */
Route::resource('/painel/empresa', 'Painel\EmpresaController');

/*  TRANSPORTADORAS    */
Route::resource('/painel/transportadoras', 'Painel\TransportadoraController');
Route::get('/painel/transportadoras/busca', 'Painel\TransportadoraController@busca');
Route::post('/painel/transportadoras/busca', 'Painel\TransportadoraController@busca');

/*   FORMA DE PAGAMENTOS */
Route::get('/painel/forma-pagamentos/delete/{id}', 'Painel\FormaPagamentoController@destroy');
Route::resource('/painel/forma-pagamentos', 'Painel\FormaPagamentoController');
Route::get('/painel/forma-pagamentos/busca', 'Painel\FormaPagamentoController@busca');
Route::post('/painel/forma-pagamentos/busca', 'Painel\FormaPagamentoController@busca');

/*   CATEGORIAS CONTAS A PAGAR */
Route::get('/painel/categorias-contas-pagar/delete/{id}', 'Painel\CatContasPagarController@destroy');
Route::resource('/painel/categorias-contas-pagar', 'Painel\CatContasPagarController');
Route::get('/painel/categorias-contas-pagar/busca', 'Painel\CatContasPagarController@busca');
Route::post('/painel/categorias-contas-pagar/busca', 'Painel\CatContasPagarController@busca');
                     

/*   CONTAS A PAGAR */
Route::get('/painel/contas-pagar/delete/{id}', 'Painel\ContasPagarController@destroy');
Route::resource('/painel/contas-pagar', 'Painel\ContasPagarController');
Route::get('/painel/contas-pagar/busca', 'Painel\ContasPagarController@busca');
Route::post('/painel/contas-pagar/busca', 'Painel\ContasPagarController@busca');




  /*   IMAGENS  */
Route::get('/painel/imagens', 'Painel\ImagemController@index');




/**************************************************************************************
                      Logradouros  OBSOLETOS 
*/
Route::resource('/painel/cidades', 'Painel\CidadeController');
Route::resource('/painel/bairros', 'Painel\BairroController');
Route::resource('/painel/logradouros', 'Painel\LogradouroController');
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

/* Rota Ajax busca bairros pertecentes a uma cidade */
Route::get('/painel/get-bairros/{idCidade}', 'Painel\BuscaController@getBairros');
/*****************************************************************************************/





Route::group(['namespace' => 'Site'], function() {

    Route::get('/', 'SiteController@index');
    Route::get('/contato', 'SiteController@contato');
    Route::get('/categoria/{id}', 'SiteController@categoria');
    Route::get('/categoria2/{id?}', 'SiteController@categoriaop');

});
