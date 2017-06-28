@extends('painel.index')
@section('content')

    <h1 class='painel-title'>Detalhes da Medida</h1>
    <hr>

    <div class='panel panel-info'>
        <div class="panel-body">
            <p><b>Medida: </b>{{$medida->descricao}}</p>
            <p><b>Sigla: </b>{{$medida->sigla}}</p>
            <p><b>Data de Cadastro: </b> {{date_format($medida->created_at,'d/m/Y')}}</p>
            <p><b>Última atualização: </b> {{date_format($medida->updated_at,'d/m/Y')}}</p>
        </div>
    </div>

    @if (isset($errors) && count($errors) > 0)
           <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            </div>
    @endif
    <hr>

    <form class="form" method="post" action="{{route('medidas.destroy', $medida->id)}}">
         {!! csrf_field()!!} 
         {!! method_field('DELETE') !!}

        <a href="{{route('medidas.edit', $medida->id)}}" class="btn btn-primary">
           <span class="fa fa-pencil"></span> Editar
        </a>

        <button class="btn btn-danger"> <span class="fa fa-trash"></span> Excluir</button>

        <a href="{{url('/painel/medidas')}}" class="btn btn-primary">
           <span class="fa fa-list"></span> Listagem de Medidas
        </a>
    </form>
@endsection