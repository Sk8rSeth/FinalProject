@extends('nonStory')

@section('title')
Login
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
	<form action="/auth/login" method="POST">
	<input type="hidden" class="token" name="_token" value="{{ csrf_token() }}">

		<div class="label">Username</div>
		<input type="text" name="username" value="{{ old('username') }}">
			<span class="errors">
				@if(isset($login_errors['username']))
					{{$login_errors['username']}}
				@endif
			</span>
		<div class="label">Password</div>
		<input type="password" name="password">
			<span class="errors">
				@if(isset($login_errors['password']))
					{{$login_errors['password']}}
				@endif
			</span>
		<button>Submit</button>
	</form>
@endsection