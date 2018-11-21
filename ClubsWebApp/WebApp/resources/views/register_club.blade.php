@extends('main_layout')

@section('header')
    @include('partials.header', ['header'=>'Register a new club'])
@endsection


@section('errors')
    @if($errors->any())
        @include('errors.errors', $errors)
    @endif
@endsection

@section('content')
    <div id="container" class="container">
        <div class="row">
            <form class="col-10 offset-1 text-center" action="" method="post" role="form">
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
</section>



@endsection
