@extends('main_layout')


@section('content')
<head>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>   
	<link rel="stylesheet" href="{{ URL::asset("css/app.css") }}"> 
    <link rel="stylesheet" href="{{ URL::asset("css/layout.css") }}">
    <link rel="stylesheet" href="{{ URL::asset("css/login.css") }}">
    <script src="{{ URL::asset("js/login.js") }}"></script>

</head>
{{ Form::open(array('url' => 'login')) }}

<div class="container" style="top:0px;">
	<h2>For login use email='email@email.com' AND password='password20'</h2>
	<h2>Any other inputs will be rejected</h2>
	<p>
    	{{ $errors->first('email') }}
    	{{ $errors->first('password') }}
	</p>

		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Login</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="" method="post" role="form" style="display: block;">
									<div class="form-group">
    									{{ Form::text('email', Input::old('email'), array('id' => 'username', 'class' => "form-control", 'placeholder' => 'email@email.com')) }}	
										<!-- <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value=""> -->
									</div>
									<div class="form-group">
										{{ Form::password('password', array('id' => 'password', 'class' => "form-control", 'placeholder' => "Password")) }}
									</div>
									<div class="form-group text-center">
										<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
										<label for="remember"> Remember Me</label>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												{{ Form::submit('Submit!', array('id' => 'login-submit', 'class' => "form-control btn btn-login")) }}</p>
											</div>
										</div>
									</div>
									{{ Form::close() }}	

								</form>
								<form id="register-form" action="" method="" role="form" style="display: none;">
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
									</div>
									<div class="form-group">
										<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group">
										<input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="button" onclick='alert("Registeration Feature still in Progress!");' name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

