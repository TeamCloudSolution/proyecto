<!DOCTYPE html>
<html>
    <head>
        <title>FastFood | @yield('title')</title>
        <link href='bootstrap/css/bootstrap.min.css' rel="stylesheet" />
        <link href='css/styles.css?v=13' rel="stylesheet" />

        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <header class="container">
            <div class="row header-responsive">
                <div class="col-xs-2">
                    <div class=""></div>
                </div>
                <div class="col-xs-8 text-center">
                    <h3>@yield('title')</h3>
                </div>
                <div class="col-xs-2">
                    <div class="img-menu"></div>
                </div>
            </div>
        </header>
        <div class="container">
            <div class="row">
                <section class="">
                    @yield('content')
                </section>
            </div>
        </div>
        <footer>
        </footer>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js" type="text/javascript"></script>   
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>   
        <script src="js/script.js?v=6" type="text/javascript"></script>   

    </body>
</html>
