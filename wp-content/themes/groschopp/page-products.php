<?php /* Template Name: Products */ ?>

<?php get_header() ?>

<div id="main">
	<div id="content">
	
		<div id="sm-icons">
			Share with a friend: <span class='st_facebook' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span><span class='st_twitter' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span><span class='st_email' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span><span class='st_sharethis' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span><span class='st_plusone' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span>
		</div>

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
					<ul class="menu">
						<li><a href="#">Easy Find</a></li>
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
						<li><a href="#">Easy Find</a></li>
						<li><a href="<?php echo get_category_link(Gearmotors); ?>">Browse All Gearmotors</a></li>
					</ul>
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
					<ul class="menu">
						<li><a href="<?php echo get_category_link(GearboxesSpeedReducers); ?>">Browse Gearboxes &amp; Speed Reducers</a></li>
					</ul>
				</div>
			<?php endwhile; ?>
			<?php endif; wp_reset_query(); ?>
			
			<?php query_posts('cat='.MotorComponents.'&tag=primary&posts_per_page=1'); ?>
			<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); $more=0; ?>
				<div class="column">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail( 'product-post-thumbnail' ); ?>
						<strong class="title">Motor Components</strong>
					</a>
					<?php the_excerpt(); ?>
					<ul class="menu">
						<li><a href="<?php echo get_category_link(MotorComponents); ?>">Browse Motor Components</a></li>
					</ul>
				</div>
			<?php endwhile; ?>
			<?php endif; wp_reset_query(); ?>
		</div>
		
		<!-- marked-box -->
		<?php query_posts('cat='.IntegratedSolutions.'&tag=primary&posts_per_page=1'); ?>
		<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); $more=0; ?>
			<div class="marked-box">
				<?php the_post_thumbnail( 'product2-post-thumbnail', array('class'=>'alignleft') ); ?>
				<div class="text-holder">
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<?php the_excerpt(); ?>
					<ul class="menu">
						<li><a href="<?php echo get_category_link(IntegratedSolutions); ?>">Learn More</a></li>
						<li><a href="#">See Case Studies</a></li>
					</ul>
				</div>
			</div>
		<?php endwhile; ?>
		<?php endif; wp_reset_query(); ?>

	</div>
	
	<?php get_sidebar() ?>
</div>

<?php get_footer() ?>