<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
// get_header( 'shop' );
get_header( 'new' );

/* grab the url for the full size featured image */
$upload_dir = wp_upload_dir();
$featured_img_url = $upload_dir['baseurl'].'/2021/09/product-bg.jpeg'; 
?> 
<div class="product-grp">
    <div class="product-banner" style="background-image:url('<?php echo $featured_img_url ; ?>')">
        <div class="container">
            <div class="row">
                <h2> Products </h2>
            </div>
        </div>
    </div>
    <div class="container mt-5">
    <div class="row">
        <div id="products" class="col-sm-12 col-md-12 pull-right h2-indent">

            <?php do_action( 'woocommerce_before_main_content' ); ?>
              
            <div class="row product-description">
                <div class="col-lg-6">
                    <?php do_action( 'woocommerce_archive_description' ); ?>
                </div>
                <div class="col-lg-6">
                     <p> <storng> Once you find the motor or gearmotor you want,
                         begin modifying it directly onilne with our "customize it" tool, 
                         found on each product model page. </strong></p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <h2> BUILD YOUR OWN </h2>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <!-- <h2>Electric Motors</h2> -->

                    <div class="prod_box min-sm">
                        <?php $term = get_term_link('dc-motors', 'product_cat'); ?>
                        <?php if(is_string($term)): ?>
                        <div class="row">
                            <div class="col-lg-6">
                                <h3><a href="<?php echo $term ?>">DC MOTOR</a></h3>
                                <p> Small DC motors are great for construction, automotive, and other industries that are always on the move. Our 
                                    12vdc and 24vdc, low-volt, solutions are ideal when standard power isn’t accessible or needed. For applications 
                                    requiring higher voltages and needing the high starting torque of a DC motor, consider our 90vdc, 115vdc FWR,
                                    130vdc, or 180vdc motor. Need more torque? Consider our line of DC gearmotors.</p>

                                <div class="product-list">
                                    <p> <?php $dc_pages = get_field("dc_sub_pages", get_option( 'woocommerce_shop_page_id' )) ?></p>
                                    <p> <?php if(count($dc_pages)): ?> </p>
                                    <p> <?php foreach($dc_pages as $k => $p): ?> </p>
                                    <p> <a href="<?php echo get_permalink($p); ?>"><?php echo get_the_title($p) ?></a> </p>
                                    <?php endforeach; endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="product-img">
                                    <img src="<?php echo get_field('dc_motor_image',get_option( 'woocommerce_shop_page_id' )) ?>" class="img-responsive" alt=""> <!-- made image size called 'product-overview' (200x200) -->
                                </div>
                                
                            </div>
                        </div>    
                        <?php endif; ?>
                        <?php $term = get_term_link('ac-motors', 'product_cat'); ?>
                        <?php if(is_string($term)): ?>
                        <div class="row">    
                            <div class="col-lg-6">
                                <h3><a href="<?php echo $term ?>">AC MOTOR</a> <span>[Induction]</span></h3>
                                <p> Small DC motors are great for construction, automotive, and other industries that are always on the move. Our 
                                    12vdc and 24vdc, low-volt, solutions are ideal when standard power isn’t accessible or needed. For applications 
                                    requiring higher voltages and needing the high starting torque of a DC motor, consider our 90vdc, 115vdc FWR,
                                    130vdc, or 180vdc motor. Need more torque? Consider our line of DC gearmotors.</p>
                                <div class="product-list">
                                    <p> <?php $ac_pages = get_field("field_57f33bc0381fd", get_option( 'woocommerce_shop_page_id' )) ?></p>
                                    <p> <?php if(count($ac_pages) > 1): ?></p>
                                    <p> <?php foreach($ac_pages as $k => $p): ?> </p>
                                    <p> <a href="<?php echo get_permalink($p); ?>"><?php echo get_the_title($p) ?></a> </p>
                                    <?php endforeach; endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="product-img">
                                    <img src="<?php echo get_field('field_57f33ba1381fc', get_option( 'woocommerce_shop_page_id' )) ?>" class="img-responsive" alt=""> <!-- made image size called 'product-overview' (200x200) -->
                                </div>
                            </div>
                        </div>    
                        <?php endif; ?>
                        <?php $term = get_term_link('brushless-dc-motors', 'product_cat'); ?>
                        <?php if(is_string($term)): ?>
                            <div class="row">
                                <div class="col-lg-6">
                                    <h3><a href="<?php echo $term ?>">BRUSHLESS DC MOTOR</a></h3>
                                    <p> Small DC motors are great for construction, automotive, and other industries that are always on the move. Our 
                                            12vdc and 24vdc, low-volt, solutions are ideal when standard power isn’t accessible or needed. For applications 
                                            requiring higher voltages and needing the high starting torque of a DC motor, consider our 90vdc, 115vdc FWR,
                                            130vdc, or 180vdc motor. Need more torque? Consider our line of DC gearmotors.</p>
                                    <div class="product-list">
                                        <p><?php $brushless_dc_pages = get_field("field_58640301b2b89", get_option( 'woocommerce_shop_page_id' )) ?></p>
                                        <p> <?php if(count($brushless_dc_pages) > 1): ?> </p>
                                        <p> <?php foreach($brushless_dc_pages as $k => $p): ?> </p>
                                        <p> <a href="<?php echo get_permalink($p); ?>"><?php echo get_the_title($p) ?></a> </p>
                                        <?php endforeach; endif; ?>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="product-img">
                                        <img src="<?php echo get_field('field_586402dbb2b87', get_option( 'woocommerce_shop_page_id' )) ?>" 
                                        class="img-responsive" alt=""> <!-- made image size called 'product-overview' (200x200) -->
                                    </div>
                                </div>
                            </div>    
                        <?php endif; ?>
                        
                        <div class="row">
                            <div class="col-lg-6">
                                <h3><a href="<?php echo get_permalink(16729) ?>">UNIVERSAL MOTOR</a></h3>
                                <p> Small DC motors are great for construction, automotive, and other industries that are always on the move. Our 
                                    12vdc and 24vdc, low-volt, solutions are ideal when standard power isn’t accessible or needed. For applications 
                                    requiring higher voltages and needing the high starting torque of a DC motor, consider our 90vdc, 115vdc FWR,
                                    130vdc, or 180vdc motor. Need more torque? Consider our line of DC gearmotors.</p>
                                   
                                <div class="product-list">
                                    <?php /*
                                    <?php $universal_pages = get_field("field_5864031eb2b8a", get_option( 'woocommerce_shop_page_id' )) ?>
                                    <?php if(count($universal_pages) > 1): ?>
                                    <?php foreach($universal_pages as $k => $p): ?>
                                        <a href="<?php echo get_permalink($p); ?>"><?php echo get_the_title($p) ?></a>
                                    <?php endforeach; endif; ?>
                                    */ ?>

                                <p>  <a href="<?php echo get_permalink(4340) ?>">Universal Motor Part Sets</a> </p>
                                <p>  <a href="<?php echo get_permalink(8337) ?>">Open Frame Universal Motor</a> </p>
                                </div>
                            </div>
                        
                            <div class="col-lg-6">
                                <div class="product-img">
                                    <img src="<?php echo get_field('field_586402f5b2b88', get_option( 'woocommerce_shop_page_id' )) ?>" class="img-responsive"
                                    alt="" /> 
                                </div>
                            </div>
                        </div>    
                
                    </div>

                    <!-- <a href="/accessory/agency-approvals/"><h2>Agency Approvals</h2></a> -->
                    <ul class="prod-box min-lg indented-links d-none" style="min-height: 237px;">
                        <table style="margin-top: 4px;">
                            <tbody>
                            <tr>
                            <th><img class="aligncenter size-full wp-image-18069" src="<?php echo get_site_url(); ?>/wp-content/themes/groschopp-store/images/ul.png" alt="" height="50"/></th>
                            <th></th>
                            </tr>
                            <tr>
                            <td><img class="aligncenter size-full wp-image-18074" src="<?php echo get_site_url(); ?>/wp-content/themes/groschopp-store/images/reach.png" alt="" height="50"  /></td>
                            <td style="padding-left: 20px;"><a href="https://www.groschopp.com/wp-content/uploads/2020/11/REACH-Compliance-Statement.pdf">REACH Compliance Statement</a></td>
                            </tr>
                            <tr>
                            <td><img class="aligncenter size-full wp-image-18073" src="<?php echo get_site_url(); ?>/wp-content/themes/groschopp-store/images/prop65.png" alt="" height="50"  /></td>
                            <td style="padding-left: 20px;"><a href="https://www.groschopp.com/wp-content/uploads/2020/11/Prop-65-Compliance-Statement.pdf">Prop 65 Compliance Statement</a></td>
                            </tr>
                            <tr>
                            <td><img class="aligncenter size-full wp-image-18072" src="<?php echo get_site_url(); ?>/wp-content/themes/groschopp-store/images/rohs.png" alt="" height="50"  /></td>
                            <td style="padding-left: 20px;"><a href="https://www.groschopp.com/wp-content/uploads/2020/11/RoHS-Compliance-Statement.pdf">RoHS Compliance Statement</a></td>
                            </tr>
                            </tbody>
                            </table>
                    </ul>
                </div>

                <div class="col-sm-12 col-lg-12 d-none">
                    <h2>Electric Gear Motors</h2>
                    <ul class="prod-box min-sm">
                        <?php $term = get_term_link('dc-gear-motor', 'product_cat'); ?>
                        <?php if(is_string($term)): ?>
                        <li>
                            <h3><a href="<?php echo $term ?>">DC GEAR MOTOR</a></h3>
                        </li>
                        <li>
                            <div>
                                <img src="<?php echo get_field('field_57f34188647de', get_option( 'woocommerce_shop_page_id' )) ?>" alt=""> <!-- made image size called 'product-overview' (200x200) -->
                            </div>
                            <div>
                                <?php /*
                                <?php $dc_gear_pages = get_field("field_57f341b0647e0", get_option( 'woocommerce_shop_page_id' )) ?>
                                <?php if(count($dc_gear_pages) > 1): ?>
                                <?php foreach($dc_gear_pages as $k => $p): ?>
                                    <a href="<?php echo get_permalink($p); ?>"><?php echo get_the_title($p) ?></a>
                                <?php endforeach; endif; ?>
                                */ ?>

                                <a href="<?php echo get_term_link('planetary', 'product_cat') ?>">DC Planetary Gearmotors</a>
                                <a href="<?php echo get_term_link('dc-parallel-shaft-gearmotors', 'product_cat') ?>">DC Parallel Shaft Gearmotors</a>
                                <a href="<?php echo get_term_link('right-angle-worm', 'product_cat') ?>">DC Worm Gear Motor</a>
                                <a href="<?php echo get_term_link('right-angle-planetary', 'product_cat') ?>">DC Bevel Gear Motors</a>
                            </div>
                        </li>
                        <?php endif; ?>
                        <?php $term = get_term_link('ac-gear-motor', 'product_cat'); ?>
                        <?php if(is_string($term)): ?>
                        <li>
                            <h3><a href="<?php echo $term ?>">AC GEAR MOTOR</a></h3>
                        </li>
                        <li>
                            <div>
                                <img src="<?php echo get_field('field_57f3419d647df', get_option( 'woocommerce_shop_page_id' )) ?>" alt=""> <!-- made image size called 'product-overview' (200x200) -->
                            </div>
                            <div>
                                <?php /*
                                <?php $ac_gear_pages = get_field("field_57f341d1647e1", get_option( 'woocommerce_shop_page_id' )) ?>
                                <?php if(count($ac_gear_pages) > 1): ?>
                                <?php foreach($ac_gear_pages as $k => $p): ?>
                                    <a href="<?php echo get_permalink($p); ?>"><?php echo get_the_title($p) ?></a>
                                <?php endforeach; endif; ?>
                                */ ?>

                                <a href="<?php echo get_term_link('ac-planetary-gearmotors', 'product_cat') ?>">AC Planetary Gearmotors</a>
                                <a href="<?php echo get_term_link('ac-parallel-shaft-gearmotors', 'product_cat') ?>">AC Parallel Shaft Gearmotors</a>
                                <a href="<?php echo get_term_link('ac-right-angle-gearmotors', 'product_cat') ?>">AC Right Angle Gearmotors</a>
                                <a href="<?php echo get_term_link('ac-right-angle-planetary-gearmotors', 'product_cat') ?>">AC Bevel Gear Motors</a>
                            </div>
                        </li>
                        <?php endif; ?>
                        <?php $term = get_term_link('brushless-dc-gear-motor', 'product_cat'); ?>
                        <?php if(is_string($term)): ?>
                        <li>
                            <h3><a href="<?php echo $term ?>">BRUSHLESS GEAR MOTOR</a></h3>
                        </li>
                        <li>
                            <div>
                                <img src="<?php echo get_field('field_586401e3b2b83', get_option( 'woocommerce_shop_page_id' )) ?>" alt=""> <!-- made image size called 'product-overview' (200x200) -->
                            </div>
                            <div>
                                <?php /*
                                <?php $brushless_gear_pages = get_field("field_58640219b2b85", get_option( 'woocommerce_shop_page_id' )) ?>
                                <?php if(count($brushless_gear_pages) > 1): ?>
                                <?php foreach($brushless_gear_pages as $k => $p): ?>
                                    <a href="<?php echo get_permalink($p); ?>"><?php echo get_the_title($p) ?></a>
                                <?php endforeach; endif; ?>
                                */ ?>

                                <a href="<?php echo get_term_link('brushless-planetary-gearmotors', 'product_cat') ?>">Brushless DC Planetary Gear Motors</a>
                                <a href="<?php echo get_term_link('brushless-parallel-shaft-gearmotors', 'product_cat') ?>">Brushless DC Parallel Shaft Gearmotors</a>
                                <a href="<?php echo get_term_link('brushless-right-angle-gearmotors', 'product_cat') ?>">Brushless DC Right Angle Gearmotors</a>
                                <a href="<?php echo get_term_link('brushless-right-angle-planetary-gearmotors', 'product_cat') ?>">Brushless Right Angle Planetary Gearmotors</a>
                            </div>
                        </li>
                        <?php endif; ?>
                        <li>
                            <h3><a href="<?php echo get_permalink(8055) ?>">GEARBOX REDUCER</a></h3>
                        </li>
                        <li>
                            <div>
                                <img src="<?php echo get_field('field_58640209b2b84', get_option( 'woocommerce_shop_page_id' )) ?>" alt=""> <!-- made image size called 'product-overview' (200x200) -->
                            </div>
                            <div>
                                <?php /*
                                <?php $gearbox_reducer = get_field("field_58640233b2b86", get_option( 'woocommerce_shop_page_id' )) ?>
                                <?php if(count($gearbox_reducer) > 1): ?>
                                <?php foreach($gearbox_reducer as $k => $p): ?>
                                    <a href="<?php echo get_permalink($p); ?>"><?php echo get_the_title($p) ?></a>
                                <?php endforeach; endif; ?>
                                */ ?>

                                <a href="<?php echo get_permalink(8020) ?>">Inline Planetary Gearbox</a>
                                <a href="<?php echo get_permalink(8021) ?>">I-Series Planetary Gearbox</a>
                                <a href="<?php echo get_permalink(8019) ?>">Parallel Shaft Gearbox</a>
                                <a href="<?php echo get_permalink(8018) ?>">Worm Gear Reducer</a>
                                <a href="<?php echo get_permalink(7978) ?>">Right Angle Bevel Gearbox</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- <h2>Electric Motor Speed Controls</h2> -->
            <ul class="prod-box double indented-links d-none">
                <li>
                    <div>
                        <img src="<?php echo get_field('field_57f342a99ece2', get_option( 'woocommerce_shop_page_id' )) ?>" alt="">
                    </div>
                    <div>
                        <h3><a href="<?php echo get_permalink(8037) ?>">AC Motor Speed Control</a></h3>
                    </div>
                </li>
                <li>
                    <div>
                        <img src="<?php echo get_field('field_57f342c29ece3', get_option( 'woocommerce_shop_page_id' )) ?>" alt="">
                    </div>
                    <div>
                        <h3><a href="<?php echo get_permalink(8036) ?>">Brushless Speed Control</a></h3>
                    </div>
                </li>
            </ul>

            <div class="row d-none">
                <div class="col-sm-6">
                    <h2>Accessories</h2>
                    <ul class="prod-box min-lg indented-links">
                        <li>
                            <div>
                                <img src="<?php echo get_field('field_57f3445dcdf8a', get_option( 'woocommerce_shop_page_id' )) ?>" alt="">
                            </div>
                            <div>
                                <?php $motor_add_ons = get_field("field_57f34485cdf8c", get_option( 'woocommerce_shop_page_id' )) ?>
                                <?php if(count($motor_add_ons) > 1): ?>
                                <?php foreach($motor_add_ons as $k => $p): ?>
                                    <?php if (get_the_title($p) != "Agency Approvals"):?>
                                        <a href="<?php echo get_permalink($p); ?>"><?php echo get_the_title($p) ?></a>
                                    <?php endif; ?>
                                <?php endforeach; endif; ?>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="col-sm-6">
                    <h2>Build Your Own</h2>
                    <div class="prod-box min-lg alt">
                        <p>Once you find the motor or gearmotor you want, begin modifying it directly onilne with our <strong>"customize it"</strong> tool, found on each product model page.</p>
                        <img src="<?php echo get_template_directory_uri() ?>/images/build-your-own.png" alt="">
                        <p><a href="<?php echo get_the_permalink(6628) ?>">Upload your specs</a> for step-by-step guidance from one of our motor experts</p>
                    </div>
                </div>
            </div>

            <?php do_action( 'woocommerce_after_main_content' ); ?>
        </div>
    </div>
    <?php //do_action( 'woocommerce_sidebar' ); ?>

    </div>
</div>
<?php
// get_footer( 'shop' ); 
get_footer( 'new' ); 
?>