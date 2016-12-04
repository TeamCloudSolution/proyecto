@extends ('Admin.Template.main')

@section ('titulo', 'Editar Cliente'.$clientes-> nombre)

@section ('contenido')
    {!! Form::open(['route' =>['clientes.update',$clientes],'method' => 'PUT'])!!}

    <div class="form-group">
        {!! Form::label('ci','Ci') !!}
        {!!Form::text ('ci',$clientes->ci,['class' => 'form-control','placeholder' => 'Carnet de identidad','
          required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('nombre','Nombre') !!}
        {!!Form::text ('nombre',$clientes->nombre,['class' => 'form-control','placeholder' => 'Nombre del cliente','
          required']) !!}
    </div>

    <div class="form-group">
       {!! Form::label('telefono','Telefono') !!}
       {!!  Form::text ('telefono',$clientes->telefono,['class' => 'form-control','placeholder' => 'Telefono del cliente','
          required']) !!}
    </div>

    <div class="form-group">
       {!! Form::label('correo','Correo') !!}
       {!!  Form::text ('correo',$clientes->correo,['class' => 'form-control','placeholder' => 'Correo del cliente','
          required']) !!}
    </div>

    <div class="form-group">
       {!! Form::submit('Editar',['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
@endsection
