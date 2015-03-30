@extends('layout')

@section('title')
The Current Highest Ranked Story!
@stop

@section('info_menu')
<div class="info_label">About</div>
<p>Stori is about creating collaberative short stories wit the community. Be creative, but be mindful that anyone can be reading..</p>
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

@section('story_header')
	<a href="/story/{{$story->story_id}}"><div class="story_title">{{$seed->title}}</div></a>
	<div class="story_score" story-id="{{$story->story_id}}"><i class="fa fa-sort-asc {{$upSelected}}" user-id="<?php if(Auth::guest()) {echo "";}else{echo Auth::user()->user_id;}?>"></i><span>{{$story->score}}</span><i class="fa fa-sort-desc {{$downSelected}}" user-id="<?php if(Auth::guest()) {echo "";}else{echo Auth::user()->user_id;}?>"></i></div>
	<a href="/story/{{$story->story_id}}">
		<div class="feature_story">
			<p class="phone_story">{!!$story->story_body!!}</p>
			<p class="full_story">
				<div class="full_story seed">{{ $seed->seed_body }}</div>
				@foreach ($comments->getArray() as $comment) 
					<div class="full_story" comment-id="{{$comment->comment_id}}">{!! $comment->comment_body !!} </div>
				@endforeach
			</p>
		</div>
	</a>
	@endsection

	@section('comments')
	<?php
	if (count($ongoing_comments) < 1) {
		echo '<div class="noComments">There Are No Comments For This Story Yet Today</div>';
	} else {
		foreach ($ongoing_comments as $comm) {
			if(Auth::guest()) {
				$cust_id = '';
				$delete = '';
			} else {
				$cust_id = Auth::user()->user_id;
				$delete = '';
				if($cust_id == $comm->user_id) {
					$delete = '<div class="delete">
							<i title="Delete Comment" class="fa fa-times"></i>
							</div>';
				}
			} 
			$comment = '<div class="comment" comment-id="' . $comm->comment_id . '">
				<div class="score"><div class="fa fa-sort-asc" user-id="' . $cust_id . '"></div><div class="comment_score">' . $comm->score . '</div><div class="fa fa-sort-desc" user-id="' . $cust_id . '"></div></div>
				<a href="/profile/'.$comm->user_id.'"><div class="username">' . $comm->username . '-</a> <strong>' . $comm->user_score . $delete . '</strong></div>
				<div class="comment_description">'.$comm->comment_body.'</div>
			</div>';
			echo $comment;
		} 
	}?>

	@endsection

	@section('story_stats')
			<h2>- Stats For This Story -</h2>
			<div><strong># of Commits:</strong> {{$story->number_comments }}</div>
			<div><strong>Start Date:</strong> {{substr($seed->created_at,0,10)}}</div>
			<div><strong>Word Count:</strong> {{ strlen($story->story_body) }}</div>
			<div><strong>Seed By:</strong> {{$user->username}}</div>
	@endsection
	
	@section('add_comment')
		<form class="feature_add_comment">
			<textarea maxlength=140 placeholder="Please Enter A Comment Here..."></textarea>
			<button>Comment</button>
		</form>
	@endsection

