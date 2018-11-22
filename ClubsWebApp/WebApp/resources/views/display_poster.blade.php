@extends('main_layout')
@section('content')
<script
	src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/2.3.3/fabric.min.js"></script>

<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script
	src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.8/FileSaver.min.js"></script>
<script
	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script
	src="https://cdnjs.cloudflare.com/ajax/libs/jscolor/2.0.4/jscolor.min.js"></script>


<table style = "float:bottom"class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">title</th>
            <th scope="col">Description</th>
            <th scope="col">json</th>
            <th scope="col">club_id</th>
        </tr>
    </thead>
    <tbody>
            <tr>
                <th scope="row"></th>
                <td>{{$title}}</td>
                <td>{{$description}}</td>
                <td id = 'json'>{{$json}}</td>
                <td></td>
            </tr>
            

    </tbody>
    </table>    
    Title:{{$title}}
    <canvas  id="scanvas" width="1000px" height="1000px"></canvas>    
    Description: {{$description}}

    

    <script>
     $(document).ready(function() {
    var canvas = new fabric.StaticCanvas('scanvas');
     var json = {{$json}};
   
    canvas.loadFromJSON(json, canvas.renderAll.bind(canvas), function(o, object) {
    fabric.log(o, object);
    });
     });
    </script>
@endsection
