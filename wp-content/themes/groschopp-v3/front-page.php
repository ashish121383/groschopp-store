<?php 

    get_header(); 

    $motors = new WP_Query(array('post_type' => 'product', 'post_parent' => 0, 'posts_per_page' => 4));

?>

<img class="front-page-headline-img" src="<?php echo get_template_directory_uri() ?>/images/headline.png" alt="">

<ul class="motor-btns">
  <?php /* while($motors->have_posts()): $motors->the_post() ?>
  <li class="col-sm-6 col-md-3">
      <a class="text-btn" href="<?php the_permalink() ?>"><?php $title = get_the_title(); $new_title = str_replace('Motors','',$title); echo $new_title; ?></a>
  </li>
  <?php endwhile */ ?>
	<li>
		<a href="<?php echo get_the_permalink(6191) ?>">
			<img src="<?php bloginfo('template_url') ?>/images/dc-icon.png" alt="">
			<h3>DC</h3>
			<span class="motor-btn-subheading">motors &amp; gearmotors</span>
		</a>
	</li>
	
	<li>
		<a href="<?php echo get_the_permalink(6195) ?>">
			<img src="<?php bloginfo('template_url') ?>/images/ac-icon.png" alt="">
			<h3>AC</h3>
			<span class="motor-btn-subheading">motors &amp; gearmotors</span>
		</a>
	</li>
	
	<li>
		<a href="<?php echo get_the_permalink(6194) ?>">
			<img src="<?php bloginfo('template_url') ?>/images/brushless-icon.png" alt="">
			<h3>BRUSHLESS</h3>
			<span class="motor-btn-subheading">motors &amp; gearmotors</span>
		</a>
	</li>
	
	<li>
		<a href="<?php echo get_the_permalink(6193) ?>">
			<img src="<?php bloginfo('template_url') ?>/images/universal-icon.png" alt="">
			<h3>UNIVERSAL</h3>
			<span class="motor-btn-subheading">motors</span>
		</a>
	</li>
</ul>

<a href="<?php echo get_the_permalink(6443) ?>" class="motor-search-tool-wrapper">
	<div class="motor-search-tool-inner">
		<img class="search-tool-icon" src="<?php bloginfo('template_url') ?>/images/search-tool-icon.png" alt="">
		<h3>MOTOR SEARCH TOOL</h3>
		<p class="motor-search-tool-subheading">Quickly search by motor and gearbox types, voltage, speed, torque and power.</p>
	</div>
</a>

<section id="about">
	<div class="row">
		<div class="col-sm-5">
			<h3>Motors &amp; Gearmotors</h3>
			<?php while(have_posts()): the_post() ?>
			<?php the_content() ?>
			<?php endwhile; wp_reset_query(); ?>
		</div>
		
		<div class="col-sm-7">
			<img src="<?php bloginfo('template_url') ?>/images/group.png" alt="">
		</div>
	</div>
</section>

<div id="get-connected">
	<div class="row">
		<div class="col-sm-4 front-page-bottom-section">
	    <h3>On the Blog</h3>
	    <?php $posts = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 2)) ?>
	    <?php $i = 0; while($posts->have_posts()): $posts->the_post() ?>
	    <?php if($i == 1) {
	    	echo '<div class="hidden-sm">';
	    } ?>
	    <h4><a href="<?php the_permalink() ?>"><?php echo wp_trim_words(get_the_title(), 6) ?></a></h4>
	    <?php the_excerpt() ?>
	    <?php if($i == 1) {
	    	echo '</div>';
	    } ?>
	    <?php $i++; endwhile ?>            
	    <a class="front-page-bottom-section-link" href="<?php echo get_permalink(2451) ?>">View Additional Posts</a>
		</div>
	        
		<div class="col-sm-4 front-page-bottom-section">
		  <h3>Featured Video</h3>  
		  <a class="popup-youtube" href="<?php echo get_option('featured_video_video_url') ?>" onClick="track_load('http://www.groschopp.com', 'Home Page Video')">
		  	<?php $img_id = get_option('featured_video_video_placeholder'); ?>
		    <img src="<?php echo pods_image_url($img_id, 'full'); ?>" alt="">
		  </a>  
		  <a class="front-page-bottom-section-link" href="<?php echo get_permalink(5639) ?>">View Additional Videos</a>
		</div>
		
		<div class="col-sm-4 front-page-bottom-section">
			<h3>News &amp; Events</h3>
	    <?php $news = new WP_Query(array('post_type' => 'article', 'posts_per_page' => 2)) ?>
	    <?php $j = 0; while($news->have_posts()): $news->the_post() ?>
	    <?php if($j == 1) {
	    	echo '<div class="hidden-sm">';
	    } ?>
	    <h4><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h4>
	    <?php the_excerpt() ?>
	    <?php if($j == 1) {
	    	echo '</div>';
	    } ?>
	    <?php $j++; endwhile ?>            
	    <a class="front-page-bottom-section-link" href="<?php echo get_permalink(7) ?>">View News &amp; Events</a>			
		</div>
	</div>
</div>

<?php get_footer(); ?>