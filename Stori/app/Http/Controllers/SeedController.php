<?php namespace App\Http\Controllers;

use App\Models\Seed;
use App\Models\User;
use App\Models\Story;
use App\Models\Genre;
use App\Models\SeedVote;

use Request;
use DB;
use Auth;


class SeedController extends Controller {


	//====================================================
	// gets all Seeds for the browse section
	// places each in an array of their own genre w/ switch statement
	//====================================================
	public function getAll() {
		//genre array declaration
		$scifi = [];
		$mystery = [];
		$fantasy = [];
		$horror = [];
		$drama = [];
		$shortShorts = [];
		$longStories = [];
		$others = [];
		$misc = [];

		$seeds = Seed::allSeeds(['times_used' => 0])->getArrayDeep();

		foreach ($seeds as $idx => $seed) {
			switch ($seed['genre_id']) {
				case 1:
					$scifi[] = $seed;
					break 1;
				case 2:
					$mystery[] = $seed;
					break 1;
				case 3:
					$fantasy[] = $seed;
					break 1;
				case 4:
					$horror[] = $seed;
					break 1;
				case 5:
					$drama[] = $seed;
					break 1;				
				case 6:
					$shortShorts[] = $seed;
					break 1; 				
				case 7:
					$longStories[] = $seed;
					break 1;				
				case 8:
					$others[] = $seed;

					break 1;	
				default:
					$misc[] = $seed;
					break 1;
			}
		}

		return view('seed', [
							'scifi' => $scifi,
							'mystery' => $mystery,
							'fantasy' => $fantasy,
							'horror' => $horror,
							'drama' => $drama
							]);
	}

	//====================================================
	// gets a single seed by ID for reading/voting
	//====================================================
	public function getSeed($seed_id) {
		//selected declarations
		$upSelected = '';
		$downSelected = '';

		$seed = new Seed($seed_id);
		$user = new User($seed->user_id);
		$g = new Genre($seed->genre_id);
		$genre = $g->genre_description;

		if (!Auth::guest()) {
			$vote = SeedVote::getVote(Auth::user()->user_id, $seed->seed_id);
			if ($vote == 'up') {
				$upSelected = 'selected';
			} else if (is_null($vote)) {
				$upSelected = '';
				$downSelected = '';
			} else {
				$downSelected = 'selected';
			}
		}

		return view('seed_reader',['seed'=>$seed, 
								'upSelected'=>$upSelected, 
								'downSelected'=>$downSelected,
								'genre'=>$genre,
								'user'=>$user]);
	}

	//====================================================
	// adds new seed to DB on submission
	//====================================================
	public function addNew() {
		$genre = Request::input('genre');
		$title = Request::input('title');
		$seed_body = Request::input('seed_body');
		$user_id = Request::input('user_id');

		$new_seed_id = Seed::add($user_id, $genre, $title, $seed_body);

		return redirect('/seeds/' . $new_seed_id);

	}

	//====================================================
	// upvoting
	//====================================================
	public function upvote() {
		$user_id = Request::input('user_id');
		$seed_id = Request::input('seed_id');
		$seed = new Seed($seed_id);
		$vote = SeedVote::getVote($user_id,$seed_id);
		if (is_null($vote)) {
			$v = SeedVote::addVote($user_id, $seed_id, 'up');
		} else {
			if ($vote != 'up'){
				SeedVote::updateVote($user_id, $seed_id, 'up');
			} else {
				$new_score = $seed->score;
				return (['new_score' => $new_score, 'vote' => $vote]);
			}
		}

		$new_score = $seed->score + 1;


		$vals = [
			'new_score' => $new_score,
			'seed_id' => $seed_id
		];

		$sql = "UPDATE story 
				SET score = :new_score 
				WHERE seed_id = :seed_id";

		DB::update($sql, $vals);
 		
		return (['new_score' => $new_score, 'vote' => $vote]);
	}

	//====================================================
	// downvoting
	//====================================================
	public function downvote() {
		$user_id = Request::input('user_id');
		$seed_id = Request::input('seed_id');
		$seed = new Seed($seed_id);
		$vote = SeedVote::getVote($user_id,$seed_id);
		if (is_null($vote)) {
			$v = SeedVote::addVote($user_id, $seed_id, 'down');
		} else {
			if ($vote != 'down'){
				SeedVote::updateVote($user_id, $seed_id, 'down');
			} else {
				$new_score = $seed->score;
				return (['new_score' => $new_score, 'vote' => $vote]);
			}
		}

		$new_score = $seed->score - 1;


		$vals = [
			'new_score' => $new_score,
			'seed_id' => $seed_id
		];

		$sql = "UPDATE story 
				SET score = :new_score 
				WHERE seed_id = :seed_id";

		DB::update($sql, $vals);
 		
		return (['new_score' => $new_score, 'vote' => $vote]);
	}

}
