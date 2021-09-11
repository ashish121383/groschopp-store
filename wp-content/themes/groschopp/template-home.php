<?php
/*
Template Name: Home Template
*/
?><?php get_header(); global $more; ?>

<!-- promo -->
<div class="promo">
	<div class="holder">
		<div class="frame">
			<!-- slides -->
			<?php query_posts('post_type=Slide&posts_per_page=-1'); ?>
			<?php if (have_posts()) : global $wp_query; $post_count=$wp_query->post_count; ?>
				<ul class="slides">
					<?php while (have_posts()) : the_post(); ?>
						<li<?php if(get_post_meta($post->ID, 'text_right', true))echo ' class="slide2"'; ?>>
							<?php the_post_thumbnail( 'slide-post-thumbnail' ); ?>
							<div class="text-holder">
								<?php remove_filter('the_content', 'wpautop'); the_content(''); ?> 
							</div>
						</li>
					<?php endwhile; ?>
				</ul>
				<!-- switcher -->
				<div class="switcher">
					<div class="switcher-holder">
						<a href="#" class="prev">prev</a>
						<ul>
							<?php for($i=0; $i<$post_count; $i++) : ?>
								<li <?php if($i==0) : ?>class="active"<?php endif; ?>><a href="#"><?php echo $i; ?></a></li>
							<?php endfor; ?>
						</ul>
						<a href="#" class="next">next</a>
					</div>
					<div class="switcher-r"></div>
				</div>
			<?php endif; wp_reset_query(); ?>
		</div>
	</div>
</div>
<!-- main -->
<div id="main">
	<!-- heading-box -->
	<div class="heading-box">
		<div class="options-bar">
			<?php get_search_form(); ?>
		</div>
		<h2>Our Products</h2>
	</div>
	<!-- threecolumns -->
	<div class="threecolumns">
	
		<?php query_posts('cat='.Motors.'&tag=primary&posts_per_page=1'); ?>
		<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); $more=0; ?>
			<div class="column">
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail( 'product-post-thumbnail' ); ?>
					<strong class="title">Motors</strong>
				</a>
				<?php the_excerpt(); ?>
				<ul class="menu">
					<li><a href="<?php echo get_permalink(606) ?>">GearMotorMatch</a></li>
					<li><a href="<?php echo get_category_link(Motors); ?>">Browse All Motors</a></li>
				</ul>
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
				<ul class="menu">
					<li><a href="<?php echo get_permalink(606) ?>">GearMotorMatch</a></li>
					<li><a href="<?php echo get_category_link(Gearmotors); ?>">Browse All Gearmotors</a></li>
				</ul>
			</div>
		<?php endwhile; ?>
		<?php endif; wp_reset_query(); ?>

		<?php query_posts('cat='.GearboxesSpeedReducers.'&tag=primary&posts_per_page=1'); ?>
		<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); $more=0; ?>
			<div class="column">
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail( 'product-post-thumbnail' ); ?>
					<strong class="title">Gearboxes &amp; Speed Reducers</strong>
				</a>
				<?php the_excerpt(); ?>
				<ul class="menu">
					<li><a href="<?php echo get_category_link(GearboxesSpeedReducers); ?>">Browse Gearboxes &amp; Speed Reducers</a></li>
				</ul>
			</div>
		<?php endwhile; ?>
		<?php endif; wp_reset_query(); ?>
		
	</div>
	<!-- twocolumns -->
	<div class="twocolumns">
	
			<div class="column">
				
				<div class="heading-box">
					<h2>Featured Video</h2>
				</div>
				<iframe width="450" height="253" src="//www.youtube.com/embed/kIhF1gd28LI" frameborder="0" allowfullscreen></iframe>
				<a href="http://www.groschopp.com/media/videos/">View Additional Videos</a> 
			
			</div>
		
		<?php query_posts('cat='.Blog.'&posts_per_page=2'); ?>
		<?php if (have_posts()) : ?>
			<div class="column">
				<div class="heading-box">
					<h2>Recent Posts</h2>
				</div>
				<ul class="posts-list">
					<?php while (have_posts()) : the_post(); $more=0; ?>
					<li>
						<em class="date"><?php the_time('M'); ?><span><?php the_time('d'); ?></span></em>
						<div class="text">
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<?php the_excerpt() ?>
						</div>
					</li>
					<?php endwhile; ?>
				</ul>
			</div>
		<?php endif; wp_reset_query(); ?>
		
	</div>
</div>

<?php get_footer(); ?>
