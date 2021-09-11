<?php get_header(); ?>

<!-- main -->
<div id="main">
	<!-- content -->
	<div id="content">
	
		<div id="sm-icons">
			Share with a friend: <span class='st_facebook' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span><span class='st_twitter' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span><span class='st_email' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span><span class='st_sharethis' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span><span class='st_plusone' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span>
		</div>

		<?php if (have_posts()) : ?>
	
		<?php while (have_posts()) : the_post(); ?>

			<div class="post">
				<div class="content">					
					<?php the_content(); ?>
				</div>
			</div>
		
		<?php endwhile; ?>

		<?php endif; ?>

	</div>
	<!-- sidebar -->
	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
