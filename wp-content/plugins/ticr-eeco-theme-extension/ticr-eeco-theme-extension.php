<?php

/*
   Plugin Name: TiCr - EECO Theme Extension
   Plugin URI: http://www.TitaniumCreative.com/WPplugins/Theme Extension
   Description: Contains developer files for custom extension of themes and child themes. 
   Version: 15.06.001
   Author: Bryan Taylor - Titanium Creative, Inc.
   Author URI: http://www.TitaniumCreative.com
   License: GPL2

   Copyright 2015  Bryan Taylor/Titanium Creative  (email : btaylor@TitaniumCreative.com)

   This program is free software; you can redistribute it and/or modify
   it under the terms of the GNU General Public License, version 2, as 
   published by the Free Software Foundation.

   This program is distributed in the hope that it will be useful,
   but WITHOUT ANY WARRANTY; without even the implied warranty of
   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
   GNU General Public License for more details.

   You should have received a copy of the GNU General Public License
   along with this program; if not, write to the Free Software
   Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


//* REMOVE ADMIN MENU ITEMS *//
add_action('admin_menu', 'ticr_remove_admin_menu_items');
function ticr_remove_admin_menu_items()
{
	$remove_items = array(
		'dt_portfolio',
		'dt_testimonials',
		'dt_team',
		'dt_benefits',
		'dt_slideshow'
	);
	foreach($remove_items as $item) { remove_menu_page('edit.php?post_type='.$item); }
}


//* REMOVE POST TYPES *//
//add_action('init', 'ticr_remove_post_types');
function ticr_remove_post_types() {
    global $wp_post_types;
	//if(get_current_user_id() == 62) { echo '<pre>'.print_r($wp_post_types,true).'</pre>'; }
	$remove_types = array(
		'dt_portfolio'
	);
	foreach($remove_types as $post_type)
	{
		if ( isset( $wp_post_types[ $post_type ] ) ) {
			unset( $wp_post_types[ $post_type ] );
		}
	}
}

//* Add Custom Login Class
require_once('custom-login/custom-login.php');

//* Add WSI Ingtegration Posts Class
require_once('classes/wsi-integration-posts.php');

//* ENQUEUE SCRIPTS 
add_action('wp_enqueue_scripts', 'ticr_theme_extension_scripts');
function ticr_theme_extension_scripts()
{
	wp_enqueue_style('ticr-theme-extension', plugins_url( '/ticr-eeco-theme-extension.css', __FILE__));
}

//* (PLUGIN HOOK: MEMBERS)	FILTER REGISTRATION NOTIFICATION EMAILS
add_filter( 'wpmem_notify_addr', 'ticr_members_registration_notification_list');
function ticr_members_registration_notification_list($email) 
{
	
	//	The default email can be pulled into the filter with
	//	the parameter $email.  This could be ignored,
	//	appended to, or changed altogether, as long as you
	//	return a valid email.
	   
	//	SINGLE EMAIL
		$email = 'Al.Schoneman@eeco-net.com';
	 
	//	MULTIPLE EMAILS
	//	$email = 'notify1@mydomain.com, notify2@mydomain.com';
	
	//	APPEND EMAILS
	//	$email = $email . ', Al.Schoneman@eeco-net.com';
	
	// return the result
	return $email;
}



?>