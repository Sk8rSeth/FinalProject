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
	   		} else {
	        	$('.title').stop(true,true).fadeOut("slow");
	        	$('.story_score').stop(true,true).fadeOut("slow");
			}
		});
	};



	//login button drop open
	$('.login').on('click', function() {
		$('.login > div').removeClass('displayNone');
		// $('#username').focus();
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
	
	//displays comment info on hover
	$('.story div').hover(function(){
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
	}, function() {
		$('.hover_info').addClass('displayNone');
		$(this).removeClass('highlight');
		$('.hover_username').text();
	});

	// Comment AJAX submission
	$('.feature_add_comment').on('submit', function(event) {
		event.preventDefault();
		var message = $('.feature_add_comment textarea').val();
		// $.get('/submitComment', {}, function(){
		// });
	});

// 	//delete comment AJAX
// 	var message $('.feature_add_comment textarea').val();
// 	$.get('/submitComment', {}, function(){


});