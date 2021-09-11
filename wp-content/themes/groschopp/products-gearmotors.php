<div class="twocolumns">
	<?php query_posts('cat='.Gearmotors.'&posts_per_page=1&p=239'); ?>
	<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); $more=0; ?>
		<div class="column">
			 <a href="?t=<?php the_ID() ?>">
				<?php the_post_thumbnail( 'product-post-thumbnail' ); ?>
				<strong class="title"><?php the_title() ?></strong>
			 </a>
			<?php the_excerpt(); ?>
		</div>
	<?php endwhile; ?>
	<?php endif; wp_reset_query(); ?>
	
	<?php query_posts('cat='.Gearmotors.'&posts_per_page=1&p=242'); ?>
	<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); $more=0; ?>
		<div class="column">
			 <a href="?t=<?php the_ID() ?>">
				<?php the_post_thumbnail( 'product-post-thumbnail' ); ?>
				<strong class="title"><?php the_title() ?></strong>
			 </a>
			<?php the_excerpt(); ?>
		</div>
	<?php endwhile; ?>
	<?php endif; wp_reset_query(); ?>
</div>

<div class="twocolumns">
	<?php query_posts('cat='.Gearmotors.'&posts_per_page=1&p=244'); ?>
	<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); $more=0; ?>
		<div class="column">
			<a href="?t=<?php echo the_ID() ?>">
				<?php the_post_thumbnail( 'product-post-thumbnail' ); ?>
				<strong class="title"><?php the_title() ?></strong>
			</a>
			<?php the_excerpt(); ?>
		</div>
	<?php endwhile; ?>
	<?php endif; wp_reset_query(); ?>
	
	<?php query_posts('cat='.Gearmotors.'&posts_per_page=1&p=246'); ?>
	<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); $more=0; ?>
		<div class="column">
			 <a href="?t=<?php echo the_ID() ?>">
				<?php the_post_thumbnail( 'product-post-thumbnail' ); ?>
				<strong class="title"><?php the_title() ?></strong>
			 </a>
			<?php the_excerpt(); ?>
		</div>
	<?php endwhile; ?>
	<?php endif; wp_reset_query(); ?>
</div>