<!DOCTYPE>
<html>
<head>
    <title>Displaying Clubs</title>
</head>
<body>
Club List

@foreach($clubs as $club)
    <p>
        <p>{{$club['club_name']}} {{$club['information']}} {{$club['president_id']}}</p>
        <form method= "post" action="/clubpage/{{$club->id}}">
            <input type="hidden" name="_token" value="{{ csrf_token()}}">
            <input type = "submit" value = "See details">
        </form>
    </p>
@endforeach
</body>
</html>