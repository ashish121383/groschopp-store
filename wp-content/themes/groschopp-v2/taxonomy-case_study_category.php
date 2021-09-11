<?php get_header(); ?>

<div id="main">
	<!-- content -->
	<div id="content">

		<?php $term =	$wp_query->queried_object; ?>
	
		<div id="sm-icons" class="extended">
			Share with a friend: <span class='st_facebook' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span><span class='st_twitter' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span><span class='st_email' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span><span class='st_sharethis' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span><span class='st_plusone' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span>RSS feed: <a class="rss" href="http://www.groschopp.com/feed">RSS Feed</a>
		</div>

		<?php echo category_description() ?>
		
		<?php
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		 	query_posts(array('post_type' => 'case_study', 'paged' => $paged, 'post_per_page' => 1, 'case_study_category' => $term->name));
		?>
		
		<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
		
			<div class="marked-box">
				<?php the_post_thumbnail( 'cs-wp-thumb', array('class'=>'alignleft', 'width' => 130, 'height' => 130) ); ?>
				<div class="text-holder">
					<h2><a href="<?php echo get_permalink() ?>"><?php the_title(); ?></a></h2>
					<?php the_excerpt(); ?>
					<ul class="menu">
						<li><a href="<?php echo get_permalink() ?>">Learn More</a></li>
					</ul>
				</div>
			</div>
		
		<?php endwhile; ?>
		
        <div class="pagination">  
            <div class="nav-previous"><?php next_posts_link(__('<span class="meta-nav">←</span> Older posts')); ?></div>  
            <div class="nav-next"><?php previous_posts_link(__('Newer posts <span class="meta-nav">→</span>')); ?></div>  
        </div><!-- #nav-above -->

		<?php endif; wp_reset_query(); ?>
	</div>
	<!-- sidebar -->
	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>