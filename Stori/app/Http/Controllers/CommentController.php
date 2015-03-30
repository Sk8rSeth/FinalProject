<?php namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use App\Models\Story;
use App\Models\Seed;
use App\Models\CommentVote;

use Request;
use DB;

class CommentController extends Controller {

	public function getAllByStory() {
		$story_id = Request::input('story_id');
		$comments = Comment::fetchOngoing($story_id);

		return ['comments' => $comments];
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

	
	public function upvote() {
		$user_id = Request::input('user_id');
		$comment_id = Request::input('comment_id');
		$comment = new Comment($comment_id);
		$vote = CommentVote::getVote($user_id,$comment_id);
		if (is_null($vote)) {
			$v = CommentVote::addVote($user_id, $comment_id, 'up');
		} else {
			if ($vote != 'up'){
				CommentVote::updateVote($user_id, $comment_id, 'up');
			} else {
				$new_score = $comment->score;
				return (['new_score' => $new_score, 'vote' => $vote]);
			}
		}

		$new_score = $comment->score + 1;


		$vals = [
			'new_score' => $new_score,
			'comment_id' => $comment_id
		];

		$sql = "UPDATE comment 
				SET score = :new_score 
				WHERE comment_id = :comment_id";

		DB::update($sql, $vals);
 		
		return (['new_score' => $new_score, 'vote' => $vote]);
	}

	public function downvote() {
		$user_id = Request::input('user_id');
		$comment_id = Request::input('comment_id');
		$comment = new Comment($comment_id);
		$vote = CommentVote::getVote($user_id,$comment_id);
		if (is_null($vote)) {
			$v = CommentVote::addVote($user_id, $comment_id, 'down');
		} else {
			if ($vote != 'down'){
				CommentVote::updateVote($user_id, $comment_id, 'down');
			} else {
				$new_score = $comment->score;
				return (['new_score' => $new_score, 'vote' => $vote]);
			}
		}

		$new_score = $comment->score - 1;


		$vals = [
			'new_score' => $new_score,
			'comment_id' => $comment_id
		];

		$sql = "UPDATE comment 
				SET score = :new_score 
				WHERE comment_id = :comment_id";

		DB::update($sql, $vals);
 		
		return (['new_score' => $new_score, 'vote' => $vote]);
	}

	public function delete() {
		$comment_id = Request::input('comment_id');
		Comment::deleteComment($comment_id);
		return [$comment_id];
	}
}