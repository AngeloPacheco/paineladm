@extends('painel.index')
@section('content')

    @if ( isset($empresa))
        
        <h1 class='painel-title'>Empresa</h1>
        <h3 class='painel-title'>Editar dados</h3>
        <hr>
        <form class="form-inline" method="post" action="{{route('empresa.update', $empresa->id)}}" enctype="multipart/form-data">    
          {!! method_field('PUT') !!}
   @else
        
        <h1 class='painel-title'>Empresa</h1>
        <hr>
        <form class="form-inline" method="post" action="{{route('empresa.store')}}" enctype="multipart/form-data">    
    @endif
    
        @if (isset($errors) && count($errors) > 0)
            <div class="alert alert-danger">
                 @foreach($errors->all() as $error)
                     <p>{{$error}}</p>
                 @endforeach
            </div>
        @endif

        {!! csrf_field()!!} 
        
            <div class="panel panel-default painel-panel-logomarca">
                <div class='panel-heading'>Logomarca</div>        
                    <div class='panel-body'>

                        @if ( isset ($nm_imagem))
    
                            <div class="rendereiza_logomarca"  id="logomarca">
                               <img class="img-thumbnail" src="{{url('storage/img-empresa') . '/' . $nm_imagem}}">      
                            </div>
                            <hr>
                            <input class='hide' id="imagem" type="file" name="photos[]" multiple />
                            <label for='imagem' class='btn btn-primary'>Selecionar</label>                        
    
                        @else              
    
                            <div class="rendereiza_logomarca"  id="logomarca"></div>
                            <hr>
                            <input class='hide' id="imagem" type="file" name="photos[]" multiple />
                            <label for='imagem' class='btn btn-primary'>Selecionar</label>

                        @endif     
                   </div>    
            </div>     
                   
           <div class="panel panel-default">
                <div class='panel-body'>

                    <div class="form-group">
                        <label class="painel-label">Razão Social</label>
                        <input size="35" class="form-control" type='text' name="razao_social" value="{{$empresa->razao_social or old('razao_social')}}" autofocus="">  
                    </div>

                    <div class="form-group">
                        <label class="painel-label">Nome Fantasia</label>
                         <input size="35" class="form-control" type='text' name="nome_fantasia" value="{{$empresa->nome_fantasia or old('nome_fantasia')}}">  
                    </div>

                    <div class="form-group">
                        <label class="painel-label">Responsável</label>
                        <input size="25" class="form-control" type='text' name="responsavel" value="{{$empresa->responsavel or old('responsavel')}}">  
                    </div>
                     
                    <div class="form-group painel-form-input">
                        <label class="painel-label">CNPJ</label>
                        <input size="20" class="form-control" type='text' id='cnpj' name="cnpj" value="{{$empresa->cnpj or old('cnpj')}}">  
                    </div>

                    <div class="form-group painel-form-input">
                            <label class="painel-label">Inscrição Estadual</label>
                            <input size="20" class="form-control" type='text' name="inscricao_estadual" value="{{$empresa->inscricao_estadual or old('inscricao_estadual')}}">  
                        </div>
                    
                </div>        
            </div>
                
            <div class="panel panel-default">
                <div class='panel-body'>
                
                    <div class="form-group">
                        <label class="painel-label">Endereço</label>
                        <input size="40" class="form-control" type='text' name="endereco" value="{{$empresa->endereco or old('endereco')}}">  
                     </div>
                     
                    <div class="form-group">
                        <label class="painel-label">Número</label>
                        <input size="10" class="form-control" type='text' name="numero" value="{{$empresa->numero or old('numero')}}">  
                     </div>
                     
                    <div class="form-group">
                        <label class="painel-label">Complemento</label>
                        <input size="10" class="form-control" type='text' name="complemento" value="{{$empresa->complemento or old('complemento')}}">  
                     </div>
                     
                    <div class="form-group">
                        <label class="painel-label">Bairro</label>
                        <input size="30" class="form-control" type='text' name="bairro" value="{{$empresa->bairro or old('bairro')}}">  
                    </div>
                     
                    <div class="form-group painel-form-input">
                        <label class="painel-label">Cidade</label>
                        <input size="15" class="form-control" type='text' name="cidade" value="{{$empresa->cidade or old('cidade')}}">  
                    </div>
                     
                    <div class="form-group painel-form-input">  
                        <label class="painel-label">UF</label>
                        <select class="form-control" name="uf">
                            <option value="">UF</option>
                             
                                @foreach($estados as $estado)
                                    <option value="{{$estado}}"
                                     
                                        @if (isset($empresa) && $empresa->uf == $estado)
                                          selected
                                       @endif               

                                    > {{$estado}}</option>
                                @endforeach
                           
                        </select>
                    </div> 
                      
                    <div class="form-group painel-form-input">
                        <label class="painel-label">CEP</label>
                        <input size="15" class="form-control" type='text' id='cep' name="cep" value="{{$empresa->cep or old('cep')}}">  
                    </div>
                
                </div>    
            </div>    
            
            <div class="panel panel-default">
                <div class='panel-body'>
                    
                    <div class="form-group">
                        <label class="painel-label">E-mail</label>
                        <input size="45" class="form-control" type='text' name="email" value="{{$empresa->email or old('email')}}">  
                    </div>
                    
                    <div class="form-group">
                        <label class="painel-label">Site</label>
                        <input size="45" class="form-control" type='text' name="site" value="{{$empresa->site or old('site')}}">  
                    </div>
                     
                    <div class="form-group painel-form-input">
                        <label class="painel-label">Telefone</label>
                        <input size="15" class="form-control" type='text' id="telefone"  name="telefone" value="{{$empresa->telefone or old('telefone')}}">  
                    </div>
                     
                    <div class="form-group painel-form-input">
                        <label class="painel-label">FAX</label>
                        <input size="15" class="form-control" type='text' id='fax' name="fax" value="{{$empresa->fax or old('fax')}}">  
                    </div>
                    
                    <div class="form-group painel-form-input">
                        <label class="painel-label">Celular</label>
                        <input size="15" class="form-control" type='text' id='celular' name="celular" value="{{$empresa->celular or old('celular')}}">  
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