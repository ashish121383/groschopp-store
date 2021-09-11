<?php get_header(); ?>

<div id="main">
	<!-- content -->
	<div id="content">
	
		<div id="sm-icons" class="extended">
			Share with a friend: <span class='st_facebook' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span><span class='st_twitter' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span><span class='st_email' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span><span class='st_sharethis' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span><span class='st_plusone' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span>RSS feed: <a class="rss" href="http://www.groschopp.com/feed">RSS Feed</a>
		</div>
		
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
		
        <div class="pagination">  
            <div class="nav-previous"><?php next_posts_link(__('<span class="meta-nav">←</span> Older posts')); ?></div>  
            <div class="nav-next"><?php previous_posts_link(__('Newer posts <span class="meta-nav">→</span>')); ?></div>  
        </div><!-- #nav-above -->

		<?php endif; wp_reset_query(); ?>
	</div>
	<!-- sidebar -->
	<?php get_sidebar('blog'); ?>
</div>

<?php get_footer(); ?>