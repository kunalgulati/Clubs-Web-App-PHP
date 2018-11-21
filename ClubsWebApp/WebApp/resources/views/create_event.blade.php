@extends('main_layout')
@section('header')
    @include('partials.header',['header'=>'Post a new event'])
@endsection

@section('content')
{{ Form::open(array('url' => 'register_event')) }}
    <div class="row">
        <div class="col-10 offset-1 text-center">
            @if($errors->any())
                @include('errors.errors',['title' =>'Failed to Post Event', 'errors'=>$errors])
            @endif
            <form class='col-6 offset-3 text-center' action="" method="post" role="form">
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
                    {{ Form::text('textarea', Input::old('textarea'), array('name'=>'room', 'class' => "form-control" ,'id' => 'room',  'placeholder' => 'Room 2204, West Mall Center')) }}    
                </div>
                <div class="form-group">
                    {{ Form::label('text', 'Address') }}
                    {{ Form::text('textarea', Input::old('textarea'), array('name'=>'address', 'class' => "form-control" ,'id' => 'address',  'placeholder' => '8888 University drive')) }}    
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
@endsection
