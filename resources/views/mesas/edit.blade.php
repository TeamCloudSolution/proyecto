@extends ('Admin.Template.main')

@section ('titulo', 'Editar Mesa'.$mesas-> NUMERO)

@section ('contenido')
    {!! Form::open(['route' =>['mesas.update',$mesas],'method' => 'PUT'])!!}

    <div class="form-group">
          {!! Form::label('NUMERO','Numero') !!}
        {!!Form::text ('NUMERO',$mesas->NUMERO,['class' => 'form-control','placeholder' => 'Numero de mesa','
          required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('DESCRIPCION','Descripcion') !!}
        {!!Form::text ('DESCRIPCION',$mesas->DESCRIPCION,['class' => 'form-control','placeholder' => 'Descripcion','
          required']) !!}
    </div>

    <div class="form-group">
       {!! Form::submit('Editar',['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
@endsection
