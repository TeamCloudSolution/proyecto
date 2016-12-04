@extends ('Admin.Template.main')

@section ('titulo', 'Editar Categoria'.$categoria-> NOMBRE)

@section ('contenido')
    {!! Form::open(['route' =>['categoria.update',$categoria],'method' => 'PUT'])!!}
    <div class="form-group">
        {!! Form::label('NOMBRE','Nombre') !!}
        {!!Form::text ('NOMBRE',$categoria->NOMBRE,['class' => 'form-control','placeholder' => 'Nombre de la categoria','
          required']) !!}
    </div>

    <div class="form-group">
       {!! Form::label('DESCRIPCION','Descripcion') !!}
       {!!  Form::text ('DESCRIPCION',$categoria->DESCRIPCION,['class' => 'form-control','placeholder' => 'Descripcion de la categoria','
          required']) !!}
    </div>

    <div class="form-group">
       {!! Form::submit('Editar',['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
@endsection
