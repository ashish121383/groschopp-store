<?php get_header(); ?>

<div class="row">

	<?php if(is_page('products')): ?>
		<?php get_template_part( 'template-parts/content', 'products' ); ?>
	<?php elseif(is_page('jobs-careers-form')): ?>
		<?php get_template_part( 'template-parts/content', 'careers' ); ?>
	<?php elseif(is_page('motor-search-tool')): ?>
		<?php get_template_part( 'template-parts/content', 'motor-search' ); ?>
	<?php elseif(is_page('motor-search-tool-dc')): ?>
		<?php get_template_part( 'template-parts/content', 'motor-search-dc' ); ?>
    <?php elseif(is_page(16790)): ?>
		<?php get_template_part( 'single-parts/single', 'control' ); ?>
    <?php elseif(is_page(16787)): ?>
		<?php get_template_part( 'single-parts/single', 'gearbox' ); ?>
	<?php elseif(is_page('gearbox-reducers')): ?>
		<?php get_template_part( 'template-parts/content', 'gearbox' ); ?>
	<?php elseif(is_page('motor-control')): ?>
		<?php get_template_part( 'template-parts/content', 'controls' ); ?>
	<?php elseif(is_page('quote')): ?>
		<?php get_template_part( 'template-parts/content', 'quote' ); ?>
	<?php elseif(is_page('customize')): ?>
		<?php get_template_part( 'template-parts/content', 'customize' ); ?>
	<?php elseif(is_page('videos')): ?>
		<?php get_template_part( 'template-parts/content', 'video' ); ?>
	<?php elseif(is_page('news-events')): ?>
		<?php get_template_part( 'template-parts/content', 'news' ); ?>
	<?php elseif(is_page('whitepapers')): ?>
		<?php get_template_part( 'template-parts/content', 'whitepapers' ); ?>
	<?php elseif(is_page('case-studies')): ?>
		<?php get_template_part( 'template-parts/content', 'case_study' ); ?>
	<?php elseif($post->post_parent == 4873): ?>
		<?php get_template_part( 'template-parts/content', 'products-sub' ); ?>
	<?php elseif(is_page('contact-groschopp')): ?>
		<?php get_template_part( 'template-parts/content', 'contact' ); ?>
	<?php elseif(is_page(6628)): ?>
		<?php get_template_part( 'template-parts/content', 'spec' ); ?>
	<?php else: ?>
		<?php get_template_part( 'template-parts/content', 'page' ); ?>
	<?php endif; ?>

	<?php if(!is_page('customize')): ?>
		<?php get_sidebar(); ?>
	<?php endif ?>

</div>

<?php get_footer(); ?>
