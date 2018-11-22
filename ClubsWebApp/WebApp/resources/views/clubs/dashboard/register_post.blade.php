@extends('main_layout')

@section('header')
    @include('partials.header',['header'=>'Post something to your club'])
@endsection



@section('content')
{{ Form::open(array('url' => 'register_post')) }}
<section id="cover">
    <div id="cover-caption">
        <div id="container" class="container">
            <div class="row">
                <div class="col-sm-10 offset-sm-1 text-center">
                    @if($errors->any())
                        @include('errors.errors',['title'=>'Failed to post!', 'errors'=>$errors])
                    @endif
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
                                {{ Form::select('type', ['y' => 'youtube', 'i' => 'Image'], null, ['id'=>'type', 'class'=>'form-control', 'placeholder' => 'Pick a size...'])}}
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    {{ Form::label('text', 'URL', array( 'class'=>'input-group-text', 'for' => 'inputGroupSelect01'  )) }}
                                </div>
                                {{ Form::text('url', Input::old('url'), array('name'=>'url', 'class' => "form-control", 'rows'=>'5' ,'id' => 'url',  'placeholder' => 'https://www.google.com')) }}    
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    {{ Form::label('text', 'Author Name', array( 'class'=>'input-group-text', 'for' => 'inputGroupSelect01'  )) }}
                                </div>
                                {{ Form::text('textareas', Input::old('text'), array('name'=>'admin', 'id' => 'admin', 'class' => "form-control", 'placeholder' => 'Martin Jackson')) }}
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    {{ Form::label('text', 'Club Name', array( 'class'=>'input-group-text', 'for' => 'inputGroupSelect01'  )) }}
                                </div>
                                {{ Form::select('club_id', Auth::user()->getClubs(), Input::old('club_id'), array('name'=>'club_id', 'class' => "form-control" ,'id' => 'club_id'))}}
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


