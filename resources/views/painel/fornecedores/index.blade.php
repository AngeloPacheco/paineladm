@extends('painel.index')
@section('content')

<h1 class='painel-title'>Fornecedores</h1>
<hr>

<table class="table table-striped">
    <tr class="painel-cabecalho">
        <th>Razão Social</th>
        <th>Nome Fantasia</th>
        <th>Cidade</th>
        <th>UF</th>
        <th>Telefone</th>
        <th>Contato</th>
        <th width="100px">Ações</th>
    </tr>
    @foreach($fornecedores as $fornecedor)
        <tr>
            <td>{{$fornecedor->razao_social}}</td> 
            <td>{{$fornecedor->nome_fantasia}}</td> 
            <td>{{$fornecedor->cidade}}</td> 
            <td>{{$fornecedor->uf}}</td> 
            <td>{{$fornecedor->telefone}}</td> 
            <td>{{$fornecedor->contato}}</td> 
            <td>  
                <a class="actions edit" href="{{route('fornecedores.edit', $fornecedor->id)}}">
                    <span class="fa fa-pencil" title="Editar"></span>
                </a>
                <a class="actions delete" href="{{route('fornecedores.show', $fornecedor->id)}}">
                   <span class="fa fa-eye" title="Detalhe do fornecedor"></span>
                </a>
            </td>
        </tr>
    @endforeach
</table>

<div class="panel panel-default painel-panel">
    <div class="panel-body">
        <a href="{{route('fornecedores.create')}}" class="btn btn-primary painel-btn-add" title="Cadastrar novo fornecedor ">
            <span class="glyphicon glyphicon-plus"></span> Novo Fornecedor
        </a>
        <div class="paginacao">
            {!! $fornecedores->links() !!}
        </div>
    </div>
</div>

@endsection