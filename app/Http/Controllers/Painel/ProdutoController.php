<?php

namespace App\Http\Controllers\Painel;
use App\Models\Painel\Produtos;
use App\Models\Painel\Categorias;
use App\Models\Painel\Imagens;
use App\Http\Controllers\Controller;
use App\Http\Requests\Painel\ProdutoFormRequest;
use \Illuminate\Support\Facades\DB;


class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $produto;
    private $categoria;
    private $totalPage = 10;

    public function __construct(Produtos $produto, Categorias $categoria){
        $this->produto = $produto;
        $this->categoria = $categoria;
    }
 
    public function index()
    {
        $title = "Produtos";
        
        $categorias = DB::table('categorias')
                     ->select('id','descricao')
                     ->get();

        $produtos = $this->produto->orderBy('descricao','asc')->paginate($this->totalPage);
        
        return view('painel.produtos.index', compact('title', 'produtos','categorias'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Cadastrar Produto';
        
        $categorias = DB::table('categorias')
                      ->select('id','descricao')
                      ->orderby('descricao', 'asc')
                      ->get();
        
        $medidas = DB::table('medidas')
                      ->select('id','sigla')
                      ->orderby('sigla', 'asc')
                      ->get();
        
        return view('painel.produtos.create-edit', compact('title','categorias','medidas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdutoFormRequest $request)
    {
        $dataForm = $request->all();
        
        echo '<pre>'; var_dump($dataForm['produto-titulo']); echo '</pre>';
        
        die;


        $dataForm['ativo']        = ( !isset($dataForm['ativo'])) ? 0 : 1;
        $dataForm['novidade']     = ( !isset($dataForm['novidade'])) ? 0 : 1;
        
        $dataForm['preco_custo']  = str_replace(",","." , $dataForm['preco_custo']);
        $dataForm['margem_lucro'] = str_replace(",","." , $dataForm['margem_lucro']);
        $dataForm['preco_venda']  = str_replace(",","." ,  $dataForm['preco_venda']);
        
        

        $insert = $this->produto->create($dataForm);
        
        foreach ($request->photos as $photo) {
            
            $filename = $photo->store('public/imagens');

            $nm_imagem = substr($filename, 7 );
            
            Imagens::create([
                    'nm_imagem'     =>  $nm_imagem,
                    'titulo'        =>  'aaa',
                    'conteudo_id'   =>  $insert->id,
                    'conteudo_tipo' =>  'P',
            ]);
        }

        if ($insert) {
            return redirect('/painel/produtos');
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
        $produto = $this->produto->find($id);
        $title = "Produto:  {$produto->descricao}";
        
         $categorias = DB::table('categorias')
              ->select('id','descricao')
              ->get();

         $medidas = DB::table('medidas')
              ->select('id','descricao')
              ->get();     
        
        return view('painel.produtos.show' , compact('produto', 'title', 'categorias','medidas')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = $this->produto->find($id);
        $title = 'Editar Produto';
        
        $categorias = DB::table('categorias')
                      ->select('id','descricao')
                      ->get();
        
        $medidas = DB::table('medidas')
                      ->select('id','sigla')
                      ->get();
        
       
        
        return view('painel.produtos.create-edit',compact('produto', 'title', 'categorias', 'medidas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProdutoFormRequest $request, $id)
    {
        $dataForm   = $request->all();
        $produto  = $this->produto->find($id); 
        $update     = $produto->update($dataForm);
        
        if( $update ){
            return redirect('/painel/produtos');
        }
            else{
            return redirect()->route('produtos.edit', $id)->with(['errors' => 'Erro ao editar.']);
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
        return "exclui";
    }
}
