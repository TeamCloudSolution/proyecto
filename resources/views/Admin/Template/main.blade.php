<!DOCTYPE html>
<html lang = "es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('titulo','Default')|Administracion</title>

        <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.css')}}">

    </head>

    <body>

        <section>
          <div class="container">

            @include ('flash::message')
            @yield('contenido')
          </div>
        </section>

       <footer class="admin-footer">
           <nav class="navbar navbar-default">
               <div class = "container">
                   <div class="container">
                       <p class="navbar-text"> Todos los Derechos Reservados & Copy {{ date('Y')}} </p>
                       <p class="navbar-text navbar-right"> <b>Grupo Cloud Solutions</b></p>
                   </div>
                </div>
           </nav>
       </footer>



       <script src="{{ asset ('plugins/jquery/js/jquery-3.1.1.js') }}"> </script>
       <script src="{{ asset ('plugins/bootstrap/js/bootstrap.js') }}"> </script>
       <script>
         $(document).ready(function() {
               $("#NOMBRE").keyup(function () {
                 var str = $(this).val();
                 str = str.replace(/[:;_,.*+?^${}()|\[\]\\\-/<>0123456789]/g, "");
                 $(this).val(str);
               });
               $("#DESCRIPCION").keyup(function () {
                 var str = $(this).val();
                 str = str.replace(/[:;_,.*+?^${}()|\[\]\\\-/<>0123456789]/g, "");
                 $(this).val(str);
               });

         });
       </script>

    </body>
</html>
