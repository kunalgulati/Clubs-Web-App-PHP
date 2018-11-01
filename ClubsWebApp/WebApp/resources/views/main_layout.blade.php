<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
		<link rel="stylesheet" href="{{ URL::asset("css/layout.css") }}">
        <link rel="stylesheet" href="{{ URL::asset("css/app.css") }}">
        <script src="{{ URL::asset("js/app.js") }}"></script>
    </head>
    <body> 
		<nav class="navbar navbar-expand-lg bg-primary navbar-dark">
			<a class="navbar-brand " href=""><span id="home-logo" class="oi oi-home"></span>SFU Sports Clubs</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<ul class="navbar-nav">
				<li class="nav-item active">
					<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Features</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Pricing</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Dropdown link
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
					<a class="dropdown-item" href="#">Action</a>
					<a class="dropdown-item" href="#">Another action</a>
					<a class="dropdown-item" href="#">Something else here</a>
					</div>
				</li>
				</ul>
			</div>
			</nav>

        @yield('content')
    </body>
</html>
