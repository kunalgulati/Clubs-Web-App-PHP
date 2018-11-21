@extends('main_layout')
@section('content')

<div class="row">
    <div class="col-8 offset-2">
        <h1 class="header1">Events of your clubs</h1>
        @foreach($events as $event)
            <div class="card col-md-6 mt-5 mb-5" style='height: auto;'>
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
            </div>
        @endforeach            
    </div>
</div>

@endsection
