
@extends('pedidos.layouts.site')
@section('title', 'Inicio')
@section('content')


  @if ($pedidoFinalizado=== 0)

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
                <div class="row detallar text-center" data-toggle="modal" data-target="#myModal{{$producto->ID}}">
                    +
                </div>
            </div>
        </li>

        @endforeach 
    </ul>
</div>
<!-- Modal -->
@foreach ($productos as $producto)
<div class="modal fade" id="myModal{{$producto->ID}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header-laravel">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">{{$producto->NOMBRE}}</h4>
            </div>
            <div class="modal-body-laravel">
                <img src="{{asset('imagenes/productos/'.$producto->RUTA_IMAGEN)}}" class="image-item"> 
                <div class="form-adicionar">
                    {!! Form::open(['route' =>'pedidos.store','method' => 'POST'])!!}
                    <span class="col-xs-3">Cantidad</span> 
                    <div class="col-xs-5">
                        <div id="1" class="row input-group input-group-option quantity-wrapper">

                            <span  class="input-group-addon input-group-addon-remove quantity-remove btn">
                                <span class="glyphicon glyphicon-minus"></span>
                            </span>
                                                                                   
                            @if ($pedido_id === -1)
                                {{ Form::hidden('pedido_id', -1) }}
                            @else
                                {{ Form::hidden('pedido_id', $pedido_id) }}
                            @endif                            
                            
                            {{ Form::hidden('tipoOperacion', 20) }}
                            
                            {{ Form::hidden('producto_id', $producto->ID) }}
                        
                            <input  id="cantidad" type="text" value="6" name="cantidad" class="form-control quantity-count" placeholder="1">

                            <span class="input-group-addon input-group-addon-remove quantity-add btn">
                                <span class="glyphicon glyphicon-plus"></span>
                            </span>
                            <input  id="precio" type="hidden" value="{{$producto->PRECIO}}" name="importe" >
                          
                        </div>
                    </div>
                    <div class="col-xs-4">                        
                          {!! Form::submit('Adicionar',['class' => 'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="modal-body">
                    <h3>Description</h3>
                    <p>{{$producto->DESCRIPCION}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach 

<div id="btn-pedido" class="col-xs-12 text-center" data-toggle="modal" data-target="#finalizar" >
    <h3>Realizar Pedido</h3>
</div>


<div class="modal fade" id="finalizar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Finalizar Pedido</h4>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    
                    
                    
                    
<!-- Hola edson seria que en tu logica lo crees con este if, la primera vez que ingresen a la vista estara sin registros, pero conforme se ingresen productos se ira actualizando la variable-->                    
                            @if ($pedido_id === -1)
                                {{ Form::hidden('pedido_id', -1) }}
                            @else
                            <tbody>            
                     @foreach ($todosDetallePedido as $detalle)
                    

                        <tr>
                            <td>{{$detalle->producto->NOMBRE}}</td>
                            <td class="text-center">{{$detalle->IMPORTE}} * {{$detalle->CANTIDAD}}</td>
                            <td>{{$detalle->SUBTOTAL}}</td>
                        </tr>
                        

                   
                    @endforeach 
                    
                    
                    
                    
                     </tbody>
                                {{ Form::hidden('pedido_id', $pedido_id) }}
                            @endif   
                    
                    
        
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                   
                </table>
                <div class="row">
                <div class="col-xs-12 text-center" style="background: #ccc;margin-bottom: 20px;">
                    Total<br>
                  {{$totalPedido}}

                </div>
                <div class="col-xs-6" style="text-align: right;">
                <button type="button" class="btn btn-primary align-right" data-dismiss="modal">Cancelar</button>
               </div>
                <div class="col-xs-6">                        
                   
               @if ($pedido_id === -1)
                           @else
                    {!! Form::open(['route' =>'pedidos.store','method' => 'POST'])!!}
                                        
                    {{ Form::hidden('pedido_id', $pedido_id) }}
                    {{ Form::hidden('tipoOperacion', 10) }}
                    
                    
                          {!! Form::submit('Confirmar',['class' => 'btn btn-primary']) !!}
                    
                  

                  {!! Form::close() !!}
                        @endif   
  </div>
            </div>
                                    
            </div>
        </div>
    </div>
</div>

 @else
<div class="list-platos col-xs-12 textcenter">
    <h3>Gracias por realizar tu pedido. Tu  numero pedido es {{$pedido_id}}</h3>
    </div>
  @endif  

@endsection