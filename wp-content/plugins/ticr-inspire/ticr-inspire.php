<?php
/*
   Plugin Name: TiCr - Inspire Blog
   Plugin URI: http://www.TitaniumCreative.com/WPplugins/Inspire
   Description: EECO Inspire Blog Custom Plugin. 
   Version: 0.0.1 alpha 0001
   Author: Bryan Taylor - Titanium Creative, Inc.
   Author URI: http://www.TitaniumCreative.com
   License: GPL2

   Copyright 2015  Bryan Taylor/Titanium Creative  (email : btaylor@TitaniumCreative.com)

   This program is distributed in the hope that it will be useful,
   but WITHOUT ANY WARRANTY; without even the implied warranty of
   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
   GNU General Public License for more details.

   You should have received a copy of the GNU General Public License
   along with this program; if not, write to the Free Software
   Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) or die( 'TiCr - Improper Access' );

// REQUIRED FILES
require_once('inc/initialize.php');
require_once('inc/functions.php');
require_once('inc/custom-post-type.php');
require_once('inc/shortcodes.php');


// Add Scripts
function ticr_inspire_enqueue()
{
	if(ticr_is_inspire)
	{
		wp_enqueue_style('ticr-inspire-blog', plugins_url( '/ticr-inspire-style.css', __FILE__));
		wp_enqueue_script('ticr-inspire-js', plugins_url( '/inc/js/ticr-inspire.js', __FILE__), '','',true);
	}
}
add_action('wp_enqueue_scripts', 'ticr_inspire_enqueue');

// Add Body Class
function ticr_inspire_body_class($classes)
{
	if(is_page('inspire'))
	{
		$classes[] = 'inspire-blog';
		$classes[] = 'inspire-archive';
	}
	return $classes;
}
add_filter('body_class', 'ticr_inspire_body_class');


// Load Archive Template
function get_inspire_blog_template( $archive_template ) {
     global $post;

     if ( is_post_type_archive ( 'inspire-blog' ) ) {
          $archive_template = dirname( __FILE__ ) . '/templates/inspire-blog-archive.php';
     }
     return $archive_template;
}
add_filter( 'archive_template', 'get_inspire_blog_template' ) ;

// Set Excerpt Length
function ticr_inspire_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'ticr_inspire_excerpt_length', 999 );


?>