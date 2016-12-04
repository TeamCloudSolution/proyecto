@extends ('Admin.Template.main')

@section ('titulo','Lista de Mesas')

@section ('contenido')
<h1> Mesa </h1>
<a href="{{ route ('mesas.create')}}" class="btn btn-info"> Registrar Nueva Mesa</a> <hr>
<table class="table table-striped">
    <thead>
        <th>Acciòn</th>
        <th>Numero</th>
        <th>Descripcion</th>

    </thead>
    <tbody>

        @foreach ($mesas as $mes)
        <tr>
          <td> <a href="{{route('mesas.edit',$mes->ID)}}" class="btn btn-warning">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true">
            </span>
          </a>
               <a href="{{route('mesas.destroy',$mes->ID)}}"
                 onclick="return confirm('¿Seguro que desea eliminarlo?')" class="btn btn-danger">
                 <span class="glyphicon glyphicon-trash" aria-hidden="true">
                 </span>
               </a>
             </td>


            <td>{{$mes->NUMERO}}</td>
            <td>{{$mes->DESCRIPCION}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="text-center">
        {!! $mesas->render() !!}
</div>
@endsection
