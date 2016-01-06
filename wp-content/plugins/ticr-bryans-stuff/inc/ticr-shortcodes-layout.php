<?php
// File Security Check
if ( ! defined( 'ABSPATH' ) ) exit;

/* ============= Three Columns ============= */

function ticr_shortcode_3col($atts, $content = null) {
   return '<div class="ticr-3col">' . do_shortcode($content) . '</div>';
}
add_shortcode( 'ticr_3col', 'ticr_shortcode_3col' );

/* ============= Tags ============= */

function ticr_shortcode_h3($atts, $content = null) {
   return '<h3 class="ticr-h3">' . do_shortcode($content) . '</h3>';
}
add_shortcode( 'ticr_h3', 'ticr_shortcode_h3' );

function ticr_shortcode_hr($atts) {
   return '<hr />';
}
add_shortcode( 'ticr_hr', 'ticr_shortcode_hr' );

// ENQUEUE SCRIPTS
add_action('wp_enqueue_scripts', 'ticr_shortcode_scripts');
function ticr_shortcode_scripts()
{
	wp_enqueue_style('ticr-shortcodes', plugins_url('ticr-shortcodes-layout.css', __FILE__));
}

//move wpautop filter to AFTER shortcode is processed
//remove_filter( 'the_content', 'wpautop' );
//add_filter( 'the_content', 'wpautop' , 99);
add_filter( 'the_content', 'ticr_unautop',100 );
function ticr_unautop($content) { 
	$content = preg_replace('/<\/h3><br \/>/', '</h3>' , $content);
	$content = preg_replace('/<\/div><br \/>/', '</div>' , $content);
	$content = preg_replace('/<p><\/p>/', '' , $content);
	return $content;
}


?>