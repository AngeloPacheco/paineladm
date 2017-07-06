<!DOCTYPE html>
<html>
<head>
    <title>{{$title or ''}} | Painel Administrativo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
     <!-- bootstrap-->
   <link rel="stylesheet" href="{{url('assets/all/css/bootstrap.min.css')}}">
   <link rel="stylesheet" href="{{url('assets/painel/css/style.css')}}"/>
   <link rel="stylesheet" href="{{url('assets/all/css/font-awesome.min.css')}}"/>
   <link rel="shortcut icon" href="{{url('assets/painel/imgs/tag.png')}}" type="image/x-icon" />


  
</head>
<body class="painel-body">
    
    <div class="container content">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="logo">
                    <img src="{{url('assets\painel\imgs\logo-painel.fw.png')}}" alt="logomarca" class="logo-painel img-responsive">
               </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="top-dashboard">
                    <div class="dropdown user-dash">
                       <div class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                           <img src="{{url('assets\painel\imgs\img-user.jpg')}}" alt="usuario" class="user-dashboard img-circle">
                           <p class="user-name">Nome do Usuário</p>
                           <span class="caret"></span>
                       </div>
                       <ul class="dropdown-menu dp-menu" aria-labelledby="dropdownMenu1">
                           <li><a href="#">Perfil</a></li>
                           <li><a href="#">Sair</a></li>
                       </ul>
                   </div>
                </div>
            </div>
        </div> 
    </div> 

    <!--Fim section topo-->
    <nav class="navbar navbar-default painel-navbar">
        <div class="container-fluid">
            
            <div class="navbar-header">
               <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                 <span class="sr-only">Toggle navigation</span>
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
               </button>
             </div>

             <!-- Collect the nav links, forms, and other content for toggling -->
             <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
               <ul class="nav navbar-nav painel-itens-menu">
                 <li>
                    <a class="painel-a-menu" href="{{url('painel/')}}" title="Página inicial"> 
                      <i class="fa fa-home" aria-hidden="true"> </i>
                      Home
                    </a>
                </li>      
                <li>
                    <a href="{{url('painel/produtos')}}" title="Produtos">
                      <i class="fa fa-dropbox" aria-hidden="true" ></i>
                      Produtos
                    </a>
                </li>
                 <li>
                    <a href="{{url('painel/fornecedores')}}" title="Fornecedores">
                      <i class=" fa fa-user-circle-o " aria-hidden="true" ></i>
                      Fornecedores  
                    </a>
                </li>
                 <li>
                    <a href="{{url('painel/configuracoes')}}" title="Configurações do painel">
                      <i class="fa fa-cog" aria-hidden="true" ></i>
                      Configurações</a>
                </li>
        </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    
    <div class='container'>
       @yield('content')
    </div>   <!--fim container-->
   
</body>


<!-- Jquery -->
    <script src="{{url('assets/all/js/jquery-3.2.1.min.js')}}"></script>
    <!-- JS Bootstrap -->
    <script src="{{url('assets/all/js/bootstrap.min.js')}}"></script>
    <script src="{{url('assets/painel/js/main.js')}}"></script>
    <script src="{{url('assets/painel/js/jquery.maskedinput.min.js')}}"></script>

      @yield('post-script')
      @yield('post-script-logradouros')

    

    
</html>