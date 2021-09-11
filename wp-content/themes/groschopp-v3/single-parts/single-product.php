<?php $the_id = get_the_ID() ?>
<?php $product = get_product($_GET['id']) ?>
<?php $parent_id = (get_field('field_58916d3048bc2', get_the_ID()))? get_field('field_58916d3048bc2', get_the_ID()) : get_the_ID(); ?>
<?php $category = pods('product', get_the_ID()); ?>

<div class="row product-detail">
  <div class="col-md-9 pull-right">
    <div class="row">
      <div class="product-detail-aside col-md-5 pull-right">
        <section class="product-specs">
          <header class="product-detail-header">
            <h2>Product Specs</h2>
          </header>
          <div class="product-detail-main">
            <div class="row">
              <dl class="col-md-6 product-specs-list">
                <dt>Model </dt><dd>#<?php echo $product->model ?></dd>
                <dt>Voltage- </dt><dd><?php echo $product->voltage ?></dd>
                <dt>Phase- </dt><dd><?php echo $product->phase ?></dd>
              </dl>
              <dl class="col-md-6 product-specs-list">
                <dt>Speed (rpm)- </dt><dd><?php echo $product->output_speed ?></dd>
                <dt>Torque (in-lbs)- </dt><dd><?php echo $product->torqk ?></dd>
                <dt>Power (hp)- </dt><dd><?php echo $product->system_hp ?></dd>
              </dl>
            </div>
            <div class="product-specs-actions row">
              <div class="col-md-6">
                <a href="<?php echo get_permalink(4917).'?id='.$product->id ?>" class="btn btn-primary btn-bold">Customize It</a>
              </div>
              <div class="col-md-6">
                <a href="<?php bloginfo('template_url'); ?>/quote-add.php?id=<?php echo $product->id ?>" class="btn btn-primary btn-alternate btn-bold quote-add">Add To Quote</a>
              </div>
            </div>
          </div>
          <footer class="product-detail-footer">
            <p class="clock-icon">Ask if your motor can ship within 48 hours</p>
          </footer>
        </section>
        <section class="product-related-items">
          <header class="product-detail-header">
            <h2>Related Items</h2>
          </header>

          <?php $related_items = get_related_items($product); //echo "<pre>".print_r($related_items)."</pre>"; ?>
          
          <div class="product-detail-main row">
          <?php foreach($related_items as $k => $related_item): ?>
            <?php $item = new WP_Query(array('post_type' => array('accessory', 'gearbox', 'control'), 'p' => $related_item)); ?>
            <?php while($item->have_posts()): $item->the_post(); ?>
            <div class="col-md-6">
              <div class="related-item-image-container">
                <?php if(get_post_type() == 'control'): ?>
                <a href="<?php the_permalink() ?>"><img src="<?php echo get_field('field_585b42c5151fc', get_the_ID()) ?>" alt="" width="135" /></a>
                <?php else: ?>
                <a href="<?php the_permalink() ?>"><img src="<?php echo get_field('field_5854dbeadeac4', get_the_ID()) ?>" alt="" /></a>
                <?php endif; ?>
              </div>
              <div>
                <h3 class="related-item-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
                <p class="related-item-description"><?php echo get_field('field_5854edaf1a525', get_the_ID()) ?></p>
              </div>
            </div>
          <?php endwhile; ?>
          <?php endforeach; ?>
          </div>
        </section>
      </div>

      <?php wp_reset_query(); ?>

      <div class="col-md-7 pull-right">
        <h1><?php the_title() ?> <?php echo $product->ordering_number ?></h1>
        <div class="product-detail-image-container">
          <img class="img-360-logo" alt="360 degree view icon" src="<?php bloginfo('template_url') ?>/images/360_blue.png" alt="360">
          <?php /*<img class="product-detail-image" alt="Image of AC Motors 6154" src="/wp-content/themes/groschopp-v3/images/mock/motor_picture.png" />*/ ?>

          <?php if($product->type_id == 1 && strpos($product->model, "FC") !== false): ?>
          <iframe src="<?php bloginfo('url') ?>/data/keyshot/AC8060FC/index.html" width="325" height="313" style="border:0px;"></iframe>  
          <?php endif ?>

          <?php if($product->type_id == 1 && strpos($product->model, "NV") !== false): ?>
          <iframe src="<?php bloginfo('url') ?>/data/keyshot/AC8060NV/index.html" width="325" height="313" style="border:0px;"></iframe>  
          <?php endif ?>

          <?php if($product->type_id == 2 && strpos($product->model, "PM601") !== false): ?>
          <iframe src="<?php bloginfo('url') ?>/data/keyshot/PM6013/index.html" width="325" height="313" style="border:0px;"></iframe>  
          <?php endif ?>

          <?php if($product->type_id == 2 && strpos($product->model, "PM801") !== false): ?>
          <iframe src="<?php bloginfo('url') ?>/data/keyshot/PM8018/index.html" width="325" height="313" style="border:0px;"></iframe>  
          <?php endif ?>

          <?php if($product->type_id == 2 && strpos($product->model, "PM10816") !== false): ?>
          <iframe src="<?php bloginfo('url') ?>/data/keyshot/PM10816/index.html" width="325" height="313" style="border:0px;"></iframe> 
          <?php endif ?>

          <?php if($product->type_id == 2 && strpos($product->model, "PM10818") !== false): ?>
          <iframe src="<?php bloginfo('url') ?>/data/keyshot/PM10818/index.html" width="325" height="313" style="border:0px;"></iframe> 
          <?php endif ?>

          <?php if($product->type_id == 3 && strpos($product->model, "RA26") !== false): ?>
          <iframe src="<?php bloginfo('url') ?>/data/keyshot/PM8018HV_RA2600T/index.html" width="325" height="313" style="border:0px;"></iframe>  
          <?php endif ?>

          <?php if($product->type_id == 3 && strpos($product->model, "RA30") !== false): ?>
          <iframe src="<?php bloginfo('url') ?>/data/keyshot/PM8018HV_RA3000T/index.html" width="325" height="313" style="border:0px;"></iframe>  
          <?php endif ?>    

          <?php if($product->type_id == 3 && strpos($product->model, "RA40") !== false): ?>
          <iframe src="<?php bloginfo('url') ?>/data/keyshot/PM8018HV_RA4000T/index.html" width="325" height="313" style="border:0px;"></iframe>  
          <?php endif ?>

          <?php if($product->type_id == 3 && strpos($product->model, "RA50") !== false): ?>
          <iframe src="<?php bloginfo('url') ?>/data/keyshot/PM8018HV_RA5000T/index.html" width="325" height="313" style="border:0px;"></iframe>  
          <?php endif ?>

          <?php if($product->type_id == 6 && strpos($product->model, "PL73") !== false && strpos($product->model, "FC") !== false): ?>
          <iframe src="<?php bloginfo('url') ?>/data/keyshot/AC9060FC-PL7300/index.html" width="325" height="313" style="border:0px;"></iframe> 
          <?php endif ?>

          <?php if($product->type_id == 6 && strpos($product->model, "PL73") !== false && strpos($product->model, "NV") !== false): ?>
          <iframe src="<?php bloginfo('url') ?>/data/keyshot/AC9060NV-PL7300/index.html" width="325" height="313" style="border:0px;"></iframe> 
          <?php endif ?>

          <?php if($product->type_id == 6 && strpos($product->model, "FC") !== false && substr($product->model, -1) === "i"): ?>
          <iframe src="<?php bloginfo('url') ?>/data/keyshot/AC8060FC-PL6200i/index.html" width="325" height="313" style="border:0px;"></iframe>  
          <?php endif ?>

          <?php if($product->type_id == 6 && strpos($product->model, "NV") !== false && substr($product->model, -1) === "i" ): ?>
          <iframe src="<?php bloginfo('url') ?>/data/keyshot/AC8060NV-PL6200i/index.html" width="325" height="313" style="border:0px;"></iframe>  
          <?php endif ?>

          <?php if($product->type_id == 7 && strpos($product->model, "PL73") !== false): ?>
          <iframe src="<?php bloginfo('url') ?>/data/keyshot/PM8018LV-PL7300/index.html" width="325" height="313" style="border:0px;"></iframe> 
          <?php endif ?>

          <?php if($product->type_id == 7 && strpos($product->model, "PL52") !== false): ?>
          <iframe src="<?php bloginfo('url') ?>/data/keyshot/PM8018HV-PL5200i/index.html" width="325" height="313" style="border:0px;"></iframe>  
          <?php endif ?>

          <?php if($product->type_id == 7 && strpos($product->model, "PL62") !== false): ?>
          <iframe src="<?php bloginfo('url') ?>/data/keyshot/PM8018HV-PL6200i/index.html" width="325" height="313" style="border:0px;"></iframe>  
          <?php endif ?>

          <?php if($product->type_id == 7 && strpos($product->model, "PL81") !== false): ?>
          <iframe src="<?php bloginfo('url') ?>/data/keyshot/PM8018LV-PL8100i/index.html" width="325" height="313" style="border:0px;"></iframe>  
          <?php endif ?>

          <?php if($product->type_id == 8 && strpos($product->model, "PS19") !== false): ?>
          <iframe src="<?php bloginfo('url') ?>/data/keyshot/PM8018HV-PS1900/index.html" width="325" height="313" style="border:0px;"></iframe> 
          <?php endif ?>

          <?php if($product->type_id == 8 && strpos($product->model, "PS21") !== false): ?>
          <iframe src="<?php bloginfo('url') ?>/data/keyshot/PM8018LV-PS2100/index.html" width="325" height="313" style="border:0px;"></iframe> 
          <?php endif ?>

          <?php if($product->type_id == 8 && strpos($product->model, "PS23") !== false): ?>
          <iframe src="<?php bloginfo('url') ?>/data/keyshot/PM8018LV-PS2300/index.html" width="325" height="313" style="border:0px;"></iframe> 
          <?php endif ?>

          <?php if($product->type_id == 11 && strpos($product->model, "NV") !== false): ?>
          <iframe src="<?php bloginfo('url') ?>/data/keyshot/AC8060NV-RP7300/index.html" width="325" height="313" style="border:0px;"></iframe> 
          <?php endif ?>

          <?php if($product->type_id == 11 && strpos($product->model, "FC") !== false): ?>
          <iframe src="<?php bloginfo('url') ?>/data/keyshot/AC8060FC-RP7300/index.html" width="325" height="313" style="border:0px;"></iframe> 
          <?php endif ?>

          <?php if($product->type_id == 12 && strpos($product->model, "NV") !== false): ?>
          <iframe src="<?php bloginfo('url') ?>/data/keyshot/AC9060NV-RA4000/index.html" width="325" height="313" style="border:0px;"></iframe> 
          <?php endif ?>

          <?php if($product->type_id == 12 && strpos($product->model, "FC") !== false): ?>
          <iframe src="<?php bloginfo('url') ?>/data/keyshot/AC9060FC-RA4000/index.html" width="325" height="313" style="border:0px;"></iframe> 
          <?php endif ?>

          <?php if($product->type_id == 14): ?>
          <iframe src="<?php bloginfo('url') ?>/data/keyshot/PM8018HV-RP7300/index.html" width="325" height="313" style="border:0px;"></iframe> 
          <?php endif ?>

          <?php if($product->type_id == 18 && strpos($product->model, "NV") !== false): ?>
          <iframe src="<?php bloginfo('url') ?>/data/keyshot/AC9060NV-PS2100/index.html" width="325" height="313" style="border:0px;"></iframe> 
          <?php endif ?>

          <?php if($product->type_id == 18 && strpos($product->model, "FC") !== false): ?>
          <iframe src="<?php bloginfo('url') ?>/data/keyshot/AC9060FC-PS2100/index.html" width="325" height="313" style="border:0px;"></iframe> 
          <?php endif ?>

          <?php if($product->type_id == 23): ?>
          <iframe src="<?php bloginfo('url') ?>/data/keyshot/BL6520/index.html" width="325" height="313" style="border:0px;"></iframe>  
          <?php endif ?>

          <?php if($product->type_id == 24 && strpos($product->model, "PL73") !== false): ?>
          <iframe src="<?php bloginfo('url') ?>/data/keyshot/BL6520-PL7305/index.html" width="325" height="313" style="border:0px;"></iframe> 
          <?php endif ?>

          <?php if($product->type_id == 24 && substr($product->model, -1) === "i" ): ?>
          <iframe src="<?php bloginfo('url') ?>/data/keyshot/BL6560-PL6200i/index.html" width="325" height="313" style="border:0px;"></iframe>  
          <?php endif ?>

          <?php if($product->type_id == 6 && substr($product->model, -2) === "iP" ): ?>
          <iframe src="<?php bloginfo('url') ?>/data/keyshot/AC8060FC-PL6200iP/index.html" width="325" height="313" style="border:0px;"></iframe>  
          <?php endif ?>

          <?php if($product->type_id == 25): ?>
          <iframe src="<?php bloginfo('url') ?>/data/keyshot/BL6560-PS2100/index.html" width="325" height="313" style="border:0px;"></iframe> 
          <?php endif ?>

          <?php if($product->type_id == 26): ?>
          <iframe src="<?php bloginfo('url') ?>/data/keyshot/BL6520-RA3000T/index.html" width="325" height="313" style="border:0px;"></iframe>  
          <?php endif ?>

          <?php if($product->type_id == 27): ?>
          <iframe src="<?php bloginfo('url') ?>/data/keyshot/BL6520-RP7300/index.html" width="325" height="313" style="border:0px;"></iframe> 
          <?php endif ?>
    
        </div>
        <div class="row product-detail-image-actions">
          <?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/other/3DCad_STEP/'.$product->cadfile.'.zip')): ?>
          <div class="col-md-4">
            <a class="btn btn-primary" href="<?php get_bloginfo('url') ?>/data/other/3DCad_STEP/<?php echo $product->cadfile ?>.zip">3DCad Step File</a>
          </div>
          <?php endif; ?>

          <?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/other/Performance/0'.$product->ordering_number.'.pdf') || file_exists($_SERVER['DOCUMENT_ROOT'].'/data/other/Performance/'.$product->ordering_number.'.pdf')): ?>
          <div class="col-md-4">
          <?php if(strlen($product->ordering_number) == 4): ?>
          <?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/other/Performance/0'.$product->ordering_number.'.pdf')): ?>
          <a class="btn btn-primary pdf-icon-button" href="<?php get_bloginfo('url') ?>/data/other/Performance/0<?php echo $product->ordering_number ?>.pdf" target="_blank">Performance Curve</a>
          <?php endif; ?>
          <?php else: ?>
          <?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/other/Performance/'.$product->ordering_number.'.pdf')): ?>
          <a class="btn btn-primary pdf-icon-button" href="<?php get_bloginfo('url') ?>/data/other/Performance/<?php echo $product->ordering_number ?>.pdf" target="_blank">Performance Curve</a>
          <?php endif; ?> 
          <?php endif; ?>
          </div>
          <?php endif; ?>

          <div class="col-md-4">
          <?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/other/Cad_Pdf/'.$product->cadfile.'.pdf')): ?>
          <a class="btn btn-primary pdf-icon-button" href="<?php get_bloginfo('url') ?>/data/other/Cad_Pdf/<?php echo $product->cadfile ?>.pdf" target="_blank">2D Outline Drawing</a>
          <?php $nofiles = false; ?>
          <?php endif; ?>
          <?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/other/Cad_Pdf/'.$product->cadfile.'.PDF')): ?>
          <a class="btn btn-primary pdf-icon-button" href="<?php get_bloginfo('url') ?>/data/other/Cad_Pdf/<?php echo $product->cadfile ?>.PDF" target="_blank">2D Outline Drawing</a>
          <?php $nofiles = false; ?>
          <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 product-detail-tabs">
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active">
            <a href="#product-features" aria-controls="product-features" role="tab" data-toggle="tab">Features</a>
            <span class="bottom-triangle"></span>
          </li>
          <li role="presentation">
            <a href="#product-add-ons" aria-controls="product-add-ons" role="tab" data-toggle="tab">Add Ons</a>
            <span class="bottom-triangle"></span>
          </li>
          <li role="presentation">
            <a href="#product-downloads" aria-controls="product-downloads" role="tab" data-toggle="tab">Downloads</a>
            <span class="bottom-triangle"></span>
          </li>
          <?php /*
          <li role="presentation">
            <a href="#product-videos" aria-controls="product-videos" role="tab" data-toggle="tab">Videos</a>
            <span class="bottom-triangle"></span>
          </li>
          <li role="presentation">
            <a href="#product-related-items" aria-controls="product-related-items" role="tab" data-toggle="tab">Related Items</a>
            <span class="bottom-triangle"></span>
          </li>
          */ ?>
        </ul>
        
        <div class="tab-content">
          <div role="tabpanel" id="product-features" class="tab-pane active">
            <h3 class="show-print">Features</h3>
            <div class="multi-column-text-3">
              <?php $features = get_post_meta($parent_id, 'features', true) ?>
              <?php echo $features ?>
              <?php /*
              <ul class="list-unstyled">
                <li>Rugged aluminum housing</li>
                <li>Durable powder coating</li>
                <li>Die-cast aluminum endbells</li>
                <li>Class “H” insulation up to 180°</li>
                <li>Ball bearing construction</li>
                <li>Run capacitor (single phase)</li>
                <li>12-inch standard leads</li>
                <li>Junction box</li>
                <li>IP44</li>
              </ul> */ ?>
            </div>
          </div>
          <div role="tabpanel" id="product-add-ons" class="tab-pane">
            <h3 class="show-print">Add Ons</h3>
            <div class="multi-column-text-3">
              <?php $addons = get_post_meta($parent_id, 'options', true) ?>
              <?php echo $addons ?>
            </div>
          </div>
          <div role="tabpanel" id="product-downloads" class="tab-pane">
            <h3 class="show-print">Downloads</h3>
            <div class="multi-column-text-3">
              <ul class="list-unstyled">
                <?php $nofiles = true; ?>
                <?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/other/Cad_Pdf/'.$product->cadfile.'.pdf')): ?>
                <li><a href="<?php get_bloginfo('url') ?>/data/other/Cad_Pdf/<?php echo $product->cadfile ?>.pdf" target="_blank">2D Outline Drawing</a></li>
                <?php $nofiles = false; ?>
                <?php endif; ?>
                <?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/other/Cad_Pdf/'.$product->cadfile.'.PDF')): ?>
                <li><a href="<?php get_bloginfo('url') ?>/data/other/Cad_Pdf/<?php echo $product->cadfile ?>.PDF" target="_blank">2D Outline Drawing</a></li>
                <?php $nofiles = false; ?>
                <?php endif; ?>

                <?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/other/3DCad_IGES/'.$product->cadfile.'.zip')): ?>
                <li><a href="<?php get_bloginfo('url') ?>/data/other/3DCad_IGES/<?php echo $product->cadfile ?>.zip">3DCad_IGES</a></li>
                <?php $nofiles = false; ?>
                <?php endif; ?>
                <?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/other/3DCad_STEP/'.$product->cadfile.'.zip')): ?>
                <li><a href="<?php get_bloginfo('url') ?>/data/other/3DCad_STEP/<?php echo $product->cadfile ?>.zip">3DCad_STEP</a></li>
                <?php $nofiles = false; ?>
                <?php endif; ?>
                <?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/other/Cad_Dwg/'.$product->cadfile.'.zip')): ?>
                <li><a href="<?php get_bloginfo('url') ?>/data/other/Cad_Dwg/<?php echo $product->cadfile ?>.zip">Cad_Dwg</a></li>
                <?php $nofiles = false; ?>
                <?php endif; ?>
                <?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/other/Cad_Dxf/'.$product->cadfile.'.zip')): ?>
                <li><a href="<?php get_bloginfo('url') ?>/data/other/Cad_Dxf/<?php echo $product->cadfile ?>.zip">Cad_Dxf</a></li>
                <?php $nofiles = false; ?>
                <?php endif; ?>

                <?php if(in_array($product->type_id, array(1,6,11,12,18))): ?>
                <li><a href="<?php get_bloginfo('url') ?>/data/other/AC-Motor-Connection-Diagram.pdf" target="_blank">Wiring Diagram</a></li>
                <?php endif; ?>

                <?php if(in_array($product->type_id, array(2,3,7,8,14,16))): ?>
                <li><a href="<?php get_bloginfo('url') ?>/data/other/DC-Motor-Connection-Diagram.pdf" target="_blank">Wiring Diagram</a></li>
                <?php endif; ?>

                <?php if($nofiles == true): ?>
                <li>Not applicable to this application</li>
                <?php endif; ?>
              </ul>
            </div>
          </div>
          <div role="tabpanel" id="product-videos" class="tab-pane">
            <h3 class="show-print">Videos</h3>
            <div class="row">
              <div class="col-md-3">
                <a class="thumbnail" href="#">
                  <img src="/wp-content/themes/groschopp-v3/images/mock/mock_video_thumb_1.png" alt="" width="175" height="109" />
                  <p>Tech Tips: AC Motor Basics</p>
                </a>
              </div>
              <div class="col-md-3">
                <a class="thumbnail" href="#">
                  <img src="/wp-content/themes/groschopp-v3/images/mock/mock_video_thumb_2.png" alt="" width="175" height="109" />
                  <p>Tech Tips: How to Select a Gearmotor</p>
                </a>
              </div>
            </div>
          </div>
          <div role="tabpanel" id="product-related-items" class="tab-pane">
            <h3 class="show-print">Related Items</h3>
            <div class="row">
              <div class="col-md-3">
                <a class="thumbnail" href="#">
                  <img src="/wp-content/themes/groschopp-v3/images/mock/mock_related_item_thumb.png" alt="" width="171" height="117" />
                  <p class="related-item-description">Controls - short description about controls to go here. short description about controls to go here. short description.</p>
                  <p class="related-item-view-more">View More</p>
                </a>
              </div>
              <div class="col-md-3">
                <a class="thumbnail" href="#">
                  <img src="/wp-content/themes/groschopp-v3/images/mock/mock_related_item_thumb.png" alt="" width="171" height="117" />
                  <p class="related-item-description">Controls - short description about controls to go here. short description about controls to go here. short description.</p>
                  <p class="related-item-view-more">View More</p>
                </a>
              </div>
              <div class="col-md-3">
                <a class="thumbnail" href="#">
                  <img src="/wp-content/themes/groschopp-v3/images/mock/mock_related_item_thumb.png" alt="" width="171" height="117" />
                  <p class="related-item-description">Controls - short description about controls to go here. short description about controls to go here. short description.</p>
                  <p class="related-item-view-more">View More</p>
                </a>
              </div>
              <div class="col-md-3">
                <a class="thumbnail" href="#">
                  <img src="/wp-content/themes/groschopp-v3/images/mock/mock_related_item_thumb.png" alt="" width="171" height="117" />
                  <p class="related-item-description">Controls - short description about controls to go here. short description about controls to go here. short description.</p>
                  <p class="related-item-view-more">View More</p>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php get_sidebar() ?>
</div>