@extends('index')
@section('title','Agregar Articulos')
@section('content')
<div class="row">
	<div class="col-xs-12 col-md-6">
        <div class="alert alert-success black">            
            <h4 class="config-title">
               Agregar categorias
            </h4>
            <div>
                {!!Form::open(array())!!}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                    <div class="input-group">
                        <label for="">Nombre de la categoria</label>
                       {!!Form::text('name',null,array('class' => 'form-control', 'placeholder' => 'Nombre', 'id' => 'name-category'))!!}                      
                    </div>
                    <div class="input-group mt">
                        {!!link_to('#', $title = "Guardar", $attributes = ['class' => 'btn btn-primary','id' => 'add-category'], $secure = null);!!}
                        <i class="fa fa-spinner fa-spin fa-fw hidden" id="loading"></i>
                    </div>             
                {!!Form::close()!!}
            </div>
        </div>
    </div>
    <div class="hidden-xs col-md-6 black">
        <div class="table-responsive text-center">
            <table class="table table-hover table-config">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Categoria</th>
                        <th class="text-center">Opciones</th>
                    </tr>
                </thead>
                <tbody id="categoryTable">                                     
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-xs-12 col-md-12">
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
        <div class="alert alert-info black">
            <h4 class="config-title">Agregar producto</h4>
            <div class="row">
                <div class="col-xs-12 col-md-4">
                    <figure>
                        <img alt="" src="img/preview.png" id="shown" class="img-responsive" width="350px" style="height:300px;">
                    </figure>
                </div>
                <div class="col-xs-12 col-md-8">
                    {!!Form::open(array('route'=>'articles.store','method'=>'POST','files'=>true))!!}
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <label for="">Nombre:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-eye"></i>
                                    </div>
                                    {!!Form::text('name',null,array('class' => 'form-control','placeholder' => 'Nombre','required'))!!}
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <label for="">Precio:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-usd"></i>
                                    </div>
                                    {!!Form::text('price',null,array('class' => 'form-control','placeholder' => 'Precio','required'))!!}
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <label for="">Imagen:</label>
                                {!!Form::file('file',array('onchange' => 'preview(this);'))!!} 
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <label for="">Categoria:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-sitemap"></i>
                                    </div>
                                    {!!Form::select('category_id',[],null,array('class'=>'form-control','id' => 'select-cat','required'))!!}                                
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-12 hidden" id="shoes-pick">
                            <div class="form-group">
                                <label for="" class="col-xs-12">Numeros:</label>
                                <div class="btn-group" data-toggle="buttons">
                                    @for($i = 2; $i < 10; $i++ )
                                        <label class="btn btn-danger btn-numbers">
                                            <input name="numbers[]" type="checkbox" value="{{ $i }}"> {{ $i }}
                                        </label>
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                {!!Form::submit('Guardar',array('class' => 'btn btn-primary btn-md pull-right mt', 'id' => 'save-btn'))!!}
                            </div>
                        </div>
                    {!!Form::close()!!}
                </div>
            </div>                            
        </div>
    </div>
</div>

<div class="modal fade" id="modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title"><i class="fa fa-pencil fa-fw"></i>Actualizar </h4>
            </div>
            <div class="modal-body">              
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token_u">
                    <input type="hidden" id="id">
                    <div class="input-group">
                        <label for="">Nuevo Nombre</label>
                       {!!Form::text('name',null,array('class' => 'form-control', 'placeholder' => 'Nombre', 'id' => 'newName-category'))!!}                      
                    </div>
                    <div class="input-group mt">
                        
                    </div>               
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-danger">Cancelar</button>
                {!!link_to('#', $title = "Guardar", $attributes = ['class' => 'btn btn-primary','id' => 'update-category'], $secure = null);!!}            
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
@endsection
