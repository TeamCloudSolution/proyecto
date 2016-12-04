@extends ('Admin.Template.main')

@section ('titulo','Lista de Productos')

@section ('contenido')
<h1> Productos </h1>
<a href="{{ route ('productos.create')}}" class="btn btn-info"> Registrar Producto</a> <hr>
<table class="table table-striped">
    <thead>
        <th>Acciòn</th>
        <!-- <th>id</th> -->
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Categoria</th>
        <th>Imagen</th>
    </thead>
    <tbody>

        @foreach ($productos as $product)
        <tr>
          <td> <a href="{{route('productos.edit',$product->ID)}}" class="btn btn-warning">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true">
            </span>
          </a>
               <a href="{{route('productos.destroy',$product->ID)}}"
                 onclick="return confirm('¿Seguro que desea eliminarlo?')" class="btn btn-danger">
                 <span class="glyphicon glyphicon-trash" aria-hidden="true">
                 </span>
               </a>
             </td>

            <td>{{$product->NOMBRE}}</td>
            <td>{{$product->DESCRIPCION}}</td>
            <td>{{$product->PRECIO}}</td>
            <td>{{$product->STOCK}}</td>
            <td>{{$product->categoria->NOMBRE}}</td>
            <td>
                <img src="{{asset('imagenes/productos/'.$product->RUTA_IMAGEN)}}" alt="{{$product->NOMBRE}}" height="100px" width="100px" class="img-responsive">
            </td>

            </tr>
        @endforeach
    </tbody>
</table>
<div class="text-center">
        {!! $productos->render() !!}
</div>
@endsection
