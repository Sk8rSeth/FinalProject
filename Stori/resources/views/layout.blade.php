<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Stori</title>
	<link rel="stylesheet" href="http://necolas.github.io/normalize.css/3.0.2/normalize.css">
	<link rel="stylesheet" href="{{ URL('css/styles.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('fonts/font-awesome/css/font-awesome.min.css') }}">
</head>
<body>
	<div>
		<div class="hero">
		<div class="phone_menu"><i class="fa fa-bars"></i>
			<div class="displayNone">
				@if (Auth::guest())
				<a href="/login">
					<div>Login</div>
				</a>
				<a href="/signup">
					<div>Signup</div>
				</a>
				@else
				<a href="/auth/logout">
					<div>Logout</div>
				</a>
				<a href="/profile">
					<div>Profile</div>
				</a>
				@endif
				<a href="/story">
					<div>Browse</div>
				</a>
				<a href="/archive">
					<div>Archives</div>
				</a>
			</div>	
		</div>
			<nav>
				<div class="info_menu">Info
					<div class="displayNone">
						<div class="info_label">Rules:</div>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium, odio.</p>
						<div class="info_label">{genre?//descrptn?}</div>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium, odio.</p>
						<div class="info_label">{setting?}</div>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium, odio.</p>
					</div>
				</div>
				@if (Auth::guest())
						@if(count($errors) > 0)
							<span class="head-error">Whoops!</span>
							<div class="main-error">There were some problems with your input.</div>
					 	<?php
							foreach($errors->keys() as $key) {
								$my_errors[$key] = $errors->get($key)[0];
							}
							print_r($errors);
						?>
						@endif
				<div class="login">Login
					<div class="displayNone">
						<form role="form" action="/auth/login" method="POST">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="login_label">Username</div>
							<input type="text" id="username" name="username">
							<div class="login_label">Password</div>
							<input type="password" name="password">
							<a href="/signup" class="signup">Or Signup</a>
							<button>login</button>
						</form>
					</div>
				</div>
				@else
				<div class="login"><i class="fa fa-user"></i> {{Auth::user()->username}}
					<div class="displayNone">
						<a href="/profile"><div class="login_label">Profile</div></a>
						<div>view your profile</div>
						<a href="/auth/logout"><div class="login_label">Logout</div></a>
						<div>or logout forever...</div>
					</div>
				</div>
				@endif
				<a href="/story"><div class="options browse">Browse Stories</div></a>
				<div class="logo"><a href="/">Stori</a></div>
				<a href="/archive"><div class="options archive">Archives</div></a>
			</nav>
			<h2 class="title">
				@section('title')
				@show
			</h2>
			<aside>
				<a href="/story"><div class="stories">Stories - </div></a>
				<a href="/seeds"><div class="seeds">Seeds - </div></a>
				<a href="/"><div class="feature1">Feature1 - </div></a>
				<a href="/"><div class="feature2">Feature2 - </div></a>
				<a href="/"><div class="feature3">Feature3 - </div></a>
			</aside>
		</div>
		<main>
			@section('main_content')
			<div class="featureblock">
				<div>
					@section('story_header')
					@show

					<div class="feature_comments">
						@section('comments')	
						@show
					</div>

					<div class="stats">
						@section('story_stats')
						@show
					</div>
					@if (Auth::guest()) 
					<div class="plz_login"> Please <a href="/login">Login</a> To Contribute.</div>
					@else
						@section('add_comment')
						@show
					@endif
				</div>
			</div>
			@show
		</main>
		<footer>
			footer things!!
		</footer>
	</div>
</body>
	<script src="{{ URL('js/build.js') }}"></script>
	<script id="template-comment" type="text/x-handlebars-template">
		<div class="comment" comment-id="@{{comment_id}}">
			<div class="score">
				<div class="fa fa-sort-asc" user-id="<?php if(Auth::guest()) {echo "";} else{echo Auth::user()->user_id;}?>"></div>
				<div>
					@{{comment_score}}
				</div>
				<div class="fa fa-sort-desc" user-id="<?php if(Auth::guest()) {echo "";}else{echo Auth::user()->user_id;}?>"></div>
			</div>
			<div class="username">
				@{{username}}- @{{user_score}}
				<div class="delete">
					<i title="Delete Comment" class="fa fa-times"></i>
				</div>
			</div>
			<div class="comment_description">@{{comment_body}}</div>
		</div>
	</script>
</html>