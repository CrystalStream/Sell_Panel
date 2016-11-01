<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>@yield('title','Pappos Shop')</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        {!!Html::style('css/bootstrap.min.css')!!}
        {!!Html::style('css/bootstrap-theme.min.css')!!}
        {!!Html::style('css/font-awesome.min.css')!!}
        {!!Html::style('css/sidebar-bootstrap.css')!!}
        {!!Html::style('css/Toast.css')!!}
        {!!Html::style('css/awesomplete.css')!!}
        {!!Html::style('css/main.css')!!}

        {!!Html::script('js/vendor/modernizr-2.8.3-respond-1.4.2.min.js')!!}
        <link rel="shortcut icon" type="image/ico" href="/img/favicon.ico"/>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <nav class="navbar navbar-inverse sidebar navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu-nav">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="{!!URL::to('articles')!!}" class="navbar-brand text-center"><img src="/img/papos_logo.png" class="img-responsive" alt="papos" width="150"></a>
            </div>

            <div class="collapse navbar-collapse" id="menu-nav">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{!!URL::to('articles')!!}">
                            Inicio
                            <span class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span>
                        </a>
                    </li>
                    <li>
                        <a href="{!!URL::to('/module-sell')!!}">
                            Ir a la aplicacion de venta
                            <span class="pull-right hidden-xs showopacity glyphicon glyphicon-usd"></span>
                        </a>
                    </li>
                    <li>
                        <a href="{!!URL::to('/config')!!}">
                            Configurar cajas
                            <span class="pull-right hidden-xs showopacity glyphicon glyphicon-briefcase"></span>
                        </a>
                    </li>
                    <li>
                        <a href="{!!URL::to('/store')!!}">
                            Agregar Productos
                            <span class="pull-right hidden-xs showopacity glyphicon glyphicon-plus"></span>
                        </a>
                    </li>
                    @if(Auth::user()->role_id === 1)
                    <li>
                        <a href="{!!URL::to('admin')!!}">Regresar al panel de administrador
                            <i class="fa fa-reply-all pull-right hidden-xs showopacity"></i>
                            
                        </a>
                    </li>
                    @else
                    <li>
                        <a href="{!! URL::to('account',Auth::user()->id) !!}">Mi cuenta
                            <i class="fa fa-user pull-right hidden-xs showopacity"></i>
                            
                        </a>
                    </li>
                    @endif
                    <li>
                        <a href="{!!URL::to('logout')!!}">Salir
                            <span class="pull-right hidden-xs showopacity glyphicon glyphicon-log-out"></span>
                        </a>
                    </li>                    
                </ul>
            </div>
        </div>
    </nav>
    
    @include('layouts.bar')


    <div class="main">
        <div class="container">
            <div class="col-md-12 main-container mt">
                @yield('content');
            </div>
        </div>
    </div>

        {!!Html::script('js/vendor/jquery-1.11.2.min.js')!!}
        {!!Html::script('js/vendor/sidebar-bootstrap.js')!!}
        {!!Html::script('js/vendor/bootstrap.min.js')!!}
        {!!Html::script('js/vendor/Toast.js')!!}
        {!!Html::script('js/vendor/awesomplete.min.js')!!}
        {!!Html::script('js/main.js')!!}
    </body>
</html>
