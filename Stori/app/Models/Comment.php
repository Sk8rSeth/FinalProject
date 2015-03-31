<?php 
namespace App\Models;

use DB;
use Request;
use App\Library\SQL;
use App\Models\Model;

class Comment extends Model {
	protected static $table = 'comment';
	protected static $key = 'comment_id';

	//====================================================
	// gets all ongoing comments for a single story 
	// returns an array of comment objects
	//====================================================
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

	//====================================================
	// deletes comment from DB 
	// returns nothing
	//====================================================
	public static function deleteComment($comment_id) {
		$vars =  [':comment_id' => $comment_id];
		$sql = "DELETE FROM comment
				WHERE comment_id = :comment_id
				";
		DB::delete($sql, $vars);
	}

	//====================================================
	// only EOD controller calls WITHIN FOREACH
	// gets all ongoing comments by story that havent been assessed yet
	// updates comment table in DB to set all comments to assessed
	// adds 'top comment' as single highest rated comment for that story
	// returns top comment and story id
	//====================================================
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

	//====================================================
	// takes top comment and adds it to story
	// returns nothing
	//====================================================
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