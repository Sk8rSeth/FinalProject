@extends('layout')

@section('title')
{{ $seed->title }}
@endsection

	@section('story_header')
		<div class="story_title">{{ $story->number_comments }} Comments</div>
		<div class="story_score"><span class="fa fa-sort-asc"></span><span>{{ $story->score }}</span><span class="fa fa-sort-desc"></span></div>
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
				<div>{!! $seed->seed_body !!}</div>
				@foreach ($comments->getArray() as $comment) 
					<div comment-id="{{$comment->comment_id}}">- {!! $comment->comment_body !!} </div>
				@endforeach
			</p>
		</div>

	@endsection

	@section('comments')
		<div class="comment">
			<div class="score"><div class="fa fa-sort-asc"></div><div>90</div><div class="fa fa-sort-desc"></div></div>
			<div class="username">Sk8rSeth - 32</div>
			<div class="comment_description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, ullam?</div>
		</div>
		<div class="comment">
			<div class="score"><div class="fa fa-sort-asc"></div><div>90</div><div class="fa fa-sort-desc"></div></div>
			<div class="username">Sk8rSeth - 32</div>
			<div class="comment_description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, ullam?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis accusamus tempora molestiae labore, quae blanditiis! Ipsam veniam, repellat asperiores laudantium!</div>
		</div>
		<div class="comment">
			<div class="score"><div class="fa fa-sort-asc"></div><div>90</div><div class="fa fa-sort-desc"></div></div>
			<div class="username">Minnie - 25</div>
			<div class="comment_description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, ullam?</div>
		</div>
		<div class="comment">
			<div class="score"><div class="fa fa-sort-asc"></div><div>90</div><div class="fa fa-sort-desc"></div></div>
			<div class="username">Sk8rSeth - 32</div>
			<div class="comment_description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, ullam? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae, voluptatem?</div>
		</div>
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