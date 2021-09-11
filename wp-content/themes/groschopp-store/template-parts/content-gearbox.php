<?php get_header(); ?>

	<div id="products" class="col-sm-12 col-md-9 pull-right">
		<h1><?php the_title() ?></h1>
	  	<?php while(have_posts()): the_post() ?>
	  	<?php the_content() ?>
	  	<?php endwhile; ?>
	  
		<div class="gearboxes-container">
		  <h2>Right Angle Reducers</h2>

		  <?php $gearboxes = new WP_Query(array('post_type' => 'gearbox', 'post_parent' => 0, 'meta_value' => 'standalone')) ?>
		  <?php if($gearboxes->have_posts()): ?>
		  <?php while($gearboxes->have_posts()): $gearboxes->the_post(); ?>
		  <div class="gearboxes">
			<h3><?php the_title() ?></h3>
		  	<a href="<?php the_permalink() ?>">
		  		<?php echo wp_get_attachment_image(get_field('field_5851cd08c6191', get_the_ID()), 'gearbox-landing-image') ?>
		  	</a>
		  	<?php the_content() ?>
		  </div>
		  <?php endwhile; ?>
		  <?php endif; ?>

		</div>

		<div class="gearboxes-container">
		  <h2>Inline Reducers</h2>

		  <?php $gearboxes = new WP_Query(array('post_type' => 'gearbox', 'post_parent' => 0, 'meta_value' => 'nonstandalone')) ?>
		  <?php if($gearboxes->have_posts()): ?>
		  <?php while($gearboxes->have_posts()): $gearboxes->the_post(); ?>
		  <div class="gearboxes">
			<h3><?php the_title() ?></h3>
		  	<a href="<?php the_permalink() ?>">
		  		<?php echo wp_get_attachment_image(get_field('field_5851cd08c6191', get_the_ID()), 'gearbox-landing-image') ?>
		  	</a>
		  	<?php the_content() ?>
		  </div>
		  <?php endwhile; ?>
		  <?php endif; ?>
		  
		</div>
	  
	</div>

	<?php get_sidebar() ?>

<?php get_footer(); ?>