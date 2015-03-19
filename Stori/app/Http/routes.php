<?php

Route::get('/', function(){
	return view('home');
});

Route::get('home', 'HomeController@index');

// story
Route::get('/story', 'StoryController@getAll');
Route::get('/story/{story_id}', 'StoryController@read');

// genre
Route::get('/genre', 'ArchiveController@getGenre');
Route::get('/archivegenre/{genre_id}', 'ArchiveController@ofGenre');
Route::get('/currentgenre/{genre_id}', 'StoryController@storyOfGenre');

//archive
Route::get('/archive', 'ArchiveController@getAll');

//seeds
Route::get('/seeds', 'SeedController@getAll');


//commenting
Route::get('/submitComment', 'commentController@addNew');
Route::get('/getComment', 'commentController@getCommentById');


Route::get('/signup', function(){
	return view('signup');
});

Route::get('/login', function(){
	return view('login');
});

Route::get('/tests', function(){
	return view('nonStory');
});

// Auth
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
