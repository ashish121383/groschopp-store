<?php

	require($_SERVER['DOCUMENT_ROOT'].'/wp-config.php');  
	$wp->init();  
	$wp->parse_request();  
	$wp->query_posts();  
	$wp->register_globals();

  $exist = false;
	
  if(count($_SESSION['quote'])) {
    if(count($_SESSION['quote']['product']) || count($_SESSION['quote']['accessory']) || count($_SESSION['quote']['gearbox']) || count($_SESSION['quote']['control'])) {
      $exist = true;
    }
  }

  if($exist): ?>
  <?php foreach($_SESSION['quote']['product'] as $k => $v): ?>
  <?php $temp = json_decode(base64_decode($v)); ?>
  <?php $product = get_product($temp->id) ?>
  <li class="quote-cart-list-item">
    Product #<?php echo $product->ordering_number ?> | Model <?php echo $product->model ?>
    <a class="quote-cart-remove pull-right" href="<?php bloginfo('template_url'); ?>/quote-remove.php?product=<?php echo $k ?>" role="button">(remove)</a>
    <input type="hidden" name="product[]" value="<?php echo $v ?>" />
  </li>
  <?php endforeach ?>

  <?php foreach($_SESSION['quote']['accessory'] as $k => $v): ?>
  <?php $product = json_decode(base64_decode($v)); ?>
  <li class="quote-cart-list-item">
    <?php echo $product->accessory ?>
    <a class="quote-cart-remove pull-right" href="<?php bloginfo('template_url'); ?>/quote-remove.php?accessory=<?php echo $k ?>" role="button">(remove)</a>
    <input type="hidden" name="product[]" value="<?php echo $product->accessory ?>" />
  </li>
  <?php endforeach ?>

  <?php foreach($_SESSION['quote']['gearbox'] as $k => $v): ?>
  <?php $product = json_decode(base64_decode($v)); ?>
  <li class="quote-cart-list-item">
    <?php echo $product->gearbox ?>
    <a class="quote-cart-remove pull-right" href="<?php bloginfo('template_url'); ?>/quote-remove.php?gearbox=<?php echo $k ?>" role="button">(remove)</a>
    <input type="hidden" name="product[]" value="<?php echo $product->gearbox ?>" />
  </li>
  <?php endforeach ?>

  <?php foreach($_SESSION['quote']['control'] as $k => $v): ?>
  <?php $product = json_decode(base64_decode($v)); ?>
  <li class="quote-cart-list-item">
    <?php echo $product->control ?>
    <a class="quote-cart-remove pull-right" href="<?php bloginfo('template_url'); ?>/quote-remove.php?control=<?php echo $k ?>" role="button">(remove)</a>
    <input type="hidden" name="product[]" value="<?php echo $product->control ?>" />
  </li>
  <?php endforeach ?>
<?php else: ?>
<p>You don't currently have any items in your quote cart.</p>
<?php endif; ?>