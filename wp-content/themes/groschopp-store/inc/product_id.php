<?php

// Register Custom Taxonomy
function product_id() {

	$labels = array(
		'name'                       => _x( 'Product IDs', 'Taxonomy General Name', 'groschopp' ),
		'singular_name'              => _x( 'Product ID', 'Taxonomy Singular Name', 'groschopp' ),
		'menu_name'                  => __( 'Product ID', 'groschopp' ),
		'all_items'                  => __( 'All Product IDs', 'groschopp' ),
		'parent_item'                => __( 'Parent Product ID', 'groschopp' ),
		'parent_item_colon'          => __( 'Parent Product ID:', 'groschopp' ),
		'new_item_name'              => __( 'New Product ID Name', 'groschopp' ),
		'add_new_item'               => __( 'Add New Product ID', 'groschopp' ),
		'edit_item'                  => __( 'Edit Product ID', 'groschopp' ),
		'update_item'                => __( 'Update Product ID', 'groschopp' ),
		'view_item'                  => __( 'View Product ID', 'groschopp' ),
		'separate_items_with_commas' => __( 'Separate product ids with commas', 'groschopp' ),
		'add_or_remove_items'        => __( 'Add or remove product ids', 'groschopp' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'groschopp' ),
		'popular_items'              => __( 'Popular Product IDs', 'groschopp' ),
		'search_items'               => __( 'Search Product IDs', 'groschopp' ),
		'not_found'                  => __( 'Not Found', 'groschopp' ),
		'no_terms'                   => __( 'No product ids', 'groschopp' ),
		'items_list'                 => __( 'Product IDs list', 'groschopp' ),
		'items_list_navigation'      => __( 'Product IDs list navigation', 'groschopp' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'product_id', array( 'product' ), $args );

}
add_action( 'init', 'product_id', 0 );