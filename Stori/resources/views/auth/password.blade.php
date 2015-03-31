@extends('nonStory')

@section('title')
Enter Your Email To Reset Your Password
@endsection

@section('main_content')
<div class="label">Email</div>
<form action="/test" method="POST">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="text" name="email">
	<button>Submit</button>
</form>
@endsection