<!DOCTYPE html>
<html lang = "es">
    <head>
        <meta charset="UTF-8">
        <title>@yield('titulo','Default')|Administracion</title>

        <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.css')}}">

    </head>


    <body>

    <h1> Categorias </h1>

        <section>
            @include ('flash::message')
            @yield('contenido')
        </section>

       <footer class="admin-footer">
           <nav class="navbar navbar-default">
               <div class = "container-fluid">
                   <div class="container-fluid">
                       <p class="navbar-text"> Todos los Derechos Reservados & Copy {{ date('Y')}} </p>
                       <p class="navbar-text navbar-right"> <b>Grupo Cloud Solutions</b></p>
                   </div>
                </div>
           </nav>
       </footer>



       <script src="{{ asset ('plugins/jquery/js/jquery-3.1.1.js') }}"> </script>
       <script src="{{ asset ('plugins/bootstrap/js/bootstrap.js') }}"> </script>

    </body>
</html>
