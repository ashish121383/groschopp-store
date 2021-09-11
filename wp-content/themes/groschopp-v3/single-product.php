<?php get_header(); ?>

    <?php if(isset($_GET['id'])): ?>
    <?php get_template_part( 'single-parts/single', 'product' ); ?>
    <?php elseif(get_the_ID() == 6416): ?>
    <?php get_template_part( 'single-parts/single', 'gearboxes' ); ?>
    <?php elseif(get_the_ID() == 6418): ?>
    <?php get_template_part( 'single-parts/single', 'motor-controls' ); ?>
    <?php else: ?>
    <?php get_template_part( 'single-parts/single', 'product-parent' ); ?>
    <?php endif ?>

<?php get_footer(); ?>
