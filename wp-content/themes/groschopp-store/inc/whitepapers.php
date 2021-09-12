<?php

// Register Custom Post Type
function custom_whitepaper() {

	$labels = array(
		'name'                  => _x( 'Whitepapers', 'Post Type General Name', 'groschopp' ),
		'singular_name'         => _x( 'Whitepaper', 'Post Type Singular Name', 'groschopp' ),
		'menu_name'             => __( 'Whitepapers', 'groschopp' ),
		'name_admin_bar'        => __( 'Whitepaper', 'groschopp' ),
		'archives'              => __( 'Whitepaper Archives', 'groschopp' ),
		'attributes'            => __( 'Whitepaper Attributes', 'groschopp' ),
		'parent_item_colon'     => __( 'Parent Whitepaper:', 'groschopp' ),
		'all_items'             => __( 'All Whitepapers', 'groschopp' ),
		'add_new_item'          => __( 'Add New Whitepaper', 'groschopp' ),
		'add_new'               => __( 'Add New', 'groschopp' ),
		'new_item'              => __( 'New Whitepaper', 'groschopp' ),
		'edit_item'             => __( 'Edit Whitepaper', 'groschopp' ),
		'update_item'           => __( 'Update Whitepaper', 'groschopp' ),
		'view_item'             => __( 'View Whitepaper', 'groschopp' ),
		'view_items'            => __( 'View Whitepapers', 'groschopp' ),
		'search_items'          => __( 'Search Whitepaper', 'groschopp' ),
		'not_found'             => __( 'Not found', 'groschopp' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'groschopp' ),
		'featured_image'        => __( 'Featured Image', 'groschopp' ),
		'set_featured_image'    => __( 'Set featured image', 'groschopp' ),
		'remove_featured_image' => __( 'Remove featured image', 'groschopp' ),
		'use_featured_image'    => __( 'Use as featured image', 'groschopp' ),
		'insert_into_item'      => __( 'Insert into case study', 'groschopp' ),
		'uploaded_to_this_item' => __( 'Uploaded to this case study', 'groschopp' ),
		'items_list'            => __( 'Whitepapers list', 'groschopp' ),
		'items_list_navigation' => __( 'Whitepapers list navigation', 'groschopp' ),
		'filter_items_list'     => __( 'Filter whitepapers list', 'groschopp' ),
	);
	$args = array(
		'label'                 => __( 'Whitepapers', 'groschopp' ),
		'description'           => __( 'Post Type Description', 'groschopp' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', ),
		'taxonomies'            => array(  ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-media-text',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'whitepaper', $args );

}
add_action( 'init', 'custom_whitepaper', 0 );