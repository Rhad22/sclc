@extends('layouts.app')

@section('content')
<div class="login-container">
   
    <!-- Page container -->
    <div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

					<!-- Advanced login -->
					<form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
						<div class="panel panel-body login-form">
							<div class="text-center">
								<div>
									<img src="{{asset('images/login_logo.png')}}" alt="" height="170" width="180"> 	
								</div><br>
								<h5 class="content-group">Login to your account </h5>
							</div>

							<div class="form-group has-feedback has-feedback-left {{ $errors->has('email') ? ' has-error' : '' }}">
								    <input type="text" class="form-control" placeholder="Username" id="email" name="email" value="{{ old('email') }}" required autofocus>
								    <div class="form-control-feedback">
									    <i class="icon-user text-muted"></i>
								    </div>
                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
							</div>

							<div class="form-group has-feedback has-feedback-left {{ $errors->has('password') ? ' has-error' : '' }}">
								<input type="password" class="form-control" placeholder="Password" id="password" name="password" required>
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
                                 @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
							</div>

							<div class="form-group login-options">
								<div class="row">
									<div class="col-sm-12 text-right">
										<a href="{{ route('password.request') }}">Forgot password?</a>
									</div>
								</div>
							</div>

							<div class="form-group">
								<button type="submit" class="btn bg-teal btn-block">Login <i class="icon-arrow-right14 position-right"></i></button>
							</div>
						</div>
					</form>
					<!-- /advanced login -->


					<!-- Footer -->
					<div class="footer text-muted text-center">
						&copy; {{ date('Y') }}. <a href="#">Adventist </a> by <a href="#" target="_blank">Team positive, 4C</a>
					</div>
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

    <!-- Core JS files -->
	<script type="text/javascript" src="{{asset('js/plugins/loaders/pace.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/core/libraries/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/core/libraries/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/plugins/loaders/blockui.min.js')}}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="{{asset('js/plugins/forms/styling/uniform.min.js')}}"></script>

	<script type="text/javascript" src="{{asset('js/core/app.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/pages/login.js')}}"></script>

	<script type="text/javascript" src="{{asset('js/plugins/ui/ripple.min.js')}}"></script>
	<!-- /theme JS files --> 
</div>

@endsection
