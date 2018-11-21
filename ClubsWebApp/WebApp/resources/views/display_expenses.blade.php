@extends('main_layout')
@section('content')

<!DOCTYPE>
<body>
    <!-- <script src="{{ URL::asset("js/display_expenses.js") }}"></script> -->
</body>

<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Expense Name</th>
            <th scope="col">Description</th>
            <th scope="col">Amount</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($expenses as $expense)
            <tr>
                <th scope="row">{{$expense['id']}}</th>
                <td>{{$expense['expense_name']}}</td>
                <td>{{$expense['description']}}</td>
                <td>${{$expense['amount']}}</td>
                <td><a href="" class="btn bg-success eventButton">Edit</a></td>
                <td><a href="delete_expense/{{ $expense->id }}" class="btn bg-primary eventButton">Delete</a></td>
            </tr>
        @endforeach

    </tbody>
</table>
@endsection

<style>
.eventButton{
    color: white;
}

.eventButton:hover{
    color: white;
}
</style>