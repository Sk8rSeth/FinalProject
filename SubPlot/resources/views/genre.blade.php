@extends('nonStory')

@section('title')
~ {{ $genre }} ~
@endsection

@section('main_content')
	<div class="label">Top 5</div>
	<ol>
		@if (count($top5) > 0 )
			@foreach ($top5 as $each)
				<li>{!!$each!!}</li>
			@endforeach
		@else
			There Are No Stories Here
		@endif
	</ol>
	<div class="label">All Alphabetical</div>
	<ul>
		@if (count($viewAll) > 0)
		@foreach ($viewAll as $all)
			<li>{!!$all!!}</li>
		@endforeach
		@else
			There Are No Stories Here
		@endif
	</ul>
@endsection