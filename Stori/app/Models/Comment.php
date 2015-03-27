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

	public static function getEOD($story_id) {
		$sql = "SELECT * FROM comment 
				WHERE story_id = :story_id
				AND assessed = 0 
				AND in_story = 0
				ORDER BY score desc";
		$vals = [
				":story_id" => $story_id
				];
		$comments = DB::select($sql, $vals);

		//update comments
		foreach ($comments as $comment) {
			$CommSQL = "UPDATE comment SET assessed = 1 WHERE comment_id = :comment_id";
			$vals = ['comment_id'=>$comment->comment_id]; 
			DB::update($CommSQL, $vals);
		}

		if (count($comments) > 0 ){
			//select top comment 
			$topComment = $comments[0];

			return (['topComment'=>$topComment, 'story_id'=>$story_id]);
		} else {
			return NULL;
		}
	}

	public static function updateEOD($comment_id) {
		$sql = "UPDATE comment
				SET in_story = 1
				WHERE comment_id = :comment_id";
		$vals = [
				'comment_id' => $comment_id
				];
		DB::update($sql,$vals);
	}
}