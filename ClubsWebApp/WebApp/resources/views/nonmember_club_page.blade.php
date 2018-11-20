@extends('main_layout')

@section('content')
<div class="container-fluid text-center">    
        <div class="row content">
          <div class="col-sm-2 sidenav">
                <div class="sidenav-list">
                        <p><a href="/about">About</a></p>
                        <p><a href="/photos">Photos</a></p>
                    </div>
          </div>
          <div class="col-sm-8 text-left"> 
            <h1>Welcome to our club</h1>
            <h2>Description<h2>
                <p></p>
            <hr>
            <h3>Announcements</h3>
            <p></p>
          </div>
          <div class="col-sm-2 sidenav">
              <span class="buttons">
                    <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Join Club</button>
              </span>
          </div>
        </div>
      </div>

<footer class="container-fluid text-center">
      <p>For more info check out our Facebook page</p>
</footer>
@endsection
