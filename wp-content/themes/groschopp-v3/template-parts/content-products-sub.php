<div id="products" class="col-sm-12 col-md-9 pull-right">
	<h1><?php the_title() ?></h1>
  
  <?php while(have_posts()): the_post() ?>
	<div class="cat-intro">
  	<div>
  		<?php 
			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'product_photo' );
			$url = $thumb['0']; 
			?>
  		<img class="visible-xs alignright" src="<?php echo $url ?>" alt="<?php echo get_the_title() ?>">
  		<?php the_content() ?>
  	</div>
  	<div>
  		<img class="hidden-xs show-print" src="<?php echo $url ?>" alt="<?php echo get_the_title() ?>"> 
  	</div>
  </div>
  
  <div class="row">
  	<div class="col-sm-4">
  		<div class="cat-box">
  			<h2>Features</h2>
        <?php if( have_rows('field_57fd593416e49') ): ?>
          <?php while( have_rows('field_57fd593416e49') ): the_row(); ?>
          <span><?php echo get_sub_field('field_57fd598469e48') ?></span>
          <?php endwhile ?>
        <?php endif; ?>
  		</div>
  	</div>
  	
  	<div class="col-sm-4">
  		<div class="cat-box">
  			<h2>Downloads</h2>
        <?php if( have_rows('field_57fd59aff8022') ): ?>
          <?php while( have_rows('field_57fd59aff8022') ): the_row(); ?>
          <span><a href="<?php echo get_sub_field('field_57fd59d4f8024') ?>" target="_blank"><?php echo get_sub_field('field_57fd59c1f8023') ?></a></span>
          <?php endwhile ?>
        <?php endif; ?>
  		</div>
  	</div>
  	
  	<div class="col-sm-4">
  		<div class="cat-box">
  			<h2>Related Items</h2>
  			<?php if( have_rows('field_57fd5a05f8025') ): ?>
          <?php while( have_rows('field_57fd5a05f8025') ): the_row(); ?>
          <span><a href="<?php echo get_sub_field('field_57fd5a1ef8027') ?>" target="_blank"><?php echo get_sub_field('field_57fd5a14f8026') ?></a></span>
          <?php endwhile ?>
        <?php endif; ?>
  		</div>
  	</div>
  </div>
  <?php endwhile ?>

  <div class="row">
    <div class="col-sm-12">
        <div id="results-list" data-url="<?php bloginfo('template_url'); ?>" data-parameters="<?php echo get_field('field_57fea3a3c651b', get_the_ID()) ?>" class="table-responsive"></div>
    </div>
  </div>
  
</div>