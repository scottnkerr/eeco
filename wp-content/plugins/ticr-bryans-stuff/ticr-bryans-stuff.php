<?php
/*
   Plugin Name: TiCr - Bryan's Stuff
   Plugin URI: http://www.TitaniumCreative.com/WPplugins/BryansStuff
   Description: Sandbox plugin used for temporary positioning of development assets. 
   Version: 15.07.001
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

// ADD ACT-ON Module
require_once('inc/act-on.php');

// ADD TiCr Layout Shortcodes
require_once('inc/ticr-shortcodes-layout.php');

// ADD Gravity Forms Module
require_once('inc/gravity-forms.php');

// ADD Storeroom Self Evaluation
require_once('inc/storeroom-self-eval.php');

// ADD Quickie Table
require_once('inc/quickie-table.php');

// ENQUEUE Bryans Stuff JS
add_action('wp_enqueue_scripts', 'ticr_bryans_stuff_enqueue');
function ticr_bryans_stuff_enqueue()
{
	wp_enqueue_script('bryans-stuff-js', plugins_url('inc/js/ticr-bryans-stuff.js', __FILE__), array('jquery'));
}

// POST TYPE INFO AND PRINT_R
add_shortcode('get_post_type_info', 'ticr_get_post_type_info');
function ticr_get_post_type_info($atts)
{
	$obj = get_post_type_object($atts['post_type']);
	echo '<pre>'.print_r($obj,true).'</pre>';
}

?>