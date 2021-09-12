<?php

// Register Custom Taxonomy
function custom_case_study_category() {

	$labels = array(
		'name'                       => _x( 'Categories', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Category', 'text_domain' ),
		'all_items'                  => __( 'All Categories', 'text_domain' ),
		'parent_item'                => __( 'Parent Category', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Category:', 'text_domain' ),
		'new_item_name'              => __( 'New Category Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Category', 'text_domain' ),
		'edit_item'                  => __( 'Edit Category', 'text_domain' ),
		'update_item'                => __( 'Update Category', 'text_domain' ),
		'view_item'                  => __( 'View Category', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate categories with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove categories', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Categories', 'text_domain' ),
		'search_items'               => __( 'Search Categories', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No Categories', 'text_domain' ),
		'items_list'                 => __( 'Cateogries list', 'text_domain' ),
		'items_list_navigation'      => __( 'Categories list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'case_study_category', array( 'case_study' ), $args );

}
add_action( 'init', 'custom_case_study_category', 0 );

// Register Custom Post Type
function custom_case_study() {

	$labels = array(
		'name'                  => _x( 'Case Studies', 'Post Type General Name', 'groschopp' ),
		'singular_name'         => _x( 'Case Study', 'Post Type Singular Name', 'groschopp' ),
		'menu_name'             => __( 'Case Study', 'groschopp' ),
		'name_admin_bar'        => __( 'Case Study', 'groschopp' ),
		'archives'              => __( 'Case Study Archives', 'groschopp' ),
		'attributes'            => __( 'Case Study Attributes', 'groschopp' ),
		'parent_item_colon'     => __( 'Parent Case Study:', 'groschopp' ),
		'all_items'             => __( 'All Case Studies', 'groschopp' ),
		'add_new_item'          => __( 'Add New Case Study', 'groschopp' ),
		'add_new'               => __( 'Add New', 'groschopp' ),
		'new_item'              => __( 'New Case Study', 'groschopp' ),
		'edit_item'             => __( 'Edit Case Study', 'groschopp' ),
		'update_item'           => __( 'Update Case Study', 'groschopp' ),
		'view_item'             => __( 'View Case Study', 'groschopp' ),
		'view_items'            => __( 'View Case Studies', 'groschopp' ),
		'search_items'          => __( 'Search Case Study', 'groschopp' ),
		'not_found'             => __( 'Not found', 'groschopp' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'groschopp' ),
		'featured_image'        => __( 'Featured Image', 'groschopp' ),
		'set_featured_image'    => __( 'Set featured image', 'groschopp' ),
		'remove_featured_image' => __( 'Remove featured image', 'groschopp' ),
		'use_featured_image'    => __( 'Use as featured image', 'groschopp' ),
		'insert_into_item'      => __( 'Insert into case study', 'groschopp' ),
		'uploaded_to_this_item' => __( 'Uploaded to this case study', 'groschopp' ),
		'items_list'            => __( 'Case studies list', 'groschopp' ),
		'items_list_navigation' => __( 'Case studies list navigation', 'groschopp' ),
		'filter_items_list'     => __( 'Filter case studies list', 'groschopp' ),
	);
	$rewrite = array(
		'slug'                  => 'case-study',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Case Study', 'groschopp' ),
		'description'           => __( 'Post Type Description', 'groschopp' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'case_study_category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-admin-page',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'case_study', $args );

}
add_action( 'init', 'custom_case_study', 0 );
