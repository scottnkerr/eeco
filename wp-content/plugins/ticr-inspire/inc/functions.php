<?php	// TiCr Inspire Blog Core Functions

// Is the post or archive part of Inspire
function ticr_is_inspire()
{
	// Is post type inspire-blog
	
	// is archive inspire-blog
	
	//TESTING
	return true;
}

function ticr_inspire_featured($atts=NULL)
{
	$args = array (
		'post_type' => array('inspire-blog'),
		'has_password' => false,
		'posts_per_page' => 1,
		'meta_key' => 'ticr_inspire_featured',
		'meta_value' => true,
		'order' => 'DESC'
	);
	
	// DEFAULTS
	$featured_background = '19600';

	
	switch($atts['cat'])
		{
			case 'news': 
				$class = 'news';
				$args['tax_query'] = array(
					array(
						'terms' => 'eeco-news',
						'taxonomy' => 'inspire-category',
						'field' => 'slug'
					)
				);
				$featured_img_id = 17191;
				$cat_order = array('automation', 'motor', 'electrical');
				break;
				
			case 'events': 
				$class = 'events';
				$args['tax_query'] = array(
					array(
						'terms' => 'eeco-events',
						'taxonomy' => 'inspire-category',
						'field' => 'slug'
					)
				);
				$featured_img_id = 17191;
				$cat_order = array('automation', 'motor', 'electrical');
				break;
				
			case 'careers':
				$class = 'careers';
				$args['tax_query'] = array(
					array(
						'terms' => 'eeco-careers',
						'taxonomy' => 'inspire-category',
						'field' => 'slug'
					)
				);
				$featured_img_id = 17191;
				$cat_order = array('automation', 'motor', 'electrical');
				break;
				
			case 'automation':
				$class = 'automation';
				$args['tax_query'] = array(
					array(
						'terms' => 'automation-solutions',
						'taxonomy' => 'inspire-category',
						'field' => 'slug'
					)
				);
				$featured_img_id = 17279;
				$cat_order = array('automation', 'motor', 'electrical');
				break;
				
			case 'motor':
				$class = 'motor';
				$args['tax_query'] = array(
					array(
						'terms' => 'motor-solutions',
						'taxonomy' => 'inspire-category',
						'field' => 'slug'
					)
				);
				$featured_img_id = 17308;
				$featured_background = '19597';
				$cat_order = array('motor', 'automation', 'electrical');
				break;
				
			case 'electrical':
				$class = 'electrical';
				$args['tax_query'] = array(
					array(
						'terms' => 'electrical-supplies',
						'taxonomy' => 'inspire-category',
						'field' => 'slug'
					)
				);
				$featured_img_id = 17609;
				$featured_background = '19581';
				$cat_order = array('electrical', 'automation', 'motor');
				break;
			
			default:
				$class = 'inspire';
				$featured_img_id = 17191;
				$cat_order = array('automation', 'motor', 'electrical');
				break;
		}
	
	$the_query = new WP_Query($args);
	
	if($the_query->have_posts())
	{
		$featured_label = 'Featured';
	} else {
		unset($args['meta_key']);
		unset($args['meta_value']);
		
		$the_query = new WP_Query($args);
		if($the_query->have_posts()) { $featured_label = 'Latest'; }
	}
	
	$output .= '<div class="inspire-featured-wrap">';
	//$output .= '<img class="background-image" src="http://www.eecoonline.com/wp-content/uploads/2015/12/featured-post-background-v02.jpg" />';
	$output .= wp_get_attachment_image($featured_background, 'full', '', array('class' => 'background-image'));
	
	// START LOOP
	if($the_query->have_posts()) { while($the_query->have_posts()) {

		$the_query->the_post();
		
		// Get The Parent Category
		$category_label = 'Inspire';
		
		$output .= '<a href="'.get_the_permalink().'" title="Read: '.get_the_title().'" style="display:block; font-weight:normal;" class="inspire-featured-article">';
		$output .= '<div class="inspire-featured-tag rotate">'.$featured_label.' Post</div>';
		$output .= '<div class="post-info-wrap">';
		$output .= '<p>From the '.Inspire.' Blog</p>';
		$output .= '<h3>'.get_the_title().'</h3>';
		$output .= '<p class="post-excerpt">'.get_the_excerpt().'</p>';
		$output .= '</div>';
		//$output .= '<div class="post-date">'.strftime('%m/%d/%Y', time()).'</div>';
		$output .= '<div class="read-more">Read More</div>';
		$output .= '</a>';
	
	} }	// END LOOP
	
	$cat_heads = array(
		'automation' => array(
			'class' => 'automation',
			'label' => 'Automation Solutions',
			'link' => 19426
			),			
		'motor' => array(
			'class' => 'motor',
			'label' => 'Motor Solutions',
			'link' => 19430
			),
		'electrical' => array(
			'class' => 'electrical',
			'label' => 'Electrical Supplies',
			'link' => 19436
			)
	);

	$output .= '<div class="cat-heads">';
	$i = 1;
	foreach($cat_order as $cat)
	{
		switch($i) {
			case 1: $ordinal_class = ' first'; break;
			case 2: $ordinal_class = ' second'; break;
			case 3: $ordinal_class = ' third'; break;
		}
		$cat_head = $cat_heads[$cat];
		$output .= '<h3 class="'.$cat_head['class'].$ordinal_class.'"><a href="'.get_permalink($cat_head['link']).'" title="">'.$cat_head['label'].'</a></h3>';
		$i++;
		//$output .= '<h3 class="motor">Motor Solutions</h3>';
		//$output .= '<h3 class="electrical">Electrical Supplies</h3>';
	}
	$output .= '</div>';
	$output .= '</div>';
	
	wp_reset_postdata();
	return $output;
}

