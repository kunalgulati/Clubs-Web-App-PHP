@extends('main_layout')

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-3">Welcome To Clubs App</h1>
            <p class="lead">Clubs app for Simon Fraser University</p>
            <hr class="my-2">
            <p>Manage your clubs easily!</p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="clubs" role="button">View all clubs</a>
            </p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="register_club" role="button">Register your club</a>
            </p>
        </div>
    </div>
@endsection

