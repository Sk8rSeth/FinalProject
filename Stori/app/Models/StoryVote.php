<?php 
namespace App\Models;
use DB;
use App\Library\SQL;
use App\Models\Model;

class StoryVote extends Model {
	protected static $table = 'story_vote';
	protected static $key = 'story_id';

	public static function getVote($user_id, $story_id) {
		$sql = "SELECT vote FROM " . static::$table . 
				" WHERE story_id = :story_id 
				AND user_id = :user_id";

		$vals = [
			"user_id" => $user_id,
			"story_id" => $story_id
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

	public static function addVote($user_id, $story_id, $vote) {
		$sql = "INSERT INTO story_vote VALUES (:user_id, :story_id, :vote)";
		$vals = [
			"story_id" => $story_id,
			"user_id" => $user_id,
			"vote" => $vote
		];
		DB::insert($sql, $vals);
		return 'added Vote to table';
	}

	public static function updateVote($user_id, $story_id, $vote) {
		$sql = "UPDATE story_vote
				SET vote = :vote
				WHERE user_id = :user_id 
				AND story_id = :story_id";

		$vals = [
			"story_id" => $story_id,
			"user_id" => $user_id,
			"vote" => $vote
		];
		
		DB::update($sql, $vals);
		return $vote;
	}
}