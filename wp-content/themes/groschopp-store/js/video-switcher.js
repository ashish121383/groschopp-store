$(document).ready(function(){
 
	$('.vid-swap').click( function(e){
		e.preventDefault();
		$('body').animate({ scrollTop: 0 }, 'fast');
		var URL = $(this).attr('href');
		var htm = '<iframe width="851" height="476" src="' + URL + '?rel=0&autoplay=1" frameborder="0" allowfullscreen></iframe>';
		 
		$('#vid-container').html(htm);
		return false;
	});
	
});