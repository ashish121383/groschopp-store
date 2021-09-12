<?php get_header(); ?>

<div class="row">

	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>

			<?php if(is_singular('gearbox')): ?>
            <?php get_template_part( 'single-parts/single', 'gearbox' ); ?>
            <?php elseif(is_singular('control')): ?>
            <?php get_template_part( 'single-parts/single', 'control' ); ?>
			<?php elseif(is_singular('accessory')): ?>
            <?php get_template_part( 'single-parts/single', 'accessory' ); ?>
            <?php else: ?>
            <?php get_template_part( 'single-parts/single', 'post' ); ?>
            <?php endif; ?>

		<?php endwhile; endif; ?>

	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
