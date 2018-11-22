@extends('main_layout')

@section('new')
    @include('partials.new', ['href'=>'/register_post', 'text'=>'Post New Dasborad Post'])
@endsection

@section('header')
    @include('partials.header', ['header'=>'Post of Your Clubs'])
@endsection


@section('content')
    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

          @foreach($posts as $post)
            <div class="card mb-4">
              @if($post['type'] =='y')
                
                <div class="embed-responsive embed-responsive-16by9">
                {{$temp=preg_replace("/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
		                      "//www.youtube.com/embed/$2",
                          $post['url'])}}
                    <iframe  src="{!! $temp !!}" allow="encrypted-media" allowfullscreen></iframe>
                </div>
                @else
                  <img class="img-fluid" alt="Responsive image" src="{{$post['url']}}">
              @endif
              <div class="card-body">
                <h2 class="card-title">{{$post['title']}}</h2>
              </div>
            </div>
          @endforeach
            </div>


      </div>

    </div>
@endsection


<style>

.btn .btn-info{
    color: white;
}

@media (min-width: 992px) {
  body {
  }
}

.resp-container {
    position: relative;
    overflow: hidden;
    padding-top: 56.25%;
}

.resp-iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: 0;
}

.img-fluid{
    max-height: 400px;
}
</style>
