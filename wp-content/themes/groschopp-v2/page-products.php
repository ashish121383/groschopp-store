<?php get_header() ?>

<div id="main">
	<!-- content -->
	
	<div id="content">
	
		<div id="sm-icons">
			Share with a friend: <span class='st_facebook' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span><span class='st_twitter' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span><span class='st_email' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span><span class='st_sharethis' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span><span class='st_plusone' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span>
		</div>
		
		<?php query_posts(array('post_type' => 'product', 'post_parent' => 0, 'meta_key' => 'display_in_list', 'meta_value' => '1')); ?>
	
		<?php get_template_part('partials/grid') ?>
	</div>
	
	<?php get_sidebar(); ?>

</div>

<?php get_footer() ?>