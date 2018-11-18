@extends('main_layout')
@section('content')

@if($clubs!='')
<!-- <table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Administer ID</th>
            <th scope="col">Description</th>
            <th scope="col">Detail</th>
        </tr>
    </thead>
    <tbody>
        @foreach($clubs as $club)
        <tr>
            <th scope="row">{{$club['id']}}</th>
            <td>{{$club['club_name']}}</td>
            <td>{{$club['president_id']}}</td>
            <td>{{$club['information']}}</td>
            <td>
            <form method= "post" action="/clubpage/{{$club->id}}">
            <input type="hidden" name="_token" value="{{ csrf_token()}}">
            <input type = "submit" value = "See details">
            </form>
            <td>
        </tr>
        @endforeach
    </tbody>
</table> -->
            @foreach($clubs as $club)
                    <div class="club-item post-item">
						<div class="clearfix">
							<!-- <div class="col-sm-4">
								<img class="img-responsive" src="" alt="">
							</div> -->
							<div class="col-sm-8">
								<h2 class="club-title">{{$club['club_name']}}</h2>
								<div class="post-content">
									<p>{{$club['information']}}</p>
								</div>
								<div class="club-details">
																												<div>
											<span><em>Administer ID: </em></span>{{$club['president_id']}}</div>
																												<div>
											<span><em>Website: </em></span><a href="http://">http://</a>
										</div>
																	</div>
								<div class="club-join">
									<a href="#" class="btn alt">Join Club</a>
								</div>
							</div>
						</div>
					</div>
                @endforeach

@else
<div>
<p>result not found</p>
</div>
@endif

</div>
@endsection