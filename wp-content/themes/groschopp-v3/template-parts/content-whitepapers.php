<?php
/**
 * Template part for displaying whitepapers.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Groschopp
 */

?>
<div class="col-sm-12 col-md-9 pull-right content">
	<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
	
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header>

	<?php endwhile; endif ?>

		<?php
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			query_posts(array('post_type' => 'whitepaper', 'paged' => $paged, 'post_per_page' => 1));
		?>
			
		<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
		
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php the_post_thumbnail( 'cs-wp-thumb', array('class'=>'alignleft thumbnail', 'width' => 130, 'height' => 130) ); ?>
			<div class="text-holder">
				<h2><a href="<?php echo get_permalink() ?>"><?php the_title(); ?></a></h2>
				<?php the_excerpt(); ?>
			</div>
		</article>
		
		<?php endwhile; ?>
			
        <div class="pagination">  
            <div class="nav-previous"><?php next_posts_link(__('<span class="meta-nav">←</span> Older posts')); ?></div>  
            <div class="nav-next"><?php previous_posts_link(__('Newer posts <span class="meta-nav">→</span>')); ?></div>  
        </div><!-- #nav-above -->

		<?php endif; wp_reset_query(); ?>
</div>