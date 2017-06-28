@extends('painel.index')
@section('content')

<h1 class='painel-title'>Configurações do Sistema</h1>
<hr>
<div class="lista-configs">
    
    <a class="links" href="{{url('painel/usuarios')}}" title='Usuários do sistemas'>  
        <div class="col-md-3 col-sm-4 col-xs-12">
            <div class="opcoes-configs">
                <i class="fa fa-users" aria-hidden="true"></i>
                <div class="titulo-configs">
                    <h3 class="opcao-config">
                        Usuários 
                    </h3>
                </div>
            </div>    
        </div>
    </a>
    
    <a class="links" href="{{url('painel/medidas')}}" title='Medidas dos Produtos'>  
        <div class="col-md-3 col-sm-4 col-xs-12">
            <div class="opcoes-configs">
                <i class="fa fa-eyedropper" aria-hidden="true"></i>
                <div class="titulo-configs">
                    <h3 class="opcao-config">
                        Medidas 
                    </h3>
                </div>
            </div>    
        </div>
    </a>
    
    <a class="links" href="{{url('painel/categorias')}}" title='Categorias de Produtos'>  
        <div class="col-md-3 col-sm-4 col-xs-12">
            <div class="opcoes-configs">
                <i class="fa fa-tags" aria-hidden="true" ></i>
                <div class="titulo-configs">
                    <h3 class="opcao-config">
                        Categorias
                    </h3>
                </div>
            </div>    
        </div>
    </a>

    <a class="links" href="{{url('painel/empresa')}}" title='Dados da Empresa'>  
        <div class="col-md-3 col-sm-4 col-xs-12">
            <div class="opcoes-configs">
                <i class="fa fa-industry" aria-hidden="true"></i>
                <div class="titulo-configs">
                    <h3 class="opcao-config">
                        Empresa 
                    </h3>
                </div>
            </div>    
        </div>
    </a>

    
</div>   
@endsection