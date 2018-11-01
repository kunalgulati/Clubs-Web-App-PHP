<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link rel="stylesheet" href="{{ URL::asset("css/app.css") }}">
        <script src="{{ URL::asset("js/app.js") }}"></script>
    </head>
    <body> 
        @yield('content')
    </body>
</html>
