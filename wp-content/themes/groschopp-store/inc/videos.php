<?php

// Register Custom Post Type
function custom_video() {

	$labels = array(
		'name'                  => _x( 'Videos', 'Post Type General Name', 'groschopp' ),
		'singular_name'         => _x( 'Video', 'Post Type Singular Name', 'groschopp' ),
		'menu_name'             => __( 'Videos', 'groschopp' ),
		'name_admin_bar'        => __( 'Video', 'groschopp' ),
		'archives'              => __( 'Video Archives', 'groschopp' ),
		'attributes'            => __( 'Video Attributes', 'groschopp' ),
		'parent_item_colon'     => __( 'Parent Video:', 'groschopp' ),
		'all_items'             => __( 'All Videos', 'groschopp' ),
		'add_new_item'          => __( 'Add New Video', 'groschopp' ),
		'add_new'               => __( 'Add New', 'groschopp' ),
		'new_item'              => __( 'New Video', 'groschopp' ),
		'edit_item'             => __( 'Edit Video', 'groschopp' ),
		'update_item'           => __( 'Update Video', 'groschopp' ),
		'view_item'             => __( 'View Video', 'groschopp' ),
		'view_items'            => __( 'View Videos', 'groschopp' ),
		'search_items'          => __( 'Search Video', 'groschopp' ),
		'not_found'             => __( 'Not found', 'groschopp' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'groschopp' ),
		'featured_image'        => __( 'Featured Image', 'groschopp' ),
		'set_featured_image'    => __( 'Set featured image', 'groschopp' ),
		'remove_featured_image' => __( 'Remove featured image', 'groschopp' ),
		'use_featured_image'    => __( 'Use as featured image', 'groschopp' ),
		'insert_into_item'      => __( 'Insert into video', 'groschopp' ),
		'uploaded_to_this_item' => __( 'Uploaded to this case study', 'groschopp' ),
		'items_list'            => __( 'Videos list', 'groschopp' ),
		'items_list_navigation' => __( 'Videos list navigation', 'groschopp' ),
		'filter_items_list'     => __( 'Filter videos list', 'groschopp' ),
	);
	$args = array(
		'label'                 => __( 'Videos', 'groschopp' ),
		'description'           => __( 'Post Type Description', 'groschopp' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail'),
		'taxonomies'            => array( ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-video-alt2',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'video', $args );

}
add_action( 'init', 'custom_video', 0 );