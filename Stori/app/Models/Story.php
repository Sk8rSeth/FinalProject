<?php 
namespace App\Models;
use DB;
use App\Library\SQL;
use App\Models\Model;

class Story extends Model {
	protected static $table = 'story';
	protected static $key = 'story_id';

	public static function getRanked() {
		// determine highest rated story
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
            SELECT * FROM story WHERE is_alive = 1 ORDER BY score desc LIMIT 5";
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
    public static function getTop5AllArchive() {
        // SQL
        $sql = "
            SELECT * FROM story WHERE is_alive = 0 ORDER BY score desc LIMIT 5";
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
            SELECT * FROM story WHERE genre_id = " . $genre_id . " AND is_alive = 1 ORDER BY score desc LIMIT 5";
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

    public static function getTop5GenreArchive($genre_id) {
        // SQL
        $sql = "
            SELECT * FROM story WHERE genre_id = " . $genre_id . " AND is_alive = 0 ORDER BY score desc LIMIT 5";
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

    public static function fetchOngoing() {
        $sql = "SELECT * FROM story WHERE is_alive = 1";
        $stories = DB::select($sql);
        return $stories;
    }

    public static function fetchArchived() {
        $sql = "SELECT * FROM story WHERE is_alive = 0";
        $stories = DB::select($sql);
        return $stories;
    }

    public static function getEOD() {
        $sql = "SELECT * FROM story WHERE is_alive = 1";

        $stories = DB::select($sql);

        return $stories;
    }

    public static function archiveEOD($story_id) {
        $sql = "UPDATE story 
                SET is_alive = 0 
                WHERE story_id = :story_id";
        $vals = ['story_id'=>$story_id];
        DB::udpate($sql,$vals);
    }
}