<?php $product = get_product($_GET['id']) ?>
<?php $category = pods('product', get_the_ID()); ?>
<?php $headers = get_product_headers($product->type_id) ?>

<!-- main -->

    <form method="post" id="modal" class="clearfix" action="<?php echo get_bloginfo('template_url') ?>/quote-add.php" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
      <input type="hidden" name="<?php echo ini_get("session.upload_progress.name"); ?>" value="123">
      
      <div class="row">
       
      	<div class="col-sm-6">
    			<h2>
          Model #<?php echo $product->ordering_number ?>
          <small>Use the menu below to configure the most common modifications available in 48 hours for the motor you have selected. Can't find the modification you need? Send us a note or upload your print and one of our in-house experts will help you create the solution that's just right for you.</small>
          </h2>
        </div>
        
        <div class="col-sm-6 text-center">
            <img src="<?php bloginfo('template_url') ?>/images/phone-cta.png" alt="Questions? Ask an expert. 800.829.4135">
        </div>
        
      </div>
      
      <hr>
        
      <div class="row">
      
      	<div class="col-sm-6" style="z-index: 99;">
      	
          <?php /*
      		<a href="javascript(0);" id="expandAll">Expand All</a> / <a href="javascript(0);" id="collapseAll">Collapse All</a>
          */ ?>
      		<div class="accordion">
	          <?php foreach($headers as $header): ?>
	          <?php $options = get_product_options($header->id, $product->type_id); $count = 0; ?>
	          <?php foreach($options as $option): ?>

            <?php $exception[] = ($option->value == 1 && $product->volage != 115)? true : false ; ?>
            <?php $exception[] = ($option->value == 2 && strpos($product->model, "FC") !== false)? true : false; ?>
            <?php $exception[] = ($option->value == 3 && strpos($product->model, "PM108") !== false)? true : false; ?>
            <?php $exception[] = ($option->value == 4 && substr($product->model, -1) == "i")? true : false ;  ?>
            <?php $exception[] = ($option->value == 5 && strpos($product->model, "PM8") === false)? true : false; ?>
            <?php $count = (!in_array(1, $exception))? $count + 1 : $count; ?>
            <?php unset($exception); endforeach ?>

            <?php if($count > 0): ?>
            <section class="options">
            	<header data-product-id="<?php echo $product->type_id ?>" data-image="<?php echo $header->custom_image ?>">
              	<span><?php echo $header->label ?></span>
              	<div class="tooltip-2">
                	<div class="bubble">
                  	<?php echo $header->description ?>
                  </div>
                </div>
              </header>
              <div class="option-content" style="display: none;">
	              <?php foreach(get_product_options($header->id, $product->type_id) as $option): ?>
	
	              <?php $exception[] = ($option->value == 1 && $product->volage != 115)? true : false ; ?>
	              <?php $exception[] = ($option->value == 2 && strpos($product->model, "FC") !== false)? true : false; ?>
	              <?php $exception[] = ($option->value == 3 && strpos($product->model, "PM108") !== false)? true : false; ?>
	              <?php $exception[] = ($option->value == 4 && substr($product->model, -1) == "i")? true : false ;  ?>
	              <?php $exception[] = ($option->value == 5 && strpos($product->model, "PM8") === false)? true : false; ?>
	              <?php if(!in_array(1, $exception)): ?>
                <?php if(in_array($option->id, array(33, 34, 36))): ?>
                <input type="<?php echo ($option->form_element === 'R')? "radio" : "checkbox" ; ?>" name="<?php echo $header->label ?>" value="<?php echo $option->label ?>"> <?php echo $option->label ?> <input type="text" name="<?php echo $option->label ?>_temp">
                <?php else: ?>
                <input type="<?php echo ($option->form_element === 'R')? "radio" : "checkbox" ; ?>" name="<?php echo $header->label ?>" value="<?php echo $option->label ?>"> <?php echo $option->label ?><br/>
                <?php endif; endif; unset($exception); endforeach ?>
              </div>
            </section>
            <?php endif; endforeach ?>
          </div>
        </div>
        
        <div class="col-sm-6 custom-images">
        	<img src="<?php bloginfo('url') ?>/data/customize/<?php echo $product->type_id ?>/Motor.jpg" alt="">
        	<h3>Submit your own motor print.</h3>
          <p>We'll work with you to create the perfect solution.</p>
          
          <div id="filelist">Your browser doesn't have Flash, Silverlight or HTML5 support.</div>
          <a id="pickfiles" href="javascript(0);">
              <img src="<?php bloginfo('template_url') ?>/images/Upload-Print.png">
          </a>
          
          <h3>Do you have special options not offered here?</h3>
          <p>Send us a note, our in house experts can customize beyond the options offered here, tell us about us your challenge.</p>
          <textarea name="special_options" id="special-options"></textarea>
        </div>
        
      </div>
      
      <footer class="modal-controls text-right">
        <input class="text-btn" type="button" value="Cancel" onclick="history.go(-1); return false;">
        <input class="text-btn green" id="uploadfiles" type="submit" value="Add to Quote">
      </footer>
      
      <small>Our 48 Hour Customization program is based on the standard modifications listed above. Additional modifications may be available within 48 hours, however, typically require a longer lead time. Additionally, quantities greater than 10 pieces per order are not eligible for the 48 Hour Customization program. (Note: quantities over 10 can be customized, but require standard lead times.)</small>
    
    </form>