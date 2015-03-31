<?php $login_errors = []; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1 user-scalable=0">
	<title>Stori</title>
	<link rel="stylesheet" href="http://necolas.github.io/normalize.css/3.0.2/normalize.css">
	<link href='http://fonts.googleapis.com/css?family=Quicksand|Dancing+Script:700' rel='stylesheet' type='text/css'>
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
				<div class="info_menu" tabindex = "-1">Info
					<div class="displayNone">
						<div class="info_label">About</div>
						<p>Stori is about creating collaberative short stories wit the community. Be creative, but be mindful that anyone can be reading..</p>
						<div class="info_label">Rules</div>
						<p>
							<div>- Keep On Topic</div>
							<div>- Curse Only When Appropriate</div>
							<div>- Keep In The Spirit Of The Story</div>
						</p>
						<div class="info_label">More</div>
						<p>
							this is a student project by Seth Howell.
							<div>&copy; 2015</div> 
							<a href="/aboutUs">About Us</a> |
							<a href="/FAQ">FAQ</a>
						</p>
					</div>
				</div>
				@if (Auth::guest())
				<div class="login" tabindex = "-1">Login
					<div class="displayNone">
						<form role="form" action="/auth/login" method="POST">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="login_label">Username</div>
							<input type="text" name="username" value="{{ old('username') }}">
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
						<a href="/profile/{{Auth::user()->user_id}}"><div class="login_label">Profile</div></a>
						<div>view your profile</div>
						<a href="/auth/logout"><div class="login_label">Logout</div></a>
						<div>or logout forever...</div>
					</div>
				</div>
				@endif
				<a href="/story"><div class="options browse">Browse Stories</div></a>
				<div class="logo"><a href="/">Stor<span>i</span></a></div>
				<a href="/archive"><div class="options archive">Archives</div></a>
			</nav>
			<h2 class="title">
				@section('title')
				@show
			</h2>
			<aside>
				<a href="/story"><div class="stories">Stories - </div></a>
				<a href="/archive"><div class="feature2">Archives - </div></a>
				<a href="/seeds"><div class="seeds">Seeds - </div></a>
				<a href="/newSeed"><div class="feature1">New Seed- </div></a>
				<a href="/randomOngoing"><div class="feature3">Random - </div></a>
			</aside>
		</div>
		<main>
			<div class="featureblock">
				<div class="block_container browse">
					@section('main_content')

					@show
				</div>
			</div>
		</main>
		<footer>
			<a href="/aboutUs"><div class="footerOptions">About Us</div></a>
			<div class="logo"><a href="/">Stor<span>i</span></a></div>
			<a href="/faq"><div class="footerOptions">F.A.Q.</div></a>
		</footer>
	</div>
</body>
	<script src="{{ URL('js/build.js') }}"></script>
</html>