<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Stori</title>
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<script src="{{ URL('js/main.js') }}"></script>
	<link rel="stylesheet" href="http://necolas.github.io/normalize.css/3.0.2/normalize.css">
	<link rel="stylesheet" href="{{ URL('css/styles.css') }}">
</head>
<body>
	<div>
		<div class="hero">
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
				<div class="login">Login
					<div class="displayNone">
						<div class="login_label">Username</div>
						<input type="text" name="username">
						<div class="login_label">Password</div>
						<input type="password" name="password">
						<a href="/signup">Or Signup</a>
						<button>login</button>
					</div>
				</div>
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
			<div class="featureblock">
				<div class="block_container">
					@section('main_content')

					@show
				</div>
			</div>
		</main>
		<footer>
			footer things!!
		</footer>
	</div>
</body>
</html>