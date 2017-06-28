@extends('painel.index')
@section('content')

    <h1 class='painel-title'>Empresa <hr> </h1>
    <div class="panel panel-default">
        <div class="panel-body">
            <h3> Sistema informa </h3>  
            <p> Dados da empresa ainda não foram cadastradas.</p>

            <a href="{{route('empresa.create')}}" class="btn btn-primary painel-btn-add" title="Cadastrar Empresa ">
               <span class="glyphicon glyphicon-plus"></span> Cadastrar Empresa
            </a>
        </div> 
   </div>     
@endsection