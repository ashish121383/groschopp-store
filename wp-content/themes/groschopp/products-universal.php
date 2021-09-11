
	<?php query_posts('p='.$_GET['t']); ?>
	<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>

	<?php the_content() ?>

	<?php endwhile; endif; wp_reset_query(); ?>