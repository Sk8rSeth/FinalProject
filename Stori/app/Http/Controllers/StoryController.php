<?php namespace App\Http\Controllers;

use App\Models\Story;
use App\Models\Seed;
use App\Models\Genre;
use App\Models\User;
use App\Models\Comment;

use DB;
use Request;

class StoryController extends Controller {

	public function getAll() {
		return view('story_list');
	}

	public function read($story_id) {
		$story = new Story($story_id);
		$seed = new Seed($story->seed_id);
		$user = new User($seed->user_id);
		$g = new Genre($story->genre_id);
		$genre = $g->genre_description;
		$comments = Comment::all(['story_id' => $story_id]);


		return view('reader', ['story' => $story,
								'seed' => $seed, 
								'genre' => $genre, 
								'user' => $user, 
								'comments' => $comments
								]
							);
	}

	public function storyOfGenre($genre_id) {
		return view('genre');
	}

	public function getRanked (){
		$story = Story::getRanked();
		$seed = new Seed($story->seed_id);
		$user = new User($seed->user_id);
		$g = new Genre($story->genre_id);
		$genre = $g->genre_description;
		$comments = Comment::all(['story_id' => $story->story_id]);

		// print_r($seed);

		return view('home', ['story' => $story,
								'seed' => $seed, 
								'genre' => $genre, 
								'user' => $user, 
								'comments' => $comments
								]);
	}

	public function upvote() {
		$user_id = Request::input('user_id');
		$story_id = Request::input('story_id');

		$story = new Story($story_id);
		$new_score = $story->score + 1;


		$vals = [
			'new_score' => $new_score,
			'story_id' => $story_id
		];

		$sql = "UPDATE story 
				SET score = :new_score 
				WHERE story_id = :story_id";

		DB::update($sql, $vals);
 		
		return $new_score;
	}

	public function downvote() {
		$user_id = Request::input('user_id');
		$story_id = Request::input('story_id');

		$story = new Story($story_id);
		$new_score = $story->score - 1;


		$vals = [
			'new_score' => $new_score,
			'story_id' => $story_id
		];

		$sql = "UPDATE story 
				SET score = :new_score 
				WHERE story_id = :story_id";

		DB::update($sql, $vals);
 		
		return $new_score;
	}
}