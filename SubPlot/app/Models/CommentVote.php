<?php 
namespace App\Models;
use DB;
use App\Library\SQL;
use App\Models\Model;

class CommentVote extends Model {
	protected static $table = 'comment_vote';
	protected static $key = 'comment_id';

	//====================================================
	// looks to see if a user has voted on this comment
	//====================================================
	public static function getVote($user_id, $comment_id) {
		$sql = "SELECT vote FROM " . static::$table . 
				" WHERE comment_id = :comment_id 
				AND user_id = :user_id";

		$vals = [
			"user_id" => $user_id,
			"comment_id" => $comment_id
		];

		$vote = '';
		$request = DB::select($sql,$vals);
		if ($request) {
			foreach ($request as $key => $value) {
				$vote = $value->vote;
			}
		} else {
			return NULL;
		}
		return $vote;
	}

	//====================================================
	// if no vote exists, adds an entry into the DB
	//====================================================
	public static function addVote($user_id, $comment_id, $vote) {
		$sql = "INSERT INTO comment_vote VALUES (:user_id, :comment_id, :vote)";
		$vals = [
			"comment_id" => $comment_id,
			"user_id" => $user_id,
			"vote" => $vote
		];
		DB::insert($sql, $vals);
		return $vote;
	}

	//====================================================
	// if DB entry exists, updates it up or down
	//====================================================
	public static function updateVote($user_id, $comment_id, $vote) {
		$sql = "UPDATE comment_vote
				SET vote = :vote 
				WHERE user_id = :user_id 
				AND comment_id = :comment_id";

		$vals = [
			"comment_id" => $comment_id,
			"user_id" => $user_id,
			"vote" => $vote
		];

		DB::update($sql, $vals);
		return $vote;
	}
}