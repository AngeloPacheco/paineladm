<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Painel\Categorias;
use App\Http\Requests\Painel\CategoriaFormRequest;




class CategoriaController extends Controller
{
    private $categoria;
    private  $totalPage = 10;

    public function __construct(Categorias $categoria){
        $this->categoria = $categoria;
    }
    
    public function index()
    {
        $title = 'Categorias de Produtos';
        
        $categorias = $this->categoria->orderBy('descricao','asc')->paginate($this->totalPage);
        return view('painel.categorias.index', compact('title', 'categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function pesquisa(Request $request){
        
        $title = 'Categorias de Produtos';
        $categorias = DB::table('categorias')
                ->where('descricao', "=", $request->input('formPesquisa'))
                ->get();
        return view('painel.categorias.index', compact('title', 'categorias'));
    }


    public function create()
    {
        $title = 'Cadastrar Mategoria';
        return view('painel.categorias.create-edit', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriaFormRequest $request)
    {
       
        $dataForm = $request->all();
        $insert = $this->categoria->create($dataForm);
        
        if ($insert) {
            return redirect('/painel/categorias');
        } else {
            return redirect()->route('painel.categorias.create-edit');
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
        
        $categoria = $this->categoria->find($id);
        $title = "Categoria:  {$categoria->descricao}";
       
        return view('painel.categorias.show' , compact('categoria', 'title')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria= $this->categoria->find($id);
        $title = 'Editar Categoria';
        return view('painel.categorias.create-edit',compact('categoria', 'title'));
                
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriaFormRequest $request, $id)
    {
        
        $dataForm   = $request->all();
        $categoria  = $this->categoria->find($id); 
        $update     = $categoria->update($dataForm);
        
        if( $update ){
            return redirect('/painel/categorias');
        }
            else{
            return redirect()->route('categorias.edit', $id)->with(['errors' => 'Erro ao editar.']);
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
        $categoria = $this->categoria->find($id);
        $delete = $categoria->delete();
        
        if ($delete){
            return redirect('/painel/categorias');
        }    
        else {
            return redirect()->route('categorias.show', $id)->with(['errors' => 'Erro ao exluir a categoria']);
        }
    }
}
