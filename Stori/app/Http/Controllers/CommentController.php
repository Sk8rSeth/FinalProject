<?php namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use App\Models\Story;
use App\Models\Seed;

use Request;
use DB;

class CommentController extends Controller {

	public function getAllByStory() {
		$story_id = Request::input('story_id');
		$comments = Comment::all(['story_id' => $story_id, 'assessed' => 0]);
		$username = [];
		$user_score = [];

		foreach ($comments->getArray() as $comment) {
			$user = new User($comment->user_id);
			$username[] = $user->username;
			$user_score[] = $user->score;
		}

		// $allCommentBodies = [];
		// $allComments = [];
		// foreach ($comments->getArrayDeep() as $comment) {
		// 	$allCommentBodies[] = $comment['comment_body'];
		// 	$allComments[] = $comment;
		// }

		return ['comments' => $comments->getArrayDeep(), 'username' => $username, 'user_score' => $user_score];
	}

	public function getCommentById() {
		$comment_id = Request::input('comment_id');
		$comment = new Comment($comment_id);
		$user = new User($comment->user_id);


		return $user->username;
	} 

	public function addNew() {
		$user_id = Request::input('user_id');


		$user = new User($user_id);
		$username = $user->username;
		$user_score = $user->score;

		$comment = new Comment();
		$comment->comment_body = Request::input('comment_body');
		$comment->story_id = Request::input('story_id');
		$comment->user_id = $user_id;
		$comment_id = $comment->save();

		$comment = new Comment($comment_id);

		return['comment' => $comment->getData(), 'username' => $username, 'user_score' => $user_score];


	}

}