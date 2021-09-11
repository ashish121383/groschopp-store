<?php get_header(); ?>

<?php
	$category=get_the_category();
global $post;
echo '<!--POST NAME::' . $post->post_name . '-->';
		
	if($category[0]->category_parent == Products OR $category[0]->category_parent == Motors){
		include( TEMPLATEPATH.'/category-products.php' );
	} elseif($category[0]->category_parent == Applications OR $category[0]->category_parent == AutomotiveAndOffRoad){
		include( TEMPLATEPATH.'/category-applications.php' );
	} else {
?>

<div id="main">
	<!-- content -->
	<div id="content">

		<?php if (have_posts()) : ?>
	
			<div class="post">
				<div class="title">
					<h1></h1>
				</div>
			</div>
				
			<?php while (have_posts()) : the_post(); ?>
	
				<div class="post">
					<div class="title">
						<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					</div>
					<div class="content"><?php the_excerpt(); ?></div>
					
					<? /*
					<div class="meta">
						<ul>
							<li>Posted in <?php the_category(', ') ?></li>
							<li><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></li>
							<?php the_tags('<li>Tags: ', ', ', '</li>'); ?>
						</ul>
					</div>
					*/ ?>
				</div>
				
			<?php endwhile; ?>
	
			<?php get_template_part( 'navigation' ); ?>
			
		<?php else : ?>
	
			<?php get_template_part( 'notfound' ); ?>
		
		<?php endif; ?>

	</div>
	<!-- sidebar -->
	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>

<?php } ?>
