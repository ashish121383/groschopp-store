<?php
	$category = get_the_category();
	
	//echo "<pre>".print_r($category, true)."</pre>"; exit;
	
	if($category[0]->cat_ID == Products || $category[0]->category_parent == Products){
		include( TEMPLATEPATH.'/single-products.php' );
	} elseif($category[0]->cat_ID == Applications || $category[0]->category_parent == Applications) {
		include( TEMPLATEPATH.'/single-applications.php' );
	} else {
?>

<?php get_header(); ?>

<div id="main">
	<!-- content -->
	<div id="content">

		<?php if (have_posts()) : ?>
	
			<?php while (have_posts()) : the_post(); ?>
	
				<div class="post">
					<div class="title">
						<h1><?php the_title(); ?></h1>
					</div>
					
					<?php if($post->ID == 972): ?>
					<script type="text/javascript">
					var flashvars = {}; 
					flashvars.url = "http://www.groschopp.com/find-your-sales-representative/";
					flashvars.xml = "/flash/reps.xml?bust=1365786890790";

					swfobject.embedSWF("/flash/reps.swf?bust=1365786890790", "flash", "680", "440", "9.0.0", "", flashvars);
					</script>
					<div id="flash"></div>
					<?php endif; ?>
					
					<div class="content">
						<?php the_content(); ?>
					</div>

				</div>
								
			<?php endwhile; ?>
				
		<?php endif; wp_reset_query(); ?>
	
	</div>
	<!-- sidebar -->
	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>

<?php } ?>
