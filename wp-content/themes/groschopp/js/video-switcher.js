$(document).ready(function(){
 
	$('.vid-swap').click( function(e){
	e.preventDefault();
	var URL = $(this).attr('href');
	var htm = '<iframe width="655" height="366" src="' + URL + '?rel=0&autoplay=1" frameborder="0" allowfullscreen></iframe>';
	 
	$('#vid-container').html(htm);
	 
	return false;
	});
	
});