function ticr_inspire_archive_columns($atts=NULL)
{
	$output .= '<div class="inspire-archive-wrap">';
	// FOREACH CATEGORY
	for($i=0; $i<3; $i++) {
		
		// DEFAULTS
		$featured_img_id = 19347;
		$args = array (
			'post_type' => array('inspire-blog'),
			'has_password' => false,
			'posts_per_page' => 2,
			'order' => 'DESC'
		);
	
		
		$class = '';
		switch($i)
		{
			case 0: 
				$class = 'automation';
				$args['tax_query'] = array(
					array(
						'terms' => 'automation-solutions',
						'taxonomy' => 'inspire-category',
						'field' => 'slug'
					)
				);
				$featured_img_id = 17279;
				break;
			
			case 1: 
				$class = 'motor';
				$args['tax_query'] = array(
					array(
						'terms' => 'motor-solutions',
						'taxonomy' => 'inspire-category',
						'field' => 'slug'
					)
				);
				$featured_img_id = 17308;
				break;
				
			case 2: 
				$class = 'electrical';
				$args['tax_query'] = array(
					array(
						'terms' => 'electrical-supplies',
						'taxonomy' => 'inspire-category',
						'field' => 'slug'
					)
				);
				$featured_img_id = 17609;
				break;
		}
		
		$the_query = new WP_Query($args);

		$output .= '<ul class="archive-column '.$class.'">';
		// FOREACH POST
		while($the_query->have_posts()) {
			
			$the_query->the_post();
			
			$output .= '<li class="archive-post-wrap"><a href="'.get_the_permalink().'" title="Read: '.get_the_title().'" style="display:block;">';
			$output .= '<ul class="archive-post">';
			$output .= '<li class="post-thumbnail">'.wp_get_attachment_image($featured_img_id, 'small').'</li>';
			//$output .= '<li class="post-date">88/88/8888</li>';
			$output .= '<li class="post-title-wrap"><h3 class="post-title">'.get_the_title().'</h3></li>';
			$output .= '<li class="post-excerpt">'.get_the_excerpt().'</li>';
			$output .= '<li class="read-more">Read More ></li>';
			$output .= '</ul>';
			$output .= '</a></li>';
		// END POSTS
		}
		$output .= '</ul>';
	// END CATEGORIES
	}
	$output .= '</div>';
	wp_reset_postdata();
	return $output;
}

