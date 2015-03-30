<?php

Route::get('/', 'StoryController@getRanked');
Route::get('home', 'StoryController@getRanked');


//==========
// General Page Loads
//==========

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
Route::get('/deleteComment', 'commentController@delete');
Route::get('/getComment', 'commentController@getCommentById');
Route::get('/allCommentsByStory', 'CommentController@getAllByStory');
Route::get('/getusernames', 'StoryController@getUsernames');

//users
Route::get('/profile/{user_id}', 'UserController@getProfile');

//random
Route::get('/randomOngoing', 'StoryController@randomOngoing');
Route::get('/randomArchive', 'StoryController@randomArchived');


//=========
// Voting
//=========

//story
Route::get('/storyUpvote', 'StoryController@upvote');
Route::get('/storyDownvote', 'StoryController@downvote');

//comments
Route::get('/commentUpvote', 'CommentController@upvote');
Route::get('/commentDownvote', 'CommentController@downvote');

//seeds
Route::get('/seedUpvote', 'SeedController@upvote');
Route::get('/seedDownvote', 'SeedController@downvote');

//users
Route::get('/userUpvote', 'UserController@upvote');
Route::get('/userDownvote', 'UserController@downvote');


Route::get('/signup', function(){
	return view('signup');
});


Route::get('/login', function(){
	return view('auth.login');
});


// Auth
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('/aboutUs', function(){
	return view('aboutUs');
});
Route::get('/faq', function(){
	return view('faq');
});


Route::get('/eod', 'EODController@EOD');