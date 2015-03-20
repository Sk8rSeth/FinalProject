@extends('layout')

@section('title')
Highest Ranking Story Of The Day!
@stop

	@section('story_header')
		<a href="/story/{{$story->story_id}}"><div class="story_title">{{$seed->title}}</div></a>
		<div class="story_score" story-id="{{$story->story_id}}"><i class="fa fa-sort-asc" user-id="<?php if(Auth::guest()) {echo "";}else{echo Auth::user()->user_id;}?>"></i><span>{{$story->score}}</span><i class="fa fa-sort-desc" user-id="<?php if(Auth::guest()) {echo "";}else{echo Auth::user()->user_id;}?>"></i></div>
		<a href="/story/{{$story->story_id}}">
			<div class="feature_story">
				<p class="phone_story">{{$story->story_body}}</p>
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
		<div class="comment" comment-id="{{$comment->comment_id}}1">
			<div class="score"><div class="fa fa-sort-asc" user-id="<?php if(Auth::guest()) {echo "";}else{echo Auth::user()->user_id;}?>"></div><div>90</div><div class="fa fa-sort-desc" user-id="<?php if(Auth::guest()) {echo "";}else{echo Auth::user()->user_id;}?>"></div></div>
			<div class="username">Sk8rSeth - 32</div>
			<div class="comment_description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, ullam?</div>
		</div>
		<div class="comment" comment-id="{{$comment->comment_id}}3">
			<div class="score"><div class="fa fa-sort-asc" user-id="<?php if(Auth::guest()) {echo "";}else{echo Auth::user()->user_id;}?>"></div><div>90</div><div class="fa fa-sort-desc" user-id="<?php if(Auth::guest()) {echo "";}else{echo Auth::user()->user_id;}?>"></div></div>
			<div class="username">Sk8rSeth - 32</div>
			<div class="comment_description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, ullam?</div>
		</div>
		<div class="comment" comment-id="{{$comment->comment_id}}2">
			<div class="score"><div class="fa fa-sort-asc" user-id="<?php if(Auth::guest()) {echo "";}else{echo Auth::user()->user_id;}?>"></div><div>90</div><div class="fa fa-sort-desc" user-id="<?php if(Auth::guest()) {echo "";}else{echo Auth::user()->user_id;}?>"></div></div>
			<div class="username">Sk8rSeth - 32</div>
			<div class="comment_description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, ullam?</div>
		</div>
	@endsection

	@section('story_stats')
			<h2>- Stats For This Story -</h2>
			<div><strong># of Commits:</strong> 232</div>
			<div><strong>Start Date:</strong> 2015.03.14</div>
			<div><strong>Word Count:</strong> 2304</div>
			<div><strong>Seed By:</strong> Sk8rSeth</div>
	@endsection
	
	@section('add_comment')
		<div class="feature_add_comment">
			<textarea maxlength=140 placeholder="Please Enter A Comment Here..."></textarea>
			<button>Comment</button>
		</div>
	@endsection

	<script></script>