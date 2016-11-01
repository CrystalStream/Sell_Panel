<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login -  Pappos Shop</title>
	{!!Html::style('css/bootstrap.min.css')!!}
	{!!Html::style('css/main.css')!!}
	<link rel="shortcut icon" type="image/ico" href="img/favicon.ico"/>
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
            <div class="collapse navbar-collapse" id="menu-nav">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#">
                            About                            
                        </a>
                    </li>               
                </ul>
            </div>
        </div>
    </nav>

    <div class="col-xs-12 text-center mt">    	
    	@if(Session::has('message'))
    	<div class="alert alert-danger alert-dismissible">
    		<button class="close" data-dismiss="alert">
                <span>
                    &times;
                </span> 
            </button>
    		{{Session::get('message')}}
    	</div>
    	@endif
    	<div class="col-xs-6 col-xs-offset-3">
	    	<img src="img/papos_logo.png" alt="" class="img-responsive">
	    	<div class="login-center mt">
	    		{!!Form::open(array('route'=>'user.login','method'=>'POST'))!!}
	    			<div class="form-group">
	    				<div class="input-group">
	    					<div class="input-group-addon">
	    						<span class="glyphicon glyphicon-user"></span>
	    					</div>
	    					{!!Form::text('name',null,array('class' => 'form-control','placeholder' =>'Nombre de usuario','required' ))!!}	    					
	    				</div>
	    			</div>
	    			<div class="form-group">
	    				<div class="input-group">
	    					<div class="input-group-addon">
	    						<span class="glyphicon glyphicon-lock"></span>
	    					</div>
	    					{!!Form::password('password',array('class'=>'form-control','placeholder'=>'Contraseña','required'))!!}	    					
	    				</div>
	    			</div>
	    			<div class="form-group">
	    				{!!Form::button('Entrar <span class="glyphicon glyphicon-log-in"></span>',array('class'=>'btn btn-success btn-block', 'type'=>'submit'))!!}

	    			</div>
	    		{!!Form::close()!!}
	    	</div>
    	</div>
    </div>

    {!!Html::script('js/vendor/jquery-1.11.2.min.js')!!}
    {!!Html::script('js/vendor/bootstrap.min.js')!!}
</body>
</html>