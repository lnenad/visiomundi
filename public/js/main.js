$(document).ready(function(){

	$('.journal-entry').hover(function(){
		var name = $(this).attr('name');
		$(this).children('.titler').stop();
		$(this).children('.titler').toggle("slide", { direction: "down" }, 200).html(name);
	}, 						  function(){ 
		$(this).children('.titler').stop();
		$(this).children('.titler').toggle("slide", { direction: "down" }, 200);
	});



});