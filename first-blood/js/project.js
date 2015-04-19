// JavaScript Document
$(document).ready(function() {
	$('#projectShow li:odd').addClass('filter2');
	$('#projectShow li:even').addClass('filter1');
	$('#projectShow img').hide();
	$('#projectShow a').hover(function() {
		$(this).css('opacity',0);
		$(this).prev().fadeIn('slow');
		},function() {
			if(this=='#projectShow li:odd'){
				$(this).css('opacity',90);
			}
			else{
				$(this).css('opacity',90);
			}
			
			$('#projectShow img').fadeOut('slow');
		  });
   
	});
 
