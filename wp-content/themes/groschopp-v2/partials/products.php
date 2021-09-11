<?php $product = pods('product', get_the_ID()); ?>
<?php $product_ids = $product->field('product_id', false) ?>

<?php foreach($product_ids as $product_id): ?>
<?php $ids[] = $product_id['groschopp_database_id']; ?>
<?php endforeach ?>

<?php $voltages = wp_get_post_terms($product->id(), 'voltage'); // $product->field('voltage') ?>

<?php $voltage = (isset($_GET['voltage']))? $_GET['voltage'] : false ; ?>
<?php $orderby = (isset($_GET['orderby']))? $_GET['orderby'] : "voltage" ; ?>

<div class="product-box">
  <div class="visual">
<?php /*
<?php if($image = get_meta('product_photo')): ?>
<?php if($image_attributes = wp_get_attachment_image_src($image['ID'])): ?>
<img src="<?php echo $image_attributes[0] ?>" />
<?php endif; endif ?> */ ?>
<?php echo pods_image($product->field('product_photo'), 'full') ?>
  </div>

  <div class="description">
<h2><?php the_title() ?></h2>
      <?php the_content() ?>
  </div>
</div>

<?php $product_count = get_products_count(implode(",", $ids), $voltage) ?>
<?php $page = isset( $_GET['cpage'] ) ? abs( (int) $_GET['cpage'] ) : 1; ?> 
<?php $products_per_page = 50; ?>
<?php $offset = ($page - 1) * $products_per_page ?>

<?php if($products = get_products(implode(",", $ids), $voltage, $orderby, $products_per_page, $offset)): ?>
<?php //if($products = get_products($product_ids['groschopp_database_id'], $voltage, $orderby, $products_per_page, $offset)): ?>
<ul class="menu">
  <li>Results <?php echo $product_count[0]->count ?></li>
  <li><strong class="option">Voltage Options</strong></li>

    <?php foreach($voltages as $test): ?>
  <li><a href="?voltage=<?php echo $test->slug ?>"><?php echo $test->name ?></a></li>
<?php endforeach ?>
</ul>

<div id="result-list">
  <table>
    <thead>
      <tr>
        <th><a href="?orderby=voltage">Voltage</a></th>
        <th><a href="?orderby=ordering_number" nowrap>Product #</a></th>
        <th><a href="?orderby=model" nowrap>Model #</a></th>
        <th><a href="?orderby=output_speed">Speed <br/>(RPM)</a></th>
        <th><a href="?orderby=torqk">Torque <br/>(in-lb)</a></th>
        <th><a href="?orderby=system_hp">Motor Power <br/>(HP)</a></th>
        <th><a href="?orderby=phase">Phases</a></th>
        <th></th>
      <tr>
    </thead>
    <tbody>
  <?php $alt = false; ?>
  <?php foreach($products as $product): ?>
    <?php $alt = ($alt)? "alt" : "" ; ?>
        <tr>
          <td class="<?php echo $alt ?>"><?php echo $product->voltage ?></td>
          <td class="<?php echo $alt ?>"><a href="?id=<?php echo $product->id ?>"><?php echo $product->ordering_number ?></a></td>
          <td class="<?php echo $alt ?>"><?php echo $product->model ?></td>
          <td class="<?php echo $alt ?>"><?php echo $product->output_speed ?></td>
          <td class="<?php echo $alt ?>"><?php echo $product->torqk ?></td>
          <td class="<?php echo $alt ?>"><?php echo $product->system_hp ?></td>
          <td class="<?php echo $alt ?>"><?php echo $product->phase ?></td>
          <td class="<?php echo $alt ?>"><a href="<?php bloginfo('template_url'); ?>/quote-add.php?id=<?php echo $product->id ?>"><img src="<?php bloginfo('template_url'); ?>/images/btn_Add-to-Quote_sm.jpg" alt="Add to Quote button" width="91" height="23" border="0" style="margin-top:4px; margin-bottom:-2px;"/></a></td>
        </tr>
    <?php $alt = !$alt ?>
  <?php endforeach; ?>
      <tr>
        <td colspan="8">
        <?php echo paginate_links( array(
          'base' => add_query_arg( 'cpage', '%#%' ),
            'format' => '',
            'prev_text' => __('&laquo;'),
            'next_text' => __('&raquo;'),
            'total' => ceil($product_count[0]->count / $products_per_page),
            'current' => $page
        )); ?>
        </td>
      </tr>
    </tbody>
  </table>
</div>
<?php endif ?>