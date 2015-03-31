@extends('nonStory')

@section('title')
Create A New Seed!
@endsection

@section('main_content')
	@if (Auth::guest())
	<ul>Please <a href="/login">Login</a> To Contribute.</ul>
	@else 
		<form action="/newSeed/add" method="POST">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" name="user_id" value="{{Auth::user()->user_id}}">
			<div class="label">Genre</div>
				<select name="genre">
					<option value="1">Sci-Fi</option>
					<option value="2">Mystery</option>
					<option value="3">Fantasy</option>
					<option value="4">Horror</option>
					<option value="5">Drama</option>
				</select>
			<div class="label">Story Title</div>
			<input class="seed_title" type="text" name="title" placeholder="Story Title">
			<div class="label">Seed Body</div>
			<textarea name="seed_body" wrap='soft' maxlength=140 placeholder="Please Enter Your Story Idea Here..."></textarea>
			<button>Submit</button>
		</form>
	@endif
@endsection