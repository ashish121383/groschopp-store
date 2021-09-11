<?php
/**
 * 
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Groschopp
 */

get_header(); ?>

<div class="row">

	<?php if ( have_posts() ) : ?>
    <div class="col-sm-12 col-md-9 pull-right content">
        <header>
			<?php the_archive_title( '<h1 class="page-title screen-reader-text">', '</h1>' ); ?>
        </header>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'single'); ?>

		<?php endwhile; ?>

		<?php echo pagination() ?>
		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>
    </div>

	<?php get_sidebar(); ?>

</div>
<?php get_footer(); ?>
