<?php namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;

use Request;

class CommentController extends Controller {

	public function getAll() {
		
	}

	public function getCommentById() {
		$comment_id = Request::input('comment_id');
		$comment = new Comment($comment_id);
		$user = new User($comment->user_id);


		return $user->username;
	} 

	public function addNew() {
		
	}

}