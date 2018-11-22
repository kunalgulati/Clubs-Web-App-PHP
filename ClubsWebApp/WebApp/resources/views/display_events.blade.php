@extends('main_layout')

@section('new')
    @include('partials.new', ['href'=>'/register_event', 'text'=>'Post New Event'])
@endsection

@section('header')
    @include('partials.header', ['header'=>'Events of your clubs'])
@endsection

@section('content')
@foreach($events as $event)
    
@endforeach
<div class="card">
        <img class="card-img-top" src="https://img.icons8.com/color/96/000000/university.png" alt="Event Banner">
        <div class="card-body">
            <h5 class="card-title">{{$event->name}}</h5>
            <p class="card-text">{{$event->description}}</p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Club: {{$event->getClubName()}}
            <li class="list-group-item">Date: {{$event->date->format('m/d/Y')}}</li>
            <li class="list-group-item">Time: {{$event->date->format('H:i')}}</li>
            <li class="list-group-item">Location: {{$event->room}}</li>
        </ul>
        <div class="card-body">
            <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a>
        </div>
      </div>
@endsection
{{-- <div class="card col-md-6 mt-5 mb-5" style='height: auto;'>
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="100000" style='height: auto;'>
            <div class="w-100 carousel-inner" role="listbox" >
                <!-- Content Start-->
                <div class="carousel-item active">
                    <div class="carousel-caption">
                        <div class="row">
                            <!-- Image -->
                            <div class="col-sm-3">
                                <img src="https://img.icons8.com/color/96/000000/university.png" alt="" class="rounded-circle img-fluid" />
                            </div>
                            <div class="col-sm-9">
                                <h3><b><label>Event Name: </label> {{$event['event_name']}}</h3> 
                                <p><b><label>Description: </label></b> {{$event['description']}}</p>
                                <p> <b><strong>Address: </strong></b> {{$event['room']}}, {{$event['address']}}, {{$event['city']}}</p>
                                <p><label>Date: </label>TODO</p>
                                <a href="#" class="btn bg-success eventButton">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Content End -->
            </div>
        </div>
    </div> --}}