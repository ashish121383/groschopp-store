<?php

include( TEMPLATEPATH.'/classes.php' );
include( TEMPLATEPATH.'/constants.php' );

/**
 * Disable automatic general feed link outputting.
 */
automatic_feed_links( false );

//remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'wp_generator');

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Default Sidebar',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	));
}

function theme_template_shortcode() {
	return get_bloginfo('template_url');
}
add_shortcode('template_url', 'theme_template_shortcode');

function theme_widget_shortcode($text) {
	return do_shortcode($text);
}
add_filter('widget_text', 'theme_widget_shortcode');

/* Replace Default WP Menu Classes */
function change_menu_classes($css_classes) {
	$css_classes = str_replace("current-menu-item", "active", $css_classes);
	$css_classes = str_replace("current-menu-parent", "active", $css_classes);
	$css_classes = str_replace("current-post-ancestor", "active", $css_classes);
	return $css_classes;
}
add_filter('nav_menu_css_class', 'change_menu_classes');

if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 50, 50, true ); // Normal post thumbnails
	add_image_size( 'slide-post-thumbnail', 940, 400, true );
	add_image_size( 'product-post-thumbnail', 299, 124, true );
	add_image_size( 'product2-post-thumbnail', 289, 155, true );
	add_image_size( 'youtube-thumb', 176, 90, true );
	add_image_size( 'cs-wp-thumb', 130, 130, true );
}

$labels_slide = array(
    'name' => _x('Slides', 'post type general name'),
    'singular_name' => _x('Slides', 'post type singular name'),
    'add_new' => _x('Add New', 'slide'),
    'add_new_item' => __('Add New Slide'),
    'edit_item' => __('Edit Slide'),
    'new_item' => __('New Slide'),
    'view_item' => __('View Slide'),
    'search_items' => __('Search Slide' ),
    'not_found' =>  __('No slide found'),
    'not_found_in_trash' => __('No slide found in Trash'), 
    'parent_item_colon' => ''
  );

register_post_type('slide', array(
	'labels' => $labels_slide,
	'public' => true,
	'show_ui' => true,
	'capability_type' => 'post',
	'hierarchical' => false,
	'rewrite' => true,
	'query_var' => true,
	'has_archive' => true,
	'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'custom-fields')
));

$labels_testimonial = array(
    'name' => _x('Testimonials', 'post type general name'),
    'singular_name' => _x('Testimonials', 'post type singular name'),
    'add_new' => _x('Add New', 'testimonial'),
    'add_new_item' => __('Add New Testimonial'),
    'edit_item' => __('Edit Testimonial'),
    'new_item' => __('New Testimonial'),
    'view_item' => __('View Testimonial'),
    'search_items' => __('Search Testimonial' ),
    'not_found' =>  __('No testimonial found'),
    'not_found_in_trash' => __('No testimonial found in Trash'), 
    'parent_item_colon' => ''
  );

register_post_type('testimonial', array(
	'labels' => $labels_testimonial,
	'public' => true,
	'show_ui' => true,
	'capability_type' => 'post',
	'hierarchical' => false,
	'rewrite' => true,
	'query_var' => true,
	'has_archive' => true,
	'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'custom-fields')
));

add_action( 'init', 'create_custom_post_types' );

function create_custom_post_types() {

	register_post_type( 'youtube-vids', array(
	'labels' 					=> array(
		'name'					=> __( 'Youtube Videos' ), 
		'singular_name'			=> __( 'Youtube Video' ),
		'view'					=> __( 'View Youtube Videos' ),
		'view_item'				=> __( 'View Youtube Videos' ),
		'add_new'				=> __( 'Add New Youtube Video' ),
		'add_new_item'			=> __( 'Add New Youtube Video' ),
		'edit'					=> __( 'Edit Youtube Videos' ),
		'edit_item'				=> __( 'Edit Youtube Videos' )
	),
	'exclude_from_search'		=> true,
	'public'					=> true, 
	'menu_position'				=> 4,
	'supports'					=> array( 'title', 'thumbnail', 'editor' )));
	
}

function filter_cat_headers($columns) {
 $columns = array_merge(array('cb' => 'cb', 'term_id' => 'ID'), $columns);
 return $columns;
}
function filter_cat_headers_sortable($columns) {
 $columns = array_merge(array('term_id' => 'ID'), $columns);
 return $columns;
}
add_filter('manage_edit-category_columns','filter_cat_headers');
add_filter('manage_edit-category_sortable_columns','filter_cat_headers_sortable');
function filter_term_id_col($col, $name, $term_id) {
 echo $term_id;
}
add_filter('manage_category_custom_column','filter_term_id_col', 10, 3);
function admin_register_head() {
echo '<style type="text/css">
.column-term_id {width:45px;}
</style>';
}
add_action('admin_head', 'admin_register_head');

// add_action('wp_head', 'show_template');
// function show_template() {
//     global $template;
//     print_r($template);
// }

function get_field($field, $post_id = null) 
{ 
	global $post; 
	if(!$post_id) $post_id = $post->ID; 
	return get_post_meta($post_id, $field, true); 
}

// add_action('wp_dashboard_setup', 'export_widget');

function export_widget() {
	global $wp_meta_boxes;
	wp_add_dashboard_widget('custom_export_widget', 'Download Motor Match Data', 'custom_export_widget');
}

function custom_export_widget() {
	
	if($_POST) {
		echo "TEST";
	}
	
	echo '<p align="center">';
	echo '<form method="post" action="">';
	echo '<input type="submit" value="Download Now" />';
	echo '</form>';
	echo '</p>';
}

?>