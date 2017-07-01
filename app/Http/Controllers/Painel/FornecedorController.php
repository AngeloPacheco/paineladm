<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Fornecedores;
use App\Models\Painel\Paises;
use \Illuminate\Support\Facades\DB;

class FornecedorController extends Controller
{
    

    private $fornecedor;
    private $paises;
    private $totalPage = 10;


    public function __construct(Fornecedores $fornecedor, Paises $paises){
        
        $this->fornecedor = $fornecedor;
        $this->paises = $paises;
             
    
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Fornecedores';
        
        $fornecedores = $this->fornecedor->orderBy('razao_social','asc')->paginate($this->totalPage);
        
        return view('painel.fornecedores.index', compact('title', 'fornecedores'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Cadastrar Produto';
        
        $paises = DB::table('paises')
                ->select('id', 'pais')
                ->orderby('pais', 'asc')
                ->get();

        
       //echo '<pre>'; print_r($paises); echo '</pre>';
       //die;

       //$paises = ['Brasil', 'Chile','Peru'];
        
        $estados = ['AC','AL','AP','AM','BA','CE','DF','ES','GO','MA','MT','MS','MG','PA','PB','PR','PE','PI','RJ','RN','RS','RO','RR','SC','SP','SE','TO'];
        
        
        return view('painel.fornecedores.create-edit', compact('title','estados','paises'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
