@extends('main_layout')


@section('header')
    @include('partials.header', ['header' => 'List of Registered Clubs'])
@endsection

@section('new')
    @include('partials.new', ['href'=>'register_club', 'text' => 'Register a new club'])
@endsection

@section('content')
<div class = "table_display">
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Founder </th>
            <th scope="col">Description</th>
            <th scope="col">Detail</th>
        </tr>
    </thead>
    <tbody>
        <?php $club_index = 1; ?>
        @foreach($clubs as $club)
        <tr>
            <th scope="row">{{$club_index++}}</th>
            <td>{{$club['club_name']}}</td>
            <td>{{$club->founder()->uname}}</td>
            <td>{{$club['information']}}</td>
            <td>
            <form method= "post" action="/clubpage/{{$club->id}}">
            <input type="hidden" name="_token" value="{{ csrf_token()}}">
            <input type = "submit" value = "See details">
            </form>
            <td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
</div>
@endsection