<?php $count = $wp_query->found_posts ?>
<?php $twocolumns = 0; $i = 1; ?>

<?php while (have_posts()) : the_post(); ?>
<?php echo ($twocolumns == 0)? '<div class="twocolumns">' : '' ?>
	<div class="column">
		<a href="<?php the_permalink() ?>">
			<?php if($image = get_meta('grid_photo')): ?>
			<?php if($image_attributes = wp_get_attachment_image_src($image['ID'], 'product-post-thumbnail')): ?>
			<img src="<?php echo $image_attributes[0] ?>" />
			<?php endif; endif ?>
			<strong class="title"><?php the_title() ?></strong>
		</a>
		<?php echo get_meta('product_details_excerpt') ?>
	</div>			
<?php echo ($twocolumns == 1 OR $count == $i)? '</div>' : ''; ?>
<?php $twocolumns = ($twocolumns == 1)? 0 : $twocolumns + 1; $i++; ?>
<?php endwhile; wp_reset_query(); ?>