<?php 
namespace App\Models;

use DB;
use Request;
use App\Library\SQL;
use App\Models\Model;

class Comment extends Model {
	protected static $table = 'comment';
	protected static $key = 'comment_id';


	public static function fetchOngoing($story_id) {
		$vars = [
			'story_id' => $story_id
		];
		$sql = "SELECT comment_id, comment_body, comment.score as score, comment.created_at, username, user_id, user.score as user_score
				FROM comment
				JOIN user
				USING (user_id)
				WHERE story_id = :story_id
				AND user_id = comment.user_id
				AND assessed = 0
				ORDER BY score desc";

		$comments = DB::select($sql, $vars);

		return($comments);
	}

	public static function deleteComment($comment_id) {
		$vars =  [':comment_id' => $comment_id];
		$sql = "DELETE FROM comment
				WHERE comment_id = :comment_id
				";
		DB::delete($sql, $vars);
	}
}