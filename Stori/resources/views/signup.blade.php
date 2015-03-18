@extends('nonStory')

@section('main_content')
	<form action="">
		<div class="label">First Name</div>
		<input type="text" name="first_name">
		<div class="label">Last Name</div>
		<input type="text" name="last_name">
		<div class="label">Username</div>
		<input type="text" name="username">
		<div class="label">Password</div>
		<input type="password" name="password">
		<div class="label">Email</div>
		<input type="email" name="email">
		<button>Submit</button>
	</form>
@endsection