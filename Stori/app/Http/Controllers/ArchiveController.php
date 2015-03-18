<?php namespace App\Http\Controllers;

class ArchiveController extends Controller {

	public function getAll() {
		return view('archive');
	}

	public function getGenre() {
		return view('genre');
	}

	public function ofGenre() {
		return view('genre');
	}

}