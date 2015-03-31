<?php namespace App\Http\Controllers;

use App\Models\Seed;
use App\Models\User;
use App\Models\Story;


class SeedController extends Controller {

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

		$seeds = Seed::all()->getArrayDeep();

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

	public function getSeed($seed_id) {
		//selected declarations
		$upSelected = '';
		$downSelected = '';

		$seed = new Seed($seed_id);
		return view('seed_reader',['seed'=>$seed, 'upSelected'=>$upSelected, 'downSelected'=>$downSelected]);
	}

}