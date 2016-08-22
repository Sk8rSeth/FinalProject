<?php namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Story;
use App\Models\Comment;
use App\Models\Seed;

class ArchiveController extends Controller {


	//====================================================
	// gets all archived stories for Browse section
	//====================================================
	public function getAll() {
		$top5 = Story::getTop5AllArchive();
		$top = [];
		foreach ($top5->getArray() as $each) {
			$e = new Seed($each->seed_id);
			$top[] = '<a href="/story/' . $each->story_id . '">' . $e->title . '</a>';
		}

		$allStories = Story::all(['is_alive' => 0]);
		$viewAll = [];
		foreach ($allStories->getArray() as $story) {
			$t = new Seed($story->seed_id);
			$viewAll[] = '<a href="/story/' . $story->story_id . '">' . $t->title . '</a>';
		}

		return view('archive', ['allTop5' => $top, 'all' => $viewAll]);
	}

	//====================================================
	// gets all archived stories of a specific genre
	//====================================================
	public function ofGenre($genre_id) {
		$g = new Genre($genre_id);
		$genre = $g->genre_description;

		$top5 = Story::getTop5GenreArchive($genre_id);
		$top = [];
		foreach ($top5->getArray() as $each) {
			$e = new Seed($each->seed_id);
			$top[] = '<a href="/story/' . $each->story_id . '">' . $e->title . '</a>';
		}

		$allStories = Story::all(['genre_id' => $genre_id, 'is_alive' => 0]);
		$viewAll = [];
		foreach ($allStories->getArray() as $story) {
			$t = new Seed($story->seed_id);
			$viewAll[] = '<a href="/story/' . $story->story_id . '">' . $t->title . '</a>';
		}
		return view('genre', ['viewAll' => $viewAll, 'genre' => $genre, 'top5' => $top]);
		
	}

	//====================================================
	// 
	//====================================================
	public function getGenre() {
		return view('genre');
	}

}