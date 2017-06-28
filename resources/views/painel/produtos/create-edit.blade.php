@extends('painel.index')
@section('content')

    @if ( isset($produto))
        <h1 class='painel-title'>Editar Produto: {{$produto->descricao}} </h1>
        <hr>
        <form class="form-inline" method="post" action="{{route('produtos.update', $produto->id)}}" enctype="multipart/form-data">    
          {!! method_field('PUT') !!}
   @else
        <h1 class='painel-title'>Cadastrar Produto </h1>
        <hr>
        <form class="form-inline" method="post" action="{{route('produtos.store')}}" enctype="multipart/form-data">    
    @endif
    
    @if (isset($errors) && count($errors) > 0)
        <div class="alert alert-danger">
             @foreach($errors->all() as $error)
                 <p>{{$error}}</p>
             @endforeach
        </div>
    @endif

            {!! csrf_field()!!} 
            <div class="panel panel-default">
                <div class='panel-body'>
                    <div class="form-group">
                        <label class="painel-label">Produto</label>
                        <input size="60" class="form-control" type='text' name="descricao" value="{{$produto->descricao or old('descricao')}}" placeholder="Descrição do produto" autofocus="">  
                    </div> 

                    <div class="form-group">  
                        <label class="painel-label">Categoria</label>
                        <select class="form-control" name ='categoria_id'>    
                            <option>Categoria</option>
                             @foreach($categorias as $categoria)
                                <option value="{{$categoria->id}}"
                                    @if (isset($produto) && $produto->categoria_id == $categoria->id)
                                      selected
                                   @endif               
                                > {{$categoria->descricao}} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">  
                        <label class="painel-label">Medida</label>
                        <select class="form-control" name="medida_id">
                            <option>Medida</option>
                            @foreach($medidas as $medida)
                                <option value="{{$medida->id}}"
                                    @if (isset($produto) && $produto->medida_id == $medida->id)
                                      selected
                                   @endif               
                                > {{$medida->sigla}} </option>
                            @endforeach
                            
                        </select>
                    </div>

                </div>
             </div>

            <div class="panel panel-default">
                <div class='panel-body'>
                    <div class="form-group">
                        <label class="painel-label">Estoque</label>
                        <input class="form-control placeholder-right" type='text' name="estoque" value="{{$produto->estoque or old('quantidade')}}" placeholder="0,00">  
                    </div> 
                    <div class="form-group">
                        <label class="painel-label">Custo R$</label>
                        <input class="preco_custo form-control placeholder-right" type='text' id="preco_custo" name="preco_custo" value="{{$produto->preco_custo or old('preco_custo')}}" placeholder="0,00" onfocus="calcular()">  
                    </div> 
                    <div class="form-group">
                        <label class="painel-label">Margem de Lucro %</label>
                        <input class="margem_lucro form-control placeholder-right" type='text' id="margem_lucro" name="margem_lucro"  preco_venda="preco_venda" value="{{$produto->margem_lucro or old('margem_lucro')}}" placeholder="0,00%" onblur="calcular()">  
                    </div> 
                    <div class="form-group">
                        <label class="painel-label">Venda R$</label>
                        <input class="preco_venda form-control placeholder-right" type='text' id="preco_venda" name="preco_venda" margem_lucro="margem_lucro" value="{{$produto->preco_venda or old('preco_venda')}}" placeholder="0,00">  

                    </div> 
                </div>      
            </div>    

            <div class='row'>
                <div class="col-xs-12 col-md-9 ">
                    <div class="panel panel-default">
                        <div class='panel-body'>
                            <div class="form-group">
                                <label class="painel-label">Peso</label>
                                <input class="form-control painel-input-size-35 placeholder-right" type='text' name="peso" value="{{$produto->peso or old('peso')}}" placeholder="0,00">  
                            </div>
                             <div class="form-group">
                                <label class="painel-label">Cor</label>
                                <input class="form-control painel-input-size-35" type='text' name="cor" value="{{$produto->cor or old('cor')}}" placeholder="Cor do produto">  
                            </div>
                            <div class="form-group">
                                <label class="painel-label">Altura x Largura</label>
                                <input class="form-control painel-input-size-35 placeholder-right" type='text' name="alturaxlargura" value="{{$produto->alturaxlargura or old('alturaxlargura')}}" placeholder="0,00 x 0,00">  
                            </div> 
                        </div>      
                    </div>      
                </div>
                <div class="col-xs-12 col-md-3">
                    <div class="panel panel-default">
                        <div class='panel-body'>
                            <div class="form-group">
                                <label>
                                    <input type='checkbox' checked="checked" name="ativo" value="0">  
                                     Ativo 
                                </label>
                            </div> 

                            <div class="form-group">
                                <label>
                                    <input type='checkbox' name="novidade" value="1">  
                                    Novidade
                                </label>
                            </div>    
                        </div>      
                    </div>  
                </div>
            </div>    

            <div class="panel panel-default">
                <div class='panel-body'>
                     <div class="form-group">
                        <label class="painel-label">Observações</label>
                        <textarea class="form-control" type='text' rows="5" cols="100" name="obs" placeholder="Observações">{{$produto->obs or old('obs')}}</textarea>
                       
                     </div>
                </div>      
            </div>

          
                <div class="panel panel-default">
                    <div class="panel painel-title">
                        <h4> Imagens do Produto</h4>
                    </div>        
                    <div class='panel-body'>
                                      
                        <input class="hide" id="imagem" type="file" name="photos[]" multiple />
                    </div>
                    <div class="panel-footer">
                      <label for='imagem' class='btn btn-primary fa fa-folder-open-o'> Selecionar</label>  
                    </div> 
                </div>
                        
                
            <div class='row'>
                <div class="col-md-1 col-sm-1 col-xs-12 painel-alinha-btns-forms">
                    <button class="btn btn-primary"> <span class="fa fa-save"></span> Salvar</button>
                </div>
                <div class="col-md-1 col-sm-1 col-xs-12 painel-alinha-btns-forms">
                   <a href="{{url('painel/produtos')}}" class="btn btn-primary">
                      <span class="fa fa-list"></span> Listagem de Produtos
                   </a>
                </div>
            </div>
        </form>
        
        
       


@endsection