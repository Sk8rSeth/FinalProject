@extends('nonStory')

@section('title')
All The Stories!!
@stop

@section('main_content')
	<div class="label">Genres</div>
	<ul>
		<a href="/currentgenre/1"><li>Scifi</li></a>
		<a href="/currentgenre/2"><li>Horror</li></a>
		<a href="/currentgenre/3"><li>Fantasy</li></a>
		<a href="/currentgenre/4"><li>Drama</li></a>
		<a href="/currentgenre/5"><li>Mystery</li></a>
	</ul>
	<div class="label">Top 5 Ongoing</div>
	<ol>
		@foreach ($allTop5 as $each)
			<li>{!!$each!!}</li>
		@endforeach
	</ol>
	<div class="label">Other</div>
	<ul>
		<a><li>ShortShort Stories</li></a>
		<a><li>Long Stories</li></a>
		<a href="/seeds/"><li>Seeds</li></a>
	</ul>
	<div class="label all_stories">All Active Stories</div>
	<ul class="all_stories displayNone">
		@foreach ($all as $each)
			<li>{!!$each!!}</li>
		@endforeach
	</ul>
@stop