function ticr_inspire_archive_flat($atts=NULL)
{
	// DEFAULTS
	if($atts['show_pages'])
	{
		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
	}
	
		
		$args = array (
			'post_type' => array('inspire-blog'),
			'has_password' => false,
			'posts_per_page' => ($atts['posts'] ? $atts['posts'] : 10),
			'paged' => $paged,
			'order' => 'DESC'
		);
		
		switch($atts['cat'])
		{
			case 'news': 
				$class = 'news';
				$args['tax_query'] = array(
					array(
						'terms' => 'eeco-news',
						'taxonomy' => 'inspire-category',
						'field' => 'slug'
					)
				);
				$featured_img_id = 17191;
				$archive_link = '';
				$label = 'News';
				break;
				
			case 'events': 
				$class = 'events';
				$args['tax_query'] = array(
					array(
						'terms' => 'eeco-events',
						'taxonomy' => 'inspire-category',
						'field' => 'slug'
					)
				);
				$featured_img_id = 19600;
				$archive_link = '';
				break;
				
			case 'careers':
				$class = 'careers';
				$args['tax_query'] = array(
					array(
						'terms' => 'eeco-careers',
						'taxonomy' => 'inspire-category',
						'field' => 'slug'
					)
				);
				$featured_img_id = 17191;
				$archive_link = '';
				break;
				
			case 'automation':
				$class = 'automation';
				$args['tax_query'] = array(
					array(
						'terms' => 'automation-solutions',
						'taxonomy' => 'inspire-category',
						'field' => 'slug'
					)
				);
				$featured_img_id = 17279;
				$archive_link = 19426;
				break;
				
			case 'motor':
				$class = 'motor';
				$args['tax_query'] = array(
					array(
						'terms' => 'motor-solutions',
						'taxonomy' => 'inspire-category',
						'field' => 'slug'
					)
				);
				$featured_img_id = 17308;
				$archive_link = 19430;
				break;
				
			case 'electrical':
				$class = 'electrical';
				$args['tax_query'] = array(
					array(
						'terms' => 'electrical-supplies',
						'taxonomy' => 'inspire-category',
						'field' => 'slug'
					)
				);
				$featured_img_id = 17609;
				$archive_link = 19436;
				break;
			
			default:
				$class = 'inspire';
				$featured_img_id = 17191;
				$archive_link = '';
				break;
		}
		
		$the_query = new WP_Query($args);
		
		if($atts['link'])
		{
			$archive_link[0] = '<a href="'.get_permalink($atts['link']).'" >';
			$archive_link[1] = '</a>';
		}
	
	// BEGIN OUTPUT	
	$output .= '<div class="inspire-archive-wrap">';

		$output .= '<ul class="archive-flat '.$class.'">';
		$output .= ($atts['title'] ? '<li><h3 class="archive-title">'.(isset($archive_link[0]) ? $archive_link[0] : '').$atts['title'].(isset($archive_link[0]) ? $archive_link[1] : '').'</h3></li>' : '');
		
		// FOREACH POST
		while($the_query->have_posts()) {
			
			$the_query->the_post();
			
			$output .= '<li class="archive-post-wrap"><a href="'.get_the_permalink().'" title="Read: '.get_the_title().'" style="display:block;">';
			$output .= '<ul class="archive-post">';
			$output .= '<li class="post-thumbnail">'.wp_get_attachment_image($featured_img_id, 'small').'</li>';
			//$output .= '<li class="post-date">88/88/8888</li>';
			$output .= '<li class="post-title-wrap"><h3 class="post-title">'.get_the_title().'</h3></li>';
			
			$output .= '</ul>';
			$output .= '<ul class="excerpt-wrap">';
			$output .= '<li class="post-excerpt-flat">'.get_the_excerpt().'</li>';
			$output .= '<li class="read-more">Read More ></li>';
			$output .= '</ul>';
			$output .= '</a></li>';
		// END POSTS
		}
		
		$output .= '</ul>';
		
	$output .= '</div>';
	
	if($atts['show_pages']) { $output .= ticr_inspire_pagination($the_query); }
	
	wp_reset_postdata();
	return $output;
}

function ticr_inspire_pagination($wpq)
{
	global $paged;
	
	$uri_array = explode('/page/', $_SERVER['REQUEST_URI']);
	$uri = $uri_array[0];
	
	$my_array = array(
		'is_archive' => $wpq->is_archive,
		'max_num_pages' => $wpq->max_num_pages,
		'found_posts' => $wpq->found_posts,
		'post_count' => $wpq->post_count,
		'paged' => $paged,
		'request_uri' => $uri
		);
		
	// BIULD PARAMETERS
	if($wpq->max_num_pages < 10) { $all_pages = true; $max = $wpq->max_num_pages; } 
	else { $max = 4; $last_page = true; }
	
	// PREV LINK ??
	if($paged > 1) { $prev = true; }
	
	// NEXT LINK ??
	if($paged < $wpq->max_num_pages) { $next = true; }
	
	// BUILD PAGINATION
	$output .= '<div class="archive-pagination pagination inspire">';
	$output .= '<ul>';
	
	// PREV
	$output .= ($prev ? '<li class="pagination-previous"><a href="'.ticr_inspire_pagination_link($paged).'">< PREVIOUS</a></li>' : '||');
	
	// BIULD PRE-OMISSION LINKS
	if($wpq->max_num_pages < 10) { $all_pages = true; $max = $wpq->max_num_pages; } 
	else { $max = 4; $last_page = true; }
	//$output .= '<li class="pagination-omission">...</li>';
	
	$output .= '<li class="current_page">... Page '.($paged < 2 ? '1' : $paged ).' of '.$wpq->max_num_pages.' ...</li>';
	
	// NEXT
	$output .= ($next ? '<li class="pagination-next"><a href="'.ticr_inspire_pagination_link($paged, 'next').'">NEXT ></a></li>' : '||');
	$output .= '</ul>';
	$output .= '</div>';
	
	//$output .= '<pre>'.print_r($my_array,true).'</pre>';
	
	return $output;
}

function ticr_inspire_pagination_link($paged, $position=NULL)
{
	$uri_array = explode('/page/', $_SERVER['REQUEST_URI']);
	$uri = $uri_array[0].(isset($uri_array[1]) ? '/' : '');
	
	if($position == 'next') { $ord = ($paged == 0 ? 2 : $paged + 1); $href = $uri.'page/'.$ord.'/'; }
	else { $ord = $paged - 1; $href = $uri.($ord > 1 ? 'page/'.$ord.'/' : ''); }
	
	return $href;
}

function ticr_inspire_menu($atts)
{
	wp_nav_menu(array('menu' => 'EECO Inspire'));
}

function ticr_inspire_posts($atts=NULL)
{
	
}

?>