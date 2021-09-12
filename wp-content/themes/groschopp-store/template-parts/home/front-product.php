<?php 
global $product;
    $catIds = get_field('products_category'); 
    $imgs = array('service-icon','service-icon2','service-icon3','service-icon4');
    if(isset($catIds)){
?>
<section class="service-grp">
  <div class="">
        <?php 
        $i = 0; 
        foreach($catIds as $value){ 
            $terms = get_the_terms( $value, 'product_cat' );
        ?>
      <div class="col-lg-3 service-item">
           <h3> <?php echo $terms[0]->name; ?> </h3>
           <figure><img src="<?php echo get_template_directory_uri() ?>/images/<?php echo $imgs[$i]; ?>.png" width="173px"></figure>
           <svg width="321" height="4" viewBox="0 0 321 4" fill="none" xmlns="http://www.w3.org/2000/svg">
               <line x1="0.986328" y1="3.07129" x2="256.585" y2="3.07127" stroke="#fff"/>
               <line x1="263.666" y1="1.99024" x2="320.95" y2="2.15235" stroke="#fff" stroke-width="3"/>
            </svg>
            <div class="flex-space">
                <p class="mb-0"> Dc </p>
                <p class="mb-0"> Expedita omnis officiis non. </p>
            </div>
      </div>
      <?php $i++; }  ?>
  </div>
</section>

<?php } ?>