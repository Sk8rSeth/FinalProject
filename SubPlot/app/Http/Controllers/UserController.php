<?php namespace App\Http\Controllers;

use DB;
use Auth;

use App\Models\User;
use App\Models\Comment;
use App\Models\Story;
use App\Models\Seed;

class UserController extends Controller {

	//====================================================
	// checks if a user is Logged in [possibly depricated]
	//====================================================
	public function checkLogin() {
		if (Auth::check()) {
			
		} else {
			return '0';
		}
	}

	//====================================================
	// gets a single user's profile, and their winning comments
	//====================================================
	public function getProfile($user_id) {
		$user = new User($user_id);
		$comments = Comment::all(['user_id' => $user_id]);
		$comment_data = [];

		foreach ($comments as $comment) {
			$story = new Story($comment->story_id);
			$seed = new Seed($story->seed_id);	
		}
		return view('profile', ['user' => $user, 'comments' => $comments, 'comment_data' => $comment_data]);
	}
	
}