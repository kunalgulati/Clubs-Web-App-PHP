@extends('main_layout')
@section('content')
<!DOCTYPE>

<div style='padding-top: 50px;'>
<table class="table">
    <thead>
        <tr>
            <th scope="col">StudentId</th>
            <th scope="col">Name</th>
            <th scope="col">email</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <th scope="row">{{$user['id']}}</th>
            <td>{{$user['student_id']}}</td>
            <td>{{$club['name']}}</td>
            <td>{{$club['email']}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
</div>
@endsection