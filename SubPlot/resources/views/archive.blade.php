@extends('nonStory')

@section('title')
"Ah yes, The Archives..."
@stop

@section('main_content')
	<div class="label">Genres</div>
	<ul>
		<a href="/archivegenre/1"><li>Scifi</li></a>
		<a href="/archivegenre/2"><li>Horror</li></a>
		<a href="/archivegenre/3"><li>Fantasy</li></a>
		<a href="/archivegenre/4"><li>Drama</li></a>
		<a href="/archivegenre/5"><li>Mystery</li></a>
	</ul>
	<div class="label">Top Five</div>
	<ul>
		@if (count($allTop5) > 0 )
			@foreach ($top5 as $each)
				<li>{!!$each!!}</li>
			@endforeach
		@else
			There Are No Stories In The Archives Yet
		@endif
	</ul>
	<div class="label">Other</div>
	<ul>
		<li>ShortShort Stories</li>
		<li>Long Stories</li>
		<li>Seeds</li>
	</ul>
@stop
