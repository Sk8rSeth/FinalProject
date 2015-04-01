<?php 
namespace App\Models;
use DB;
use App\Library\SQL;
use App\Models\Model;

class SeedVote extends Model {
	protected static $table = 'seed_vote';
	protected static $key = 'seed_id';

	//====================================================
	// 
	//====================================================
	public static function getVote($user_id, $seed_id) {
		$sql = "SELECT vote FROM " . static::$table . 
				" WHERE seed_id = :seed_id 
				AND user_id = :user_id";

		$vals = [
			"user_id" => $user_id,
			"seed_id" => $seed_id
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
	// 
	//====================================================
	public static function addVote($user_id, $seed_id, $vote) {
		$sql = "INSERT INTO seed_vote VALUES (:user_id, :seed_id, :vote)";
		$vals = [
			"seed_id" => $seed_id,
			"user_id" => $user_id,
			"vote" => $vote
		];
		DB::insert($sql, $vals);
		return 'added Vote to table';
	}

	//====================================================
	// 
	//====================================================
	public static function updateVote($user_id, $seed_id, $vote) {
		$sql = "UPDATE seed_vote
				SET vote = :vote
				WHERE user_id = :user_id 
				AND seed_id = :seed_id";

		$vals = [
			"seed_id" => $seed_id,
			"user_id" => $user_id,
			"vote" => $vote
		];
		
		DB::update($sql, $vals);
		return $vote;
	}

	//====================================================
	// 
	//====================================================
	public static function voteHistory($seed_id) {
		$sql = "SELECT * FROM seed_vote 
				WHERE seed_id = :seed_id";
		$vals = [
				'seed_id' => $seed_id
				];
		$votes = DB::select($sql,$vals);

		return $votes;
	}
}