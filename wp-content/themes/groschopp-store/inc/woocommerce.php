<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package Groschopp_Store
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)-in-3.0.0
 *
 * @return void
 */
function groschopp_store_woocommerce_setup() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'groschopp_store_woocommerce_setup' );

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function groschopp_store_woocommerce_scripts() {
	wp_enqueue_style( 'groschopp-store-woocommerce-style', get_template_directory_uri() . '/woocommerce.css' );

	$font_path   = WC()->plugin_url() . '/assets/fonts/';
	$inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

	wp_add_inline_style( 'groschopp-store-woocommerce-style', $inline_font );
}
add_action( 'wp_enqueue_scripts', 'groschopp_store_woocommerce_scripts' );

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function groschopp_store_woocommerce_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter( 'body_class', 'groschopp_store_woocommerce_active_body_class' );

/**
 * Products per page.
 *
 * @return integer number of products.
 */
function groschopp_store_woocommerce_products_per_page() {
	return 12;
}
add_filter( 'loop_shop_per_page', 'groschopp_store_woocommerce_products_per_page' );

/**
 * Product gallery thumnbail columns.
 *
 * @return integer number of columns.
 */
function groschopp_store_woocommerce_thumbnail_columns() {
	return 4;
}
add_filter( 'woocommerce_product_thumbnails_columns', 'groschopp_store_woocommerce_thumbnail_columns' );

/**
 * Default loop columns on product archives.
 *
 * @return integer products per row.
 */
function groschopp_store_woocommerce_loop_columns() {
	return 3;
}
add_filter( 'loop_shop_columns', 'groschopp_store_woocommerce_loop_columns' );

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function groschopp_store_woocommerce_related_products_args( $args ) {
	$defaults = array(
		'posts_per_page' => 3,
		'columns'        => 3,
	);

	$args = wp_parse_args( $defaults, $args );

	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'groschopp_store_woocommerce_related_products_args' );

if ( ! function_exists( 'groschopp_store_woocommerce_product_columns_wrapper' ) ) {
	/**
	 * Product columns wrapper.
	 *
	 * @return  void
	 */
	function groschopp_store_woocommerce_product_columns_wrapper() {
		$columns = groschopp_store_woocommerce_loop_columns();
		echo '<div class="columns-' . absint( $columns ) . '">';
	}
}
add_action( 'woocommerce_before_shop_loop', 'groschopp_store_woocommerce_product_columns_wrapper', 40 );

if ( ! function_exists( 'groschopp_store_woocommerce_product_columns_wrapper_close' ) ) {
	/**
	 * Product columns wrapper close.
	 *
	 * @return  void
	 */
	function groschopp_store_woocommerce_product_columns_wrapper_close() {
		echo '</div>';
	}
}
add_action( 'woocommerce_after_shop_loop', 'groschopp_store_woocommerce_product_columns_wrapper_close', 40 );

/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

if ( ! function_exists( 'groschopp_store_woocommerce_wrapper_before' ) ) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function groschopp_store_woocommerce_wrapper_before() {
		?>
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
		<?php
	}
}
add_action( 'woocommerce_before_main_content', 'groschopp_store_woocommerce_wrapper_before' );

if ( ! function_exists( 'groschopp_store_woocommerce_wrapper_after' ) ) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function groschopp_store_woocommerce_wrapper_after() {
		?>
			</main><!-- #main -->
		</div><!-- #primary -->
		<?php
	}
}
add_action( 'woocommerce_after_main_content', 'groschopp_store_woocommerce_wrapper_after' );

/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 *
	<?php
		if ( function_exists( 'groschopp_store_woocommerce_header_cart' ) ) {
			groschopp_store_woocommerce_header_cart();
		}
	?>
 */

if ( ! function_exists( 'groschopp_store_woocommerce_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 */
	function groschopp_store_woocommerce_cart_link_fragment( $fragments ) {
		ob_start();
		groschopp_store_woocommerce_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'groschopp_store_woocommerce_cart_link_fragment' );

if ( ! function_exists( 'groschopp_store_woocommerce_cart_link' ) ) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function groschopp_store_woocommerce_cart_link() {
		?>
			<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'groschopp-store' ); ?>">
				<?php /* translators: number of items in the mini cart. */ ?>
				<span class="amount"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span> <span class="count"><?php echo wp_kses_data( sprintf( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'groschopp-store' ), WC()->cart->get_cart_contents_count() ) );?></span>
			</a>
		<?php
	}
}

if ( ! function_exists( 'groschopp_store_woocommerce_header_cart' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function groschopp_store_woocommerce_header_cart() {
		if ( is_cart() ) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}
		?>
		<ul id="site-header-cart" class="site-header-cart">
			<li class="<?php echo esc_attr( $class ); ?>">
				<?php groschopp_store_woocommerce_cart_link(); ?>
			</li>
			<li>
				<?php
					$instance = array(
						'title' => '',
					);

					the_widget( 'WC_Widget_Cart', $instance );
				?>
			</li>
		</ul>
		<?php
	}
}

