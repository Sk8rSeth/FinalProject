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

	//login button close
	// $('.login').on('click', function() {
	// 	$('.login > div').addClass('displayNone');
	// });

	//info menu open and close
	$('.info_menu').on('click', function() {
		$('.info_menu > div').toggleClass('displayNone');
		$('.info_menu > div').focus();
	});

	//===============================================
	// info_menu ajax and on hover
	//===============================================

	//displays comment info on hover
	if ($(window).width() > 499) {
		$('.story div').hover(function(){
			if ($(this).attr('class') !== 'seed') {
				$('.hover_info').removeClass('displayNone');
				$(this).addClass('highlight');

				// comment info ajax call
				var sendData = {comment_id: $(this).attr('comment-id')}
				$.get('/getComment', sendData, function (data) {
					$('.hover_username').text(data);
				});

				var comment_length = $(this).text().length;
				$('.hover_length').text(comment_length);
				console.log(comment_length);
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
			//what did i click on?
			// ===== story
			if (thisthis.parent().attr('class') == 'story_score') {
				var sendData = {
					'user_id': thisthis.attr('user-id'),
					'story_id': thisthis.parent('.story_score').attr('story-id')
				}
				$.get('/storyUpvote', sendData, function (data){
					console.log(data);
					$('.story_score').find('span').text(data);
				});
				console.log('i upvoted a story');

			// ===== comment
			} else if (thisthis.parent().attr('class') == 'score') {
				var sendData = {
					'user_id': thisthis.attr('user-id'),
					'comment_id': thisthis.parents('.comment').attr('comment-id')
				}
				$.get('/commentUpvote', sendData, function (data){
					console.log(data);
					var test = thisthis.parent('.score').find('.comment_score').text(data);
				});
				console.log('i upvoted a comment');

			// ===== seed
			} else if (thisthis.attr('class') == 'seed_score') {
				console.log('seed');
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
					$('.story_score').find('span').text(data);
				});
				console.log('i Downvoted a story');

			// ===== comment
			} else if (thisthis.parent().attr('class') == 'score') {
				var sendData = {
					'user_id': thisthis.attr('user-id'),
					'comment_id': thisthis.parents('.comment').attr('comment-id')
				}
				$.get('/commentDownvote', sendData, function (data){
					console.log(data);
					var test = thisthis.parent('.score').find('.comment_score').text(data);
				});
				console.log('i Downvoted a comment');

			// ===== seed
			} else if (thisthis.attr('class') == 'seed_score') {
				console.log('seed');
			}
		}
	});

	//=================================================
	// Preview Comments
	//=================================================

	if ($(window).width() > 499) {
		$('.reader').hover(function(){
			var comment_text = $(this).find('.comment_description').text();
			console.log(comment_text);
			$('.story').append('<div class="hover_added">- ' + comment_text + '</div>')
		}, function() {
			console.log('nothing');
			$('.hover_added').remove();
		}
	)}


});