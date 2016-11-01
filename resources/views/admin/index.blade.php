@extends('layouts.admin')

@section('content')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible black">
    <button class="close" data-dismiss="alert">
        <span>
            &times;
        </span> 
    </button>
    {{Session::get('message')}}
</div>
@endif
<div class="col-xs-12 hidden-sm hidden-md hidden-lg mb">
	<a href="{!!URL::to('articles')!!}" class="btn btn-info btn-lg btn-block">
		<span class="glyphicon glyphicon-home"></span>
		Ir a la tienda
	</a>
</div>
<div class="col-xs-12 col-md-6">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h4>Agregar trabajadores</h4>
		</div>
		{!!Form::open(array('action'=>'AdminController@register','method'=>'POST'))!!}
			<div class="panel-body">
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<span class="glyphicon glyphicon-user"></span>
						</div>
						{!!Form::text('name',null,array('class'=>'form-control','placeholder'=>'Nombre de usuario','required'))!!}
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<span class="glyphicon glyphicon-lock"></span>
						</div>
						{!!Form::password('password',array('class'=>'form-control pass-field','placeholder'=>'Contraseña','required'))!!}
						<small id="emailHelp" class="form-text">Esta contraseña podra ser cambiada por el empleado <span class="pull-right">Mostrar
							<input type="checkbox" id="check-show">
						</span></small>
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<span class="glyphicon glyphicon-th-large"></span>
						</div>
						{!!Form::select('role_id',$roles,'selected',array('class'=>'form-control','placeholder'=>'Elige un rol','required'))!!}
					</div>
				</div>
			</div>
			<div class="panel-footer">
				<div class="form-group">
					<button type="submit" class="btn btn-success btn-block">Registrar</button>
				</div>
			</div>
		{!!Form::close()!!}
	</div>
</div>
<div class="col-xs-12 col-md-6">
	<div class="table-responsive">
		<table class="table table-bordered table-config bg-white black text-center">
			<thead class="bg-black">
				<tr>
					<td class="text-center">#</td>
					<td class="text-center">Nombre</td>
					<td class="text-center">Rol</td>				
					<td class="text-center">Operaciones</td>					
				</tr>
			</thead>
			<tbody>
				@foreach($users as $user)
					<tr>
						<td>{{$loop->iteration}}</td>						
						<td>{{$user->name}}</td>
						<td>{{$user->roles->role}}</td>
						@if(!$loop->first)							
						<td>
							<button value="{{$user->id}}" class="btn btn-warning btn-sm up-user" data-toggle="modal" data-target="#modal-admin">
								<span class="glyphicon glyphicon-pencil"></span>
							</button>
							<button value="{{$user->id}}" class="btn btn-danger btn-sm del-user" >
								<span class="glyphicon glyphicon-remove"></span>
							</button>													
						</td>
						@endif
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
<div class="hidden-xs col-sm-12">
	<a href="{!!URL::to('articles')!!}" class="btn btn-info btn-lg btn-block">
		<span class="glyphicon glyphicon-home"></span>
		Ir a la tienda
	</a>
</div>

<div class="modal fade" id="modal-admin">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Actualizar </h4>
            </div>         
            <div class="modal-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token_admin">
                    <input type="hidden" id="id">
                    <div class="input-group">
                        <label for="">Nuevo Nombre</label>
                       {!!Form::text('name',null,array('class' => 'form-control', 'placeholder' => 'Nombre', 'id' => 'user-name'))!!}                      
                    </div>
                     <div class="input-group">
                        <label for="">Nuevo Contraseña</label>
                       {!!Form::password('password',array('class' => 'form-control pass-field', 'placeholder' => 'Contraseña', 'id' => 'user-password'))!!}
                       <span class="pull-right">Mostrar
							<input type="checkbox" id="check-show">
						</span>                      
                    </div>
                    <div class="input-group mt">
                    	<label for="">Rol del trabajador</label>
                        {!! Form::select('role_id', ['1' => 'Administrador', '2' => 'Trabajador'], null,['class' => 'form-control','id'=>'rol-select']) !!}
                    </div>               
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-danger">Cancelar</button>
                {!!link_to('#', $title = "Guardar cambios", $attributes = ['class' => 'btn btn-success','id' => 'update-user'], $secure = null);!!}            
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
@endsection