add_action( 'init', 'jk_remove_wc_breadcrumbs' );
function jk_remove_wc_breadcrumbs() {
	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}
add_filter( 'woocommerce_cart_item_thumbnail', '__return_false' );


function wpse_hide_cat_descr() { ?>

    <style type="text/css">
        .term-description-wrap {
            display: none;
        }
        tr.form-field:nth-child(5){
            display:none;
        }
        tr.form-field:nth-child(6){
            display:none;
        }
    </style>

<?php }

add_action( 'admin_head-term.php', 'wpse_hide_cat_descr' );

add_filter ( 'woocommerce_account_menu_items', 'misha_remove_my_account_links' );
function misha_remove_my_account_links( $menu_links ){

	unset( $menu_links['edit-address'] ); // Addresses
	unset( $menu_links['dashboard'] ); // Dashboard
	unset( $menu_links['payment-methods'] ); // Payment Methods
	unset( $menu_links['orders'] ); // Orders
	unset( $menu_links['downloads'] ); // Downloads
	unset( $menu_links['edit-account'] ); // Account details
	unset( $menu_links['customer-logout'] ); // Logout

	return $menu_links;

}

add_action( 'woocommerce_register_form_start', 'bbloomer_add_name_woo_account_registration' );

function bbloomer_add_name_woo_account_registration() {
	?>

    <p class="form-row form-row-first">
        <label for="reg_billing_first_name"><?php _e( 'First name', 'woocommerce' ); ?> <span class="required">*</span></label>
        <input type="text" class="input-text" name="billing_first_name" id="reg_billing_first_name" value="<?php if ( ! empty( $_POST['billing_first_name'] ) ) esc_attr_e( $_POST['billing_first_name'] ); ?>" />
    </p>

    <p class="form-row form-row-last">
        <label for="reg_billing_last_name"><?php _e( 'Last name', 'woocommerce' ); ?> <span class="required">*</span></label>
        <input type="text" class="input-text" name="billing_last_name" id="reg_billing_last_name" value="<?php if ( ! empty( $_POST['billing_last_name'] ) ) esc_attr_e( $_POST['billing_last_name'] ); ?>" />
    </p>

    <div class="clear"></div>

	<?php
}

///////////////////////////////
// 2. VALIDATE FIELDS

add_filter( 'woocommerce_registration_errors', 'bbloomer_validate_name_fields', 10, 3 );

function bbloomer_validate_name_fields( $errors, $username, $email ) {
	if ( isset( $_POST['billing_first_name'] ) && empty( $_POST['billing_first_name'] ) ) {
		$errors->add( 'billing_first_name_error', __( '<strong>Error</strong>: First name is required!', 'woocommerce' ) );
	}
	if ( isset( $_POST['billing_last_name'] ) && empty( $_POST['billing_last_name'] ) ) {
		$errors->add( 'billing_last_name_error', __( '<strong>Error</strong>: Last name is required!.', 'woocommerce' ) );
	}
	return $errors;
}

///////////////////////////////
// 3. SAVE FIELDS

add_action( 'woocommerce_created_customer', 'bbloomer_save_name_fields' );

function bbloomer_save_name_fields( $customer_id ) {
	if ( isset( $_POST['billing_first_name'] ) ) {
		update_user_meta( $customer_id, 'billing_first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
	}
	if ( isset( $_POST['billing_last_name'] ) ) {
		update_user_meta( $customer_id, 'billing_last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
	}

}

add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {

	unset( $tabs['description'] );      	// Remove the description tab
	unset( $tabs['reviews'] ); 			// Remove the reviews tab
	unset( $tabs['additional_information'] );  	// Remove the additional information tab

	return $tabs;

}

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

add_action( 'woocommerce_check_cart_items', 'woocommerce_check_cart_quantities' );
function woocommerce_check_cart_quantities()
{
	global $woocommerce;
	$limit = 5;

    foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $values )
    {
        if($values['quantity'] > $limit)
        {
            wc_add_notice( sprintf( __('Hi there! You\'re currently only allowed to purchase %1$s of any one product online.  If you\'d like to order more please contact us.', 'woocommerce'), $limit ), 'notice' );
            remove_action( 'woocommerce_proceed_to_checkout', 'woocommerce_button_proceed_to_checkout', 20);
        }
    }
}

function groschopp_max_qty_input_args( $args, $product ) {

	$limit = 5;

	$args['max_value'] = $limit;

	return $args;
}
add_filter( 'woocommerce_quantity_input_args', 'groschopp_max_qty_input_args', 10, 2 );

add_action( 'woocommerce_thankyou', 'bbloomer_conversion_tracking_thank_you_page' );
function bbloomer_conversion_tracking_thank_you_page() {
    ?>
    <!-- Event snippet for **LP Purchase - Pixel conversion page -->
    <script>
        gtag('event', 'conversion', {
            'send_to': 'AW-1071320427/LWHwCPvyxNMBEOua7P4D',
            'value': 1.0,
            'currency': 'USD',
            'transaction_id': ''
        });
    </script>
    <?php
}
