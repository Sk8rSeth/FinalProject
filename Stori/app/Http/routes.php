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


Route::get('/archive', 'ArchiveController@getAll');
Route::get('/seeds', 'SeedController@getAll');


Route::post('/signup/', 'UserController@signup');
Route::get('/signup', function(){
	return view('signup');
});


Route::get('/tests', function(){
	return view('nonStory');
});







Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
