<?php

// GRAVITY FORMS support
add_action('wp_enqueue_scripts', 'ticr_gf_scripts');
function ticr_gf_scripts()
{
	wp_enqueue_script( 'gf-form-js', plugins_url('gravity-forms.js', __FILE__));
	wp_enqueue_style( 'gf-form-style-eeco', plugins_url('gravity-forms.css', __FILE__));
}

// ADD TOGGLE SHORTCODE
add_shortcode('ticr_gf_toggle', 'ticr_gf_toggle');
function ticr_gf_toggle($atts, $content=NULL) {
	$output = '<span class="ticr_gf_toggle">'.$content.'</span>';
	
	return $output;
}

add_filter( 'gform_notification', 'ticr_gf_admin_email', 10, 3 );
function ticr_gf_admin_email( $notification, $form, $entry ) {
	if ( $notification['name'] == 'Admin Notification' ) { 
		// toType can be routing or email
		$notification['toType'] = 'email'; 
		$notification['to'] = "Al Shoneman<Al.Schoneman@eeco-net.com>";
	}

    return $notification;
}

?>