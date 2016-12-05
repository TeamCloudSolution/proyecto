@extends ('Admin.Template.main')

@section ('titulo', 'Crear Producto')

@section ('contenido')

<div class="alert alert-danger">
			
				@foreach ($errors->all() as $error)
                                   <li>{{$error}}</li>
				@endforeach
			
</div>


    {!! Form::open(['route' =>'productos.store','method' => 'POST','files'=>true])!!}
    <div class="form-group">
        {!! Form::label('NOMBRE','Nombre') !!}
        {!!Form::text ('NOMBRE',null,['class' => 'form-control','placeholder' => 'Nombre del producto','
          required']) !!}
    </div>

    <div class="form-group">
       {!! Form::label('DESCRIPCION','Descripcion') !!}
       {!!  Form::text ('DESCRIPCION',null,['class' => 'form-control','placeholder' => 'Descripcion','
          required','maxlength=100']) !!}
    </div>

    <div class="form-group">
       {!!Form::label('PRECIO','Precio') !!}
       {!! Form::number ('PRECIO',null,['class' => 'form-control','placeholder' => 'Precio del producto','
          required']) !!}
    </div>

    <div class="form-group">
       {!! Form::label('STOCK','Stock') !!}
       {!! Form::text ('STOCK',null,['class' => 'form-control','placeholder' => 'Disponibilidad el producto','
          required']) !!}
    </div>

    <div class="form-group">
       {!! Form::label('ID_CATEGORIA','Categoria') !!}
  <select class="form-control" name="ID_CATEGORIA">
    @foreach($categoria as $cat)
      <option value="{{$cat->ID}}">{{$cat->NOMBRE}}</option>
    @endforeach
  </select>
    </div>
    
    <div class="form-group">
     {!! Form::label('imagen','IMAGEN') !!}
     {!! Form::file ('imagen') !!}
  </div>

    <div class="form-group">
       {!! Form::submit('Registrar',['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
@endsection
