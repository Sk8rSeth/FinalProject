$(document).ready(function() {

	//login button drop open
	$('.login').on('click', function() {
		$('.login > div').removeClass('displayNone');
		$('#username').focus();
	});

	//login button close
	$('.login').on('focusout', function() {
		// $('.login > div').addClass('displayNone');
	});

	//info menu open and close
	$('.info_menu').on('click', function() {
		$('.info_menu > div').toggleClass('displayNone');
		// $('.info_menu > div').removeClass('displayNone');
		$('.info_menu > div').focus();
	});
	

	//displays comment info on hover
	$('.story').hover(function(){
		$('.hover_info').removeClass('displayNone');
	}, function() {
		$('.hover_info').addClass('displayNone');
	});

	// Comment AJAX submission
	var message $('.feature_add_comment textarea').val();
	$.get('/submitComment', {}, function(){

	});

});