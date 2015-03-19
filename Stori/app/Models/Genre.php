<?php 
namespace App\Models;
use DB;
use App\Library\SQL;
use App\Models\Model;

class Genre extends Model {
	protected static $table = 'genre';
	protected static $key = 'genre_id';
}