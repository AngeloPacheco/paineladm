@extends('painel.index')
@section('content')

<h1 class='painel-title'>Categorias</h1>
<hr>

 <div class="form-search">
     <form class="form-inline" name="formPesquisa" method="get" role="form" action="{{url('painel/categorias/pesquisa')}}">
         <input class="form-control" type="text" name="descricao" value="" placeholder="Descrição da categoria .." autofocus="" size="40">
        <button class="btn btn-primary painel-btn-pesquisar" title="Pesquisar">
                <span class="fa fa-search"></span>
        </button>
    </form>
</div>

<table class="table table-striped">
    <tr class="painel-cabecalho">
        <th>Categoria</th>
        <th width="100px">Ações</th>
    </tr>
    @foreach($categorias as $categoria)
        <tr>
            <td>{{$categoria->descricao}}</td> 
            <td>  
                <a class="actions edit" href="{{route('categorias.edit', $categoria->id)}}">
                    <span class="fa fa-pencil" title="Editar"></span>
                </a>
                <a class="actions delete" href="{{route('categorias.show', $categoria->id)}}">
                   <span class="fa fa-eye" title="Detalhe Categoria"></span>
                </a>
            </td>
        </tr>
    @endforeach
</table>

<div class="panel panel-default painel-panel">
    <div class="panel-body">
        <a href="{{route('categorias.create')}}" class="btn btn-primary painel-btn-add" title="Cadastrar nova Categoria ">
            <span class="glyphicon glyphicon-plus"></span> Nova Categoria
        </a>
        <div class="paginacao">
            {!! $categorias->links() !!}
        </div>
    </div>
</div>


@endsection