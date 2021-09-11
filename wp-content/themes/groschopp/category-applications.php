<?php get_header(); ?>

<div id="main">
	<!-- content -->
	<div id="content">
	
		<div id="sm-icons">
			Share with a friend: <span class='st_facebook' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span><span class='st_twitter' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span><span class='st_email' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span><span class='st_sharethis' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span><span class='st_plusone' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span>
		</div>

		<?php echo category_description() ?>

		<?php if(isset($_GET['a'])): ?>
		<?php query_posts('&posts_per_page=1&p='.$_GET['a']); ?>

		<?php if (have_posts()) : ?>
	
			<?php while (have_posts()) : the_post(); ?>
	
				<div class="post">
					<div class="title">
						<h1><?php the_title(); ?></h1>
					</div>
					<div class="content">
						<?php the_content(); ?>
					</div>

				</div>
								
			<?php endwhile; ?>
				
		<?php endif; ?>		
		
		<?php else: ?>
		<?php if(is_category('applications')): ?>
		<?php query_posts('category__in=34'); ?>
		<?php endif ?>

		<?php if (have_posts()) : ?>
	
			<?php while (have_posts()) : the_post(); ?>
				
				<div class="marked-box">
					<?php the_post_thumbnail( 'cs-wp-thumb', array('class'=>'alignleft', 'width' => 130, 'height' => 130) ); ?>
					<div class="text-holder">
						<h2><a href="?a=<?php the_ID() ?>"><?php the_title(); ?></a></h2>
						<?php the_excerpt(); ?>
						<ul class="menu">
							<li><a href="<?php echo get_permalink() ?>">Learn More</a></li>
						</ul>
					</div>
				</div>
								
			<?php endwhile; ?>
				
		<?php endif; ?>
		
		<?php endif; wp_reset_query(); ?>		
	
	</div>
	<!-- sidebar -->
	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>