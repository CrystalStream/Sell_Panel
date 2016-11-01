@extends('index')
@section('content')
<div class="row">
    <div class="loading hidden" id="onload">
        <i class="fa fa-spinner fa-pulse fa-5x"></i>
        <p><b>Cargando...</b></p>
    </div>
    <div class="col-xs-12 mb">
        <div class="col-xs-12 col-md-6">
            <div class="input-group mb">
                 <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-search"></span>
                </div>        
                <input type="text"class="awesomplete form-control" placeholder="Buscar..." list="list" id="input">
                <datalist id="list">
                    @forelse($products as $item)
                        <option class="option-list">{{$item->name}}</option>
                    @empty
                        <option>Sin sugerencias</option>
                    @endforelse
                </datalist>                   
            </div>
        </div>
    </div>
    <div id="main-panel">

        @forelse($product as $item )
            <div class="col-xs-12 col-md-6 col-lg-3">
                <div class="thumbnail">
                    @if(isset($item->photo_url))               
                        {!!Html::image($item->photo_url, 'Image', array('width' => '350px', 'style' => 'height: 200px !important;', 'class'=>'img-responsive'))!!}                
                    @else
                        <img src="img/default.jpg" alt="image" style="height:200px;" width="400px">
                    @endif           
                    <div class="caption">
                        <h3>{{$item->name}}</h3>
                        <p class="pull-left">
                            <ul class="list-group">
                                <li class="list-group-item list-group-item-success item-product">   Precio <span class="pull-right">${{$item->price}}</span></li>
                                @if(isset($item->numbers))                                
                                    <li class="list-group-item list-group-item-success item-product">   Tallas disponibles:</li>
                                    <li class="list-group-item list-group-item-success item-product">
                                        <table class="table table-stripped app-table">
                                            <tbody>                                        
                                                <tr>
                                                    @foreach(explode(',',$item->numbers) as $number )
                                                        @if( $number < 5)
                                                            <td class="yellow">{{ $number }}</td> 
                                                        @else
                                                            <td>{{ $number }}</td>
                                                        @endif                                     
                                                    @endforeach
                                                </tr>
                                            </tbody>
                                        </table>
                                    </li>
                                @endif
                                <li class="list-group-item list-group-item-success item-product">
                                   Categoria <span class="pull-right">{{$item->category->name}}</span>
                                </li>
                            </ul>
                        </p>
                        <p style="display:inline-block;" class="mr">
                            <a href="{{ route('articles.edit', $item->id) }}" class="btn btn-warning">Editar</a>
                            {!!Form::open(array('route'=>['articles.destroy', $item->id],'method' => 'DELETE','style'=>'display:inline-block;'))!!}
                                {!!Form::submit('Eliminar',array('class'=>'btn btn-danger','style'=>'display:inline-block;'))!!}
                                
                            {!!Form::close()!!}
                        </p>
                    </div>
                </div>                
            </div>
            @if($loop->iteration % 4 === 0)
                <div class="clearfix"></div>
                <hr>
            @endif              
        @empty
            <div class="col-xs-12">
            <div class="alert alert-danger black">
                No hay items en el inventario por el momentos! 
                Dirigete a <a class="link" href="{!!URL::to('/store')!!}">Administracion de la tienda</a>
                para agregar tus productos.
            </div>
            </div>        
        @endforelse
    </div>
</div>

<div class="col-xs-12 text-center mt" style="font-size:1.5em;">
    {{$product->render()}}    
</div>
@endsection

{{--  --}}