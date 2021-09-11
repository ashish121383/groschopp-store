<?php

// Register Custom Post Type
function custom_controller() {

	$labels = array(
		'name'                  => _x( 'Controls', 'Post Type General Name', 'groschopp' ),
		'singular_name'         => _x( 'Control', 'Post Type Singular Name', 'groschopp' ),
		'menu_name'             => __( 'Controls', 'groschopp' ),
		'name_admin_bar'        => __( 'Control', 'groschopp' ),
		'archives'              => __( 'Control Archives', 'groschopp' ),
		'attributes'            => __( 'Control Attributes', 'groschopp' ),
		'parent_item_colon'     => __( 'Parent Control:', 'groschopp' ),
		'all_items'             => __( 'All Controls', 'groschopp' ),
		'add_new_item'          => __( 'Add New Control', 'groschopp' ),
		'add_new'               => __( 'Add New', 'groschopp' ),
		'new_item'              => __( 'New Control', 'groschopp' ),
		'edit_item'             => __( 'Edit Control', 'groschopp' ),
		'update_item'           => __( 'Update Control', 'groschopp' ),
		'view_item'             => __( 'View Control', 'groschopp' ),
		'view_items'            => __( 'View Controls', 'groschopp' ),
		'search_items'          => __( 'Search Control', 'groschopp' ),
		'not_found'             => __( 'Not found', 'groschopp' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'groschopp' ),
		'featured_image'        => __( 'Featured Image', 'groschopp' ),
		'set_featured_image'    => __( 'Set featured image', 'groschopp' ),
		'remove_featured_image' => __( 'Remove featured image', 'groschopp' ),
		'use_featured_image'    => __( 'Use as featured image', 'groschopp' ),
		'insert_into_item'      => __( 'Insert into controls', 'groschopp' ),
		'uploaded_to_this_item' => __( 'Uploaded to this controls', 'groschopp' ),
		'items_list'            => __( 'Controls list', 'groschopp' ),
		'items_list_navigation' => __( 'Controls list navigation', 'groschopp' ),
		'filter_items_list'     => __( 'Filter videos list', 'groschopp' ),
	);
	$args = array(
		'label'                 => __( 'Controls', 'groschopp' ),
		'description'           => __( 'Post Type Description', 'groschopp' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail'),
		'taxonomies'            => array( ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-admin-generic',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'control', $args );

}
add_action( 'init', 'custom_controller', 0 );