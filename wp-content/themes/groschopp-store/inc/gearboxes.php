<?php

// Register Custom Post Type
function custom_gearbox() {

	$labels = array(
		'name'                  => _x( 'Gearboxes', 'Post Type General Name', 'groschopp' ),
		'singular_name'         => _x( 'Gearbox', 'Post Type Singular Name', 'groschopp' ),
		'menu_name'             => __( 'Gearboxes', 'groschopp' ),
		'name_admin_bar'        => __( 'Gearbox', 'groschopp' ),
		'archives'              => __( 'Gearbox Archives', 'groschopp' ),
		'attributes'            => __( 'Gearbox Attributes', 'groschopp' ),
		'parent_item_colon'     => __( 'Parent Gearbox:', 'groschopp' ),
		'all_items'             => __( 'All Gearboxes', 'groschopp' ),
		'add_new_item'          => __( 'Add New Gearbox', 'groschopp' ),
		'add_new'               => __( 'Add New', 'groschopp' ),
		'new_item'              => __( 'New Gearbox', 'groschopp' ),
		'edit_item'             => __( 'Edit Gearbox', 'groschopp' ),
		'update_item'           => __( 'Update Gearbox', 'groschopp' ),
		'view_item'             => __( 'View Gearbox', 'groschopp' ),
		'view_items'            => __( 'View Gearboxes', 'groschopp' ),
		'search_items'          => __( 'Search Gearbox', 'groschopp' ),
		'not_found'             => __( 'Not found', 'groschopp' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'groschopp' ),
		'featured_image'        => __( 'Featured Image', 'groschopp' ),
		'set_featured_image'    => __( 'Set featured image', 'groschopp' ),
		'remove_featured_image' => __( 'Remove featured image', 'groschopp' ),
		'use_featured_image'    => __( 'Use as featured image', 'groschopp' ),
		'insert_into_item'      => __( 'Insert into gearboxes', 'groschopp' ),
		'uploaded_to_this_item' => __( 'Uploaded to this gearbox', 'groschopp' ),
		'items_list'            => __( 'Gearboxes list', 'groschopp' ),
		'items_list_navigation' => __( 'Gearboxes list navigation', 'groschopp' ),
		'filter_items_list'     => __( 'Filter videos list', 'groschopp' ),
	);
	$args = array(
		'label'                 => __( 'Gearboxes', 'groschopp' ),
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
	register_post_type( 'gearbox', $args );

}
add_action( 'init', 'custom_gearbox', 0 );