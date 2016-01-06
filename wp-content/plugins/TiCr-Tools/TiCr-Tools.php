<?php // TiCr - Tools

/*
   Plugin Name: TiCr Tools&trade;
   Plugin URI: http://www.TiCr.us/WPplugins/TicrTools
   Description: Various helper functions to improve theme and website function. Responsive PHP INFO. Simple Google Analytics form. WordPress Core Update preferences. 
   Version: 14.6.4.2
   Author: Bryan Taylor - Titanium Creative, Inc.
   Author URI: http://www.TiCr.us
   License: GPL2

   Copyright 2013  Bryan Taylor/Titanium Creative  (email : btaylor@TiCr.us)

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

/****************************************************************/

// WORDPRESS UPDATE PREFERENCES (14.5.24.1)

/****************************************************************/
//* Enables core updates for minor releases (default): 
define( 'WP_AUTO_UPDATE_CORE', 'minor' );


/****************************************************************/

// PHP INFO ADMIN REPORT (14.5.28.1)

/****************************************************************/
require_once('classes/ticr-phpinfo.php');


/****************************************************************/

// GOOGLE ANALYTICS PREFERENCES (14.6.04.1)

/****************************************************************/
//require_once('classes/ticr-ga.php');


/****************************************************************/

// GOOGLE ANALYTICS PREFERENCES (14.6.04.2)

/****************************************************************/
/* Add META EXPIRES
add_action('wp_head', function() {
	echo '<meta name="expires" content="'.strtolower(strftime('%a, %d %b %Y', time()+7*24*360)).'" />
	';
}, 1);
*/

/****************************************************************/

// POST ID COLUMN IN ADMIN POST LIST (15.5.001)

/****************************************************************/
//require_once('classes/ticr-postid.php');


?>