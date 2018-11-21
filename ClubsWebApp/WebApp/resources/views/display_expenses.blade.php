@extends('main_layout')
@section('content')

<div class="row mt-5">
    <div class="col-8 offset-2">
        <div class="row mt-2 mb-3">
            <div class="col-4 offset-4">
                <a class="btn btn-large btn-outline-primary" href="/register_expenses" role="button">Add New Expense</a>
            </div>
        </div>
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
    </div>
</div>

@endsection
