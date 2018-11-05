@extends('main_layout')

@section('content')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link rel="stylesheet" href="{{ URL::asset("css/app.css") }}">
        <script src="{{ URL::asset("js/app.js") }}"></script>
    </head>
    <body>
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-3">Welcome To Clubs App</h1>
                <p class="lead">Clubs app for Simon Fraser University</p>
                <hr class="my-2">
                <p>Manage your clubs easily!</p>
                <p class="lead">
                    <a class="btn btn-primary btn-lg" href="Jumbo action link" role="button">Register your club</a>
                </p>
            </div>
        </div>
    </body>
</html>
@endsection