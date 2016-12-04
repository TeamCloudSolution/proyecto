@extends ('Admin.Template.main')

@section ('titulo', 'Editar Mesa'.$mesas-> NUMERO)

@section ('contenido')
    {!! Form::open(['route' =>['mesas.update',$mesas],'method' => 'PUT'])!!}

    <div class="form-group">
          {!! Form::label('numero','NUMERO') !!}
        {!!Form::text ('numero',$mesas->NUMERO,['class' => 'form-control','placeholder' => 'Numero de mesa','
          required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('descripcion','DESCRIPCION') !!}
        {!!Form::text ('descripcion',$mesas->DESCRIPCION,['class' => 'form-control','placeholder' => 'Descripcion','
          required']) !!}
    </div>

    <div class="form-group">
       {!! Form::submit('Editar',['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
@endsection
