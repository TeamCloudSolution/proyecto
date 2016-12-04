@extends ('Admin.Template.main')

@section ('titulo', 'Crear Cliente')

@section ('contenido')
    {!! Form::open(['route' =>'clientes.store','method' => 'POST'])!!}
    <div class="form-group">
        {!! Form::label('CI','Numero') !!}
        {!!Form::text ('CI',null,['class' => 'form-control','placeholder' => 'Numero de carnet de identidad','
          required','maxlength=7']) !!}
    </div>

    <div class="form-group">
       {!! Form::label('NOMBRE','Nombre') !!}
       {!!  Form::text ('NOMBRE',null,['class' => 'form-control','placeholder' => 'Nombre Completo','
          required']) !!}
    </div>

    <div class="form-group">
       {!!Form::label('TELEFONO','Telefono') !!}
       {!! Form::text ('TELEFONO',null,['class' => 'form-control','placeholder' => 'Numero Telefonico','
          required','maxlength=8']) !!}
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
