<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


        <title>{{ config('app.name') }}</title>

        <script>

        window.csrfToken =  <?php echo json_encode(csrf_token()); ?>
        </script>

        <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        
    </head>
    <body>
        <div id="app">
            <section class="top">
                @yield('top')
            </section>
            <section class="main">
                <div class="container-fluid">
                    @yield('main')
                </div>
            </section>
            <section class="bottom">
                @yield('bottom')
            </section>
        </div>

        <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
        
        

    </body>
</html>