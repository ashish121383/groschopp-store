<?php
/*
Template Name: Videos
*/
?>

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
		
		<?php endwhile; endif; ?>
		
		<div id="vid-container">
		
			<iframe width="655" height="366" src="<?php echo get_field('Video_url') ?>?rel=0" frameborder="0" allowfullscreen></iframe>
		
		</div>
		
		<ul id="vid-thumbs">
		
		<?php $videos = new WP_Query( array( 'post_type' => 'youtube-vids', 'posts_per_page' => -1, 'orderby' => 'date' ) ); ?>
		
		<?php while ( $videos->have_posts() ) : $videos->the_post(); ?>
		
			<li>
			
				<?php if (has_post_thumbnail()) { the_post_thumbnail('youtube-thumb'); } ?>
				<a class="vid-swap" href="<?php the_permalink(); ?>"><img class="vid-hover" src="<?php bloginfo('template_url'); ?>/images/play-btn.png" /></a>
				<h4><a class="vid-swap" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
				<p><?php the_content(); ?></p>
			
			</li>
			
		<?php endwhile; wp_reset_query(); ?>
		
		</ul>

	</div>
	<!-- sidebar -->
	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
