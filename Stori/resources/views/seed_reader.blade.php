@extends('layout');

@section('title')
{{$seed->title}}
@endsection

@section('story_header')
	<div class="story_score" seed-id="{{$seed->seed_id}}"><i class="fa fa-sort-asc {{$upSelected}}" user-id="<?php if(Auth::guest()) {echo "";}else{echo Auth::user()->user_id;}?>"></i><span>{{ $seed->score }}</span><i class="fa fa-sort-desc {{$downSelected}}" user-id="<?php if(Auth::guest()) {echo "";}else{echo Auth::user()->user_id;}?>"></i></div>
	<div class="seed_story">
		<p>
			<div class="seed"><span class="lineNumber">seed</span>{!! $seed->seed_body !!}</div>
		</p>
	</div>
@endsection

@section('info_menu')
<div class="info_label">Genre</div>
<p>- Sci-Fi -</p>
<div class="info_label">Rules</div>
<p>
	<div>- Keep On Topic</div>
	<div>- Curse Only When Appropriate</div>
	<div>- Keep In The Spirit Of The Story</div>
</p>
<div class="info_label">More</div>
<p>
	this is a student project by Seth Howell.
	<div>&copy; 2015</div> 
	<a href="/aboutUs">About Us</a> |
	<a href="/FAQ">FAQ</a>
</p>
@endsection

@section('story_stats')
		<h2>- Info For This Seed -</h2>
		<div><strong>Genre: </strong>{{$seed->genre_id}}</div>
		<div><strong>Submitted Date:</strong> {{substr($seed->created_at,0,10)}}</div>
		<div><strong>Word Count:</strong> {{ str_word_count($seed->seed_body) }}</div>
		<div><strong>Started By:</strong> <a href="/profile/{{$seed->user_id}}">{user->username}</a></div>
@endsection