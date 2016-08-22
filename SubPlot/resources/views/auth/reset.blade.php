{{-- @extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Reset Password</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="token" value="{{ $token }}">

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirm Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Reset Password
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
 --}}
@extends('nonStory')

@section('title')
Reset Your Password
@endsection

@section('main_content')
	@if(count($errors) > 0)
		<div class="error">
			<div>
			<i class="fa fa-exclamation left"></i>
			<i class="fa fa-exclamation right"></i>
			<span class="er">Oh Snap!</span>
			<div class="er">Your Login Attempt Sucked.</div>
			</div>
		</div>

	<?php
		foreach($errors->keys() as $key) {
			$login_errors[$key] = $errors->get($key)[0];
		}
	?>
		
	@endif
	<form action="/password/reset" method="POST">
	<input type="hidden" class="token" name="_token" value="{{ csrf_token() }}">
	<input type="hidden" name="token" value="{{ $token }}">

		<div class="label">Email</div>
		<input type="text" name="email" value="{{ old('username') }}">
			<span class="errors">
				@if(isset($login_errors['email']))
					{{$login_errors['email']}}
				@endif
			</span>
		<div class="label">Password</div>
		<input type="password" name="password" value="{{ old('username') }}">
			<span class="errors">
				@if(isset($login_errors['email']))
					{{$login_errors['email']}}
				@endif
			</span>		
		<div class="label">Confirm Password</div>
		<input type="password" name="password_confirmation" value="{{ old('username') }}">
			<span class="errors">
				@if(isset($login_errors['email']))
					{{$login_errors['email']}}
				@endif
			</span>
		<button>Submit</button>
	</form>
@endsection