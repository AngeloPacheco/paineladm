@extends('painel.index')
@section('content')

<h1 class='painel-title'>Medidas</h1>
<hr>

<table class="table table-striped">
    <tr class="painel-cabecalho">
        <th>Medida</th>
        <th>Sigla</th>
        <th width="100px">Ações</th>
    </tr>
    @foreach($medidas as $medida)
        <tr>
            <td>{{$medida->descricao}}</td> 
            <td>{{$medida->sigla}}</td> 
            <td>  
                <a class="actions edit" href="{{route('medidas.edit', $medida->id)}}">
                    <span class="fa fa-pencil" title="Editar"></span>
                </a>
                <a class="actions delete" href="{{route('medidas.show', $medida->id)}}">
                   <span class="fa fa-eye" title="Detalhe medida"></span>
                </a>
            </td>
        </tr>
    @endforeach
</table>

<div class="panel panel-default painel-panel">
    <div class="panel-body">
        <a href="{{route('medidas.create')}}" class="btn btn-primary painel-btn-add" title="Cadastrar nova Medida ">
            <span class="glyphicon glyphicon-plus"></span> Nova Medida
        </a>
        <div class="paginacao">
            {!! $medidas->links() !!}
        </div>
    </div>
</div>

@endsection