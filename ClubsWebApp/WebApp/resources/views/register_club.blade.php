@extends('main_layout')

@section('content')

@section('errors')
    @if($errors->any())
        @include('errors.errors', $errors)
    @endif
@endsection

{{ Form::open(array('url' => 'register_club')) }}
<section id="cover">
    <div id="cover-caption">
        <div id="container" class="container">
            <div class="row">
                <div class="col-sm-10 offset-sm-1 text-center">
                    <h1 class="display-3">Register your Club</h1>
                    <!-- if there are login errors, show them here -->
                    <p>
                        {{ $errors->first('email') }}
                        {{ $errors->first('password') }}
                    </p>
                    <div class="info-form">
                        <form class='col-6' action="" method="post" role="form">
                            <div class="form-group">
                                <!-- <label for="exampleInputEmail1">Email address</label> -->
                                {{ Form::label('text', 'Club Name') }}
                                {{ Form::text('text', Input::old('text'), array('name'=>'club_name','id' => 'clubName', 'class' => "form-control", 'placeholder' => 'SFU Ice Hockey Club')) }}
                                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                            </div>
                            <div class="form-group">
                                {{ Form::label('text', 'Club Description') }}
                                {{ Form::text('textarea', Input::old('textarea'), array('name'=>'information', 'class' => "form-control", 'rows'=>'5' ,'id' => 'clubDescription',  'placeholder' => 'Description')) }}    
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
