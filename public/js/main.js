$(document).ready(function(){

	$('.journal-entry').hover(function(){
		var name = $(this).attr('name');
		$(this).children('.titler').stop().html(name).fadeIn();
	},  function(){ 
		$(this).children('.titler').stop().fadeOut()
	});



});