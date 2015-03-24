<?php 
namespace App\Models;
use DB;
use App\Library\SQL;
use App\Models\Model;

class User extends Model {
	protected static $table = 'user';
	protected static $key = 'user_id';

	public static function getUsernames($story_id) {
		$vars = [
			'story_id' => $story_id
		];
		$sql = "SELECT username, comment_id
				FROM user
				JOIN comment
				WHERE user.user_id = comment.user_id
				AND story_id = :story_id
				AND in_story = 1";

		$usernames = DB::select($sql, $vars);
		return $usernames;
	}
}