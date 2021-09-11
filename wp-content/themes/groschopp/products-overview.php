<div class="twocolumns">
	
	<?php query_posts('cat='.Motors.'&tag=primary&posts_per_page=1'); ?>
	<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); $more=0; ?>
		<div class="column">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'product-post-thumbnail' ); ?>
				<strong class="title">Motors</strong>
			</a>
			<?php the_excerpt(); ?>
		</div>
	<?php endwhile; ?>
	<?php endif; wp_reset_query(); ?>
	
	<?php query_posts('cat='.Gearmotors.'&tag=primary&posts_per_page=1'); ?>
	<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); $more=0; ?>
		<div class="column">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'product-post-thumbnail' ); ?>
				<strong class="title">Gearmotors</strong>
			</a>
			<?php the_excerpt(); ?>
		</div>
	<?php endwhile; ?>
	<?php endif; wp_reset_query(); ?>
	
</div>
<!-- twocolumns -->
<div class="twocolumns">

	<?php query_posts('cat='.GearboxesSpeedReducers.'&tag=primary&posts_per_page=1'); ?>
	<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); $more=0; ?>
		<div class="column">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'product-post-thumbnail' ); ?>
				<strong class="title">Gearboxes &amp; Speed Reducers</strong>
			</a>
			<?php the_excerpt(); ?>
		</div>
	<?php endwhile; ?>
	<?php endif; wp_reset_query(); ?>
	
	<?php query_posts('cat='.MotorComponents.'&tag=primary&posts_per_page=1'); ?>
	<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); $more=0; ?>
		<div class="column">
			<a href="<?php echo get_category_link(MotorComponents) ?>">
				<?php the_post_thumbnail( 'product-post-thumbnail' ); ?>
				<strong class="title">Motor Components</strong>
			</a>
			<?php the_excerpt(); ?>
		</div>
	<?php endwhile; ?>
	<?php endif; wp_reset_query(); ?>
</div>

<div class="twocolumns">
	
	<div class="column">
		<a href="/controls">
			<img src="<?php bloginfo('template_url') ?>/images/controls.jpg" alt="controls" />
			<strong class="title">Brushless DC Motor Controls</strong>
		</a>
		<p>Designed to provide commutated power and variable speed control, these closed loop controls provide excellent speed regulation for the entire line of Brushless Motors.</p>
	</div>
	
</div>

<!-- marked-box -->
<?php query_posts('cat='.IntegratedSolutions.'&tag=primary&posts_per_page=1'); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); $more=0; ?>
	<div class="marked-box">
		<?php the_post_thumbnail( 'product2-post-thumbnail', array('class'=>'alignleft') ); ?>
		<div class="text-holderprod">
			<h2><a href="<?php echo get_category_link(IntegratedSolutions); ?>"><?php the_title(); ?></a></h2>
			<?php the_excerpt(); ?>
			<ul class="menu">
				<li><a href="<?php echo get_category_link(IntegratedSolutions); ?>">Learn More</a></li>
				<li><a href="/category/applications/automotive-and-off-road/">See Case Studies</a></li>
			</ul>
		</div>
	</div>
<?php endwhile; ?>
<?php endif; wp_reset_query(); ?>