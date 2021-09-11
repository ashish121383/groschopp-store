<?php
/**
 * Template part for displaying videos.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Groschopp
 */

?>
<div class="col-sm-12 col-md-9 pull-right content">

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header>
		
		<?php /*
		<div class="entry-content">
			<?php while(have_posts()): the_post() ?>
			<?php the_content(); ?>
			<?php endwhile ?>
		</div>
		*/ ?>

		<div id="vid-container">

			<?php if(is_page(5639)): ?>
			<?php $video = new WP_Query( array( 'post_type' => 'video', 'posts_per_page' => 1 ) ); // OLD 'meta_key' => 'featured', 'meta_value' => 1 ?>
			<?php while($video->have_posts()): $video->the_post() ?>
			<iframe width="851" height="476" src="http://www.youtube.com/embed/<?php echo get_post_meta(get_the_ID(), 'video_hash', true); ?>?rel=0" frameborder="0" allowfullscreen></iframe>
			<?php endwhile; else: ?>
			<?php $video = new WP_Query( array( 'post_type' => 'video', 'p' => get_the_ID(), 'posts_per_page' => 1 ) ); ?>
			<?php while($video->have_posts()): $video->the_post() ?>
			<iframe width="851" height="476" src="http://www.youtube.com/embed/<?php echo get_post_meta(get_the_ID(), 'video_hash', true); ?>?rel=0" frameborder="0" allowfullscreen></iframe>
			<?php the_content(); ?>
			<?php endwhile; endif ?>
		
		</div>
		
		<ul id="vid-thumbs">
		<?php $videos = new WP_Query( array( 'post_type' => 'video', 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => -1 ) ); ?>
		<?php while ( $videos->have_posts() ) : $videos->the_post(); ?>
		
			<li>
				<?php 
				if(has_post_thumbnail()):
				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'youtube-thumb' );
				$url = $thumb['0']; 
				?>
				<img src="<?php echo $url; ?>" alt="">
				<?php endif ?>
				<a class="vid-swap" href="<?php the_permalink(); ?>"><img class="vid-hover" src="<?php bloginfo('template_url'); ?>/images/play-btn.png" /></a>
				<h4><a class="vid-swap" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
				<p><?php echo get_the_excerpt(); ?></p>
			</li>
			
		<?php endwhile; ?>
		</ul>
			
	</article><!-- #post-## -->
</div>