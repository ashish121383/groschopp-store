<?php
/**
 * Groschopp functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package Groschopp
 */

if ( ! function_exists( 'groschopp_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function groschopp_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Groschopp, use a find and replace
	 * to change 'groschopp' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'groschopp', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => 'Primary Menu',
		'sub-nav' => 'Secondary Menu',
		'mobile' 	=> 'Mobile Menu'
	));

	/// Image sizes
	add_image_size('homepage-motor-image', 769, 261);
	add_image_size('youtube-thumb', 260, 130);
	add_image_size('product-overview', 200, 200);
	add_image_size('gearbox-landing-image', 200, 133);
	
	add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
	add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );
	
	function remove_width_attribute( $html ) {
		$html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
		return $html;
	}
	
	// Page additions
	add_theme_support('post-thumbnails');
	add_post_type_support( 'page', 'excerpt' );
	
}
endif; // groschopp_setup
add_action( 'after_setup_theme', 'groschopp_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function groschopp_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'groschopp_content_width', 640 );
}
add_action( 'after_setup_theme', 'groschopp_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function groschopp_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'groschopp' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'groschopp_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function groschopp_scripts() {
	wp_register_style( 'groschopp-style', get_template_directory_uri() . '/style.min.css' );
	wp_enqueue_style( 'groschopp-style' );

	wp_enqueue_script( 'groschopp-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'groschopp-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'groschopp_scripts' );

add_filter( 'get_the_archive_title', function ( $title ) {

    if( is_category() ) {

        $title = single_cat_title( '', false );

    }

    return $title;

});


add_filter('wpseo_title', 'filter_wpseo_title');
function filter_wpseo_title($title) {
    if(  is_singular( 'product') && $_GET['id']) {
    	$product = get_product($_GET['id']);

        $title = $product->voltage ."v ". get_the_title() ." ". $product->model ." ". get_the_title() ." | Groschopp";
    }

    return $title;
}


add_action( 'init', 'update_url_structure' );
function update_url_structure() {
	  register_post_type( 'post', array(
	    'public'  => true,
	    '_builtin' => false, 
	    '_edit_link' => 'post.php?post=%d', 
	    'capability_type' => 'post',
	    'map_meta_cap' => true,
	    'hierarchical' => false,
	    'rewrite' => array( 'slug' => '/blog' ),
	    'query_var' => false,
	    'pages'     => false,
	    'supports' => array( 
	        'title', 
	        'editor',
	        'author', 
	        'thumbnail', 
	        'excerpt', 
	        'revisions'
	    ),
	));
}


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

require get_template_directory() . '/inc/submenu-walker.php';
require get_template_directory() . '/inc/menu-walker.php';
require get_template_directory() . '/inc/misc-functions.php';

require get_template_directory() . '/inc/pagination.php';

