@extends('main_layout')
@section('content')
<!DOCTYPE>

<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Expense Name</th>
            <th scope="col">Description</th>
            <th scope="col">Amount</th>
        </tr>
    </thead>
    <tbody>
        @foreach($expenses as $expense)
            <tr>
                <th scope="row">{{$expense['id']}}</th>
                <td>{{$expense['expense_name']}}</td>
                <td>{{$expense['description']}}</td>
                <td>{{$expense['amount']}}</td>
            </tr>
        @endforeach



        <!-- <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
        </tr> -->
    </tbody>
</table>


@endsection