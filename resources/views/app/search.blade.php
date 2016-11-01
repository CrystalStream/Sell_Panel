<div class="col-xs-12 mb">
    <a href="{{URL::to('articles')}}" class="btn btn-success">
        <i class="fa fa-reply fa-fw"></i> Regresar al Inicio        
    </a>
</div>
@forelse($product as $item)
<div class="col-xs-12 col-md-6 col-lg-4">
    <div class="thumbnail">
        @if(isset($item->photo_url))      
            {!!Html::image($item->photo_url, 'Image', array('width' => '400px', 'style' => 'height: 300px !important;', 'class'=>'img-responsive'))!!}        
        @else
            <img src="img/default.jpg" alt="image" style="height:300px;" width="400px">
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
@empty
<div class="col-xs-12">
    <div class="alert alert-danger black">
        <b>Error</b> <br>
        No coincidio ningun producto con tu parametro de busqueda, porfavor intentalo de nuevo
    </div>
</div>
@endforelse
