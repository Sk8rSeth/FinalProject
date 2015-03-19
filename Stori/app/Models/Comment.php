<?php 
namespace App\Models;
use DB;
use App\Library\SQL;
use App\Models\Model;

class Comment extends Model {
	protected static $table = 'comment';
	protected static $key = 'comment_id';
}