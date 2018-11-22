@extends('main_layout')

@section('header')
    @include('partials.header',['header'=>'Expenses for your clubs'])
@endsection

@section('new')
    @include('partials.new', ['href' => '/register_expenses', 'text' => 'Record New Expense'])
@endsection

@section('content')
<table class="table table-light table-bordered table-hover">
    <thead class="thead-light">
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
        <?php $expense_index = 1; ?>
        @foreach($expenses as $expense)
            <tr>
                <th scope="row">{{$expense_index++}}</th>
                <td>{{$expense['expense_name']}}</td>
                <td>{{$expense['description']}}</td>
                <td>${{$expense['amount']}}</td>
                <td><a href="" class="btn btn-info">Edit</a></td>
                <td><a href="delete_expense/{{ $expense->id }}" class="btn btn-danger">Delete</a></td>
            </tr>
            
        @endforeach
    </tbody>
</table>
@endsection
