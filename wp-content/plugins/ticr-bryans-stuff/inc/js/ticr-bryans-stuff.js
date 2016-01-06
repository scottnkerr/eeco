// JavaScript Document

jQuery(document).ready(function($){
	
	$('#wp1 #form_001b').hide();
	
	$('.act-on-001b-ctrl').click(function() {
		if($('#wp1 #form_001b').css('display') == 'none') { $('#wp1 #form_001b').slideDown(800); }
		else { $('#wp1 #form_001b').slideUp(800); }
	});
	
});