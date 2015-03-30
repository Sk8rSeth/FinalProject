<?php
$cp = '';
if (!Auth::guest()) {
	$user_id = Auth::user()->user_id;
	if ($user_id == $user->user_id) {
		$cp = '<div class="label">Controls</div><div class="cp"><a href="#">Edit Username </a> | <a href="#"> Edit Email </a> | <a href="#"> Reset Password</a></div>';
	}
}

?>
@extends('nonStory')

@section('title')
{{$user->username}}
@endsection

@section('main_content')

{!!$cp!!}

<div class="label">Stats</div>
<div class="user_stats">
	<div><strong># of Winners:</strong> {User->score}</div>
	<div><strong>Member Since:</strong> {user->created_at}</div>
	<div><strong>Some other relevent Stat:</strong> and data</div>
</div>

<div class="label">Winners</div>

<div class="comment">
	<div class="score"><div class="comment_score">32</div></div>
	<a href="/story/1"><div class="username">Passing Through- <strong>14</strong></div></a>
	<div class="comment_description">This is where the ocmment that im going to pull from the DB will go</div>
</div>
<div class="comment">
	<div class="score"><div class="comment_score">32</div></div>
	<a href="/story/1"><div class="username">Passing Through- <strong>14</strong></div></a>
	<div class="comment_description">This is where the ocmment that im going to pull from the DB will go</div>
</div>
<div class="comment">
	<div class="score"><div class="comment_score">32</div></div>
	<a href="/story/1"><div class="username">Passing Through- <strong>14</strong></div></a>
	<div class="comment_description">This is where the ocmment that im going to pull from the DB will go</div>
</div>
<div class="comment">
	<div class="score"><div class="comment_score">32</div></div>
	<a href="/story/1"><div class="username">Passing Through- <strong>14</strong></div></a>
	<div class="comment_description">This is where the ocmment that im going to pull from the DB will go</div>
</div>
<div class="comment">
	<div class="score"><div class="comment_score">32</div></div>
	<a href="/story/1"><div class="username">Passing Through- <strong>14</strong></div></a>
	<div class="comment_description">This is where the ocmment that im going to pull from the DB will go</div>
</div>

@endsection