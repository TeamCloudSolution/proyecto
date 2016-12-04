@extends ('Admin.Template.main')

@section ('titulo', 'Editar Cliente'.$clientes-> nombre)

@section ('contenido')
    {!! Form::open(['route' =>['clientes.update',$clientes],'method' => 'PUT'])!!}

    <div class="form-group">
        {!! Form::label('CI','Numero') !!}
        {!!Form::text ('CI',$clientes->CI,['class' => 'form-control','placeholder' =>  'Numero de carnet de identidad','
          required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('NOMBRE','Nombre') !!}
        {!!Form::text ('NOMBRE',$clientes->NOMBRE,['class' => 'form-control','placeholder' => 'Nombre Completo','
          required']) !!}
    </div>

    <div class="form-group">
       {!! Form::label('TELEFONO','Telefono') !!}
       {!!  Form::text ('TELEFONO',$clientes->TELEFONO,['class' => 'form-control','placeholder' => 'Numero Telefonico','
          required']) !!}
    </div>

    <div class="form-group">
       {!! Form::label('CORREO','Correo Electronico') !!}
       {!!  Form::text ('CORREO',$clientes->CORREO,['class' => 'form-control','placeholder' => 'example@gmail.com','
          required']) !!}
    </div>

    <div class="form-group">
       {!! Form::submit('Editar',['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
@endsection
