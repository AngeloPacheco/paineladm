@extends('painel.index')
@section('content')

    @if ( isset($fornecedor))
        
        <h1 class='painel-title'>Editar Fornecedor</h1>
        
        <hr>
        <form class="form-inline" method="post" action="{{route('fornecedores.update', $fornecedor->id)}}">    
          {!! method_field('PUT') !!}
   @else
        
        <h1 class='painel-title'>Cadastrar Fornecedor</h1>
        <hr>
        <form class="form-inline" method="post" action="{{route('fornecedores.store')}}">    
    @endif
    
        @if (isset($errors) && count($errors) > 0)
            <div class="alert alert-danger">
                 <p>Sistema Informa: </p>
                 @foreach($errors->all() as $error)
                     <p>{{$error}}</p>
                 @endforeach
            </div>
        @endif

        {!! csrf_field()!!} 
                   
           <div class="panel panel-default">
                <div class='panel-body'>

                    <div class="form-group">
                        <label class="painel-label">Razão Social</label>
                        <input size="45" class="form-control" type='text' name="razao_social" value="{{$fornecedor->razao_social or old('razao_social')}}" autofocus="">  
                    </div>

                    <div class="form-group">
                        <label class="painel-label">Nome Fantasia</label>
                         <input size="45" class="form-control" type='text' name="nome_fantasia" value="{{$fornecedor->nome_fantasia or old('nome_fantasia')}}">  
                    </div>
                     
                    <div class="form-group painel-form-input">
                        <label class="painel-label">CNPJ</label>
                        <input size="20" class="form-control" type='text' id='cnpj' name="cnpj" value="{{$fornecedor->cnpj or old('cnpj')}}">  
                    </div>

                    <div class="form-group painel-form-input">
                            <label class="painel-label">Inscrição Estadual</label>
                            <input size="20" class="form-control" type='text' name="inscricao_estadual" value="{{$fornecedor->inscricao_estadual or old('inscricao_estadual')}}">  
                        </div>
                    
                </div>        
            </div>
                
            <div class="panel panel-default">
                <div class='panel-body'>

                    <div class="form-group painel-form-input">
                        <label class="painel-label">CEP</label>
                        <input size="15" class="form-control" type='text' id='cep' name='cep' value="{{$fornecedor->cep or old('cep')}}">  
                    </div>

                
                    <div class="form-group">
                        <label class="painel-label painel-form-input">Logradouro</label>
                        <input size="50" class="form-control" type='text' id="logradouro" name="logradouro" value="{{$fornecedor->logradouro or old('logradouro')}}">  
                     </div>
                     
                    <div class="form-group">
                        <label class="painel-label painel-form-input">Número</label>
                        <input size="10" class="form-control" type='text' name="numero" value="{{$fornecedor->numero or old('numero')}}">  
                     </div>
                     
                    <div class="form-group">
                        <label class="painel-label painel-form-input">Complemento</label>
                        <input size="10" class="form-control" type='text' name="complemento" value="{{$fornecedor->complemento or old('complemento')}}">  
                     </div>
                     
                    <div class="form-group">
                        <label class="painel-label painel-form-input">Bairro</label>
                        <input size="30" class="form-control" type='text' id="bairro" name="bairro" value="{{$fornecedor->bairro or old('bairro')}}">  
                    </div>
                     
                    <div class="form-group painel-form-input">
                        <label class="painel-label">Cidade</label>
                        <input size="20" class="form-control" type='text' id='localidade' name='localidade' value="{{$fornecedor->localidade or old('localidade')}}">  
                    </div>
                     
                    <div class="form-group painel-form-input">
                        <label class="painel-label">Estado</label>
                        <input size="10" class="form-control" type='text' id='uf' name='uf' value="{{$fornecedor->uf or old('uf')}}">  
                    </div>
                </div>    
            </div>    
            
            <div class="panel panel-default">
                <div class='panel-body'>
                    
                    <div class="form-group">
                        <label class="painel-label painel-form-input">E-mail</label>
                        <input size="40" class="form-control" type='email' name="email" value="{{$fornecedor->email or old('email')}}">  
                    </div>
                     
                    <div class="form-group painel-form-input">
                        <label class="painel-label">Telefone</label>
                        <input size="15" class="form-control" type='text' id="telefone"  name="telefone" value="{{$fornecedor->telefone or old('telefone')}}">  
                    </div>
                     
                    <div class="form-group painel-form-input">
                        <label class="painel-label">FAX</label>
                        <input size="15" class="form-control" type='text' id='fax' name="fax" value="{{$fornecedor->fax or old('fax')}}">  
                    </div>
                    
                    <div class="form-group painel-form-input">
                        <label class="painel-label">Celular</label>
                        <input size="15" class="form-control" type='text' id='celular' name="celular" value="{{$fornecedor->celular or old('celular')}}">  
                    </div>

                    <div class="form-group painel-form-input">
                        <label class="painel-label">Contato</label>
                        <input size="30" class="form-control" type='text' id='contato' name="contato" value="{{$fornecedor->contato or old('contato')}}">  
                    </div>
                </div>        
            </div>
            
            <div class='row'>
               <div class="col-md-1 col-sm-1 col-xs-12 painel-alinha-btns-forms">
                     <button class="btn btn-primary"> <span class="fa fa-save"></span> Salvar</button>
               </div>
            </div>
        </form>
@endsection

@section('post-script-logradouros')

     <script src="{{url('assets/all/js/buscalogradouro.js')}}"></script>

@endsection