<?php
/* Template Name: Inspire Blog Home */

/**
 * Portfolio list layout.
 *
 * @package presscore
 * @since presscore 0.1
 */

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }
$includeBootstrap = true;
$containerclassoverride = 'class="sidebar-none"';

get_header(); ?>
<div class="container-fluid yellowbrick"></div>
<div class="container-fluid inspire-banner" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/inspire-banner.jpg)">
	<div class="toptag">Ideas Powering Performance</div>
	<h1>Inspire</h1>
	<button class="btn-inspire">Subscribe Here ></button>
</div>
<div class="container-fluid yellowbrick"></div>
<div class="container-fluid inspire-featured-container" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/placeholder.jpg)">
	<div class="inspire-featured">
		<div class="featured-left">Featured Post</div>
		<div class="featured-center">
			<div class="inspire-blog-date"><?php  ?></div>
			<div class="inspire-cat-title">From cat Blog</div>
			<h2>title</h2>
			<div class="inspire-excerpt">Excerpt</div>
			<div class="inspire-read-more">Read More</div>
		</div>
		
	</div>
</div>
<div class="container">	
	<div class="row">			

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); // main loop 
	//automation sticky
	$whichcat = "automation";
	$cattitle = "Automation Solutions";
include(locate_template('templates/sticky.php'));
	$whichcat = "connections";
	$cattitle = "Motor Solutions";
include(locate_template('templates/sticky.php'));
	$whichcat = "electrical-enclosures";
	$cattitle = "Electrical Supplies";
include(locate_template('templates/sticky.php'));

?>


	</div>
</div>


					<?php endwhile; // main loop ?>

				<?php endif; ?>

			





<?php get_footer(); ?>