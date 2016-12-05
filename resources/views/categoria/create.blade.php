@extends ('Admin.Template.main')

@section ('titulo', 'Crear Categoria')

@section ('contenido')

<div class="alert alert-danger">
			
				@foreach ($errors->all() as $error)
                                   <li>{{$error}}</li>
				@endforeach
			
</div>

    {!! Form::open(['route' =>'categoria.store','method' => 'POST'])!!}
    <div class="form-group">
        {!! Form::label('NOMBRE','Nombre') !!}
        {!!Form::text ('NOMBRE',null,['class' => 'form-control','placeholder' => 'Nombre de la categoria','
          required']) !!}
    </div>

    <div class="form-group">
       {!! Form::label('DESCRIPCION','Descripcion') !!}
       {!!  Form::text ('DESCRIPCION',null,['class' => 'form-control','placeholder' => 'Descripcion de la categoria','
          required','maxlength=100']) !!}
    </div>

    <div class="form-group">
       {!! Form::submit('Registrar',['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

@endsection
