@extends('index')
@section('title','Editar Cuenta')

@section('content')
	<div class="row">
		<div class="col-xs-12">
			<div class="alert alert-info">
				<div class="row">
					<div class="col-xs-3 col-md-2">
						<img src="/img/user.png" alt="Usuario" class="img-responsive user-img">
					</div>
					<div class="col-md-5 black">
						<div class="row">
							<div class="col-xs-5">
								<h3 class="black">{{ $user->name }}</h3>
							</div>
						</div>
						<hr style="background:black;">
					</div>
					<div class="col-xs-12 mt black">
						{!!Form::model($user,array('route'=>['user.update',$user->id],'method'=>'POST'))!!}
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label>Nombre de Usuario</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										{!!Form::text('name',null,array('class'=>'form-control'))!!}
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label>Contraseña</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-lock"></i>
										</div>
										{!!Form::password('password',array('class'=>'form-control','placeholder'=>'Contraseña'))!!}										
									</div>
									<small>*Si <b>NO</b> quieres cambiar tu contraseña, deja este campo en blanco</small>
								</div>
							</div>
							<div class="col-xs-12 col-md-6 col-md-offset-3 mt">
								{!!Form::submit('Guardar datos',array('class'=>'btn btn-primary btn-block'))!!}

							</div>
						{!!Form::close()!!}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection