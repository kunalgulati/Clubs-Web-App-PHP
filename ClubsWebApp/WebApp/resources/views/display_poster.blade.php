@extends('main_layout')
@section('content')

<?php echo $club_poster; ?>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">title</th>
            <th scope="col">Description</th>
            <th scope="col">json</th>
            <th scope="col">club_id</th>
        </tr>
    </thead>
    <tbody>
        @foreach($club_poster as $poster)
            <tr>
                <th scope="row">{{$poster['id']}}</th>
                <td>{{$poster['title']}}</td>
                <td>{{$poster['description']}}</td>
                <td>{{$poster['json']}}</td>
                <td>{{$poster['club_id']}}</td>
            </tr>
            
        @endforeach

    </tbody>
</table>
@endsection
