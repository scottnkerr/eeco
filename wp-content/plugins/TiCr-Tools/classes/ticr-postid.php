<?php

/****************************************************************/

// POST ID COLUMN IN ADMIN POST LIST (15.5.001)

/****************************************************************/

// Add ID Column
add_filter('manage_pages_columns', function($defaults) {
	$new_columns['post-id'] = 'Post ID';
	$result = array_merge($new_columns,$defaults);
    return $result;
}, 10);

add_filter('manage_posts_columns', function($defaults) {
	$new_columns['post-id'] = 'Post ID';
	$result = array_merge($new_columns,$defaults);
    return $result;
}, 10);

// Output ID
add_action('manage_pages_custom_column', function($column, $post_id) {
	if ($column == 'post-id') {
        // SHOW POST ID
		echo $post_id;
    }
}, 10, 2);

add_action('manage_posts_custom_column', function($column, $post_id) {
	if ($column == 'post-id') {
        // SHOW POST ID
		echo $post_id;
    }
}, 10, 2);

// Make Sortable
$post_types_to_sort = array('post', 'page');
foreach($post_types_to_sort as $post_type_to_sort)
{
	add_filter( 'manage_edit-'.$post_type_to_sort.'_sortable_columns', function ( $columns ) {
		$columns['post-id'] = 'post-id';
	 
		return $columns;
	});
}




?>