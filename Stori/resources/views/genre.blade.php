@extends('nonStory')

@section('title')
~ {{ $genre }} ~
@endsection

@section('main_content')
	<div class="label">Top 5</div>
	<ol>
		@foreach ($top5 as $each)
			<li>{!!$each!!}</li>
		@endforeach
	</ol>
	<div class="label">All Alphabetical</div>
	<ul>
		@foreach ($viewAll as $all)
			<li>{!!$all!!}</li>
		@endforeach
	</ul>
@endsection