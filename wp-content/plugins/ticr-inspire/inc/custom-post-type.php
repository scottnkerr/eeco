<?php	// v.1.02.2015.11.09.0002

// Exit if accessed directly.
defined( 'ABSPATH' ) or die( 'TiCr - Improper Access' );

/****************************************************************/

//		REGISTER CUSTOM POST TYPE AND TAXONOMY

/****************************************************************/

add_action( 'init', 'ticr_register_inspire_post_type');
function ticr_register_inspire_post_type()
{	
	$post_type_singular = 'Inspire Post';
	$post_type_plural = 'Inspire Posts';
	$post_type_slug = 'inspire-blog';
	$post_type_rewrite = 'inspire';
	
    $args = array(
		'label' => $post_type_singular,
		'labels'=> array (
			'name' => $post_type_plural,
			'singular_name' => $post_type_singular,
			'add_new' => __( 'Add New', $post_type_singular ),
			'add_new_item' => __('Add New '.$post_type_singular),
			'edit_item' => __('Edit '.$post_type_singular),
			'new_item' => __('New '.$post_type_singular),
			'view_item' => __('View '.$post_type_singular),
			'search_items' => __('Search '.$post_type_singular),
			'not_found' => __('No '.$post_type_plural.' Found'),
			'not_found_in_trash' => __('No '.$post_type_plural.' found in Trash'),
			'parent_item_colon' => __('Parent '.$post_type_singular.':'),
			'all_items' => __('All '.$post_type_plural),
			'featured_image' => __('Featured Image'),
			'set_featured_image' => __('Set featured image'),
			'remove_featured_image' => __('Remove featured image'),
			'use_featured_image' => __('Use featured image'),
			'menu_name' => __('EECO Inspire')
		),
		'public' => true,
		'has_archive' => false,
		'hierarchical' => true,
		'rewrite' => array('slug' => 'inspire-blog', 'with_front' => false),
		//'rewrite' => false,
		'taxonomies' => array('category', 'post_tag', 'inspire-category', 'inspire-tag'),
		'supports' => array(
			'title',
			'editor',
			'author',
			'thumbnail',
			'excerpt',
			'page-attributes',
			'trackbacks',
			'comments'
		)
    );
    register_post_type( $post_type_slug, $args );
	
	
	// REGISTER INSPIRE CATEGORY
	
	$tax_singular = 'Inspire Category';
	$tax_plural = 'Inspire Categories';
	$tax_slug = 'inspire-category';
	$tax_rewrite = 'inspire-category';
	
	$args = array(
		'label' => $tax_plural,
		'labels' => array(
			'name' => _x( $tax_plural, 'taxonomy general name' ),
			'singular_name' => _x( 'Inspire Category', 'taxonomy singular name' ),
			'menu_name' => $tax_plural,
			'all_items' => __( 'All '.$tax_plural ),
			'edit_item' => __( 'Edit '.$tax_singular ),
			'view_item' => __( 'View '.$tax_singular ),
			'update_item' => __( 'Update '.$tax_singular ),
			'add_new_item' => __( 'Add New '.$tax_singular ),
			'new_item_name' => __( 'New '.$tax_singular.' Name' ),
			'parent_item' => __( 'Parent '.$tax_singular ),
			'parent_item_colon' => __( 'Parent '.$tax_singular.':' ),
			'search_items' => __( 'Search '.$tax_plural )
		),
		'public' => true,
		'show_admin_column' => true,
		'rewrite' => false,
		'hierarchical' => true
	);

	register_taxonomy( $tax_slug, $post_type_slug, $args );
	
	
	// REGISTER INSPIRE TAG
	
	$tax_singular = 'Inspire Tag';
	$tax_plural = 'Inspire Tags';
	$tax_slug = 'inspire-tag';
	
	$args = array(
		'label' => $tax_plural,
		'labels' => array(
			'name' => _x( $tax_plural, 'taxonomy general name' ),
			'singular_name' => _x( 'Inspire Category', 'taxonomy singular name' ),
			'menu_name' => $tax_plural,
			'all_items' => __( 'All '.$tax_plural ),
			'edit_item' => __( 'Edit '.$tax_singular ),
			'view_item' => __( 'View '.$tax_singular ),
			'update_item' => __( 'Update '.$tax_singular ),
			'add_new_item' => __( 'Add New '.$tax_singular ),
			'new_item_name' => __( 'New '.$tax_singular.' Name' ),
			'parent_item' => __( 'Parent '.$tax_singular ),
			'parent_item_colon' => __( 'Parent '.$tax_singular.':' ),
			'search_items' => __( 'Search '.$tax_plural )
		),
		'public' => true,
		'show_admin_column' => true,
		'rewrite' => false,
		'hierarchical' => false
	);

	register_taxonomy( $tax_slug, $post_type_slug, $args );

}

?>