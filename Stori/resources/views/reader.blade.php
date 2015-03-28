@extends('layout')

@section('title')
{{ $seed->title }}
@endsection

@section('story_header')
	<div class="story_title">{{ $story->number_comments }} Comments</div>
	<div class="story_score"story-id="{{$story->story_id}}"><i class="fa fa-sort-asc {{$upSelected}}" user-id="<?php if(Auth::guest()) {echo "";}else{echo Auth::user()->user_id;}?>"></i><span>{{ $story->score }}</span><i class="fa fa-sort-desc {{$downSelected}}" user-id="<?php if(Auth::guest()) {echo "";}else{echo Auth::user()->user_id;}?>"></i></div>
	<div class="hover_info displayNone">
		<div class="hover_label">Author: </div>
		<div class="hover_username">{{ $user->username }}</div>
		<div class="hover_label">Char Count: </div>
		<div class="hover_length"></div>
		<div class="hover_label">Date Commited: </div>
		<div>{{ substr($seed->created_at, 0, 10) }}</div>
	</div>
	<div class="story">
		<p>
			<div class="seed"><span class="lineNumber">seed</span>{!! $seed->seed_body !!}</div>
				<?php $i = 2; ?>
			@foreach ($comments->getArray() as $comment) 
				<div comment-id="{{$comment->comment_id}}"><span class="lineNumber">{{$i}} </span> {!! $comment->comment_body !!} </div>
				<?php $i++; ?>
			@endforeach
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


@section('comments')
<?php
use App\Models\CommentVote;
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
			$CommentVote = CommentVote::getVote(Auth::user()->user_id, $comm->comment_id);
			if (is_null($CommentVote)) {
			} elseif ($CommentVote == 'up') {
				$upComm = 'selected';
			} elseif ($CommentVote == 'down') {
				$downComm = 'selected';
			}
		} 
		$comment = '<div class="comment reader" comment-id="' . $comm->comment_id . '">
			<div class="score"><div class="fa fa-sort-asc ' .$upComm .'" user-id="' . $cust_id . '"></div><div class="comment_score">' . $comm->score . '</div><div class="fa fa-sort-desc '.$downComm.'" user-id="' . $cust_id . '"></div></div>
			<div class="username">' . $comm->username . '- <strong>' . $comm->user_score . $delete . '</strong></div>
			<div class="comment_description">' . $comm->comment_body . '</div>
		</div>';

		echo $comment;
	} 
}?>
@endsection

@section('story_stats')
		<h2>- Stats For This Story -</h2>
		<div><strong># of Commits:</strong> {{ $story->number_comments }}</div>
		<div><strong>Start Date:</strong> {{substr($seed->created_at,0,10)}}</div>
		<div><strong>Word Count:</strong> {{ strlen($story->story_body) }}</div>
		<div><strong>Seed By:</strong> {{$user->username}}</div>
@endsection

@section('add_comment')
	<form class="feature_add_comment">
		<textarea wrap='soft' maxlength=140 placeholder="Please Enter A Comment Here..."></textarea>
		<button>Comment</button>
	</form>
@endsection