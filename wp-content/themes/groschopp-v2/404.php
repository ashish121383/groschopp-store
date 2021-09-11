<?php get_header(); ?>

<div id="main">
	<!-- content -->
	<div id="content">

	<?php if(is_search()) : ?>

		<div class="post">
			<div class="title">
				<h2>No posts found.</h2>
			</div>
		</div>
		
	<?php else : ?>

		<div class="post">
			<div class="title">
				<h1>Not Found</h1>
			</div>
			<div class="content">
				<p>Sorry, but you are looking for something that isn't here.</p>
			</div>
		</div>

	<?php endif; ?>
	
	</div>
	<!-- sidebar -->
	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>