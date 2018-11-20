@extends('main_layout')

@section('content')
<div class="container-fluid text-center">    
        <div class="row content">
          <div class="col-sm-2 sidenav">
                <div class="sidenav-list">
                    <p><a href="/about">About</a></p>
                    <p><a href="/photos">Photos</a></p>
                    <p><a href="/events">Events</a></p>
                    <p><a href="/members">Members</a></p>
                    <p><a href="/finances">Finances</a></p>
                </div>
            </div>
        <div class="col-sm-8 text-left"> 
          <h1>Welcome to our club</h1>
          <h2>Description<h2>
              <p></p>
          <hr>
          <h3>Announcements</h3>
          <span class="buttons">
                <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Add Announcement</button>
          <p></p>
        </div>
        <div class="col-sm-2 sidenav">
            <span class="buttons">
                <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Delete Club</button>
            </span>
        </div>
      </div>
    </div>

<footer class="container-fluid text-center">
    <p>For more info check out our Facebook page</p>
</footer>
@endsection
