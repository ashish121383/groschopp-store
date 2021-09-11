<?php $debug = false; ?>
<?php get_header(); ?>

<?php if($_POST): ?>
<?php $products = motor_match($_POST); ?>
<?php endif; ?>

<div id="main">
	<div id="content">
		<h2>STP Desktop Application</h2>
		<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
		<div class="post">
			<div class="content">
				<?php the_content(); ?>
			</div>
		</div>
		<?php endwhile; ?>
		<?php endif; ?>
	</div>
	
	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>