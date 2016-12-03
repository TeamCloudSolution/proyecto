@extends ('Admin.Template.main')

@section ('titulo', 'Crear Categoria')

@section ('contenido')
    {!! Form::open(['route' =>'categoria.store','method' => 'POST'])!!}
    <div class="form-group">
        {!! Form::label('nombre','Nombre') !!}
        {!!Form::text ('nombre',null,['class' => 'form-control','placeholder' => 'Nombre de la categoria','
          required']) !!}
    </div>

    <div class="form-group">
       {!! Form::label('descripcion','Descripcion') !!}
       {!!  Form::text ('descripcion',null,['class' => 'form-control','placeholder' => 'Descripcion de la categoria','
          required']) !!}
    </div>

    <div class="form-group">
       {!! Form::submit('Registrar',['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
@endsection
