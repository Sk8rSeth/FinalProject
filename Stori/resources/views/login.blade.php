@extends('nonStory')

@section('title')
Login
@endsection

@section('main_content')
	@if(count($errors) > 0)
		<span class="head-error">Whoops!</span>
		<div class="main-error">There were some problems with your input.</div>
	<?php
		foreach($errors->keys() as $key) {
			$login_errors[$key] = $errors->get($key)[0];
		}
	?>	
	@endif
	<form action="/auth/login" method="POST">
	<input type="hidden" class="token" name="_token" value="{{ csrf_token() }}">

		<div class="label">Username</div>
		<input type="text" name="username">
			<span class="errors">
				@if(isset($login_errors['username']))
					Username Is Required Yo
				@endif
			</span>
		<div class="label">Password</div>
		<input type="password" name="password">
				<span class="errors">
					@if(isset($login_errors['password']))
						Password Is Required Yo
					@endif
				</span>
		<button>Submit</button>
	</form>
@endsection