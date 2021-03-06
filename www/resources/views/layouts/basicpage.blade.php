<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        
    </head>
    <body>
        <div id="app">
            @yield('top')
            @yield('main')
        </div>
        <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
    </body>
</html>