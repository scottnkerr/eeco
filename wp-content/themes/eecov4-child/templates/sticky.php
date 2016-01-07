<?php $args = array(
			'category_name' => $whichcat,
			'post__in' => get_option( 'sticky_posts' ),
			'showposts' => '1'
		);
$the_query = new WP_Query( $args );

	while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
		
		<div class="col-sm-4">	
			<div class="cat-<?php echo $whichcat ?> catsticky" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/placeholder.jpg)">
				<h2 class="inspire-cat"><?php echo $cattitle; ?></h2>
				<div class="inspire-subscribe"><a href="">Subscribe <span class="subscribe-carat">></span></a></div>
        <div class="inspire-blog-date"><?php the_date('m/d/Y'); ?></div>
        <div class="inspire-blog-title"><a title="<?php the_title(); ?>" href="<?php the_permalink() ?>"><?php the_title(); ?></a></div>
			
        <div class="inspire-blog-social">
	        <a href=""><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/facebook.png"></a>
	        <a href=""><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/twitter.png"></a>
	        <a href=""><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/linkedin.png"></a>
	        <a href=""><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/rss.png"></a>
        </div>
        <div class="inspire-blog-read-more"><a title="<?php the_title(); ?>" href="<?php the_permalink() ?>">Read More ></a></div>
		</div>
		</div>
	<?php endwhile; wp_reset_query(); ?>