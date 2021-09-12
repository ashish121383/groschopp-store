<div class="row product-detail">
	<div class="col-md-9 pull-right">
		<div class="row">
			<div class="col-md-12">
				<h1><?php the_title() ?></h1>
				<?php the_content() ?>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4">
				<?php /*
				<ul class="list-unstyled alternate-product-spec-list">
					<li>Low voltage / high current</li>
					<li>20 Amps continuous</li>
					<li>10-54 VDC</li>
					<li>7.00” x 3.62” x 2.11”</li>
				</ul>
				*/ ?>

				<?php /* <a href="<?php bloginfo('template_url'); ?>/quote-add.php?accessory=<?php echo get_the_title() ?>" class="btn btn-primary btn-alternate btn-block btn-lg quote-add">Add To Quote</a> */ ?>
			</div>

			<div class="col-md-8 alternate-product-image-wrapper">
				<img class="pull-right" src="<?php echo get_field('field_5854dbeadeac4', get_the_ID()) ?>" alt="" width="254" />
			</div>
		</div>

		<div class="row">
			<div class="col-md-12 alternate-product-features">
				<table>
					<?php while( have_rows('field_5854dc21deac5') ): the_row(); ?>
						<tr>
							<td><?php echo get_sub_field('field_5854dc35deac6') ?></td>
							<td><?php echo get_sub_field('field_5854dc4bdeac7') ?></td>
							<td><?php echo get_sub_field('field_5854dc57deac8') ?></td>
						</tr>
					<?php endwhile ?>
				</table>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12 alternate-product-schematic">
				<?php echo get_field('field_5854edaf1a525', get_the_ID()); ?>
			</div>
		</div>
	</div>

	<?php get_sidebar(); ?>
</div>