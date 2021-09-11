<div id="sidebar">	
	<!-- sub navigation -->
<?php if (!is_page(606)) : ?>
	<?php
	
		global $_ancess,$_parent,$_active;
		$menu = wp_get_nav_menu_object('Main'); 
		$menu_items = wp_get_nav_menu_items($menu->term_id);		
		_wp_menu_item_classes_by_context($menu_items);
		
		foreach($menu_items as $item):
			if((!in_array('current-menu-parent',$item->classes))&&in_array('current-menu-ancestor',$item->classes)){$_ancess = $item;}
			if(in_array('current-menu-parent',$item->classes)){$_parent = $item;}
			if(in_array('current-menu-item',$item->classes)){$_active = $item;}
		endforeach;
		
		if(!$_ancess){if(!$_parent){$_ancess = $_active; }else{$_ancess = $_parent;}}if($_ancess){
		echo '<ul class="subnav">';
			foreach($menu_items as $item):
			if($item->menu_item_parent == $_ancess->ID):
			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter($item->classes), $item ) );
			echo '<li class="'.$class_names.'"><a href="'.$item->url.'">'.$item->title.'</a></li>';
			endif;
			endforeach;
		echo '</ul>';
		}
		
		global $_ancess,$_parent,$_active;
		$menu = wp_get_nav_menu_object('Top'); 
		$menu_items = wp_get_nav_menu_items($menu->term_id);		
		_wp_menu_item_classes_by_context($menu_items);
		
		foreach($menu_items as $item):
			if((!in_array('current-menu-parent',$item->classes))&&in_array('current-menu-ancestor',$item->classes)){$_ancess = $item;}
			if(in_array('current-menu-parent',$item->classes)){$_parent = $item;}
			if(in_array('current-menu-item',$item->classes)){$_active = $item;}
		endforeach;
		
		if(!$_ancess){if(!$_parent){$_ancess = $_active; }else{$_ancess = $_parent;}}if($_ancess){
		echo '<ul class="subnav">';
			foreach($menu_items as $item):
			if($item->menu_item_parent == $_ancess->ID):
			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter($item->classes), $item ) );
			echo '<li class="'.$class_names.'"><a href="'.$item->url.'">'.$item->title.'</a></li>';
			endif;
			endforeach;
		echo '</ul>';
		}
	
	?>
	
	<?php $ancestors = get_post_ancestors($post); ?>
	
	<?php if(is_page(2451) OR in_category(14) OR (in_category(14) AND is_single())): ?>
	
		<?php
		
		$args=array(
		  'orderby' => 'name',
		  'order' => 'ASC',
		  'child_of' => 14,
		  'type' => 'post',
		  'title_li' => ''
		);
		
		?>
	
		<h3>Categories</h3>
		<ul class="subnav">
			<?php wp_list_categories($args); ?>
		</ul>
		
		<?php /*
		
		<script type="text/javascript">
		
		function validateForm()
		{
			var x=document.forms["blog-via-email"]["name"].value;
			if (x==null || x=="")
			  {
			  alert("Name must be filled out");
			  return false;
			}
			var y=document.forms["blog-via-email"]["email"].value;
			if (y==null || y=="")
			  {
			  alert("Email must be filled out");
			  return false;
			}
			var atpos=y.indexOf("@");
			var dotpos=y.lastIndexOf(".");
			if (atpos<1 || dotpos<atpos+2 || dotpos+2>=y.length)
			  {
			  alert("Not a valid e-mail address");
			  return false;
			}
		}
		
		</script>
		
		<form action="<?php bloginfo('template_url') ?>/form-action.php" method="post" name="blog-via-email" id="blog-via-email" onsubmit="return validateForm()">
		
			<h4>Receive our Blog via Email</h4>
			<p>Get your hands on new product design and engineering tips by subscribing to our blog</p>
			<input type="hidden" name="form" value="email_blog" />
			<input type="text" name="name" placeholder="Name" />
			<input type="email" name="email" placeholder="Email Address" />
			<input type="submit" value="Subscribe" />
		
		</form>
		
		*/ ?>
	
	<?php endif; ?>
<?php endif; ?>
	
	<!-- adv-box -->
    <?php if (!is_page(606)) : ?>
	<div class="adv-box">   
		<a href="/gear-motor-match/"><img src="<?php bloginfo('template_url'); ?>/images/gear-motor-match-gray.png" alt="Groschopp's Gear Motor Match" width="205" border="0" /></a>
	</div>
  <div class="adv-box">
    <a href="/contact/"><img src="<?php bloginfo('template_url'); ?>/images/here4you.png" alt="Contact Groschopp" width="205" border="0" /></a>
  </div>
    <?php endif ?>
    <?php //ELSE ?>
    <?php if (is_page(606)) : ?> 

    <div class="adv-box">
        <a href="/about-stp-calculator/"><img src="<?php bloginfo('template_url'); ?>/images/ecalc.jpg" alt="Groschopp's STP Calculator" width="205" height="93" border="0" /></a>
    </div> 
    <div class="adv-box">
        <a href="/contact/"><img src="<?php bloginfo('template_url'); ?>/images/here4you.png" alt="Contact Groschopp" width="205" border="0" /></a>
    </div>
        <div class="adv-box">
        <a href="/about-gear-motor-match/"><img src="<?php bloginfo('template_url'); ?>/images/gear-motor-match.png" alt="About Motor Match" width="205" height="93" border="0" /></a>
    </div>

    <?php endif ?>

    <?php /*<div class="adv-box">
        <img src="<?php bloginfo('template_url'); ?>/images/btn_3D-Motor-Models.jpg" alt="Download fractional horsepower motor 3d models from every product page" style="padding-left:6px" width="205" height="107" border="0" />
    </div> */?>

	<!-- blockquote -->
	<? /*
	<?php query_posts('post_type=testimonial&orderby=rand&posts_per_page=1'); ?>
	<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
		<div class="blockquote">
			<?php remove_filter('the_content', 'wpautop'); the_content(''); ?> 
		</div>			
	<?php endwhile; ?>
	<?php endif; wp_reset_query(); ?>
	*/ ?>
</div>