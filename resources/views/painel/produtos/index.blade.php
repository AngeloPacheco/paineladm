@extends('painel.index')
@section('content')

<h1 class='painel-title'>Produtos</h1>
<hr>

 <div class="form-search">
     <form class="form-inline" name="formPesquisa" method="get" role="form" action="{{url('painel/produtos/pesquisa')}}">
         <input class="form-control" type="text" name="descricao" value="" placeholder="Descrição do produto .." autofocus="" size="40">
        <button class="btn btn-primary painel-btn-pesquisar" title="Pesquisar">
                <span class="fa fa-search"></span>
        </button>
    </form>
</div>
<table class="table table-striped">
    <tr class="painel-cabecalho">
        <th>Produto</th>
        <th>Categoria</th>
        <th>Estoque</th>
        <th>Custo</th>
        <th>Venda</th>
        <th width="100px">Ações</th>
    </tr>
    
    @foreach($produtos as $produto)
        <tr>
            <td>{{$produto->descricao}}</td>
            
            @foreach($categorias as $categoria)        
              @if ( $categoria->id == $produto->categoria_id )
                <td>{{$categoria->descricao}}</td>
              @endif
            @endforeach

            <td>{{$produto->estoque}}</td>
            <td>{{$produto->preco_custo}}</td>
            <td>{{$produto->preco_venda}}</td>
            
            <td>  
                <a class="actions edit" href="{{route('produtos.edit', $produto->id)}}">
                    <span class="fa fa-pencil" title="Editar"></span>
                </a>
                <a class="actions delete" href="{{route('produtos.show', $produto->id)}}">
                   <span class="fa fa-eye" title="Detalhe do produto"></span>
                </a>
            </td>
        </tr>
    @endforeach    
</table>
<div class="panel panel-default painel-panel">
    <div class="panel-body">
        <a href="{{route('produtos.create')}}" class="btn btn-primary painel-btn-add" title="Cadastrar novo Produto ">
            <span class="glyphicon glyphicon-plus"></span> Novo Produto
        </a>
        <div class="paginacao">
          
        </div>
    </div>
</div>
@endsection