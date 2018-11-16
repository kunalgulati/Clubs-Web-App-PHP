@extends('main_layout')

@section('content')
<head>
	<link rel="stylesheet" href="{{ URL::asset("css/form.css") }}">
</head>
{{ Form::open(array('url' => 'register_expenses')) }}
<section id="cover">
    <div id="cover-caption">
        <div id="container" class="container">
            <div class="row">
                <div class="col-sm-10 offset-sm-1 text-center">
                    <h1 class="display-4">Register your Club Expenses</h1>
                    <!-- if there are login errors, show them here -->
                    <p>
                        <!-- {{ $errors->first('event_name') }} -->
                        @if ($errors->any())
                            {{ implode('', $errors->all('<div>:message</div>')) }}
                        @endif
                    </p>
                    <div class="info-form">
                        <form class='col-6' action="" method="post" role="form">
                            <div class="form-group">
                                <!-- <label for="exampleInputEmail1">Email address</label> -->
                                {{ Form::label('text', 'Event Name') }}
                                {{ Form::text('text', Input::old('text'), array('name'=>'event_name', 'id' => 'event_name', 'class' => "form-control", 'placeholder' => 'IceBreaker')) }}
                                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                            </div>
                            <div class="form-group">
                                {{ Form::label('text', 'Event Description') }}
                                {{ Form::text('textarea', Input::old('textarea'), array('name'=>'description', 'class' => "form-control", 'rows'=>'5' ,'id' => 'event_description',  'placeholder' => 'Description')) }}    
                            </div>
                            <div class="form-group">
                                {{ Form::label('text', 'Room/Building') }}
                                {{ Form::number('number', Input::old('textarea'), array('name'=>'room', 'class' => "form-control" ,'id' => 'room',  'placeholder' => 'Room 2204, West Mall Center')) }}    
                            </div>
                            <div class="form-group">
                                {{ Form::label('text', 'Address') }}
                                {{ Form::number('number', Input::old('textarea'), array('name'=>'address', 'class' => "form-control" ,'id' => 'address',  'placeholder' => '8888 University drive')) }}    
                            </div>
                            <div class="form-group">
                                {{ Form::label('text', 'City') }}
                                {{ Form::text('textarea', Input::old('textarea'), array('name'=>'city', 'class' => "form-control" ,'id' => 'city',  'placeholder' => 'Burnaby')) }}    
                            </div>
                            <div class="form-group">
                                {{ Form::label('text', 'Club Name') }}
                                {{ Form::text('textarea', Input::old('textarea'), array('name'=>'club_name', 'class' => "form-control" ,'id' => 'club_name',  'placeholder' => 'SFU Icehockey Club')) }}    
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
