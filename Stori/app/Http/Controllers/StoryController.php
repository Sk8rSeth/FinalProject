<?php namespace App\Http\Controllers;

use App\Models\Story;
use App\Models\Seed;
use App\Models\Genre;
use App\Models\User;
use App\Models\Comment;
use App\Models\StoryVote;
use App\Models\CommentVote;

use DB;
use Request;
use Auth;

class StoryController extends Controller {

	public function getAll() {
		$top5 = Story::getTop5All();
		$top = [];
		foreach ($top5->getArray() as $each) {
			$e = new Seed($each->seed_id);
			$top[] = '<a href="/story/' . $each->story_id . '">' . $e->title . '</a>';
		}

		$allStories = Story::all();
		$viewAll = [];
		foreach ($allStories->getArray() as $story) {
			$t = new Seed($story->seed_id);
			$viewAll[] = '<a href="/story/' . $story->story_id . '">' . $t->title . '</a>';
		}

		return view('story_list', ['allTop5' => $top, 'all' => $viewAll]);
	}

	public function read($story_id) {
		//set vote selected variables
		$upSelected = '';
		$downSelected = '';
		$upComm = '';
		$downComm = '';

		//declarations and creations
		$story = new Story($story_id);
		$seed = new Seed($story->seed_id);
		$user = new User($seed->user_id);
		$g = new Genre($story->genre_id);
		$genre = $g->genre_description;

		//comments to build the story
		$comments = Comment::all(['story_id' => $story_id, 'in_story' => 1]);

		//ongoing comments for the day
		$ongoing_comments = Comment::fetchOngoing($story->story_id);

		//check vote for story
		if (!Auth::guest()) {
			$vote = StoryVote::getVote(Auth::user()->user_id, $story_id);
			if ($vote == 'up') {
				$upSelected = 'selected';
			} else {
				$downSelected = 'selected';
			}
		}



		return view('reader', ['story' => $story,
								'seed' => $seed, 
								'genre' => $genre, 
								'user' => $user, 
								'comments' => $comments,
								'ongoing_comments' => $ongoing_comments,
								'upSelected' => $upSelected,
								'downSelected' => $downSelected,
								'upComm' => $upComm,
								'downComm' => $downComm
								]
							);
	}

	public function storyOfGenre($genre_id) {
		$g = new Genre($genre_id);
		$genre = $g->genre_description;

		$top5 = Story::getTop5Genre($genre_id);
		$top = [];
		foreach ($top5->getArray() as $each) {
			$e = new Seed($each->seed_id);
			$top[] = '<a href="/story/' . $each->story_id . '">' . $e->title . '</a>';
		}

		$allStories = Story::all(['genre_id' => $genre_id]);
		$viewAll = [];
		foreach ($allStories->getArray() as $story) {
			$t = new Seed($story->seed_id);
			$viewAll[] = '<a href="/story/' . $story->story_id . '">' . $t->title . '</a>';
		}
		return view('genre', ['viewAll' => $viewAll, 'genre' => $genre, 'top5' => $top]);
		
	}

	public function getRanked (){
		$story = Story::getRanked();
		$seed = new Seed($story->seed_id);
		$user = new User($seed->user_id);
		$g = new Genre($story->genre_id);
		$genre = $g->genre_description;
		$comments = Comment::all(['story_id' => $story->story_id, 'in_story' => 1]);
		$ongoing_comments = Comment::fetchOngoing($story->story_id);

		$upSelected = '';
		$downSelected = '';

		//check vote for story
		if (!Auth::guest()) {
			$vote = StoryVote::getVote(Auth::user()->user_id, $story->story_id);
			if ($vote == 'up') {
				$upSelected = 'selected';
			} else {
				$downSelected = 'selected';
			}
		}
	
		return view('home', ['story' => $story,
								'seed' => $seed, 
								'genre' => $genre, 
								'user' => $user, 
								'comments' => $comments,
								'ongoing_comments' => $ongoing_comments,
								'upSelected' => $upSelected,
								'downSelected' => $downSelected
								]);
	}

	public function upvote() {
		$user_id = Request::input('user_id');
		$story_id = Request::input('story_id');
		$story = new Story($story_id);
		$vote = StoryVote::getVote($user_id,$story_id);
		if (is_null($vote)) {
			$v = StoryVote::addVote($user_id, $story_id, 'up');
		} else {
			if ($vote != 'up'){
				StoryVote::updateVote($user_id, $story_id, 'up');
			} else {
				$new_score = $story->score;
				return (['new_score' => $new_score, 'vote' => $vote]);
			}
		}

		$new_score = $story->score + 1;


		$vals = [
			'new_score' => $new_score,
			'story_id' => $story_id
		];

		$sql = "UPDATE story 
				SET score = :new_score 
				WHERE story_id = :story_id";

		DB::update($sql, $vals);
 		
		return (['new_score' => $new_score, 'vote' => $vote]);
	}

	public function downvote() {
		$user_id = Request::input('user_id');
		$story_id = Request::input('story_id');
		$story = new Story($story_id);
		$vote = StoryVote::getVote($user_id,$story_id);
		if (is_null($vote)) {
			$v = StoryVote::addVote($user_id, $story_id, 'down');
		} else {
			if ($vote != 'down'){
				StoryVote::updateVote($user_id, $story_id, 'down');
			} else {
				$new_score = $story->score;
				return (['new_score' => $new_score, 'vote' => $vote]);
			}
		}

		$new_score = $story->score - 1;


		$vals = [
			'new_score' => $new_score,
			'story_id' => $story_id
		];
		

		$sql = "UPDATE story 
				SET score = :new_score 
				WHERE story_id = :story_id";

		DB::update($sql, $vals);
 		
		return (['new_score' => $new_score, 'vote' => $vote]);
	}

	public function getUsernames() {
		$story_id = Request::input('story_id');
		$usernamesall = User::getUsernames($story_id);

		return $usernamesall;
	}

	public function randomOngoing() {
		$stories = Story::fetchOngoing();


		return redirect('/Story/' . rand(1,$story));
	}

	public function randomArchived() {
		$stories = Story::fetchArchived();

		return redirect('/Archive/' . rand(1,$story));
	}
}