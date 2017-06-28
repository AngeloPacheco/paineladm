@extends('painel.index')
@section('content')

    <h1 class='painel-title'>Detalhes do Produto</h1>

    <div class='panel panel-info'>
        <div class="panel-body">
            <p><b>Produto: </b>{{$produto->descricao}}</p>
            
             @foreach($categorias as $categoria)        
              @if ( $categoria->id == $produto->categoria_id )
                 <p><b>Categoria: </b>{{$categoria->descricao}}</p>
              @endif
            @endforeach
            
            <p><b>Medida: </b>{{$produto->medida}}</p>
            <p><b>Estoque:</b>{{$produto->estoque}}</p>
            <p><b>Preço de Custo: </b>{{$produto->preco_custo}}</p>
            <p><b>Margem de Lucro: </b>{{$produto->margem_lucro}}</p>
            <p><b>Preço de Venda: </b>{{$produto->preco_venda}}</p>
            <p><b>Peso: </b>{{$produto->peso}}</p>
            <p><b>Cor: </b>{{$produto->cor}}</p>
            <p><b>Altura x Largura: </b>{{$produto->alturaxlargura}}</p>
            
             @if ($produto->ativo == 1)
                 <p><b>Ativo: </b>Sim</p>
             @else
                <p><b>Ativo: </b>Não</p>
             @endif
            
             @if ($produto->novidade == 1)
                 <p><b>Novidade: </b>Sim</p>
             @else
                <p><b>Novidade: </b>Não</p>
             @endif
            
             <p><b>Observações </b>{{$produto->obs}}</p>
            <p><b>Data de Cadastro:</b> {{date_format($produto->created_at,'d/m/Y')}}</p>
            <p><b>Última atualização:</b> {{date_format($produto->updated_at,'d/m/Y')}}</p>
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

    <form class="form" method="post" action="{{route('produtos.destroy', $produto->id)}}">
         {!! csrf_field()!!} 
         {!! method_field('DELETE') !!}

        <a href="{{route('produtos.edit', $produto->id)}}" class="btn btn-primary">
           <span class="fa fa-pencil"></span> Editar
        </a>

        <button class="btn btn-danger"> <span class="fa fa-trash"></span> Excluir</button>

        <a href="{{url('/painel/produtos')}}" class="btn btn-primary">
           <span class="fa fa-list"></span> Listagem de Produtos
        </a>
    </form>

@endsection