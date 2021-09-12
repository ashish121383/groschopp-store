<?php
/**
 * The Template for displaying products in a product category. Simply includes the archive template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/taxonomy-product_cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$term_object = get_queried_object();
$image = get_field('image', 'term_'.$term_object->term_id);

get_header( 'shop' ); ?>

<div class="row">
	<div id="products" class="col-sm-12 col-md-9 pull-right content">

		<h1><?php woocommerce_page_title(); ?></h1>

        <?php if(count($image)): ?>
		<img class="visible-xs" src="<?php echo $image['url'] ?>" alt="<?php echo get_the_title() ?>">
        <?php endif; ?>

        <?php echo get_field('description', 'term_'.$term_object->term_id) ?>

        <?php $category_features = get_field('category_features', 'term_'.$term_object->term_id); ?>
        <?php if(count($image) && $category_features): ?>
		<img class="alignright hidden-xs show-print" src="<?php echo $image['url'] ?>" alt="<?php echo get_the_title() ?>">

		<?php echo $category_features ?>
		<?php endif ?>

	</div>

	<?php get_sidebar(); ?>
</div>
<?php

    $voltages = get_field('voltages', 'term_'.$term_object->term_id);
    $voltage = (isset($_GET['voltage']))? $_GET['voltage'] : false ;
    $orderby = (isset($_GET['orderby']))? $_GET['orderby'] : "voltage" ;

    foreach($voltages as $v) {
        $voltageArray[$v->slug] = $v->name;
    }

    $products_to_show = get_field('products_to_show', 'term_'.$term_object->term_id);

    $product_ids = array();

    if(count($products_to_show)) {
	    foreach($products_to_show as $product_to_show) {
		    $product_ids[] = get_field('groschopp_database_id', 'term_'.$product_to_show);
	    }
    }

    $dataArray = array('ids' => implode("|", $product_ids), 'voltage' => $voltage, 'orderby' => $orderby);

?>

<?php //echo "<pre>" . print_r(get_field('parent_product', 'term_'.$term_object->term_id), true) . "</pre>"; ?>

<?php //if(get_field('product_ids', 'term_'.$term_object->term_id)): ?>
    <div class="row">
        <aside class="col-sm-3">
            <form id="narrow-search">
                <h3 class="text-center">Product Options</h3>
                <div>
                    Gearbox
                    <?php //$parent_id = ($post->post_parent)? $post->post_parent : get_the_ID(); ?>
                    <?php $parent_id = (get_field('parent_product', 'term_' . $term_object->term_id))? get_field('parent_product', 'term_'.$term_object->term_id)->term_id : $term_object->term_id ?>
                    <button class="<?php echo ($term_object->term_id === $parent_id)? "selected" : ""; ?>" onclick="location.href='<?php echo get_term_link($parent_id, 'product_cat') ?>';" type="button">Motor Only</button>
                    <?php $children = get_field('child_products', 'term_' . $parent_id) ?>
                    <?php if(count($children)): ?>
                    <?php foreach($children as $child): ?>
                        <button onclick="location.href='<?php echo get_term_link($child) ?>';" class="<?php echo ($child->term_id === $term_object->term_id)? "selected" : ""; ?>" type="button"><?php echo $child->name ?></button>
                    <?php endforeach; endif; ?>
                </div>

                <div>
                    Voltage
                    <button class="motor-select-voltage motor-select-voltage-all selected" value="0" type="button">All Voltages</button>
                    <?php if(count($voltageArray)): ?>
                    <?php natsort($voltageArray) ?>
                    <?php foreach($voltageArray as $k => $v): ?>
                        <button class="motor-select-voltage" value="<?php echo ($k == '115fwr')? '115' : $k; ?>" type="button"><?php echo $v ?></button>
                    <?php endforeach; endif; ?>
                </div>

                <?php if($term_object->slug == 'ac-motors' || $term_object->term_id == 10219 || $term_object->parent == 10219): ?>
                    <div>
                        Phases
                        <button class="motor-select-phase motor-select-phase-all selected" value="0" type="button">All Phases</button>
                        <button class="motor-select-phase" value="1ph 60Hz" type="button">1ph 60Hz</button>
                        <button class="motor-select-phase" value="1ph 50Hz" type="button">1ph 50Hz</button>
                        <button class="motor-select-phase" value="3ph 60Hz" type="button">3ph 60Hz</button>
                        <button class="motor-select-phase" value="3ph 50Hz" type="button">3ph 50Hz</button>
                    </div>
                <?php endif ?>

                <h3 class="text-center">Narrow Your Search</h3>

                <div>
                    Dominant Variable
                    <div class="two-col offset">
                        <div>
                            <button class="dominant-parameter motor-select-dominate selected" id="speed-button" value="speed" type="button">Speed</button>
                            <button class="dominant-parameter motor-select-dominate" id="torque-button" value="torque" type="button">Torque</button>
                            <button class="dominant-parameter motor-select-dominate" id="power-button" value="power" type="button">Power</button>
                        </div>
                        <div class="q">
                            <a class="popup" href="#"><img src="<?php bloginfo('template_url') ?>/images/q-mark-lg.png" alt=""></a>
                        </div>
                    </div>
                </div>

                <div class="slide-1">
                    Speed (rpm)
                    <input type="text" id="speed" value="">
                </div>

                <div class="slide-2">
                    Torque (lb in)
                    <input type="text" id="torque" value="">
                </div>

                <div class="slide-3">
                    Motor Power (hp)
                    <input type="text" id="power" value="">
                </div>

                <?php if(get_the_ID() == 6365) { echo '<input type="checkbox" value="Include 50 Hz"> &nbsp;Include 50 Hz'; } ?>

                <?php wp_reset_query() ?>

                <?php if($parent_id): ?>
                    <button class="reset" id="reset-button" value="reset" onclick="location.href='<?php echo get_the_permalink($parent_id) ?>';"  type="button">Reset Search</button>
                <?php else: ?>
                    <button class="reset" id="reset-button" value="reset" onclick="location.href='<?php echo get_the_permalink(get_the_ID()) ?>';"  type="button">Reset Search</button>
                <?php endif ?>
                <button class="blue confirm" type="button">Still Not Sure?</button>
            </form>
        </aside>

        <div class="col-sm-9">
            <div id="results-list" data-url="<?php bloginfo('template_url'); ?>" data-parameters="<?php echo http_build_query($dataArray) ?>" class="table-responsive">

            </div>
        </div>
    </div>
<?php //endif; ?>

<?php get_footer( 'shop' ); ?>
