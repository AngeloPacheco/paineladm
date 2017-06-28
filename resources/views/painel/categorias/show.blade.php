@extends('painel.index')
@section('content')

    <h1 class='painel-title'>Detalhes da Categoria</h1>

    <div class='panel panel-info'>
        <div class="panel-body">
            <p><b>Categoria: </b>{{$categoria->descricao}}</p>
            <p><b>Data de Cadastro: </b> {{date_format($categoria->created_at,'d/m/Y')}}</p>
            <p><b>Última atualização: </b> {{date_format($categoria->updated_at,'d/m/Y')}}</p>
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

    <form class="form" method="post" action="{{route('categorias.destroy', $categoria->id)}}">
         {!! csrf_field()!!} 
         {!! method_field('DELETE') !!}

        <a href="{{route('categorias.edit', $categoria->id)}}" class="btn btn-primary">
           <span class="fa fa-pencil"></span> Editar
        </a>

        <button class="btn btn-danger"> <span class="fa fa-trash"></span> Excluir</button>

        <a href="{{url('/painel/categorias')}}" class="btn btn-primary">
           <span class="fa fa-list"></span> Listagem de Produtos
        </a>
    </form>
@endsection