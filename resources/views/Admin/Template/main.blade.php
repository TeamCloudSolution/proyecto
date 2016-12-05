<!DOCTYPE html>
<html lang = "es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('titulo','Default')|Administracion</title>

        <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.css')}}">

        <style type="text/css">
        .fondoprincipal {
            min-height: 20px;
            padding: 19px;
            margin-bottom: 20px;
            background-color: #337ab7;
            border: 1px solid #e3e3e3;
            border-radius: 4px;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05);
          }
          </style>
    </head>

    <body>

          <div class="container">
            <div class="row">
              <div class="col-lg-12 fondoprincipal">
                 <span style="color:white;"><h1> QUICKORDER</h1></span>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-2 col-sm-2 col-xs-3">
                <ul class="nav nav-pills nav-stacked">
                  <li role="presentation" class="active"><a href="/proyecto/public/">Home</a></li>
                  <li role="presentation" class="active"><a href="categoria">Categoria</a></li>
                  <li role="presentation" class="active"><a href="productos">Producto</a></li>
                  <li role="presentation" class="active"><a href="mesas">Mesas</a></li>
                  <li role="presentation" class="active"><a href="clientes">Clientes</a></li>
                  <li role="presentation" class="active"><a href="#">Validacion</a></li>
                  <li role="presentation" class="active"><a href="pedidos">Pedido</a></li>
                </ul>
              </div>

              <div class="col-lg-10 col-sm-10">
                @include ('flash::message')
                @yield('contenido')
              </div>
            </div>
          </div>


            <footer>
              <div class="container fondoprincipal">
                <div class="col-lg-4">
                  <p style="color:white;"> Todos los Derechos Reservados & Copy {{ date('Y')}} </p>
                </div>
                <div class="col-lg-4 col-lg-offset-4">
                  <p style="color:white;"> <b>Grupo Cloud Solutions</b></p>
                </div>
              </div>
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
