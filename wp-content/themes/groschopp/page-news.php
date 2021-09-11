<?php get_header(); ?>

<!-- main -->
<div id="main">
	<!-- content -->
	<div id="content">
	
		<div id="sm-icons">
			Share with a friend: <span class='st_facebook' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span><span class='st_twitter' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span><span class='st_email' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span><span class='st_sharethis' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span><span class='st_plusone' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span>
		</div>
		
		<?php
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		 	query_posts(array('paged' => $paged, 'post_per_page' => 1, 'cat' => 61));
		?>
		
		<?php if (have_posts()) : ?>
	
		<ul class="posts-list">
		<?php while (have_posts()) : the_post(); ?>
		
			<li>
				<em class="date"><?php the_time('M'); ?><span><?php the_time('d'); ?></span></em>
				<div class="text">
					<h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
					<?php the_excerpt() ?>
				</div>
			</li>
		
		<?php endwhile; ?>
		</ul>

		<?php endif; wp_reset_query(); ?>
	</div>
	<!-- sidebar -->
	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>