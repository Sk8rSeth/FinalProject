@extends('nonStory')

@section('title')
SEEDS!!!!
@stop

@section('main_content')
	<div class="label">Scifi</div>
	<ul class="scifi seed_genres">
		@foreach ($scifi as $s)
			<a href="/seeds/{{$s['seed_id']}}"><li>{{substr($s['seed_body'],0,60) . "..." }}</li></a>
		@endforeach
	</ul>
	<div class="label">Fantasy</div>
	<ul class ="fantasy seed_genres">
		@if (count($fantasy) > 0)
			@foreach ($fantasy as $f)
				<a href="/seeds/{{$f['seed_id']}}"><li>{{substr($f['seed_body'],0,60) . '...' }}</li></a>
			@endforeach
		@else
			There Are No Seeds For This Genre Yet.
		@endif
	</ul>
	<div class="label">Mystery</div>
	<ul class="mystery seed_genres">
		@if (count($mystery) > 0)
			@foreach ($mystery as $m)
				<a href="/seeds/{{$m['seed_body']}}"><li>{{substr($m['seed_body'],0,60) . '...' }}</li></a>
			@endforeach
		@else
			There Are No Seeds For This Genre Yet.
		@endif
	</ul>
	<div class="label">Horror</div>
	<ul class="horror seed_genres">
		@if (count($horror) > 0)
			@foreach ($horror as $h)
				<a href="/seeds/{{$h['seed_body']}}"><li>{{substr($h['seed_body'],0,60) . '...' }}</li>
			@endforeach
		@else
			There Are No Seeds For This Genre Yet.
		@endif
	</ul>
	<div class="label">Drama</div>
	<ul class="drama seed_genres">
		@if (count($drama) > 0)
			@foreach ($drama as $d)
				<a href="/seeds/{{$d['seed_body']}}"><li>{{substr($d['seed_body'],0,60) . '...' }}</li>
			@endforeach
		@else
			There Are No Seeds For This Genre Yet.
		@endif
	</ul>
	<div class="label">Other</div>
	<ul class="other seed_genres">
		<li>ShortShort Seeds</li>
		<li>OverArching Plotlines</li>
	</ul>
@stop
