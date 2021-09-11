<?php get_header(); ?>

	<div id="products" class="col-sm-12 col-md-9 pull-right">
		<h1><?php the_title() ?></h1>
		<?php while(have_posts()): the_post() ?>
		<?php the_content() ?>
		<?php endwhile; ?>
	  
	  <?php $controls = new WP_Query(array('post_type' => 'control', 'post_parent' => 0, 'order' => 'asc')) ?>
	  <?php while($controls->have_posts()): $controls->the_post(); ?>
	  <div class="controls">
	  	<h2><?php the_title() ?></h2>
	  	<a href="<?php the_permalink() ?>">
	  		<img src="<?php echo get_field('field_585b2e619596b', get_the_ID()) ?>" alt="<?php echo get_the_title() ?>">
	  	</a>
	  	<p><?php the_content() ?></p>
	  </div>
	  <?php endwhile; ?>
	  
	</div>

	<?php get_sidebar() ?>

<?php get_footer(); ?>