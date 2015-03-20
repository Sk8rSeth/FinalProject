<?php namespace App\Http\Controllers;

use DB;
use Auth;

class UserController extends Controller {

	public function checkLogin() {
		if (Auth::check()) {
			
		} else {
			return '0';
		}
	}
	
}