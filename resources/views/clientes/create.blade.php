@extends ('Admin.Template.main')

@section ('titulo', 'Crear Cliente')

@section ('contenido')
    {!! Form::open(['route' =>'clientes.store','method' => 'POST'])!!}
    <div class="form-group">
        {!! Form::label('CI','Numero') !!}
        {!!Form::number ('CI',null,['class' => 'form-control','placeholder' => 'Numero de carnet de identidad','
          required']) !!}
    </div>

    <div class="form-group">
       {!! Form::label('NOMBRE','Nombre') !!}
       {!!  Form::text ('NOMBRE',null,['class' => 'form-control','placeholder' => 'Nombre Completo','
          required','maxlength=100']) !!}
    </div>

    <div class="form-group">
       {!!Form::label('TELEFONO','Telefono') !!}
       {!! Form::number ('TELEFONO',null,['class' => 'form-control','placeholder' => 'Numero Telefonico','
          required']) !!}
    </div>

    <div class="form-group">
       {!! Form::label('CORREO','Correo Electronico') !!}
       {!! Form::email ('CORREO',null,['class' => 'form-control','placeholder' => 'example@gmail.com','
          required']) !!}
    </div>

    <div class="form-group">
       {!! Form::submit('Registrar',['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
@endsection
