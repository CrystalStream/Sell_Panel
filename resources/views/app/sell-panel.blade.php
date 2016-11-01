@extends('index')
@section('title','Panel de venta')
@section('content')
<div class="row">
    <div class="col-xs-12">
        <form action="">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Buscar producto...">
                <div class="input-group-btn">
                    <button class="btn btn-primary">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="panel-sell col-xs-12 mt h100">
        <div class="col-xs-12 col-md-8 scroll h50">
            <ul class="list-group">
                <li class="list-group-item item-panel">
                    <div class="row item-forsale">
                        <div class="col-xs-4">
                            <img src="img/shoes.jpg" alt="" class="img-responsive">
                        </div>
                        <div class="col-xs-8">
                            <p>Nombre: <span class="pull-right">Gucci Blancos</span></p>
                            <p>Precio: <span class="pull-right">$400</span></p>
                            <p>Tallas: <select class="pull-right" name="" id="">
                                <option value="0">1</option>
                                </select>
                            </p>
                            <p class="col-xs-12">
                                <button class="btn btn-success btn-md pull-right">Vender</button>
                            </p>
                        </div>
                    </div>
                </li>
                <li class="list-group-item item-panel">
                    <div class="row item-forsale">
                        <div class="col-xs-4">
                            <img src="assets/img/shoes.jpg" alt="" class="img-responsive">
                        </div>
                        <div class="col-xs-8">
                            <p>Nombre: <span class="pull-right">Gucci Blancos</span></p>
                            <p>Precio: <span class="pull-right">$400</span></p>
                            <p>Tallas: <select class="pull-right" name="" id="">
                                <option value="0">1</option>
                                </select>
                            </p>
                            <p class="col-xs-12">
                                <button class="btn btn-success btn-md pull-right">Vender</button>
                            </p>
                        </div>
                    </div>
                </li>
                <li class="list-group-item item-panel">
                    <div class="row item-forsale">
                        <div class="col-xs-4">
                            <img src="img/shoes.jpg" alt="" class="img-responsive">
                        </div>
                        <div class="col-xs-8">
                            <p>Nombre: <span class="pull-right">Gucci Blancos</span></p>
                            <p>Precio: <span class="pull-right">$400</span></p>
                            <p>Tallas: <select class="pull-right" name="" id="">
                                <option value="0">1</option>
                                </select>
                            </p>
                            <p class="col-xs-12">
                                <button class="btn btn-success btn-md pull-right">Vender</button>
                            </p>
                        </div>
                    </div>
                </li>
                <li class="list-group-item item-panel">
                    <div class="row item-forsale">
                        <div class="col-xs-4">
                            <img src="img/shoes.jpg" alt="" class="img-responsive">
                        </div>
                        <div class="col-xs-8">
                            <p>Nombre: <span class="pull-right">Gucci Blancos</span></p>
                            <p>Precio: <span class="pull-right">$400</span></p>
                            <p>Tallas: <select class="pull-right" name="" id="">
                                <option value="0">1</option>
                                </select>
                            </p>
                            <p class="col-xs-12">
                                <button class="btn btn-success btn-md pull-right">Vender</button>
                            </p>
                        </div>
                    </div>
                </li>                            
            </ul>
        </div>
        <div class="col-xs-12 col-md-4 scroll h50">
            <div class="col-xs-12 hidden-md hidden-lg mt">
                <h4>Articulo para vender:</h4>
            </div>
            <div class="col-xs-12">
                <ul class="list-group">
                    <li class="list-group-item item-panel">
                        <div class="row item-selled">
                            <p>Nombre: <span class="pull-right">Gucci Blancos</span></p>
                            <p>Precio: <span class="pull-right">$400</span></p>
                            <p>Tallas: <span class="pull-right">24</span>
                            </p>
                            <p>
                                <button class="btn btn-danger btn-md pull-right">Regresar</button>
                            </p>
                        </div>                                   
                    </li>
                    <li class="list-group-item item-panel">
                        <div class="row item-selled">
                            <p>Nombre: <span class="pull-right">Gucci Blancos</span></p>
                            <p>Precio: <span class="pull-right">$400</span></p>
                            <p>Tallas: <span class="pull-right">24</span>
                            </p>
                            <p>
                                <button class="btn btn-danger btn-md pull-right">Regresar</button>
                            </p>
                        </div>                                   
                    </li>
                    <li class="list-group-item item-panel">
                        <div class="row item-selled">
                            <p>Nombre: <span class="pull-right">Gucci Blancos</span></p>
                            <p>Precio: <span class="pull-right">$400</span></p>
                            <p>Tallas: <span class="pull-right">24</span>
                            </p>
                            <p>
                                <button class="btn btn-danger btn-md pull-right">Regresar</button>
                            </p>
                        </div>                                   
                    </li>
                    <li class="list-group-item item-panel">
                        <div class="row item-selled">
                            <p>Nombre: <span class="pull-right">Gucci Blancos</span></p>
                            <p>Precio: <span class="pull-right">$400</span></p>
                            <p>Tallas: <span class="pull-right">24</span>
                            </p>
                            <p>
                                <button class="btn btn-danger btn-md pull-right">Regresar</button>
                            </p>
                        </div>                                   
                    </li> 
                </ul>
            </div>
        </div>
        <div class="col-xs-12 mt- total-panel">
            <p class="pull-right amount-total">
                TOTAL:&nbsp;&nbsp;&nbsp; <span class="amount-total-red">$580</span>
            </p>
            <button class="btn btn-success btn-lg" style="margin-top:1.5em;">Vender</button>
        </div>
    </div>
</div>
@endsection