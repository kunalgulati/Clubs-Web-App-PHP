@extends('main_layout')
@section('content')

<!DOCTYPE>

@foreach($events as $event)
<div class="card col-md-6 mt-5 mb-5" style='height: auto;'>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="100000" style='height: auto;'>
        <div class="w-100 carousel-inner" role="listbox" >
            <div class="carousel-item active">
                <div class="carousel-caption">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="https://img.icons8.com/color/96/000000/university.png" alt="" class="rounded-circle img-fluid" />
                        </div>
                        <div class="col-sm-9">
                            <h3><b><label>Event Name: </label> {{$event['event_name']}}</h3> 
                            <p><b><label>Description: </label></b> {{$event['description']}}</p>
                            <p> <b><strong>Address: </strong></b> {{$event['room']}}, {{$event['address']}}, {{$event['city']}}</p>
                            <p><label>Date: </label>TODO</p>
                            <a href="delete_event/{{ $event->id }}" class="btn bg-success eventButton">Edit</a>
                            <a href="#" class="btn bg-primary eventButton">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach


@endsection

<style>

#carouselExampleControls{
}

.eventButton{
    color: white;
}

.eventButton:hover{
    color: white;
}

.card {
  margin: 0 auto;
  height: auto;
}
.card .carousel-item {
    min-height: 300px;
    height:auto;
}
.temp{
    margin-top: 20px;
    margin-bottom: 20px;
}
.card .carousel-caption {
  padding: 0;
  right: 0;
  left: 0;
  color: #3d3d3d;
}
.card .carousel-caption h3 {
  color: #3d3d3d;
}
.card .carousel-caption p {
  line-height: 30px;
}
.card .carousel-caption .col-sm-3 {
  display: flex;
  align-items: center;
}
.card .carousel-caption .col-sm-9 {
  text-align: left;
}
.navi a {
    text-decoration:none;
}
a > .ico {
    background-color: grey;
    padding: 10px;
    
}
a:hover > .ico {
    background-color: #666;
}

.slide .carousel slide{
    height: auto;
}
</style>
