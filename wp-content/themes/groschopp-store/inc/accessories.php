<?php

// Register Custom Post Type
function custom_accessory() {

	$labels = array(
		'name'                  => _x( 'Accessories', 'Post Type General Name', 'groschopp' ),
		'singular_name'         => _x( 'Accessory', 'Post Type Singular Name', 'groschopp' ),
		'menu_name'             => __( 'Accessories', 'groschopp' ),
		'name_admin_bar'        => __( 'Accessory', 'groschopp' ),
		'archives'              => __( 'Accessory Archives', 'groschopp' ),
		'attributes'            => __( 'Accessory Attributes', 'groschopp' ),
		'parent_item_colon'     => __( 'Parent Accessory:', 'groschopp' ),
		'all_items'             => __( 'All Accessories', 'groschopp' ),
		'add_new_item'          => __( 'Add New Accessory', 'groschopp' ),
		'add_new'               => __( 'Add New', 'groschopp' ),
		'new_item'              => __( 'New Accessory', 'groschopp' ),
		'edit_item'             => __( 'Edit Accessory', 'groschopp' ),
		'update_item'           => __( 'Update Accessory', 'groschopp' ),
		'view_item'             => __( 'View Accessory', 'groschopp' ),
		'view_items'            => __( 'View Accessories', 'groschopp' ),
		'search_items'          => __( 'Search Accessory', 'groschopp' ),
		'not_found'             => __( 'Not found', 'groschopp' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'groschopp' ),
		'featured_image'        => __( 'Featured Image', 'groschopp' ),
		'set_featured_image'    => __( 'Set featured image', 'groschopp' ),
		'remove_featured_image' => __( 'Remove featured image', 'groschopp' ),
		'use_featured_image'    => __( 'Use as featured image', 'groschopp' ),
		'insert_into_item'      => __( 'Insert into gearboxes', 'groschopp' ),
		'uploaded_to_this_item' => __( 'Uploaded to this gearbox', 'groschopp' ),
		'items_list'            => __( 'Accessories list', 'groschopp' ),
		'items_list_navigation' => __( 'Accessories list navigation', 'groschopp' ),
		'filter_items_list'     => __( 'Filter videos list', 'groschopp' ),
	);
	$args = array(
		'label'                 => __( 'Accessories', 'groschopp' ),
		'description'           => __( 'Post Type Description', 'groschopp' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor'),
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
	register_post_type( 'accessory', $args );

}
add_action( 'init', 'custom_accessory', 0 );