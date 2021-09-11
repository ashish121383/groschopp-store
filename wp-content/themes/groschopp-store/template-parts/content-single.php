<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php the_post_thumbnail( 'cs-wp-thumb', array('class'=>'alignleft', 'width' => 130, 'height' => 130) ); ?>
		<div class="text-holder">
			<h2><a href="<?php echo get_permalink() ?>"><?php the_title(); ?></a></h2>
			<?php the_time('F j, Y') ?>
			<?php the_excerpt(); ?>
			<?php groschopp_entry_footer() ?>
		</div>
</article><!-- #post-## -->


		