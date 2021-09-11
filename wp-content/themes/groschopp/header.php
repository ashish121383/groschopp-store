<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?> >
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" />

	<meta name="viewport" content="width=device-width, user-scalable=1" />
	<? /*<title><?php wp_title(' | ', true, 'right'); ?><?php bloginfo('name'); ?></title> */ ?>
	<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.ico" /> 
	<title><?php wp_title(''); ?></title>
	<link media="all" rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/all.css" />
	<link media="all" rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/style.css" />
	<link media="all" rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/js/fancybox/fancybox.css" />
	<?php if(is_page(5141) OR is_page(5151)): ?>
	<link media="all" rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/single.css" />
	<?php endif; ?>
	<!--[if lt IE 8]><link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/ie.css" /><![endif]-->
	<!--[if gte IE 9]>
	  <style type="text/css">
	    .gradient {
	       filter: none;
	    }
	  </style>
	<![endif]-->
	
	<!--[if lt IE 9]>

  <script type="text/javascript">
    document.createElement('header');
    document.createElement('nav');
    document.createElement('aside');
    document.createElement('article');
    document.createElement('section');
    document.createElement('footer');
  </script>

  <![endif]-->
	<?php wp_head(); ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/cufon.js" type="text/javascript"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/jquery.main.js" type="text/javascript"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/swfobject.js" type="text/javascript"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/jquery.colorbox.js" type="text/javascript"></script>
	<script type="text/javascript">//<![CDATA[
	var mobi = ['opera', 'iemobile', 'webos', 'android', 'blackberry', 'ipad', 'safari'];
	var midp = ['blackberry', 'symbian'];
	var ua = navigator.userAgent.toLowerCase();
	if ((ua.indexOf('midp') != -1) || (ua.indexOf('mobi') != -1) || ((ua.indexOf('ppc') != -1) && (ua.indexOf('mac') == -1)) || (ua.indexOf('webos') != -1)) {
		document.write('<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/allmobile.css" type="text/css" media="all"/>');
		if (ua.indexOf('midp') != -1) {
			for (var i = 0; i < midp.length; i++) {
				if (ua.indexOf(midp[i]) != -1) {
					document.write('<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/' + midp[i] + '.css" type="text/css"/>');
				}
			}
		}
		else {
			if ((ua.indexOf('mobi') != -1) || (ua.indexOf('ppc') != -1) || (ua.indexOf('webos') != -1)) {
				for (var i = 0; i < mobi.length; i++) {
					if (ua.indexOf(mobi[i]) != -1) {
						if ((mobi[i].indexOf('blackberry') != -1) && (ua.indexOf('6.0') != -1)) {
							document.write('<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/' + mobi[i] + '6.0.css" type="text/css"/>');
						}
						else {
							document.write('<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/' + mobi[i] + '.css" type="text/css"/>');
						}
						break;
					}
				}
			}
		}
	}
	if ((navigator.userAgent.indexOf('iPhone') != -1) || (navigator.userAgent.indexOf('iPad') != -1)) {
	document.write('<meta name="viewport" content="width=device-width" />');
	}
	//]]>
	</script>
</head>
<body>
<!-- wrapper -->
<div id="wrapper"<?php if(!is_front_page())echo ' class="inner"'; ?>>
	<div id="container">
		<div class="container-holder">
			<!-- header -->
			
			
			
			<div id="header">
				<div class="bar">
					<div class="bar-holder">
						<!--
						<div class="sm-share-container">
							<a id="share-btn" onclick="Test1();"></a>
						</div>
						-->
						
						<!-- top navigaton -->
						<?php wp_nav_menu( array('menu' => 'Top', 'menu_id' => '', 'menu_class' => 'topnav', 'container' => '', 'depth' => 1 )); ?>
					</div>
				</div>
				
				<div class="panel">
					<div class="panel-holder">
						<!-- main navigaton -->
						<?php wp_nav_menu( array('menu' => 'Main', 'menu_id' => 'nav', 'menu_class' => '', 'depth' => 2, 'container' => '', 'walker' => new Walker_Navigation_Menus )); ?>
						<h1 class="logo"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
					</div>
				</div>
			</div>
			
			<?php
			
				if($post->post_parent) { 
					$page_id = $post->post_parent;
				} else {
					$page_id = $post->ID;
				}
			
				$page = get_page($page_id);
			
			?>
			
			<!-- page-heading -->
			<?php if(!is_front_page()) : ?>
				<div class="page-heading">
					<div class="holder">
						<!-- search -->
						<?php get_search_form(); ?>
						<?php if(is_category() || is_single()): $cat=get_the_category(); ?>
							<?php if($cat[0]->cat_ID==Products || $cat[0]->category_parent==Products): ?>
								<h1>Products</h1>
							<?php elseif($cat[0]->cat_ID==LitMedia || $cat[0]->category_parent==LitMedia): ?>
								<h1>Whitepapers &amp; Videos</h1>
							<?php elseif($cat[0]->cat_ID==Applications || $cat[0]->category_parent==Applications): ?>
								<h1>Case Studies</h1>
							<?php elseif($cat[0]->cat_ID==TechRes || $cat[0]->category_parent==TechRes): ?>
								<h1>Technical Resources</h1>
							<?php endif; ?>
						<?php elseif(is_page(17)): ?>
							<h1>Quote Cart</h1>
						<?php else: ?>
							<h1><?php echo $page->post_title ?></h1>
						<?php endif; ?>
					</div>
				</div>
			<?php endif; ?>