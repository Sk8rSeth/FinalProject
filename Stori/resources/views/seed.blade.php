@extends('nonStory')

@section('title')
SEEDS!!!! [by title]
@stop

@section('main_content')
	<div class="label">Scifi</div>
	<ul class="scifi seed_genres">
		@if (count($scifi) > 0)
			@foreach ($scifi as $s)
				<a href="/seeds/{{$s['seed_id']}}"><li><span>{{$s['score']. ' -- '. $s['title'] }}</li></a>
			@endforeach
		@else
			There Are No Seeds For This Genre Yet.
		@endif
	</ul>
	<div class="label">Fantasy</div>
	<ul class ="fantasy seed_genres">
		@if (count($fantasy) > 0)
			@foreach ($fantasy as $f)
				<a href="/seeds/{{$f['seed_id']}}"><li>{{$f['score'] .' -- ' .$f['title'] }}</li></a>
			@endforeach
		@else
			There Are No Seeds For This Genre Yet.
		@endif
	</ul>
	<div class="label">Mystery</div>
	<ul class="mystery seed_genres">
		@if (count($mystery) > 0)
			@foreach ($mystery as $m)
				<a href="/seeds/{{$m['seed_id']}}"><li>{{$m['score']. ' -- '. $m['title'] }}</li></a>
			@endforeach
		@else
			There Are No Seeds For This Genre Yet.
		@endif
	</ul>
	<div class="label">Horror</div>
	<ul class="horror seed_genres">
		@if (count($horror) > 0)
			@foreach ($horror as $h)
				<a href="/seeds/{{$h['seed_id']}}"><li>{{$h['score'] .' -- '.  $h['title'] }}</li>
			@endforeach
		@else
			There Are No Seeds For This Genre Yet.
		@endif
	</ul>
	<div class="label">Drama</div>
	<ul class="drama seed_genres">
		@if (count($drama) > 0)
			@foreach ($drama as $d)
				<a href="/seeds/{{$d['seed_id']}}"><li>{{$d['score'] .' -- ' .$d['title'] }}</li>
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
