@extends('painel.index')
@section('content')

    
    @if ( isset($medida))
        <h1 class='painel-title'>Editar Medida: {{$medida->descricao}} </h1>
        <hr>
        <form class="form" method="post" action="{{route('medidas.update', $medida->id)}}">    
          {!! method_field('PUT') !!}
   @else
        <h1 class='painel-title'>Cadastrar Medida </h1>
        <hr>
        <form class="form" method="post" action="{{route('medidas.store')}}">    
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
            <label class="painel-label">Medida</label>        
           <input class="form-control painel-input-size-25" type='text' name="descricao" value="{{$medida->descricao or old('descricao')}}" placeholder="Descrição da medida" autofocus="">  
        </div>    
        
        <div class="form-group">
            <label class="painel-label">SIGLA</label>        
           <input class="form-control painel-input-size-25" type='text' name="sigla" value="{{$medida->sigla or old('sigla')}}" placeholder="Sigla da medida" style="text-transform:uppercase">  
        </div>    
        
        <div class='row'>
            <div class="col-md-1 col-sm-1 col-xs-12 painel-alinha-btns-forms">
                <button class="btn btn-primary"> <span class="fa fa-save"></span> Salvar</button>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-12 painel-alinha-btns-forms">
               <a href="{{url('painel/medidas')}}" class="btn btn-primary">
                  <span class="fa fa-list"></span> Listagem de Medidas
               </a>
            </div>
        </div>
    </form>
    

@endsection    