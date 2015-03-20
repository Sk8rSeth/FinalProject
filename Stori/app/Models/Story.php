<?php 
namespace App\Models;
use DB;
use App\Library\SQL;
use App\Models\Model;

class Story extends Model {
	protected static $table = 'story';
	protected static $key = 'story_id';



	public static function getRanked() {
		//logic to determine highest rated story
		$sql = "SELECT story_id, score 
				FROM story
				ORDER BY score desc
				LIMIT 1";
		$high_story = DB::select($sql);
		$hs = $high_story[0];
		$story = new Story($hs->story_id);
		
		return $story;
	}
}