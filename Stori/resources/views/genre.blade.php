@extends('nonStory')

@section('title')
{Genre}
@endsection

@section('main_content')
	<div class="label">Top 5</div>
	<ul>
		<li>1title1</li>
		<li>2title2</li>
		<li>3title3</li>
		<li>4title4</li>
		<li>5title5</li>
	</ul>
	<div class="label">All Alphabetical</div>
	<ul>
		{list_template}
	</ul>
@endsection