@extends('painel.index')
@section('content')

   
    @if ( isset($categoria))
    
        <h1 class='painel-title'>Editar Categoria: {{$categoria->descricao}} </h1>
        <hr>
        <form class="form" method="post" action="{{route('categorias.update', $categoria->id)}}">    
          {!! method_field('PUT') !!}
    
   @else
    
        <h1 class='painel-title'>Cadastrar Categoria </h1>
        <hr>
        <form class="form" method="post" action="{{route('categorias.store')}}">    
    @endif
    
    
    @if (isset($errors) && count($errors) > 0)
        <div class="alert alert-danger">
             @foreach($errors->all() as $error)
                 <p>{{$error}}</p>
             @endforeach
         </div>
    @endif

    
            {!! csrf_field()!!} 
            <div class="form-group">
                <label class="painel-label">Categoria</label>        
               <input class="form-control painel-input-60" type='text' name="descricao" value="{{$categoria->descricao or old('descricao')}}" placeholder="Descrição da Categoria ..." autofocus="">  
            </div>    
            
            <hr>
            <div class='row'>
                <div class="col-md-1 col-sm-1 col-xs-12 painel-alinha-btns-forms">
                    <button class="btn btn-primary"> <span class="fa fa-save"></span> Salvar</button>
                </div>
                <div class="col-md-1 col-sm-1 col-xs-12 painel-alinha-btns-forms">
                   <a href="{{url('painel/categorias')}}" class="btn btn-primary">
                      <span class="fa fa-list"></span> Listagem de Categorias
                   </a>
                </div>
            </div>

        </form> 
 
 
 @endsection
