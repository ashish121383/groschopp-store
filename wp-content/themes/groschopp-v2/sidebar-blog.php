<div id="sidebar">
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

    <?php if (!is_page(606)) : ?>
	<div class="adv-box">   
		<a href="/gear-motor-match/"><img src="<?php bloginfo('template_url'); ?>/images/gear-motor-match-gray.png" alt="Groschopp's Gear Motor Match" width="205" border="0" /></a>
	</div>
	<div class="adv-box">
		<a href="/contact/"><img src="<?php bloginfo('template_url'); ?>/images/here4you.png" alt="Contact Groschopp" width="205" border="0" /></a>
	</div>
    <?php endif ?>
</div>