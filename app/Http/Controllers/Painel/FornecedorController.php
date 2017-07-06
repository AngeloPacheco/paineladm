<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Fornecedores;
use App\Http\Requests\Painel\FornecedorFormRequest;
use \Illuminate\Support\Facades\DB;



class FornecedorController extends Controller
{
    

    private $fornecedor;
    private $totalPage = 10;


    public function __construct(Fornecedores $fornecedor){
        
        $this->fornecedor = $fornecedor;
    
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
        $title = 'Cadastrar Fornecedor';
        
        return view('painel.fornecedores.create-edit', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FornecedorFormRequest $request)
    {
        $dataForm = $request->all();
        
       
        if ( existeCNPJFornecedor($dataForm['cnpj']) ){
             
            $messagens = ['cnpj.unique' => 'CNPJ já cadastrado'];

            $this->validate($request, [
                'cnpj' => 'unique:fornecedores',
             ], $messagens);
               
        }else{
          
            $insert = $this->fornecedor->create($dataForm);
            
            if ($insert) {
                return redirect('/painel/fornecedores');
            } else {
                return redirect()->route('painel.fornecedores.create-edit');
            }
        }
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $fornecedor = $this->fornecedor->find($id);
       $title = "Fornecedor:  {$fornecedor->razao_social}";
       
       return view('painel.fornecedores.show' , compact('title','fornecedor')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Editar Fornecedor';
        $fornecedor= $this->fornecedor->find($id);
        return view('painel.fornecedores.create-edit',compact('fornecedor', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FornecedorFormRequest $request, $id)
    {
        $dataForm = $request->all();
        $fornecedor   = $this->fornecedor->find($id); 
        
        $update   = $fornecedor->update($dataForm);
        
        if( $update ){
            return redirect('/painel/fornecedores');
        }
            else{
            return redirect()->route('fornecedores.edit', $id)->with(['errors' => 'Erro ao editar']);
        }
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fornecedor = $this->fornecedor->find($id);
        $delete = $fornecedor->delete();
        
        if ($delete){
            return redirect('/painel/fornecedores');
        }    
        else {
            return redirect()->route('fornecedores.show', $id)->with(['errors' => 'Erro ao exluir.']);
        }
    }

    public function busca(Request $request){

        $title = "Pesquisa Fornecedores";

        $key = $request->input('descricao');

            $fornecedores = DB::table('fornecedores')
                     ->where('fornecedores.razao_social','like','%'. $key .'%')
                     ->orwhere('fornecedores.nome_fantasia','like','%'. $key .'%')
                     ->orwhere('fornecedores.cnpj','like','%'. $key .'%')
                     ->orderby('fornecedores.razao_social','asc')
                     ->Paginate($this->totalPage);
             
        if (count($fornecedores) > 0){
             
            $msg = 'Sistema informa: A pesquisa retornou '. count($fornecedores) . ' registro(s)';

            return view('painel.fornecedores.busca', compact('title','fornecedores','msg')); 
        }

            $msg = 'Sistema informa: A pesquisa não retornou registro(s)';

            return view('painel.fornecedores.busca', compact('title', 'fornecedores','msg'));
    }


   
}
