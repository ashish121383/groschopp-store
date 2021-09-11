        <div class="row">
	        <?php if (have_posts()) : ?>
	        <?php while (have_posts()) : the_post(); ?>
	        <?php $postid = get_the_ID(); ?> 
	        <?php $motors = new WP_Query(array('post_type' => 'product', 'post_parent' => 0)); $i = 0; ?>
	
	        <?php if($motors->have_posts()): ?>
	        <div id="products" class="col-sm-12 col-md-9 pull-right content">
	        <?php else: ?>
	        <div class="product-cat col-sm-12 col-md-9 pull-right content">
	        <?php endif; ?>

            <?php if(isset($_GET['added'])): ?>
            <div class="alert alert-success" role="alert">Product #<?php echo $_GET['added'] ?> has been added to your quote cart.</div>
            <?php endif; ?>

	          <h1>
	          	<?php the_title() ?>
	          	<?php 
	          	$sub = get_post_meta( get_the_ID(), 'sub_head', true );
	          	if($sub):
	          	?>
	          	<small><?php echo $sub; ?></small>
	          	<?php endif ?>
	          </h1>
	          
	          <img class="visible-xs" src="<?php echo pods_image_url(get_post_meta(get_the_ID(), 'product_photo', true), 'full') ?>" alt="<?php echo get_the_title() ?>">
	
	          <?php the_content() ?>         
	
            <?php if(get_post_meta(get_the_ID(), 'product_photo', true)): ?>
            	<img class="alignright hidden-xs show-print" src="<?php echo pods_image_url(get_post_meta(get_the_ID(), 'product_photo', true), 'full') ?>" alt="<?php echo get_the_title() ?>">
            	
              <?php $the_id = get_the_ID() ?>
              <?php $features = get_post_meta($the_id, 'product_features', true) ?>
              <?php echo $features ?>
            <?php endif ?>
                
          </div>
          <?php endwhile; endif; ?>
          <?php get_sidebar(); ?>
        </div>

        <?php if($motors->have_posts()): ?>

        <?php $product = pods('product', get_the_ID()); ?>
        <?php $product_ids = $product->field('product_id', false) ?>

        <?php foreach($product_ids as $product_id): ?>
        <?php $ids[] = $product_id['groschopp_database_id']; ?>
        <?php endforeach ?>

        <?php $voltages = wp_get_post_terms($product->id(), 'voltage', array('orderby' => 'slug', 'order' => 'ASC')); ?>

        <?php $voltage = (isset($_GET['voltage']))? $_GET['voltage'] : false ; ?>
        <?php $orderby = (isset($_GET['orderby']))? $_GET['orderby'] : "voltage" ; ?>

        <?php $dataArray = array('ids' => implode('|', $ids), 'voltage' => $voltage, 'orderby' => $orderby) ?>
    
        <?php if(count($ids)): ?>
        <div class="row">
        	<aside class="col-sm-3">        
          	<form id="narrow-search">
            	<h3 class="text-center">Product Options</h3>
              <div>
	              Gearbox
                <?php //$parent_id = ($post->post_parent)? $post->post_parent : get_the_ID(); ?>
                <?php $parent_id = (get_field('field_58916d3048bc2', get_the_ID()))? get_field('field_58916d3048bc2', get_the_ID()) : get_the_ID(); ?>
                <button class="<?php echo (get_the_ID() === $parent_id)? "selected" : ""; ?>" onclick="location.href='<?php echo get_the_permalink($parent_id) ?>';" type="button">Motor Only</button>
	              <?php $children_ids = get_field('field_589168d204428', $parent_id) ?>
                <?php $children = new WP_Query(array('post_type' => 'product', 'post__in' => $children_ids)); ?>
	              <?php while($children->have_posts()): $children->the_post() ?>
	              <button onclick="location.href='<?php echo get_the_permalink() ?>';" class="<?php echo (get_the_ID() === $postid)? "selected" : ""; ?>" type="button"><?php the_title() ?></button>
	              <?php endwhile ?>
              </div>
              
              <div>
                Voltage
                <button class="motor-select-voltage motor-select-voltage-all selected" value="0" type="button">All Voltages</button>
                <?php foreach($voltages as $voltage): ?>
                <?php $voltage_pod = pods('voltage'); $voltage_pod->fetch($voltage->term_id); ?>
                <button class="motor-select-voltage" value="<?php echo $voltage_pod->field('voltage_number') ?>" type="button"><?php echo $voltage->name ?></button>
                <?php endforeach ?>
              </div>

              <?php if($parent_id == 6195): ?>
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
        <?php endif; endif; ?>