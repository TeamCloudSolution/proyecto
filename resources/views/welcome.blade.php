@extends('Admin.Template.main')

@section ('titulo')
  Inicio de mi Pagina
@endsection

@section ('contenido')

<div class="img">
<center>
  <img src="{{asset('imagenes/welcome.jpg')}}"
  alt="welcome" class="img-responsive">
</center>
</div>



@endsection
