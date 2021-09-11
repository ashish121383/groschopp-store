<div class="col-sm-12 col-md-9 pull-right content">

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<?php the_time('F j, Y') ?>
		</header>

		<div class="entry-content">
			<?php if($url = get_field('blog_pdf', get_the_ID())): ?>
				<a href="<?php echo $url ?>" target="_blank"><img src="http://www.groschopp.com/wp-content/uploads/pdf-icon_blog.png" /></a>
			<?php endif ?>

			<?php the_content(); ?>
		</div>

	</article>

</div>