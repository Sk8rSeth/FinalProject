@extends('nonStory')

@section('title')
Create An Account
@endsection

@section('main_content')
	<form action="/auth/register" method="POST">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="label">First Name</div>
		<input type="text" name="first_name">

		<div class="label">Last Name</div>
		<input type="text" name="last_name">

		<div class="label">Username</div>
		<input type="text" name="username">

		<div class="label">Password</div>
		<input type="password" name="password">

		<div class="label">Confirm Password</div>
		<input type="password" name="password_confirmation">

		<div class="label">Email</div>
		<input type="email" name="email">
		
		<button>Submit</button>
	</form>
@endsection