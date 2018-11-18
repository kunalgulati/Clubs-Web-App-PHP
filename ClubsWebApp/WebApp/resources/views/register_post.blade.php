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
                    <h1 class="display-4">Register your Club Dashboard POST</h1>
                    <p>
                        @if ($errors->any())
                            {{ implode('', $errors->all('<div>:message</div>')) }}
                        @endif
                    </p>
                    <div class="info-form">
                        <form class='col-6' action="" method="post" role="form">
                        <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    {{ Form::label('text', 'Title', array( 'class'=>'input-group-text', 'for' => 'inputGroupSelect01'  )) }}
                                </div>
                                {{ Form::text('textarea', Input::old('text'), array('name'=>'title', 'id' => 'title', 'class' => "form-control", 'placeholder' => 'New Post')) }}
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    {{ Form::label('text', 'Source Type', array( 'class'=>'input-group-text', 'for' => 'inputGroupSelect01'  )) }}
                                </div>
                                <select class="custom-select" id="inputGroupSelect01">
                                    <option selected>Choose...</option>
                                    <option value="1">Youtube</option>
                                    <option value="2">Image</option>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    {{ Form::label('text', 'URL', array( 'class'=>'input-group-text', 'for' => 'inputGroupSelect01'  )) }}
                                </div>
                                {{ Form::text('url', Input::old('url'), array('name'=>'url', 'class' => "form-control", 'rows'=>'5' ,'id' => 'url',  'placeholder' => 'https://www.google.com')) }}    
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    {{ Form::label('text', 'Club Admin Name', array( 'class'=>'input-group-text', 'for' => 'inputGroupSelect01'  )) }}
                                </div>
                                {{ Form::text('textareas', Input::old('text'), array('name'=>'admin', 'id' => 'admin', 'class' => "form-control", 'placeholder' => 'Martin Jackson')) }}
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    {{ Form::label('text', 'Club Name', array( 'class'=>'input-group-text', 'for' => 'inputGroupSelect01'  )) }}
                                </div>
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


