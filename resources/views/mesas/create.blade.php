@extends ('Admin.Template.main')

@section ('titulo', 'Crear Mesa')

@section ('contenido')
    {!! Form::open(['route' =>'mesas.store','method' => 'POST'])!!}
    <div class="form-group">
        {!! Form::label('NUMERO','Numero') !!}
        {!!Form::text ('NUMERO',null,['class' => 'form-control','placeholder' => 'Numero de mesa','
          required']) !!}
    </div>

    <div class="form-group">
       {!! Form::label('DESCRIPCION','Descripcion') !!}
       {!!  Form::text ('DESCRIPCION',null,['class' => 'form-control','placeholder' => 'Descripcion','
          required']) !!}
    </div>

    <div class="form-group">
       {!! Form::submit('Registrar',['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
@endsection
