<?php get_header(); ?>

<div id="content">

	<?php if (have_posts()) : ?>
			
		<?php while (have_posts()) : the_post(); ?>

			<div class="post">
				<div class="title">
					<h2>
						<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
							<?php the_title(); ?>
						</a>
					</h2>
					<p class="info"><strong class="date"><?php the_time('F jS, Y') ?></strong> by <?php the_author(); ?></p>
				</div>
				<div class="content">
					<?php the_content(); ?>
				</div>
				<div class="meta">
					<ul>
						<li>Posted in <?php the_category(', ') ?></li>
						<li><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></li>
						<?php the_tags('<li>Tags: ', ', ', '</li>'); ?>
					</ul>
				</div>
			</div>
			
		<?php endwhile; ?>

		<?php get_template_part( 'navigation' ); ?>
	
	<?php endif; ?>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
