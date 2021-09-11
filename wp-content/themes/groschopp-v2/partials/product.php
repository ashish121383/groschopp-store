<?php $voltage = (isset($_GET['voltage']))? $_GET['voltage'] : false ; ?>
<?php $orderby = (isset($_GET['orderby']))? $_GET['orderby'] : "voltage" ; ?>

<div class="product-box">
  <div class="visual">
<?php if($image = get_meta('product_photo')): ?>
<?php if($image_attributes = wp_get_attachment_image_src($image['ID'])): ?>
<img src="<?php echo $image_attributes[0] ?>" />
<?php endif; endif ?>
  </div>

  <div class="description">
<h2><?php the_title() ?></h2>
      <?php the_content() ?>
  </div>
</div>

<?php $product_count = get_products_count(get_meta('product_type_id'), $voltage) ?>
<?php $page = isset( $_GET['cpage'] ) ? abs( (int) $_GET['cpage'] ) : 1; ?> 
<?php $products_per_page = 50; ?>
<?php $offset = ($page - 1) * $products_per_page ?>

<?php if($products = get_products(get_meta('product_type_id'), $voltage, $orderby, $products_per_page, $offset)): ?>
<ul class="menu">
  <li>Results <?php echo $product_count[0]->count ?></li>
  <li><strong class="option">Voltage Options</strong></li>
  <li><a href="?t=<?php the_ID() ?>&voltage=12">12V</a></li>
  <li><a href="?t=<?php the_ID() ?>&voltage=24">24V</a></li>
  <li><a href="?t=<?php the_ID() ?>&voltage=90">90V</a></li>
  <li><a href="?t=<?php the_ID() ?>&voltage=115">115FWR</a></li>
  <li><a href="?t=<?php the_ID() ?>&voltage=130">130V</a></li>
  <li><a href="?t=<?php the_ID() ?>&voltage=180">180V</a></li>
</ul>

<div id="result-list">
  <table>
    <thead>
      <tr>
        <th><a href="?t=<?php the_ID() ?>&orderby=voltage">Voltage</a></th>
        <th><a href="?t=<?php the_ID() ?>&orderby=ordering_number" nowrap>Product #</a></th>
        <th><a href="?t=<?php the_ID() ?>&orderby=model" nowrap>Model #</a></th>
        <th><a href="?t=<?php the_ID() ?>&orderby=output_speed">Speed <br/>(RPM)</a></th>
        <th><a href="?t=<?php the_ID() ?>&orderby=torqk">Torque <br/>(in-lb)</a></th>
        <th><a href="?t=<?php the_ID() ?>&orderby=system_hp">Motor Power <br/>(HP)</a></th>
        <th><a href="?t=<?php the_ID() ?>&orderby=phase">Phases</a></th>
        <th></th>
      <tr>
    </thead>
    <tbody>
  <?php $alt = false; ?>
  <?php foreach($products as $product): ?>
    <?php $alt = ($alt)? "alt" : "" ; ?>
        <tr>
          <td class="<?php echo $alt ?>"><?php echo $product->voltage ?></td>
          <td class="<?php echo $alt ?>"><a href="?t=<?php the_ID() ?>&id=<?php echo $product->id ?>"><?php echo $product->ordering_number ?></a></td>
          <td class="<?php echo $alt ?>"><?php echo $product->model ?></td>
          <td class="<?php echo $alt ?>"><?php echo $product->output_speed ?></td>
          <td class="<?php echo $alt ?>"><?php echo $product->torqk ?></td>
          <td class="<?php echo $alt ?>"><?php echo $product->system_hp ?></td>
          <td class="<?php echo $alt ?>"><?php echo $product->phase ?></td>
          <td class="<?php echo $alt ?>"><a class="modal" href="<?php bloginfo('template_url'); ?>/quote-add.php?id=<?php echo $product->id ?>"><img src="<?php bloginfo('template_url'); ?>/images/btn_Add-to-Quote_sm.jpg" alt="Add to Quote button" width="91" height="23" border="0" style="margin-top:4px; margin-bottom:-2px;"/></a></td>
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