<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="cache-control" content="private, max-age=0, no-cache">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="expires" content="0">
	<title>Administrador</title>
	<link rel="shortcut icon" type="image/ico" href="img/favicon.ico"/>
	{!!Html::style('css/bootstrap.min.css')!!}
	{!!Html::style('css/main.css')!!}
</head>
<body>
	<nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu-nav">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>                
            </div>
            <div class="collapse navbar-collapse text-center" id="menu-nav">
               <img src="img/papos_logo.png" alt="logo" width="250px">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                           {!!Auth::user()->name!!} <span class="caret"></span>                     
                        </a>
                            <ul class="dropdown-menu">
                               <li><a href="{!!URL::to('logout')!!}"><span class="glyphicon glyphicon-remove"></span>&nbsp;Salir</a></li>
                            </ul>
                    </li>                 
                </ul>
            </div>
        </div>
    </nav>
    <div class="col-xs-12">        
        <div class="row">
    	   @yield('content')
        </div>
    </div>
	

    {!!Html::script('js/vendor/jquery-1.11.2.min.js')!!}
    {!!Html::script('js/vendor/bootstrap.min.js')!!}
    {!!Html::script('js/admin.js')!!}
</body>
</html>