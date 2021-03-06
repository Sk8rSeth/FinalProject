$(document).ready(function() {


	//mobile nav bar
	$('.phone_menu').on('click', function(){
		$('.phone_menu > div').toggleClass('displayNone');
	});

	// remove title on scroll
	if ($(window).width() <= 500){	
		$(window).scroll(function(){
	   		if($(window).scrollTop()<18){
	        	$('.title').stop(true,true).fadeIn("slow");
	        	$('.story_score').stop(true,true).fadeIn("slow");
	        	$('.story_title').stop(true,true).fadeIn("slow");
	   		} else {
	        	$('.title').stop(true,true).fadeOut("slow");
	        	$('.story_score').stop(true,true).fadeOut("slow");
	        	$('.story_title').stop(true,true).fadeOut("slow");
			}
		});
	};

	//view all stories toggle
	$('.all_stories').on('click', function(){
		$('.all_stories').removeClass('displayNone');
	});

	//login button drop open
	$('.login').on('click', function() {
		$('.login > div').removeClass('displayNone');
	});
	// $('.login').focusout(function() {
	// 	console.log('oaksokaodka');
	// 	$('.login > div').addClass('displayNone');	
	// })

	//info menu open and close
	$('.info_menu').on('click', function() {
		$('.info_menu > div').removeClass('displayNone');
	});
	$('.info_menu').focusout(function() {
		$('.info_menu > div').addClass('displayNone');
	});

	//===============================================
	// info_menu ajax and on hover
	//===============================================

	//displays comment info on hover
	if ($(window).width() > 499) {
		//get all comments per story
		var CommUsernames = {};
		var sendStory = {story_id: $('.story_score').attr('story-id')}
		//ajax to get comment_id:username
		$.get('/getusernames', sendStory, function (data){
			return CommUsernames = data;
		});
		$('.story div').hover(function(){
			if ($(this).attr('class') !== 'seed') {
				$('.hover_info').removeClass('displayNone');
				$(this).addClass('highlight');

				//filter array of objects by comment_id that i hover over
				var comm_id = $(this).attr('comment-id');
				var username_array = CommUsernames.filter(function(o){
					return o.comment_id == comm_id;
				})
				// replace hover_info username
				$('.hover_username').text(username_array[0].username);

				var comment_length = $(this).text().length;
				$('.hover_length').text(comment_length);
			} 
		}, function() {
				$('.hover_info').addClass('displayNone');
				$(this).removeClass('highlight');
				$('.hover_username').text();
			}
		);
	};

	//=============================================
	// Comment Submission / Deletion 
	// ============================================

	// submission
	function renderComment(data){
		var source = $('#template-comment').html();
		var template = Handlebars.compile(source);
		var output = template({
			comment_body: data.comment.comment_body,
			comment_score: data.comment.score,
			comment_id: data.comment.comment_id,
			username: data.username,
			user_score: data.user_score,

		});
		return output;	
	};

	// Comment AJAX submission
	$('form.feature_add_comment').on('submit', function(event) {
		event.preventDefault();
		var sendData = {
			comment_body: $('.feature_add_comment textarea').val(),
			user_id: $('.story_score .fa-sort-asc').attr('user-id'),
			story_id: $('.story_score').attr('story-id')
		}

		$.get('/submitComment', sendData, function (data){
			console.log(data);
			var output = renderComment(data);
			if ($('.noComments').length) {
				$('.noComments').remove();
			};
			$('.feature_comments').append(output);
			$('.feature_add_comment textarea').val('');
		});
	});

	//delete comment AJAX
	$('.delete').on('click', function() {
		var thisthis = $(this);
		var sendData = {
			'comment_id': thisthis.parents('.comment').attr('comment-id')
		}
		$.get('/deleteComment', sendData, function (data) {
			thisthis.parents('.comment').remove();
			console.log(data);
			if ($('.comment').length) {
				console.log('nope');
			} else {
				var noComments = '<div class="noComments">There Are No Comments For This Story Yet Today</div>';
				$('.feature_comments').append(noComments);
			}
		});
	})

	//=============================================
	// upvote, downvote
	//=============================================

	//listen for an upvote vote
	$('.fa-sort-asc').on('click', function(){
		var thisthis = $(this);
		//check logged in
		if (thisthis.attr('user-id') == ''){
			alert('Please Login To Vote');
		} else {

			//what was clicked on?
			// ===== story
			if (thisthis.parent().attr('class') == 'story_score') {
				var sendData = {
					'user_id': thisthis.attr('user-id'),
					'story_id': thisthis.parent('.story_score').attr('story-id')
				}
				$.get('/storyUpvote', sendData, function (data){
					console.log(data);
					$('.story_score').find('span').text(data.new_score);
					if (data.vote == 'down' || data.vote === null) {
						$('.story_score .fa-sort-asc').addClass('selected');
						$('.story_score .fa-sort-desc').removeClass('selected');
					}
				});

			// ===== comment
			} else if (thisthis.parent().attr('class') == 'score') {
				var sendData = {
					'user_id': thisthis.attr('user-id'),
					'comment_id': thisthis.parents('.comment').attr('comment-id')
				}
				$.get('/commentUpvote', sendData, function (data){
					console.log(data);
					thisthis.parents('.score').find('.comment_score').text(data.new_score);
					console.log(thisthis.parents('.score').find('.comment_score').text());
					if (data.vote == 'down' || data.vote === null) {
						thisthis.parents('.score').find('.fa-sort-asc').addClass('selected');
						thisthis.parents('.score').find('.fa-sort-desc').removeClass('selected');
					}
				});

			// ===== seed
			} else if (thisthis.parent().attr('class') == 'story_score seed_score') {
				var sendData = {
					'user_id': thisthis.attr('user-id'),
					'seed_id': thisthis.parents('.seed_score').attr('seed-id')
				}
				$.get('/seedUpvote', sendData, function (data){
					console.log(data);
					thisthis.parents('.seed_score').find('span').text(data.new_score);
					console.log(thisthis.parents('.seed_score').find('span').text());
					if (data.vote == 'down' || data.vote === null) {
						thisthis.parents('.seed_score').find('.fa-sort-asc').addClass('selected');
						thisthis.parents('.seed_score').find('.fa-sort-desc').removeClass('selected');
					}
				});
			}
		}
	});

	//listen for a downvote click
	$('.fa-sort-desc').on('click', function(){
		var thisthis = $(this);
		//check logged in
		if (thisthis.attr('user-id') == ''){
			alert('Please Login To Vote');
		} else {
			//what did i click on?

			// ===== story
			if (thisthis.parent().attr('class') == 'story_score') {
				var sendData = {
					'user_id': thisthis.attr('user-id'),
					'story_id': thisthis.parent('.story_score').attr('story-id')
				}
				$.get('/storyDownvote', sendData, function (data){
					console.log(data);
					$('.story_score').find('span').text(data.new_score);
					if (data.vote == 'up' || data.vote === null) {
						$('.story_score .fa-sort-desc').addClass('selected');
						$('.story_score .fa-sort-asc').removeClass('selected');
					}
				});

			// ===== comment
			} else if (thisthis.parent().attr('class') == 'score') {
				var sendData = {
					'user_id': thisthis.attr('user-id'),
					'comment_id': thisthis.parents('.comment').attr('comment-id')
				}
				$.get('/commentDownvote', sendData, function (data){
					console.log(data);
					thisthis.parents('.score').find('.comment_score').text(data.new_score);
					if (data.vote == 'up' || data.vote === null) {
						thisthis.parents('.score').find('.fa-sort-desc').addClass('selected');
						thisthis.parents('.score').find('.fa-sort-asc').removeClass('selected');
					}
				});

			// ===== seed
			} else if (thisthis.parent().attr('class') == 'story_score seed_score') {
				var sendData = {
					'user_id': thisthis.attr('user-id'),
					'seed_id': thisthis.parents('.seed_score').attr('seed-id')
				}
				$.get('/seedDownvote', sendData, function (data){
					console.log(data);
					thisthis.parents('.seed_score').find('span').text(data.new_score);
					console.log(thisthis.parents('.seed_score').find('span').text());
					if (data.vote == 'up' || data.vote === null) {
						thisthis.parents('.seed_score').find('.fa-sort-desc').addClass('selected');
						thisthis.parents('.seed_score').find('.fa-sort-asc').removeClass('selected');
					}
				});
			}
		}
	});

	//=================================================
	// Preview Comments
	//=================================================

	if ($(window).width() > 499) {
		$('.reader').hover(function(){
			var comment_text = $(this).find('.comment_description').text();
			$('.story').append('<div class="hover_added"><span class=lineNumber>XX </span> ' + comment_text + '</div>');
			$('.story').animate({ scrollTop: $('.story')[0].scrollHeight}, 1000);
		}, function() {
			$('.hover_added').remove();
		}
	)}

	//=================================================
	//
	//=================================================

});