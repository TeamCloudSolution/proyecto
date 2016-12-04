@extends ('Admin.Template.main')

@section ('titulo','Lista de Clientes')

@section ('contenido')
<h1> Cliente </h1>
<a href="{{ route ('clientes.create')}}" class="btn btn-info"> Registrar Nuevo Cliente</a> <hr>
<table class="table table-striped">
    <thead>
        <th>Acciòn</th>
        <!-- <th>id</th> -->
        <th>Ci</th>
        <th>Nombre</th>
        <th>Telefono</th>
        <th>Correo</th>
    </thead>
    <tbody>

        @foreach ($clientes as $client)
        <tr>
          <td> <a href="{{route('clientes.edit',$client->ID)}}" class="btn btn-warning">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true">
            </span>
          </a>
               <a href="{{route('clientes.destroy',$client->ID)}}"
                 onclick="return confirm('¿Seguro que desea eliminarlo?')" class="btn btn-danger">
                 <span class="glyphicon glyphicon-trash" aria-hidden="true">
                 </span>
               </a>
             </td>

            <!-- <td>{{$client->id}}</td> -->
            <td>{{$client->CI}}</td>
            <td>{{$client->NOMBRE}}</td>
            <td>{{$client->TELEFONO}}</td>
            <td>{{$client->CORREO}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="text-center">
        {!! $clientes->render() !!}
</div>
@endsection
