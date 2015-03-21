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
	public static function getTop5All() {
        // SQL
        $sql = "
            SELECT * FROM story ORDER BY score desc LIMIT 5";
        // Get Results
        $results = DB::select($sql);
        // Make Collection
        $collection = new Collection();
        foreach($results as $row) {
            // Create new Model
            $model = new Story();
            $model->setData($row->{Story::$key}, (array)$row);
           
            // Add Model to Collection
            $collection->add($model);
        }
        return $collection;
    }


    public static function getTop5Genre($genre_id) {
        // SQL
        $sql = "
            SELECT * FROM story WHERE genre_id = " . $genre_id . " ORDER BY score desc LIMIT 5";
        // Get Results
        $results = DB::select($sql);
        // Make Collection
        $collection = new Collection();
        foreach($results as $row) {
            // Create new Model
            $model = new Story();
            $model->setData($row->{Story::$key}, (array)$row);
           
            // Add Model to Collection
            $collection->add($model);
        }
        return $collection;
    }
}