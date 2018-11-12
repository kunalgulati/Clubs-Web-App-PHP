@extends('main_layout')
@section('content')

<div class = "table_display">
<table class="table">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">StudentId</th>
            <th scope="col">Name</th>
            <th scope="col">email</th>
        </tr>
    </thead>
    <tbody>
        @foreach($members as $member)
        <tr>
            <th scope="row">{{$member['id']}}</th>
            <td>{{$member['student_id']}}</td>
            <td>{{$member['name']}}</td>
            <td>{{$member['email']}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
</div>
@endsection