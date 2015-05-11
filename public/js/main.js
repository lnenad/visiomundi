$(document).ready(function(){

	$('.journal-entry').hover(function(){
		var name = $(this).attr('name');
		$(this).find('div').fadeIn().html(name);
	}, 						  function(){ 
		$(this).find('div').fadeOut();
	});



});