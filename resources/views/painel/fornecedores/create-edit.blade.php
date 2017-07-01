@extends('painel.index')
@section('content')

    @if ( isset($fornecedor))
        
        <h1 class='painel-title'>Fornecedor</h1>
        <h3 class='painel-title'>Editar dados</h3>
        <hr>
        <form class="form-inline" method="post" action="{{route('forrnecedores.update', $fornecedor->id)}}">    
          {!! method_field('PUT') !!}
   @else
        
        <h1 class='painel-title'>Cadastrar Fornecedor</h1>
        <hr>
        <form class="form-inline" method="post" action="{{route('fornecedores.store')}}">    
    @endif
    
        @if (isset($errors) && count($errors) > 0)
            <div class="alert alert-danger">
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
                
                    <div class="form-group">
                        <label class="painel-label">Endereço</label>
                        <input size="50" class="form-control" type='text' name="endereco" value="{{$fornecedor->endereco or old('endereco')}}">  
                     </div>
                     
                    <div class="form-group">
                        <label class="painel-label">Número</label>
                        <input size="10" class="form-control" type='text' name="numero" value="{{$fornecedor->numero or old('numero')}}">  
                     </div>
                     
                    <div class="form-group">
                        <label class="painel-label">Complemento</label>
                        <input size="25" class="form-control" type='text' name="complemento" value="{{$fornecedor->complemento or old('complemento')}}">  
                     </div>
                     
                    <div class="form-group">
                        <label class="painel-label">Bairro</label>
                        <input size="30" class="form-control" type='text' name="bairro" value="{{$fornecedor->bairro or old('bairro')}}">  
                    </div>
                     
                    <div class="form-group painel-form-input">
                        <label class="painel-label">Cidade</label>
                        <input size="15" class="form-control" type='text' name="cidade" value="{{$fornecedor->cidade or old('cidade')}}">  
                    </div>
                     
                    <div class="form-group painel-form-input">  
                        <label class="painel-label">UF</label>
                        <select class="form-control" name="uf">
                            <option value="">UF</option>
                             
                                @foreach($estados as $estado)
                                    <option value="{{$estado}}"
                                     
                                        @if (isset($fornecedor) && $fornecedor->uf == $estado)
                                          selected
                                       @endif               

                                    > {{$estado}}</option>
                                @endforeach
                           
                        </select>
                    </div> 
                      
                    <div class="form-group painel-form-input">
                        <label class="painel-label">CEP</label>
                        <input size="15" class="form-control" type='text' id='cep' name="cep" value="{{$fornecedor->cep or old('cep')}}">  
                    </div>

                    <div class="form-group painel-form-input">  
                        <label class="painel-label">País</label>
                        <select class="form-control" name="pais">
                            <option value="Brasil">Brasil</option>
                             
                                @foreach($paises as $pais)
                                    <option value="{{$pais->pais}}"
                                     
                                        @if (isset($fornecedor) && $fornecedor->pais == $pais)
                                            selected
                                       @endif               

                                    > {{$pais->pais}}</option>
                                @endforeach
                           
                        </select>
                    </div> 
                </div>    
            </div>    
            
            <div class="panel panel-default">
                <div class='panel-body'>
                    
                    <div class="form-group">
                        <label class="painel-label">E-mail</label>
                        <input size="30" class="form-control" type='text' name="email" value="{{$fornecedor->email or old('email')}}">  
                    </div>
                     
                    <div class="form-group painel-form-input">
                        <label class="painel-label">Telefone</label>
                        <input size="10" class="form-control" type='text' id="telefone"  name="telefone" value="{{$fornecedor->telefone or old('telefone')}}">  
                    </div>
                     
                    <div class="form-group painel-form-input">
                        <label class="painel-label">FAX</label>
                        <input size="10" class="form-control" type='text' id='fax' name="fax" value="{{$fornecedor->fax or old('fax')}}">  
                    </div>
                    
                    <div class="form-group painel-form-input">
                        <label class="painel-label">Celular</label>
                        <input size="10" class="form-control" type='text' id='celular' name="celular" value="{{$fornecedor->celular or old('celular')}}">  
                    </div>

                    <div class="form-group painel-form-input">
                        <label class="painel-label">Contato</label>
                        <input size="15" class="form-control" type='text' id='contato' name="contato" value="{{$fornecedor->contato or old('contato')}}">  
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