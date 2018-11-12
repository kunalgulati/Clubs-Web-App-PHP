@extends('main_layout')
@section('content')
<!DOCTYPE>
<div class = "table_display">
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Administer ID</th>
            <th scope="col">Description</th>
            <th scope="col">Detail</th>
        </tr>
    </thead>
    <tbody>
        @foreach($clubs as $club)
        <tr>
            <th scope="row">{{$club['id']}}</th>
            <td>{{$club['club_name']}}</td>
            <td>{{$club['president_id']}}</td>
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