<div class="col-sm-12 col-md-9 pull-right content">
	<?php if (have_posts()) : ?>
	
	<?php while (have_posts()) : the_post(); ?>
	
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header>

		<div class="entry-content">
			<?php the_content(); ?>

            <?php if ( has_post_thumbnail() ): ?>
                <img class="alignright hidden-xs show-print" src="<?php the_post_thumbnail_url() ?>" alt="<?php echo get_the_title() ?>">
            <?php endif; ?>
        </div>

		<?php endwhile; ?>

		<?php endif; ?>

	</article>
</div>