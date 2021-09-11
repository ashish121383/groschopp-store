<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?> >
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, user-scalable=1" />
	<? /*<title><?php wp_title(' | ', true, 'right'); ?><?php bloginfo('name'); ?></title> */ ?>
	<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.ico" /> 
	<title><?php wp_title(''); ?></title>
	<link media="all" rel="stylesheet" href="<?php bloginfo('template_url'); ?>/all.css" type="text/css" />
	<link media="all" rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/style.css" />
	<link media="all" rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/js/fancybox/fancybox.css" />
	<link media="all" rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/single.css" />
	<!--[if lt IE 8]><link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/ie.css" /><![endif]-->
	<?php wp_head(); ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/cufon.js" type="text/javascript"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/jquery.main.js" type="text/javascript"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/swfobject.js" type="text/javascript"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/jquery.colorbox.js" type="text/javascript"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/plupload.full.min.js" type="text/javascript"></script>
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

	<script src="//assets.adobedtm.com/c876840ac68fc41c08a580a3fb1869c51ca83380/satelliteLib-e25a7a2809960ff41d3a500aed3092762647bdc6.js"></script>
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
						<?php wp_nav_menu( array('theme_location' => 'secondary', 'menu' => 'Top', 'menu_id' => '', 'menu_class' => 'topnav', 'container' => '', 'depth' => 1 )); ?>
					</div>
				</div>
				
				<div class="panel">
					<div class="panel-holder">
						<!-- main navigaton -->
						<?php wp_nav_menu( array('theme_location' => 'primary', 'menu' => 'Main', 'menu_id' => 'nav', 'menu_class' => '', 'depth' => 2, 'container' => '', 'walker' => new Walker_Navigation_Menus )); ?>
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
						<?php $sq = get_search_query() ? get_search_query() : 'Product # / Keyword'; ?>
						<form method="get" class="search" id="searchform" action="<?php bloginfo('url') ?>" >
							<fieldset>
							<label for="search"> Search:</label>
								<span class="text"><input class="txt" id="search" name="s" value="<?php echo $sq; ?>" onfocus="if(this.defaultValue==this.value) {this.value = '';}" onblur="if (this.value == '') {this.value = this.defaultValue;}" /></span>
								<input type="image" src="<?php bloginfo('template_url'); ?>/images/btn-go.gif" value="Search" class="btn-search" alt="go" />
							</fieldset>
						</form>

						<?php $cat=get_the_category() ?>

						<?php if(is_singular('product')): ?>
						<h1>Products</h1>
						<?php elseif(is_post_type_archive('case_study') OR is_tax('case_study_category') OR is_singular('case_study')): ?>
						<h1>Case Study</h1>
						<?php elseif(is_post_type_archive('whitepaper') OR is_singular('whitepaper')): ?>
						<h1>Whitepapers &amp; Videos</h1>
						<?php elseif(is_post_type_archive('article') OR is_singular('article')): ?>
						<h1>News &amp; Events</h1>						
						<?php elseif(is_page(2451) OR is_singular('post') OR in_category('blog')): ?>
						<h1>Blog</h1>
						<?php else: ?>
						<h1><?php echo $page->post_title ?></h1>
						<?php endif ?>
					</div>
				</div>
			<?php endif; ?>