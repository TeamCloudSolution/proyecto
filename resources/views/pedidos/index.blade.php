@extends('pedidos.layouts.site')
@section('title', 'Inicio')
@section('content')
<div class="list-platos col-xs-12">
    <ul class="list-group">
        
      @foreach ($productos as $producto)
        <li class="row items-platos">
            <div class="col-xs-3">
                <img src="{{asset('imagenes/productos/'.$producto->RUTA_IMAGEN)}}" class="image-item">   
            </div>
            <div class="col-xs-7">
                <div class="row">
                    <b>{{$producto->NOMBRE}}</b><br>
                    <span>{{$producto->DESCRIPCION}}</span>
                </div>
            </div>
            <div class="col-xs-2">
                <div class="row detallar text-center" data-toggle="modal" data-target="#myModal">
                    +
                </div>
            </div>
        </li>

      @endforeach 
    </ul>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header-laravel">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Titulo del Producto</h4>
            </div>
            <div class="modal-body-laravel">
                <img src="img/platocomidauno.jpg" class="image-item"> 
                <div class="form-adicionar">
                    <form >
                        <span class="col-xs-3">Cantidad</span> 
                        <div class="col-xs-5">
                            <div id="1" class="row input-group input-group-option quantity-wrapper">

                                <span  class="input-group-addon input-group-addon-remove quantity-remove btn">
                                    <span class="glyphicon glyphicon-minus"></span>
                                </span>

                                <input  id="1inp" type="text" value="6" name="option[]" class="form-control quantity-count" placeholder="1">

                                <span class="input-group-addon input-group-addon-remove quantity-add btn">
                                    <span class="glyphicon glyphicon-plus"></span>
                                </span>

                            </div>
                        </div>
                        <div class="col-xs-4">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Adicionar</button>
                        </div>
                    </form>
                </div>
                <div class="modal-body">
                    <h3>Titulo de Producto</h3>
                    <p>Descripcion del producto. Descripcion del producto. Descripcion del producto.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="btn-pedido" class="col-xs-12 text-center">
    <h3>Realizar Pedido</h3>
</div>

@endsection