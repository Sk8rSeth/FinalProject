@extends('layout')

@section('title')
Highest Ranking Story Of The Day!
@stop

	@section('story_header')
		<a href="/story/{{$story->story_id}}"><div class="story_title">{{$seed->title}}</div></a>
		<div class="story_score" story-id="{{$story->story_id}}"><i class="fa fa-sort-asc" user-id="<?php if(Auth::guest()) {echo "";}else{echo Auth::user()->user_id;}?>"></i><span>{{$story->score}}</span><i class="fa fa-sort-desc" user-id="<?php if(Auth::guest()) {echo "";}else{echo Auth::user()->user_id;}?>"></i></div>
		<a href="/story/{{$story->story_id}}">
			<div class="feature_story">
				<p class="phone_story">{!!$story->story_body!!}</p>
				<p class="full_story">
					<div class="full_story">{{ $seed->seed_body }}</div>
					@foreach ($comments->getArray() as $comment) 
						<div class="full_story" comment-id="{{$comment->comment_id}}">{!! $comment->comment_body !!} </div>
					@endforeach
				</p>
			</div>
		</a>
		@endsection

	@section('comments')
	<?php foreach ($ongoing_comments as $comm) {
		if(Auth::guest()) {
			$cust_id = '';
		} else {
			$cust_id = Auth::user()->user_id;
		}
		$comment = '<div class="comment" comment-id="' . $comm->comment_id . '">
			<div class="score"><div class="fa fa-sort-asc" user-id="' . $cust_id . '"></div><div class="comment_score">' . $comm->score . '</div><div class="fa fa-sort-desc" user-id="' . $cust_id . '"></div></div>
			<div class="username">'.$comm->username.'- '.$comm->user_score.'</div>
			<div class="comment_description">'.$comm->comment_body.'</div>
		</div>';
		echo $comment;
	} ?>

	@endsection

	@section('story_stats')
			<h2>- Stats For This Story -</h2>
			<div><strong># of Commits:</strong> 232</div>
			<div><strong>Start Date:</strong> 2015.03.14</div>
			<div><strong>Word Count:</strong> 2304</div>
			<div><strong>Seed By:</strong> Sk8rSeth</div>
	@endsection
	
	@section('add_comment')
		<form class="feature_add_comment">
			<textarea maxlength=140 placeholder="Please Enter A Comment Here..."></textarea>
			<button>Comment</button>
		</form>
	@endsection

