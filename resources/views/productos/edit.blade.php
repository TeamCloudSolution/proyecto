@extends ('Admin.Template.main')

@section ('titulo', 'Editar Producto'.$productos-> NOMBRE)

@section ('contenido')

  <div class="alert alert-danger">
			
				@foreach ($errors->all() as $error)
                                   <li>{{$error}}</li>
				@endforeach
			
			</div>

    {!! Form::open(['route' =>['productos.update',$productos],'method' => 'PUT'])!!}

    <div class="form-group">
        {!! Form::label('NOMBRE','Nombre') !!}
        {!!Form::text ('NOMBRE',$productos->NOMBRE,['class' => 'form-control','placeholder' => 'Nombre del producto','
          required']) !!}
    </div>

    <div class="form-group">
       {!! Form::label('DESCRIPCION','Descripcion') !!}
       {!!  Form::text ('DESCRIPCION',$productos->DESCRIPCION,['class' => 'form-control','placeholder' => 'Descripcion','
          required','maxlength=100']) !!}
    </div>

    <div class="form-group">
       {!!Form::label('PRECIO','Precio') !!}
       {!! Form::number ('PRECIO',$productos->PRECIO,['class' => 'form-control','placeholder' => 'Precio del producto','
          required']) !!}
    </div>

    <div class="form-group">
       {!! Form::label('STOCK','Stock') !!}
       {!! Form::number ('STOCK',$productos->STOCK,['class' => 'form-control','placeholder' => 'Disponibilidad el producto','
          required']) !!}
    </div>

        <!-- <div class="form-group">
           {!! Form::label('ID_CATEGORIA','Categoria') !!}
           {!! Form::text ('ID_CATEGORIA',$productos->ID_CATEGORIA,['class' => 'form-control','placeholder' => 'Categoria','
              required']) !!}
        </div> -->
        <div class="form-group">
           {!! Form::label('ID_CATEGORIA','Categoria') !!}
      <select class="form-control" name="ID_CATEGORIA" >
        @foreach($categoria as $cat)
        <?php
         if ($productos->ID_CATEGORIA == $cat->ID ) {
        ?>
          <option value="{{$cat->ID}}" selected >{{$cat->NOMBRE}}</option>
          <?php
         } else {
           ?>
             <option value="{{$cat->ID}}">{{$cat->NOMBRE}}</option>
             <?php
         }
         ?>
        @endforeach
      </select>
        </div>

        <div class="form-group">
           {!! Form::label('RUTA_IMAGEN','Imagen') !!}
           {!! Form::text ('RUTA_IMAGEN',$productos->RUTA_IMAGEN,['class' => 'form-control','placeholder' => 'Imagen','
              required']) !!}
        </div>

    <div class="form-group">
       {!! Form::submit('Editar',['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
@endsection
