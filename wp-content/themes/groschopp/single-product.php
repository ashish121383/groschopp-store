<?php get_header(); ?>

<!-- main -->
<div id="main">
	<!-- content -->
	<div id="content">
	
		<div id="sm-icons">
			Share with a friend: <span class='st_facebook' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span><span class='st_twitter' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span><span class='st_email' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span><span class='st_sharethis' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span><span class='st_plusone' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span>
		</div>

		<?php query_posts('post_type=product&post_parent='.$post->ID); ?>

		<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
		
			<div class="post">
				<div class="content">
					<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
					<?php the_excerpt() ?>
				</div>
			</div>
		
		<?php endwhile; wp_reset_query(); ?>
		<?php endif; ?>

	</div>
	<!-- sidebar -->
	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>