<?php namespace App\Http\Controllers;

class StoryController extends Controller {

	public function getAll() {
		return view('story_list');
	}

	public function read() {
		return view('reader');
	}

	public function storyOfGenre() {
		return view('genre');
	}
}