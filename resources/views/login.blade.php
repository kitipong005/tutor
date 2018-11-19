@extends('layouts.mainlog')
@section('content')
<div class="limiter">
	<center><h1 style="padding-top:50px;">ระบบลงทะเบียนนักเรียน</h1></center>
		<div class="container-login100">
			<div class="wrap-login100" style="margin-top:-160px;">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="{{ asset('img/LOGO.jpg') }}" alt="IMG" >
				</div>
			<form class="login100-form validate-form" method="post" action="{{ route('login') }}">
				{{ csrf_field() }}
					<span class="login100-form-title">
						ADMIN LOGIN
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="USERNAME">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="PASSWORD">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="#">
							Username / Password?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection