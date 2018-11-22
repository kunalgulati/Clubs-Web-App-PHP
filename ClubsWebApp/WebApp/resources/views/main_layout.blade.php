<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
		<link rel="stylesheet" href="{{ URL::asset("css/layout.css") }}">
		<link rel="stylesheet" href="{{ URL::asset("css/app.css") }}">
		<link rel="stylesheet" href="{{ URL::asset("css/form.css") }}">
		<script src="{{ URL::asset("js/app.js") }}"></script>

    </head>
    <body> 
		<nav class="navbar navbar-expand-lg bg-primary navbar-dark">
			<a class="navbar-brand" href="/"><span id="home-logo" class="oi oi-home"></span>SFU Sports Clubs</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#top-navbar" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse justify-content-between" id="top-navbar">
				<ul class="navbar-nav">
					<li class="nav-item active">
						<a class="nav-link" href="/clubs">Clubs <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Manage Clubs
						</a>
						<div class="dropdown-menu bg-primary dropdown-dark" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="display_expenses" role="button">Expenses</a>
							<a class="dropdown-item" href="display_events" role="button">Events</a>							
							<a class="dropdown-item" href="display_dashboard" role="button">Dashboard</a>							
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Debug Dropdown
						</a>
						<div class="dropdown-menu bg-primary dropdown-dark" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="bootstrap_palette" role="button">Bootstrap Palette </a>
						</div>
					</li>
				</ul>
				<form class="form-inline" method="GET" action="/clubs">
					<span class="oi oi-magnifying-glass-lg my-2 my-sm-0"></span>
					<input class="form-control" type="search" name="search" placeholder="Find a club..." aria-label="Search">
					<button class="btn btn-outline-secondary my-2 my-sm-0" href="/clubs" type="submit">Search</button>
				</form>
				
				@if (!Auth::guest()) <!--logged in-->
					@include('partials.account', ['user' => Auth::user()])
				@else
					<div class="nav-item bg-primary">
						<a class="btn btn-outline-secondary" href="login">
							Log In
						</a>
					</div>
				@endif
			</div>
		</nav>
		<div class="row mt-5">
			<div class="col-8 offset-2">
				@yield('header')
				@yield('new')
				@yield('content')
			</div>
		</div>
    </body>
</html>
