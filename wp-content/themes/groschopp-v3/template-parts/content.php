<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Groschopp
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
			<?php //groschopp_posted_on(); ?>
			<?php the_time('F j, Y') ?>
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_post_thumbnail( 'cs-wp-thumb', array('class'=>'alignleft', 'width' => 130, 'height' => 130) ); ?>
			<div class="text-holder">
				<?php the_excerpt(); ?>
			</div>
	</div><!-- .entry-content -->
</article><!-- #post-## -->


		