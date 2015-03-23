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
			$my_errors[$key] = $errors->get($key)[0];
		}
	?>	
	@endif
	<form action="/auth/login" method="POST">
	<input type="hidden" class="token" name="_token" value="{{ csrf_token() }}">

		<div class="label">Username</div>
		<input type="text" name="username">

		<div class="label">Password</div>
		<input type="password" name="password">

		<button>Submit</button>
	</form>
@endsection