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
	<ul>
		<a href="/story/1"><li>1title1</li></a>
		<a href="/story/2"><li>2title2</li></a>
		<a href="/story/311"><li>3title3</li></a>
		<a href="/story/4"><li>4title4</li></a>
		<a href="/story/12"><li>5title5</li></a>
	</ul>
	<div class="label">Other</div>
	<ul>
		<a><li>ShortShort Stories</li></a>
		<a><li>Long Stories</li></a>
		<a href="/seeds/"><li>Seeds</li></a>
	</ul>
@stop
