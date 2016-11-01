@extends('index')
@section('title','Configurar cajas')

@section('content')
<div class="row">
    <div class="col-xs-12 col-md-4">
        <div class="alert alert-danger black">
            <h4 class="config-title">Cajas</h4>
            <div class="row">
                @foreach($boxes as $box)
                <p class="box-text">
                    Dinero actual en {{ $box->name }}: <span class="pull-right">${{$box->current_money }}</span>
                </p>
               @endforeach
                                               
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-8">
        @if(Session::has('waste'))
            <div class="alert alert-success alert-dismissible black">
                <button class="close" data-dismiss="alert">
                    <span>
                        &times;
                    </span> 
                </button>
                {{Session::get('waste')}}
            </div>
        @endif
        <div class="alert alert-info black">
            <h4 class="config-title">Registrar Gasto</h4>
            <div class="row">
                <div class="col-xs-12">
                    {!!Form::open(array('route'=>'waste.create','method'=>'POST'))!!}                    
                        <div class="btn-group" data-toggle="buttons">
                            @foreach($boxes as $box)
                                <label class="btn btn-info">
                                    {!!Form::radio('box_id',$box->id,array('required'))!!}
                                    {{$box->name}}
                                </label>
                            @endforeach
                        </div>
                        <div class="form-group mt">
                            <label for="" class="col-xs-12">
                               Gasto monetario
                            </label>
                            <div class="col-xs-12 col-md-6">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-usd"></i>
                                    </div>
                                    {!!Form::text('money',null,array('class'=>'form-control','required'))!!}
                                </div> 
                            </div>   
                        </div>
                        <div class="form-group">
                            <label for="" class="col-xs-12 mt">
                               Descripcion del gasto
                            </label>
                            {!!Form::textarea('description',null,array('class'=>'form-control','style'=>'resize:none;','required'))!!}                        
                        </div>
                        <div class="form-group">
                            {!!Form::submit('Registrar gasto',array('class'=>'btn btn-success'))!!}
                        </div>                  
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-md-12 mt" id="waste-table">
        @if(Session::has('change_waste'))
            <div class="alert alert-success alert-dismissible black">
                <button class="close" data-dismiss="alert">
                    <span>
                        &times;
                    </span> 
                </button>
                {{Session::get('change_waste')}}
            </div>
        @endif
        <div class="panel panel-info">
            <div class="panel-heading text-center">
                <span class="black">Gastos</span>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover table-config">
                        <thead>
                            <tr>
                                <th class="text-center">Trabajador(a)</th>
                                <th class="text-center">Fecha</th>
                                <th class="text-center">Descripcion</th>
                                <th class="text-center">Gasto $</th>
                                <th class="text-center">Tipo de caja</th>
                                <th class="text-center">Operaciones</th>
                            </tr>
                        </thead>
                        <tbody class="black text-center">
                            @foreach($wastes as $waste)
                            <tr>
                                <td>{{ $waste->user->name }}</td>
                                <td>{{ $waste->created_at }}</td>
                                <td>{{ $waste->description }}</td>
                                <td>${{ $waste->money }}</td>
                                <td>{{ $waste->box->name }}</td>
                                <td>
                                    <button value="{{ $waste->id }}" data-toggle="modal" data-target=".edit" type="button"  class="btn btn-warning btn-sm editWaste"><i class="fa fa-pencil" ></i></button>                        
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
   {!!Form::open(array('route'=>'waste.update','method'=>'POST'))!!}
        <div class="modal fade edit">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Editar gasto</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <input name="id_waste" type="hidden" id="waste_id"></input>
                            <input name="old_box" type="hidden" id="old_money"></input>
                            <input name="waste" type="hidden" id="waste_money"></input>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                   <label for="">Trabajador(a):</label>
                                   <div class="input-group">
                                       <div class="input-group-addon">
                                           <i class="fa fa-user"></i>
                                       </div>
                                       {!!Form::text('user_id',null,array('class'=>'form-control','id'=>'user','disabled'))!!}
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                   <label for="">Fecha:</label>
                                   <div class="input-group">
                                       <div class="input-group-addon">
                                           <i class="fa fa-calendar"></i>
                                       </div>           
                                       <input type="text" class="form-control" disabled id="date-waste">
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                   <label for="">Gasto:</label>
                                   <div class="input-group">
                                       <div class="input-group-addon">
                                           <i class="fa fa-usd"></i>
                                       </div>
                                       <input type="text" class="form-control" id="waste-money" disabled>                  
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                   <label for="">Tipo de caja:</label>
                                    {!!Form::select('box_id',$box_list,null,array('class'=>'form-control','id'=>'box-select'))!!}                                    
                                </div>
                            </div>                                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Cancelar</button>
                        {!!Form::button('<i class="fa fa-check"></i>&nbsp;Editar gasto',array('class'=>'btn btn-primary', 'type'=>'submit'))!!}                        
                    </div>
                </div>
            </div>
        </div>
    {!!Form::close()!!}
</div>
@endsection