@extends ('Admin.Template.main')

@section ('titulo', 'Crear Cliente')

@section ('contenido')
    {!! Form::open(['route' =>'clientes.store','method' => 'POST'])!!}
    <div class="form-group">
        {!! Form::label('numero','CI') !!}
        {!!Form::text ('numero',null,['class' => 'form-control','placeholder' => 'Numero de carnet de identidad','
          required','maxlength=7']) !!}
    </div>

    <div class="form-group">
       {!! Form::label('nombre','Nombre') !!}
       {!!  Form::text ('nombre',null,['class' => 'form-control','placeholder' => 'Nombre Completo','
          required']) !!}
    </div>

    <div class="form-group">
       {!!Form::label('telefono','Telefono') !!}
       {!! Form::text ('telefono',null,['class' => 'form-control','placeholder' => 'Numero Telefonico','
          required','maxlength=8']) !!}
    </div>

    <div class="form-group">
       {!! Form::label('email','Correo Electronico') !!}
       {!! Form::email ('email',null,['class' => 'form-control','placeholder' => 'example@gmail.com','
          required']) !!}
    </div>

    <div class="form-group">
       {!! Form::submit('Registrar',['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
@endsection
