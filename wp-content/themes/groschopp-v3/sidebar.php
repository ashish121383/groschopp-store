<aside id="sidebar" class="col-md-3">
	<span class="close-btn"></span>
	
	<?php 
	$args = array(
	  'theme_location' => 'primary',
	  'menu' => 'primary',
	  'container' => 'nav',
	  'container_id' => 'side-nav',
	  'depth' => 3,
	  'walker' => new UL_Submenu_Walker()
	);
	
	wp_nav_menu($args); 
	?>
	
	<?php 
	$args = array(
	  'theme_location' => 'secondary',
	  'menu' => 'secondary',
	  'container' => 'nav',
	  'container_id' => 'side-nav',
	  'depth' => 2,
	  'walker' => new UL_Submenu_Walker()
	); 
	
	wp_nav_menu($args); 
	?>
	
	<!-- <a href="http://www.groschopp.com/48-hour-turnaround/"><img class="hidden-xs" src="<?php echo get_template_directory_uri() ?>/images/48-hour.png" alt=""></a> -->
	<a class="text-btn contact hidden-xs" href="<?php echo get_permalink(11); ?>">Contact Us</a>
	<a class="text-btn search hidden-xs"  href="<?php echo get_permalink(6443) ?>">Search for Your Motor</a>
	<a class="text-btn upload hidden-xs" href="<?php echo get_permalink(6628) ?>">Upload Your Application Specs</a>
	

</aside>

