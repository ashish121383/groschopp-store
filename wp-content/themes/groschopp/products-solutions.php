
	<?php query_posts('cat='.IntegratedSolutions.'&posts_per_page=1'); ?>
	<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>

	<?php the_content() ?>

	<?php endwhile; endif; wp_reset_query(); ?>