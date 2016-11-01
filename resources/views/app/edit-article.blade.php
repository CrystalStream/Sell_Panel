@extends('index')
@section('title','Editar Articulo - '.$product->name)

@section('content')
<div class="row">
	<div class="col-xs-12 mb">
	    <a href="{{URL::to('articles')}}" class="btn btn-success">
	        <i class="fa fa-reply fa-fw"></i> Regresar al Inicio        
	    </a>
	</div>
	<div class="col-xs-12">
		<div class="alert alert-info black">
	    	<h4 class="config-title">Editar producto</h4>
	        <div class="row">
	            <div class="col-xs-12 col-md-4">
	                <figure>
	                	@if(!$product->photo_url)
							<img src="/img/default.jpg" id="shown" alt="" class="img-responsive" width="350px" style="height:300px !importante;">
	                	@else
	                	{!!Html::image($product->photo_url, 'Imagen', array('width' => '350px', 'style' => 'height: 300px !important;', 'class'=>'img-responsive','id'=>'shown'))!!}
	                	@endif
	                </figure>
	            </div>
	            <div class="col-xs-12 col-md-8">
	                {!!Form::model($product,array('route'=>['articles.update',$product->id],'method'=>'PUT','files'=>true))!!}
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
	                                {!!Form::select('category_id',$categories,$product->category_id,array('class'=>'form-control','id'=>'edit-select','required'))!!}                                
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-xs-12 col-md-12 hidden" id="shoes-pick">
	                        <div class="form-group">
	                            <label for="" class="col-xs-12">Numeros:</label>
	                            <div class="btn-group" data-toggle="buttons">
	                            	@for($i = 2; $i < 10; $i++ )
	                            		@if( in_array($i, explode(',',$product->numbers)) )
	                            			<label class="btn btn-danger btn-numbers active">
	                                    		<input class="case-shoes" name="numbers[]" type="checkbox" value="{{ $i }}" checked> {{ $i }}
	                                		</label>
	                                	@else
											<label class="btn btn-danger btn-numbers">
	                                    		<input name="numbers[]" type="checkbox" value="{{ $i }}"> {{ $i }}
	                                		</label>
	                            		@endif
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
@endsection