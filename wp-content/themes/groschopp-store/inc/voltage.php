<?php

// Register Custom Taxonomy
function voltage() {

	$labels = array(
		'name'                       => _x( 'Voltages', 'Taxonomy General Name', 'groschopp' ),
		'singular_name'              => _x( 'Voltage', 'Taxonomy Singular Name', 'groschopp' ),
		'menu_name'                  => __( 'Voltage', 'groschopp' ),
		'all_items'                  => __( 'All Voltages', 'groschopp' ),
		'parent_item'                => __( 'Parent Voltage', 'groschopp' ),
		'parent_item_colon'          => __( 'Parent Voltage:', 'groschopp' ),
		'new_item_name'              => __( 'New Voltage Name', 'groschopp' ),
		'add_new_item'               => __( 'Add New Voltage', 'groschopp' ),
		'edit_item'                  => __( 'Edit Voltage', 'groschopp' ),
		'update_item'                => __( 'Update Voltage', 'groschopp' ),
		'view_item'                  => __( 'View Voltage', 'groschopp' ),
		'separate_items_with_commas' => __( 'Separate voltages with commas', 'groschopp' ),
		'add_or_remove_items'        => __( 'Add or remove voltages', 'groschopp' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'groschopp' ),
		'popular_items'              => __( 'Popular Voltages', 'groschopp' ),
		'search_items'               => __( 'Search Voltages', 'groschopp' ),
		'not_found'                  => __( 'Not Found', 'groschopp' ),
		'no_terms'                   => __( 'No voltages', 'groschopp' ),
		'items_list'                 => __( 'Voltages list', 'groschopp' ),
		'items_list_navigation'      => __( 'Voltages list navigation', 'groschopp' ),
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
	register_taxonomy( 'voltage', array( 'product' ), $args );

}
add_action( 'init', 'voltage', 0 );