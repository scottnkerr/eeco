// JavaScript Document
jQuery(document).ready(function($) {
	'use strict';
	
	// HIDE ARCHIVE EXCERPTS
    $('.inspire-archive .inspire-archive-wrap .post-excerpt').hide();
	
	$('.inspire-archive .inspire-archive-wrap .archive-post').hover(
		function() { $(this).find('.post-excerpt').slideDown(400); }, 
		function() { $(this).find('.post-excerpt').slideUp(400); }
	);
	
});