<?php namespace App\Http\Controllers;

use App\Models\Story;
use App\Models\Seed;
use App\Models\Genre;
use App\Models\User;
use App\Models\Comment;
use App\Models\StoryVote;
use App\Models\CommentVote;

use DB;
use Request;
use Auth;

class EODController extends Controller {

	public static function EOD() {
		$stories = Story::getEOD();
		$comments = [];
		//construct object filled with topComments for each story w/story id
		foreach ($stories as $story) {
			$comments[] = Comment::getEOD($story->story_id);
		}

		foreach ($comments as $comment) {
			if (!is_null($comment)) {
				//add comments to story
				Comment::updateEOD($comment['topComment']->comment_id);

				//add points to user who had top comment
				User::addPoints($comment['topComment']->user_id);

				//logic to end story based on top comment content
				if ($comment['topComment']->comment_body == '== End ==') {
					Story::archiveEOD($comment['story_id']);
				}
			}
		}
		return 'success';
	}
}