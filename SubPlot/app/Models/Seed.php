<?php 
namespace App\Models;
use DB;
use App\Library\SQL;
use App\Models\Model;

class Seed extends Model {
	protected static $table = 'seed';
	protected static $key = 'seed_id';
	
	//====================================================
	// 
	//====================================================
	public static function add($user_id, $genre_id, $title, $seed_body) {
		$sql = "INSERT INTO seed (genre_id, user_id, title, seed_body) 
				VALUES (:genre_id, :user_id, :title, :seed_body)";
		$vals = [
				':genre_id' => $genre_id,
				':user_id' => $user_id,
				':title' => $title,
				':seed_body' => $seed_body
				];

		DB::insert($sql, $vals);

		$last_id = DB::getPdo()->lastInsertId();

		return $last_id;
	}

	public static function allSeeds($where_clause = []) {
        // Create an SQL "WHERE" clause
        $sql_where = Sql::where($where_clause);
        // SQL
        $sql = "
            SELECT * FROM " . static::$table . $sql_where . " ORDER BY score desc";
        // Get Results
        $results = DB::select($sql, $where_clause);
        // Make Collection
        $collection = new Collection();
        foreach($results as $row) {
            // Create new Model
            $model = new static();
            $model->setData($row->{static::$key}, (array)$row);
           
            // Add Model to Collection
            $collection->add($model);
        }
        return $collection;
        
    }
}