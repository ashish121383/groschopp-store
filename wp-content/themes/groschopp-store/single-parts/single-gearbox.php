<?php if(has_children(get_the_ID(), 'gearbox')): ?>
	<div class="row product-detail">
		<div class="col-md-9 pull-right">
			<div>
				<h1 class="gearbox-heading"><?php the_title() ?></h1>
			</div>

			<div>
				<ul class="gearbox-list unstyled">
					<?php $gearbox = new WP_Query(array('post_type' => 'gearbox', 'posts_per_page' => -1, 'post_parent' => get_the_ID())); ?>
					<?php while($gearbox->have_posts()): $gearbox->the_post(); ?>
						<li class="gearbox-list-item row">
							<a href="<?php the_permalink() ?>">
								<div class="gearbox-framesize col-md-3">
									<span class="vertical-text">frame size</span>
									<span class="gearbox-framesize-value"><?php the_title() ?></span>
								</div>
								<div class="gearbox-description col-md-7">
									<?php echo get_field('field_5862dcc7aee07') ?>
								</div>
								<div class="gearbox-image col-md-2">
									<img src="<?php echo get_field('field_585afd6706ce3', get_the_ID()) ?>" width="82" height="91" alt="" />
								</div>
							</a>
						</li>
					<?php endwhile; ?>
				</ul>
			</div>
		</div>

		<?php get_sidebar() ?>
	</div>
<?php else: ?>
	<div class="row product-detail">
		<div class="col-md-9 pull-right">
			<div class="row">
				<div class="col-md-12">
					<?php if($post->post_parent): ?>
						<h1 class="gearbox-heading"><?php echo get_the_title($post->post_parent) ?>: <?php the_title() ?></h1>
					<?php else: ?>
						<h1 class="gearbox-heading"><?php the_title() ?></h1>
					<?php endif; ?>

					<?php the_content() ?>
				</div>
			</div>

			<div class="row">
				<div class="col-md-4">
					<ul class="list-unstyled alternate-product-spec-list">
						<?php while( have_rows('field_585afe0eb37c4') ): the_row(); ?>
							<li><?php echo get_sub_field('field_585afe2fb37c5') ?></li>
						<?php endwhile ?>
					</ul>

					<?php /*<a href="<?php bloginfo('template_url'); ?>/quote-add.php?gearbox=<?php echo get_the_title() ?> Frame <?php echo get_the_title($post->post_parent) ?>" class="btn btn-primary btn-alternate btn-block btn-lg quote-add">Add To Quote</a> */ ?>
				</div>

				<div class="col-md-8 alternate-product-image-wrapper">
					<img class="pull-right" src="<?php echo get_field('field_585afd6706ce3', get_the_ID()) ?>" alt="" width="254" />
				</div>
			</div>

			<div class="row">
				<div class="col-md-4">
					<a href="<?php echo get_field('field_585af8416a25b', get_the_ID()) ?>" class="btn btn-primary btn-thin btn-pdf btn-alternate-product">Download Specs</a>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12 alternate-product-features">
					<table>
						<?php while( have_rows('field_585af9d03059f') ): the_row(); ?>
							<tr>
								<td><?php echo get_sub_field('field_585af9f3305a0') ?></td>
								<td><?php echo get_sub_field('field_585afa05305a1') ?></td>
								<td><?php echo get_sub_field('field_585afa12305a2') ?></td>
							</tr>
						<?php endwhile ?>
					</table>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12 alternate-product-schematic">
					<?php echo get_field('field_585afa906ab10', get_the_ID()); ?>
				</div>
			</div>
		</div>

		<?php get_sidebar() ?>
	</div>
<?php endif; ?>