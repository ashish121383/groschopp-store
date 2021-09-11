<?php

require($_SERVER['DOCUMENT_ROOT'].'/wp-config.php');
$wp->init();
$wp->parse_request();
$wp->query_posts();
$wp->register_globals();

$products_per_page = 25;

$args = array('ids' => get_query_var('ids'));

$product_count = get_products_count($args);

if(get_query_var('voltage')) {
	$args['voltage'] = get_query_var('voltage');
} else {
	$args['voltage'] = 0;
}

if(get_query_var('phase')) {
	$args['phase'] = get_query_var('phase');
} else {
	$args['phase'] = 0;
}

if(get_query_var('speed_from') || get_query_var('speed_to')) {
	$args['speed_from'] = get_query_var('speed_from');
	$args['speed_to'] = get_query_var('speed_to');
}

if(get_query_var('torque_from') || get_query_var('torque_to')) {
	$args['torque_from'] = get_query_var('torque_from');
	$args['torque_to'] = get_query_var('torque_to');
}

if(get_query_var('power_from') || get_query_var('power_to')) {
	$args['power_from'] = get_query_var('power_from');
	$args['power_to'] = get_query_var('power_to');
}

if(get_query_var('s')) {
	$args['s'] = get_query_var('s');
}

$product_count_search = get_products_count($args);

$page = isset( $_GET['cpage'] ) ? abs( (int) $_GET['cpage'] ) : 1;
$totalPages = ceil($product_count_search[0]->count / $products_per_page);
$offset = ($page - 1) * $products_per_page;
$viewingBottom = ($offset == 0)? 1 : $offset;
$viewingTop = ((get_query_var('cpage', 1) * $products_per_page) > $product_count_search[0]->count)? $product_count_search[0]->count : get_query_var('cpage', 1) * $products_per_page;

$args['orderby'] = get_query_var('orderby', 'voltage');

if(get_query_var('s')) {
	$products = get_products_by_model(get_query_var('s'));
} else {
	$products = get_groschopp_products($args, $products_per_page, $offset);
}

$cart = get_page_by_title('cart');

?>
<?php if($products): ?>
    <span class="showing">Showing <?php echo $viewingBottom ?>&ndash;<?php echo $viewingTop ?> of <?php echo $product_count_search[0]->count ?></span>

    <span class="prev-next top">
  <?php if(get_query_var('cpage', 1) > 1): ?>
      <a class="norefresh" href="?<?php echo construct_url($args, array('cpage' => $page - 1)) ?>">Previous</a>
  <?php endif; ?>
		<?php if(get_query_var('cpage', 1) > 1 && get_query_var('cpage', 1) < $totalPages): ?>
            &nbsp;|&nbsp;
		<?php endif; ?>
		<?php if(get_query_var('cpage', 1) < $totalPages): ?>
            <a class="norefresh" href="?<?php echo construct_url($args, array('cpage' => $page + 1)) ?>">Next</a>
		<?php endif; ?>
</span>

    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th class="hidden-xs"><a class="norefresh" href="?<?php echo construct_url($args, array('orderby' => 'voltage')) ?>">Voltage</a></th>
            <th><a class="norefresh" href="?<?php echo construct_url($args, array('orderby' => 'ordering_number')) ?>">Product #</a></th>
            <th><a class="norefresh" href="?<?php echo construct_url($args, array('orderby' => 'model')) ?>">Model #</a></th>
            <th><a class="norefresh" href="?<?php echo construct_url($args, array('orderby' => 'output_speed')) ?>">Speed<br>(RPM)</a></th>
            <th><a class="norefresh" href="?<?php echo construct_url($args, array('orderby' => 'torqk')) ?>">Torque<br>(in-lb)</a></th>
            <th><a class="norefresh" href="?<?php echo construct_url($args, array('orderby' => 'system_hp')) ?>">Motor Power<br>(HP)</a></th>
            <th class="hidden-xs"><a class="norefresh" href="?<?php echo construct_url($args, array('orderby' => 'phase')) ?>">Phases</a></th>
            <th class="hidden-xs hidden-print"></th>
        <tr>
        </thead>
        <tbody>
		<?php $alt = false; ?>
		<?php foreach($products as $product): ?>
			<?php $alt = ($alt)? "alt" : "" ; ?>
            <tr>
                <td class="<?php echo $alt ?> hidden-xs"><?php echo $product->voltage ?></td>

				<?php $wc_prod = get_page_by_title($product->ordering_number, 'OBJECT', 'product'); ?>

                <td class="<?php echo $alt ?>"><a href="<?php echo get_permalink($wc_prod->ID) ?>"><?php echo $product->ordering_number ?></a></td>
                <td class="<?php echo $alt ?>"><?php echo $product->model ?></td>
                <td class="<?php echo $alt ?>"><?php echo $product->output_speed ?></td>
                <td class="<?php echo $alt ?>"><?php echo $product->torqk ?></td>
                <td class="<?php echo $alt ?>"><?php echo $product->system_hp ?></td>
                <td class="<?php echo $alt ?> hidden-xs"><?php echo $product->phase ?></td>
                <td class="<?php echo $alt ?> text-center hidden-xs hidden-print"><a href="<?php echo get_permalink($cart->ID) ?>?add-to-cart=<?php echo $wc_prod->ID ?>" class="quote">Add to Cart</a></td>
            </tr>
			<?php $alt = !$alt ?>
		<?php endforeach; ?>
        </tbody>
    </table>

    <span class="prev-next bottom">
  <?php if(get_query_var('cpage', 1) > 1): ?>
      <a class="norefresh" href="?<?php echo construct_url($args, array('cpage' => $page - 1)) ?>">Previous</a>
  <?php endif; ?>
		<?php if(get_query_var('cpage', 1) > 1 && get_query_var('cpage', 1) < $totalPages): ?>
            &nbsp;|&nbsp;
		<?php endif; ?>
		<?php if(get_query_var('cpage', 1) < $totalPages): ?>
            <a class="norefresh" href="?<?php echo construct_url($args, array('cpage' => $page + 1)) ?>">Next</a>
		<?php endif; ?>
</span>

    <span id="speed-slider" data-speed-min="<?php echo $product_count[0]->speed_min ?>" data-speed-selected-min="<?php echo $product_count_search[0]->speed_min ?>" data-speed-selected-max="<?php echo $product_count_search[0]->speed_max ?>" data-speed-max="<?php echo $product_count[0]->speed_max ?>"></span>
    <span id="torque-slider" data-torque-min="<?php echo $product_count[0]->torqk_min ?>" data-torque-selected-min="<?php echo $product_count_search[0]->torqk_min ?>" data-torque-selected-max="<?php echo $product_count_search[0]->torqk_max ?>" data-torque-max="<?php echo $product_count[0]->torqk_max ?>"></span>
    <span id="power-slider" data-power-min="<?php echo $product_count[0]->power_min ?>"  data-power-selected-min="<?php echo $product_count_search[0]->power_min ?>" data-power-selected-max="<?php echo $product_count_search[0]->power_max ?>" data-power-max="<?php echo $product_count[0]->power_max ?>"></span>
<?php else: ?>
    <h2>No Results Found</h2>
    <p>The motor or gearmotor you are searching for is not available.  Please contact our sales team at 800.829.4135 or by email at sales@groschopp.com<mailto:sales@groschopp.com> for additional options not shown on our website.</p>
<?php endif; ?>
