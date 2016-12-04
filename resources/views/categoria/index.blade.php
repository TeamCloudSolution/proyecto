@extends ('Admin.Template.main')

@section ('titulo','Lista de Categorias')

@section ('contenido')
<h1> Categoria </h1>
<a href="{{ route ('categoria.create')}}" class="btn btn-info"> Registrar Nueva Categoria</a> <hr>

<table class="table table-striped">
    <thead>
        <th>Acción</th>
        <th>Nombre</th>
        <th>Descripción</th>
    </thead>
    <tbody>

        @foreach ($categoria as $categ)


        <tr>

          <td> <a href="{{route('categoria.edit',$categ->ID)}}" class="btn btn-warning">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true">
             </span>
               </a>


               <a href="{{route('categoria.destroy',$categ->ID)}}"
                 onclick="return confirm('¿Seguro que desea eliminarlo?')" class="btn btn-danger">
                 <span class="glyphicon glyphicon-trash" aria-hidden="true">
                 </span>
               </a>

             </td>

               <td>{{$categ->NOMBRE}}</td>
               <td>{{$categ->DESCRIPCION}}</td>
              </tr>
        @endforeach
    </tbody>
</table>
<div class="text-center">
        {!! $categoria->render() !!}
</div>
@endsection


<!-- {{route('categoria.destroy',$categ->ID)}} -->
