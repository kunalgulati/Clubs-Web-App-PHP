@extends('main_layout')

@section('content')
<head>
	<link rel="stylesheet" href="{{ URL::asset("css/form.css") }}">
</head>
@if(isset($id))
{{ Form::open(array('url' => 'update_expense_done')) }}
@else
{{ Form::open(array('url' => 'register_expenses')) }}
@endif


<section id="cover">
    <div id="cover-caption">
        <div id="container" class="container">
            <div class="row">
                <div class="col-sm-10 offset-sm-1 text-center">
                @if(isset($id))
                    <h1 class="display-4">Update your Club Expenses</h1>
                    @else
                    <h1 class="display-4">Register your Club Expenses</h1>
                    @endif
                    <!-- if there are login errors, show them here -->
                    <p>
                        <!-- {{ $errors->first('expense_name') }} -->
                        @if ($errors->any())
                            {{ implode('', $errors->all('<div>:message</div>')) }}
                        @endif
                    </p>
                    <div class="info-form">
                        <form class='col-6' action="" method="post" role="form">
                            <div class="form-group">
                                <!-- <label for="exampleInputEmail1">Email address</label> -->
                                {{ Form::label('text', 'Expense Name') }}
                                @if(isset($id))
                                <input type="hidden" name='id' id = 'id' class = "form-control" value = {{$id}}>
                                <input type="text" name='expense_name' id = 'expense_name' class = "form-control" value = {{$name}}>
                                @else
                                {{ Form::text('text', Input::old('text'), array('name'=>'expense_name', 'id' => 'expense_name', 'class' => "form-control", 'placeholder' => 'IceBreaker')) }}
                                @endif
                                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                            </div>
                            <div class="form-group">
                                {{ Form::label('text', 'Expense Description') }}
                                @if(isset($id))
                                <input type ='textarea' name='description' class = "form-control" id = "Description" value = {{$description}} }}>
                                @else
                                {{ Form::text('textarea', Input::old('textarea'), array('name'=>'description', 'class' => "form-control", 'rows'=>'5' ,'id' => 'expenseDescription',  'placeholder' => 'Description')) }}    
                                @endif
                            </div>
                            <div class="form-group">
                                {{ Form::label('text', 'Amount') }}
                                @if(isset($id))
                                <input type = "number" name = "amount" class = "form-control" id = "amount" value = {{$amount}}>
                                @else
                                {{ Form::number('number', Input::old('number'), array('name'=>'amount', 'class' => "form-control" ,'id' => 'amount',  'placeholder' => '$200')) }}    
                                @endif
                            </div>
                            <div class="form-group">
                                {{ Form::label('text', 'Club Name') }}
                                {{ Form::text('textarea', Input::old('textarea'), array('name'=>'club_name', 'class' => "form-control" ,'id' => 'club_name',  'placeholder' => 'SFU Ice Hockey Club')) }}    
                            </div>
                            <input type="submit" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection


