// JavaScript Document

jQuery(document).ready(function($) { "use strict";
	
	$('.ticr_gf_toggle').click(function() {
		if($(this).next('div').css('display') === 'none') { $(this).nextAll('div').first().slideDown(800); }
		else { $(this).nextAll('div').first().slideUp(800); }
	});
	
	
	///////////////////////////////////////////////
	//
	//		ASSEMBLE ASSESSMENT FORM
	//
	///////////////////////////////////////////////
	
	var group01 = $('#field_11_1, #field_11_3, #field_11_4, #field_11_2');
	$(group01).addClass('group01');
	
	var group02 = $('#field_11_8, #field_11_9, #field_11_10, #field_11_11');
	$(group02).addClass('group02').css('display', 'none');
	
	var group03 = $('#field_11_13, #field_11_14, #field_11_15, #field_11_16, #field_11_17, #field_11_18, #field_11_19');
	$(group03).addClass('group03').css('display', 'none');
	
	var group04 = $('#field_11_21, #field_11_22, #field_11_23, #field_11_24, #field_11_25');
	$(group04).addClass('group04').css('display', 'none');
	
	var group05 = $('#field_11_27, #field_11_34, #field_11_29, #field_11_30, #field_11_31, #field_11_32');
	$(group05).addClass('group05').css('display', 'none');
	
	///////////////////////////////////////////////
	//
	//		SHOW GROUPS ON CHANGE
	//
	///////////////////////////////////////////////
	
	// GLOBALS
	var scrollToGroup = false;
	
	$('input, select, textarea').on('change keyup', function() {
		
		// CHECK GROUP 01 FIELDS FOR COMPLETION
		
		var group01Keys = ['#input_11_1_3', '#input_11_1_6', '#input_11_3', '#input_11_4', '#input_11_2_1', '#input_11_2_3', '#input_11_2_4', '#input_11_2_5', '#input_11_2_6', '#input_11_33'];
		
		var showGroup02 = true;
		// CHECK KEYS
		group01Keys.forEach(function(group01key) { 
			if($(group01key).val().length < 1 ) { showGroup02 = false; } 
		});
		
		if(showGroup02) {
			if($('.group02').css('display') === 'none' && false)
			{
				$('html, body').delay(1000).animate({
				scrollTop: $('#field_11_6').offset().top
			}, 2000);
			}
			$('.group02').show(400); 
			//scrollToGroup = '#field_11_6'; 
		} else { $('.group02').hide(400); }
		

		// CHECK GROUP 02 FIELDS FOR COMPLETION
		
		var group02Keys = ['#input_11_8'];
		var group02RadioKeys = ['input_9', 'input_10', 'input_11'];
		
		var showGroup03 = true;
		// CHECK KEYS
		group02Keys.forEach(function(group02key) { 
			if($(group02key).val().length < 1 ) { showGroup03 = false; } 
		});
		// CHECK RADIO KEYS
		group02RadioKeys.forEach(function(group02key) { 
			if(!($('input:radio[name="'+group02key+'"]').is(':checked'))) { showGroup03 = false; } 
		});
		
		if(showGroup03) { $('.group03').show(400); scrollToGroup = '#field_11_12'; } else { $('.group03').hide(400); }
		

		// CHECK GROUP 03 FIELDS FOR COMPLETION
		
		var group03Keys = ['#input_11_14', '#input_11_15'];
		var group03RadioKeys = ['input_13', 'input_17', 'input_16', 'input_18', 'input_19'];
		
		var showGroup04 = true;
		// CHECK KEYS
		group03Keys.forEach(function(group03key) { 
			if($(group03key).val().length < 1 ) { showGroup04 = false; } 
		});
		// CHECK RADIO KEYS
		group03RadioKeys.forEach(function(group03key) { 
			if(!($('input:radio[name="'+group03key+'"]').is(':checked'))) { showGroup04 = false; } 
		});
		
		if(showGroup04) { $('.group04').show(400); scrollToGroup = '#field_11_20'; } else { $('.group04').hide(400); }
		

		// CHECK GROUP 04 FIELDS FOR COMPLETION
		
		var group04Keys = ['#input_11_21', '#input_11_24'];
		var group04RadioKeys = ['input_22', 'input_23', 'input_25'];
		
		var showGroup05 = true;
		// CHECK KEYS
		group04Keys.forEach(function(group04key) { 
			if($(group04key).val().length < 1 ) { showGroup05 = false; } 
		});
		// CHECK RADIO KEYS
		group04RadioKeys.forEach(function(group04key) { 
			if(!($('input:radio[name="'+group04key+'"]').is(':checked'))) { showGroup05 = false; } 
		});
		
		if(showGroup05) { $('.group05').show(400); scrollToGroup = '#field_11_26'; } else { $('.group05').hide(400); }
		
		// SCROLL
		if (scrollToGroup && false)
		{
			$('html, body').delay(1000).animate({
				scrollTop: $(scrollToGroup).offset().top
			}, 2000);
		}
			
	});

	
});