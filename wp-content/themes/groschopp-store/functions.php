<?php
/**
 * Groschopp Store functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Groschopp_Store
 */

if ( ! function_exists( 'groschopp_store_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function groschopp_store_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Groschopp Store, use a find and replace
		 * to change 'groschopp-store' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'groschopp-store', get_template_directory() . '/languages' );

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
		register_nav_menus(array(
			'primary' => esc_html__( 'Primary', 'groschopp-store' ),
			'myaccount' => esc_html__( 'MyAccount', 'groschopp-store' ),
			'mobile' => esc_html__( 'Mobile', 'groschopp-store' ),
			'sub-nav' => esc_html__( 'Sub-Navigarion', 'groschopp-store' ),
			'footer' => esc_html__( 'Footer Menu', 'groschopp-store' ),
		));

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'groschopp_store_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		if( function_exists('acf_add_options_page') ) {

			acf_add_options_page(array(
				'page_title' 	=> 'Theme Settings',
				'menu_title'	=> 'Theme Settings',
				'menu_slug' 	=> 'theme-general-settings',
				'capability'	=> 'edit_posts',
				'redirect'		=> false
			));

			acf_add_options_sub_page(array(
				'page_title' 	=> 'Front Page',
				'menu_title'	=> 'Front Page',
				'parent_slug'	=> 'theme-general-settings',
			));

			acf_add_options_sub_page(array(
				'page_title' 	=> 'Footer',
				'menu_title'	=> 'Footer',
				'parent_slug'	=> 'theme-general-settings',
			));

		}

		add_image_size('homepage-motor-image', 769, 261);
		add_image_size('youtube-thumb', 260, 130);
		add_image_size('product-overview', 200, 200);
		add_image_size('gearbox-landing-image', 200, 133);
		add_image_size('cs-wp-thumb', 130, 130);

	}
endif;
add_action( 'after_setup_theme', 'groschopp_store_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function groschopp_store_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'groschopp_store_content_width', 640 );
}
add_action( 'after_setup_theme', 'groschopp_store_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function groschopp_store_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'groschopp-store' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'groschopp-store' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'groschopp_store_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function groschopp_store_scripts() {
	wp_enqueue_style( 'fontawesome-style', get_template_directory_uri() . '/fontawesome-all.min.css' );
	wp_enqueue_style( 'groschopp-store-style', get_stylesheet_uri() );
	wp_enqueue_style( 'custom-style-sheet', get_template_directory_uri() . '/css/custom.css' );
	
	wp_deregister_script( 'jquery' );
	wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', array(), '3.5.1', false );
	wp_enqueue_script( 'groschopp-store-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'groschopp-store-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'groschopp_store_scripts' );


add_filter( 'gform_field_value_part_number', 'groschopp_part_number' );
function groschopp_part_number( $value ) {
	return get_the_title($_GET['id']);
}

add_filter( 'gform_field_value_motor_specs', 'groschopp_motor_specs' );
function groschopp_motor_specs( $value ) {

	$data = get_transient($_GET['token']);
	$data = json_decode($data);
	$line = "";

	foreach($data as $line_k => $line_v) {
	    if(in_array($line_k, array('_wpnonce', '_wp_http_referer')) == false) {
            if(is_array($line_v)) {
                $line .= str_replace("_", " ",$line_k) . " : ";
                foreach($line_v as $item_k => $item_v) {
                    $line .= $item_v . ", ";
                }
            } else {
                $line .= str_replace("_", " ",$line_k) . " : " . $line_v . ", ";
            }
        }
	}

	return $line;
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
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';


require get_template_directory() . '/inc/menu-walker.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Case Studies Custom Post Type
 */
require get_template_directory() . '/inc/case-studies.php';

/**
 * News & Events Custom Post Type
 */
require get_template_directory() . '/inc/news-events.php';

/**
 * Videos Custom Post Type
 */
require get_template_directory() . '/inc/videos.php';

/**
 * Controls Custom Post Type
 */
require get_template_directory() . '/inc/controls.php';

/**
 * Gearbox Custom Post Type
 */
require get_template_directory() . '/inc/gearboxes.php';

/**
 * Accessories Custom Post Type
 */
require get_template_directory() . '/inc/accessories.php';

/**
 * Whitepapers Custom Post Type
 */
require get_template_directory() . '/inc/whitepapers.php';

/**
 * Voltage taxonomy
 */
require get_template_directory() . '/inc/voltage.php';

/**
 * Product IDs taxonomy
 */
require get_template_directory() . '/inc/product_id.php';

/**
 * Misc Functions
 */
require get_template_directory() . '/inc/misc-functions.php';

/**
 * ACF Functions
 */
require get_template_directory() . '/inc/acf.php';

/**
 *
 */
require get_template_directory() . '/inc/pagination.php';