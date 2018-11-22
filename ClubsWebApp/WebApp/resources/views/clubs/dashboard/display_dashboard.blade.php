@extends('main_layout')

@section('new')
    @include('partials.new', ['href'=>'/register_post', 'text'=>'Post New Dasborad Post'])
@endsection

@section('header')
    @include('partials.header', ['header'=>'Post of Your Clubs'])
@endsection


@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/2.3.3/fabric.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.8/FileSaver.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="/ClubsWebApp/WebApp/resources/js/blackboard.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jscolor/2.0.4/jscolor.min.js"></script>

<script>
    $(document).ready(function(){
    @foreach($club_posters as $poster)
    var canvas = new fabric.StaticCanvas("{{$poster['id']}}");
    var json = document.getElementById("{{$poster['id']}}i").value;
    canvas.loadFromJSON(json, canvas.renderAll.bind(canvas), function(o, object) {
    fabric.log(o, object);
    });
    @endforeach
    });
</script>
<div class="container">
  <div class="row">
    <!-- Blog Entries Column -->
    <div class="col-md-8">
      @foreach($posts as $post)
        <div class="card mb-4">
          @if($post['type'] =='y')
            <div class="embed-responsive embed-responsive-16by9">
              {{$temp=preg_replace("/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
                        "//www.youtube.com/embed/$2", $post['url'])}}
              <iframe  src="{!! $temp !!}" allow="encrypted-media" allowfullscreen></iframe>
            </div>
          @else
            <img class="img-fluid" alt="Responsive image" src="{{$post['url']}}">
        </div>
      @endif
      <div class="card-body">
        <h2 class="card-title">{{$post['title']}}</h2>
      </div>
      @endforeach
    </div>
  </div>
</div>
@foreach($club_posters as $poster)
  <div class="card mb-4">
    <canvas  id="{{$poster['id']}}" height="400px" ></canvas>
    <div class="card-body">
      <h2 class="card-title">{{$poster['title']}}</h2>
      <p class="card-text">{{$poster['description']}}</p>
      <form>
        <input type= 'hidden' name = "json" id="{{$poster['id']}}i" value="{{$poster['json']}}"/>
        <input type= 'hidden' name = "description" value="{{$poster['description']}}"/>
        <input type= 'hidden' name = "title" value="{{$poster['title']}}"/>
      </form>
    </div>
  </div>
@endforeach

<style>
html,body {
    height:100%;
}

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


@endsection
