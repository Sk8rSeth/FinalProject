<?php 
namespace App\Models;
use DB;
use App\Library\SQL;
use App\Models\Model;

class Story extends Model {
	protected static $table = 'story';
	protected static $key = 'story_id';
}