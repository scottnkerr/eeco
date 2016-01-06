<?php

add_shortcode('show-wsi-post-archive', array('ticr_wsi_posts', 'show_archive'));

// Filter to hide protected posts
function ticr_exclude_protected($where) {
	global $wpdb;
	return $where .= " AND {$wpdb->posts}.post_password = '' ";
}

// Decide where to display them
function ticr_exclude_protected_action($query) {
	if( is_search() ) {
		add_filter( 'posts_where', 'ticr_exclude_protected' );
	}
}

// Action to queue the filter at the right time
add_action('pre_get_posts', 'ticr_exclude_protected_action');

class ticr_wsi_posts
{
	function show_archive()
	{
		$args = array(
			'category_name' => 'wsi-update',
			'nopaging' => true
		);
		$wsi_posts = new WP_Query($args);
		
		$output = '<div class="archive wsi-integration-archive">';
		if(is_array($wsi_posts->posts))
		{
			
			foreach($wsi_posts->posts as $post)
			{
				// GET AUTHOR INFO
				$author_data = get_userdata($post->post_author);
				$output .= '<div class="entry">';
				$output .= '<h2 class="entry-title"><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></h2>';
				$output .= '<p class="post-meta">'.date('M d, Y', strtotime($post->post_date)).' | '.$author_data->first_name.' '.$author_data->last_name.'</p>';
				$output .= ($post->post_excerpt ? '<p class="post-excerpt">'.$post->post_excerpt.'</p>' : '');
				$output .= '<p><a href="'.get_permalink($post->ID).'" class="details more-link">Read More</a></p>';
				$output .= '<hr />';
				$output .= '</div>';
			}
			
		} else {
			$output = '<h2 class="entry-title">There are no posts in this category.</h2>';
		}
		$output .= '</div>';
		
		echo $output;
		
		//echo '<pre>'.print_r($wsi_posts->posts,true).'</pre>';
	}
}

?>