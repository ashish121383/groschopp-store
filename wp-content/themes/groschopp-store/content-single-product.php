<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

$terms = get_the_terms( $post->ID, 'product_cat' );

do_action( 'woocommerce_before_single_product' ); ?>

	<div class="row">

		<div class="product-detail-aside col-sm-5 pull-right">
			<section class="product-specs">
				<header class="product-detail-header hidden">
					<h2>Product Specs</h2>
				</header>
				<div class="product-detail-main">
					<div class="row">
						<dl class="col-md-6 product-specs-list">
							<dt>Model </dt><dd>#<?php echo get_field('model') ?></dd>
							<dt>Voltage- </dt><dd><?php echo get_field('voltage') ?></dd>
							<dt>Phase- </dt><dd><?php echo get_field('phase') ?></dd>
						</dl>
						<dl class="col-md-6 product-specs-list">
							<dt>Speed (rpm)- </dt><dd><?php echo get_field('speed') ?></dd>
							<dt>Torque (in-lbs)- </dt><dd><?php echo get_field('torque') ?></dd>
							<dt>Power (hp)- </dt><dd><?php echo round(get_field('power'), 2) ?></dd>
						</dl>
					</div>
					<!-- Temp disable cart Aug 2021
					<div class="cart-detail">
						<?php // do_action( 'woocommerce_single_product_summary' ); ?>
					</div>
					-->
					<div class="product-specs-actions">
						<a href="<?php echo get_permalink(16718).'?id='.get_the_ID() ?>" class="btn btn-primary btn-alternate btn-bold inset-shadow">Get a quote for high volume</a>
					</div>
					<div class="files">
						<?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/other/3DCad_STEP/'.get_field('cadfile').'.zip')): ?>
						<a class="step" href="<?php get_bloginfo('url') ?>/data/other/3DCad_STEP/<?php echo get_field('cadfile') ?>.zip">3D CAD Step File</a>
						<?php endif; ?>
						<?php if(strlen(get_the_title()) == 4): ?>
                        <?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/other/Performance/0'.get_the_title().'.pdf')): ?>
                        <a class="pdf" href="<?php get_bloginfo('url') ?>/data/other/Performance/0<?php echo get_the_title() ?>.pdf" target="_blank">Performance Curve PDF</a>
                        <?php endif; ?>
						<?php else: ?>
                        <?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/other/Performance/'.get_the_title().'.pdf')): ?>
                        <a class="pdf" href="<?php get_bloginfo('url') ?>/data/other/Performance/<?php echo get_the_title() ?>.pdf" target="_blank">Performance Curve PDF</a>
                        <?php endif; ?>
						<?php endif; ?>
						<?php $lowercase = false; ?>
						<?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/other/Cad_Pdf/'.get_field('cadfile').'.pdf')): ?>
                        <a class="pdf" href="<?php get_bloginfo('url') ?>/data/other/Cad_Pdf/<?php echo get_field('cadfile') ?>.pdf" target="_blank">2D Outline Drawing</a>
                        <?php $nofiles = false; ?>
                        <?php $lowercase = true; ?>
						<?php endif; ?>
						<?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/other/Cad_Pdf/'.get_field('cadfile').'.PDF') && $lowercase == false): ?>
                        <a class="pdf" href="<?php get_bloginfo('url') ?>/data/other/Cad_Pdf/<?php echo get_field('cadfile') ?>.PDF" target="_blank">2D Outline Drawing</a>
                        <?php $nofiles = false; ?>
						<?php endif; ?>
					</div>
				</div>
				<footer class="product-detail-footer">
					<p class="clock-icon">Ask if your motor can ship within 48 hours</p>
				</footer>
			</section>
			
			<?php /*
			<section class="product-related-items">
				<header class="product-detail-header">
					<h2>Related Items</h2>
				</header>

				<div class="product-detail-main row">

				</div>
			</section>
			*/ ?>
		</div>

		<?php wp_reset_query(); ?>

		<div class="col-sm-7">

            <?php $parent = get_field('parent_product', 'term_' . $terms[0]->term_id); ?>

			<?php if($terms[0]->parent == 0): ?>
                <h1><?php echo $terms[0]->name ?> <?php the_title() ?></h1>
			<?php else: ?>
                <?php $temp = get_term($terms[0]->parent, 'product_cat'); ?>
                <h1><?php echo $temp->name ?> <?php the_title() ?></h1>
			<?php endif; ?>

			<?php do_action( 'woocommerce_before_single_product_summary' ); ?>

            <?php /*
			<div class="row product-detail-image-actions">
				<?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/other/3DCad_STEP/'.get_field('cadfile').'.zip')): ?>
					<div class="col-md-4">
						<a class="btn btn-primary" href="<?php get_bloginfo('url') ?>/data/other/3DCad_STEP/<?php echo get_field('cadfile') ?>.zip">3DCad Step File</a>
					</div>
				<?php endif; ?>

				<?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/other/Performance/0'.$product->ordering_number.'.pdf') || file_exists($_SERVER['DOCUMENT_ROOT'].'/data/other/Performance/'.$product->ordering_number.'.pdf')): ?>
					<div class="col-md-4">
						<?php if(strlen($product->ordering_number) == 4): ?>
							<?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/other/Performance/0'.$product->ordering_number.'.pdf')): ?>
								<a class="btn btn-primary pdf-icon-button" href="<?php get_bloginfo('url') ?>/data/other/Performance/0<?php echo $product->ordering_number ?>.pdf" target="_blank">Performance Curve</a>
							<?php endif; ?>
						<?php else: ?>
							<?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/other/Performance/'.$product->ordering_number.'.pdf')): ?>
								<a class="btn btn-primary pdf-icon-button" href="<?php get_bloginfo('url') ?>/data/other/Performance/<?php echo $product->ordering_number ?>.pdf" target="_blank">Performance Curve</a>
							<?php endif; ?>
						<?php endif; ?>
					</div>
				<?php endif; ?>

				<div class="col-md-4">
					<?php $lowercase = false; ?>
					<?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/other/Cad_Pdf/'.get_field('cadfile').'.pdf')): ?>
						<a class="btn btn-primary pdf-icon-button" href="<?php get_bloginfo('url') ?>/data/other/Cad_Pdf/<?php echo get_field('cadfile') ?>.pdf" target="_blank">2D Outline Drawing</a>
						<?php $nofiles = false; ?>
                        <?php $lowercase = true; ?>
					<?php endif; ?>
					<?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/other/Cad_Pdf/'.get_field('cadfile').'.PDF') && $lowercase == false): ?>
						<a class="btn btn-primary pdf-icon-button" href="<?php get_bloginfo('url') ?>/data/other/Cad_Pdf/<?php echo get_field('cadfile') ?>.PDF" target="_blank">2D Outline Drawing</a>
						<?php $nofiles = false; ?>
					<?php endif; ?>
				</div>
			</div>
            */ ?>
			
			<?php /* <a class="btn btn-primary btn-alternate-2 btn-lg btn-bold inset-shadow" href="<?php echo get_permalink(get_page_by_title('Motor Customization')->ID).'?id='.get_the_ID() ?>">Add Modifications</a> */ ?>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12 product-detail-tabs">
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active">
					<a class="inset-shadow" href="#related-items" aria-controls="product-features" role="tab" data-toggle="tab">Related Items</a>
					<span class="bottom-triangle"></span>
				</li>
				<li role="presentation">
					<a class="inset-shadow" href="#product-features" aria-controls="product-features" role="tab" data-toggle="tab">Features</a>
					<span class="bottom-triangle"></span>
				</li>
				<li role="presentation">
					<a class="inset-shadow" href="#product-add-ons" aria-controls="product-add-ons" role="tab" data-toggle="tab">Add Ons</a>
					<span class="bottom-triangle"></span>
				</li>
				<li role="presentation">
					<a class="inset-shadow" href="#product-downloads" aria-controls="product-downloads" role="tab" data-toggle="tab">Downloads</a>
					<span class="bottom-triangle"></span>
				</li>
			</ul>

			<div class="tab-content">
				<div role="tabpanel" id="related-items" class="tab-pane active">
					<?php $related_items = get_related_items(get_the_ID()); ?>
					<?php foreach($related_items as $k => $related_item): ?>
						<?php $item = new WP_Query(array('post_type' => array('accessory', 'gearbox', 'control'), 'p' => $related_item)); ?>
						<?php while($item->have_posts()): $item->the_post(); ?>
                            <div class="related-item">
	                            <?php if(get_post_type() == 'control'): ?>
                                <a href="<?php the_permalink() ?>"><img src="<?php echo get_field('field_585b42c5151fc', get_the_ID()) ?>" alt="" width="135" /></a>
	                            <?php else: ?>
                                <a href="<?php the_permalink() ?>"><img src="<?php echo get_field('field_5854dbeadeac4', get_the_ID()) ?>" alt="" /></a>
	                            <?php endif; ?>
                                <span><?php echo get_the_title() ?></span>
                            </div>
						<?php endwhile ?>
					<?php endforeach ?>
				</div>
				<div role="tabpanel" id="product-features" class="tab-pane">
					<h3 class="show-print">Features</h3>
					<div class="multi-column-text-3">
                        <?php if($terms[0]->parent != 0): ?>
						<?php echo get_field('product_features', 'term_' . $parent->term_id) ?>
                        <?php else: ?>
                        <?php echo get_field('product_features', 'term_' . $terms[0]->term_id) ?>
                        <?php endif; ?>
					</div>
				</div>
				<div role="tabpanel" id="product-add-ons" class="tab-pane">
					<h3 class="show-print">Add Ons</h3>
					<div class="multi-column-text-3">
						<?php if($terms[0]->parent != 0): ?>
							<?php echo get_field('product_add_ons', 'term_' . $parent->term_id) ?>
						<?php else: ?>
							<?php echo get_field('product_add_ons', 'term_' . $terms[0]->term_id) ?>
						<?php endif; ?>
					</div>
				</div>
				<div role="tabpanel" id="product-downloads" class="tab-pane">
					<h3 class="show-print">Downloads</h3>
					<div class="multi-column-text-3">
                        <?php wp_reset_query(); ?>
						<ul class="list-unstyled">
							<?php $nofiles = true; ?>
							<?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/other/Cad_Pdf/'.get_field('cadfile').'.pdf')): ?>
								<li><a href="<?php get_bloginfo('url') ?>/data/other/Cad_Pdf/<?php echo get_field('cadfile') ?>.pdf" target="_blank">2D Outline Drawing</a></li>
								<?php $nofiles = false; ?>
							<?php endif; ?>
							<?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/other/Cad_Pdf/'.get_field('cadfile').'.PDF')): ?>
								<li><a href="<?php get_bloginfo('url') ?>/data/other/Cad_Pdf/<?php echo get_field('cadfile') ?>.PDF" target="_blank">2D Outline Drawing</a></li>
								<?php $nofiles = false; ?>
							<?php endif; ?>

							<?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/other/3DCad_IGES/'.get_field('cadfile').'.zip')): ?>
								<li><a href="<?php get_bloginfo('url') ?>/data/other/3DCad_IGES/<?php echo get_field('cadfile') ?>.zip">3DCad_IGES</a></li>
								<?php $nofiles = false; ?>
							<?php endif; ?>
							<?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/other/3DCad_STEP/'.get_field('cadfile').'.zip')): ?>
								<li><a href="<?php get_bloginfo('url') ?>/data/other/3DCad_STEP/<?php echo get_field('cadfile') ?>.zip">3DCad_STEP</a></li>
								<?php $nofiles = false; ?>
							<?php endif; ?>
							<?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/other/Cad_Dwg/'.get_field('cadfile').'.zip')): ?>
								<li><a href="<?php get_bloginfo('url') ?>/data/other/Cad_Dwg/<?php echo get_field('cadfile') ?>.zip">Cad_Dwg</a></li>
								<?php $nofiles = false; ?>
							<?php endif; ?>
							<?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/other/Cad_Dxf/'.get_field('cadfile').'.zip')): ?>
								<li><a href="<?php get_bloginfo('url') ?>/data/other/Cad_Dxf/<?php echo get_field('cadfile') ?>.zip">Cad_Dxf</a></li>
								<?php $nofiles = false; ?>
							<?php endif; ?>

							<?php if(in_array(get_field('type'), array(1,6,11,12,18))): ?>
								<li><a href="<?php get_bloginfo('url') ?>/data/other/AC-Motor-Connection-Diagram.pdf" target="_blank">Wiring Diagram</a></li>
							<?php endif; ?>

							<?php if(in_array(get_field('type'), array(2,3,7,8,14,16))): ?>
								<li><a href="<?php get_bloginfo('url') ?>/data/other/DC-Motor-Connection-Diagram.pdf" target="_blank">Wiring Diagram</a></li>
							<?php endif; ?>

							<?php if(strlen(get_the_title()) == 4): ?>
								<?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/other/Performance/0'.get_the_title().'.pdf')): ?>
                                    <li><a class="pdf" href="<?php get_bloginfo('url') ?>/data/other/Performance/0<?php echo get_the_title() ?>.pdf" target="_blank">Performance Curve PDF</a></li>
								<?php endif; ?>
							<?php else: ?>
								<?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/other/Performance/'.get_the_title().'.pdf')): ?>
                                    <li><a class="pdf" href="<?php get_bloginfo('url') ?>/data/other/Performance/<?php echo get_the_title() ?>.pdf" target="_blank">Performance Curve PDF</a></li>
								<?php endif; ?>
							<?php endif; ?>

							<?php if($nofiles == true): ?>
								<li>Not applicable to this application</li>
							<?php endif; ?>
						</ul>
					</div>
				</div>
				<div role="tabpanel" id="product-videos" class="tab-pane">
					<h3 class="show-print">Videos</h3>
					<div class="row">
						<div class="col-md-3">
							<a class="thumbnail" href="#">
								<img src="<?php echo get_template_directory_uri() ?>/images/mock/mock_video_thumb_1.png" alt="" width="175" height="109" />
								<p>Tech Tips: AC Motor Basics</p>
							</a>
						</div>
						<div class="col-md-3">
							<a class="thumbnail" href="#">
								<img src="<?php echo get_template_directory_uri() ?>/images/mock/mock_video_thumb_2.png" alt="" width="175" height="109" />
								<p>Tech Tips: How to Select a Gearmotor</p>
							</a>
						</div>
					</div>
				</div>
				<div role="tabpanel" id="product-related-items" class="tab-pane">
					<h3 class="show-print">Related Items</h3>
					<div class="row">
						<div class="col-md-3">
							<a class="thumbnail" href="#">
								<img src="<?php echo get_template_directory_uri() ?>/images/mock/mock_related_item_thumb.png" alt="" width="171" height="117" />
								<p class="related-item-description">Controls - short description about controls to go here. short description about controls to go here. short description.</p>
								<p class="related-item-view-more">View More</p>
							</a>
						</div>
						<div class="col-md-3">
							<a class="thumbnail" href="#">
								<img src="<?php echo get_template_directory_uri() ?>/images/mock/mock_related_item_thumb.png" alt="" width="171" height="117" />
								<p class="related-item-description">Controls - short description about controls to go here. short description about controls to go here. short description.</p>
								<p class="related-item-view-more">View More</p>
							</a>
						</div>
						<div class="col-md-3">
							<a class="thumbnail" href="#">
								<img src="<?php echo get_template_directory_uri() ?>/images/mock/mock_related_item_thumb.png" alt="" width="171" height="117" />
								<p class="related-item-description">Controls - short description about controls to go here. short description about controls to go here. short description.</p>
								<p class="related-item-view-more">View More</p>
							</a>
						</div>
						<div class="col-md-3">
							<a class="thumbnail" href="#">
								<img src="<?php echo get_template_directory_uri() ?>/images/mock/mock_related_item_thumb.png" alt="" width="171" height="117" />
								<p class="related-item-description">Controls - short description about controls to go here. short description about controls to go here. short description.</p>
								<p class="related-item-view-more">View More</p>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php do_action( 'woocommerce_after_single_product_summary' ); ?>
	</div>

	<?php do_action( 'woocommerce_after_single_product' ); ?>
