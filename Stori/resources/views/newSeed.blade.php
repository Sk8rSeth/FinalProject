@extends('nonStory')

@section('title')
Create A New Seed!
@endsection

@section('main_content')
	@if (Auth::guest())
	<ul>Please <a href="/login">Login</a> To Contribute.</ul>
	@else 
		<form action="/newSeed/add">
			<div class="label">Genre</div>
				<select name="genre">
					<option value="scifi">Sci-Fi</option>
					<option value="mystery">Mystery</option>
					<option value="fantasy">Fantasy</option>
					<option value="horror">Horror</option>
					<option value="drama">Drama</option>
				</select>
			<div class="label">Story Title</div>
			<input class="seed_title" type="text" name="title" placeholder="Story Title">
			<div class="label">Seed Body</div>
			<textarea wrap='soft' maxlength=140 placeholder="Please Enter Your Story Idea Here..."></textarea>
			<button>Submit</button>
		</form>
	@endif
@endsection