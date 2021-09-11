<?php if(has_children(get_the_ID(), 'control')): ?>
	<div class="row product-detail">
		<div id="ac-controls" class="col-md-9 pull-right">
			<h1><?php the_title() ?></h1>

			<ul class="control-list control-list-bldc list-unstyled">
				<?php $controls = new WP_Query(array('post_type' => 'control', 'posts_per_page' => -1, 'post_parent' => get_the_ID())); ?>
				<?php while($controls->have_posts()): $controls->the_post(); ?>
					<?php if(get_field('field_585b815d23e96', get_the_ID()) == "BLDC"): ?>
						<li class="control-list-item">
							<a href="<?php the_permalink() ?>">
								<h2 class="control-list-item-heading"><?php the_title() ?></h2>
								<div class="control-list-content row">
									<div>
										<img class="control-list-image" src="<?php echo get_field('field_585b42c5151fc', get_the_ID()) ?>" alt="" width="127" />
									</div>
									<div>
										<table class="control-spec-table control-spec-table-bldc">
											<colgroup>
												<col width="66" />
												<col width="65" />
												<col width="77" />
												<col width="40" />
												<col width="40" />
												<col width="55" />
												<col width="47" />
												<col width="47" />
												<col width="50" />
											</colgroup>
											<thead>
											<tr class="control-spec-table-heading-row">
												<th></th>
												<th scope="col" colspan="4">
													Power
												</th>
												<th scope="col" colspan="4">
													Speed Control
												</th>
											</tr>
											<tr class="control-spec-table-subheading-row">
												<th scope="col" rowspan="2">Enclosure Type</th>
												<th scope="col" rowspan="2">Supply Voltage (V)</th>
												<th scope="col" rowspan="2">Motor Voltage (V)</th>
												<th scope="col" colspan="2">Current (A)</th>
												<th scope="col" rowspan="2">Closed loop</th>
												<th scope="col" rowspan="2">Speed pot.</th>
												<th scope="col" rowspan="2">DC Signal</th>
												<th scope="col" rowspan="2">Digital Control</th>
											</tr>
											<tr>
												<th scope="col" class="control-spec-table-adjacent-col">Cont.</th>
												<th scope="col">Peak</th>
											</tr>
											</thead>
											<tbody>
											<tr>
												<td><?php echo get_field('field_585b433232863', get_the_ID()) ?></td>
												<td><?php echo get_field('field_585b4377fea9c', get_the_ID()) ?></td>
												<td><?php echo get_field('field_585b43a548a3a', get_the_ID()) ?></td>
												<td class="control-spec-table-adjacent-col"><?php echo get_field('field_585b43d223a65', get_the_ID()) ?></td>
												<td><?php echo get_field('field_585b4b7d5d245', get_the_ID()) ?></td>
												<td><?php echo get_field('field_585b43f5dd318', get_the_ID()) ?></td>
												<td><?php echo get_field('field_585b441771a9a', get_the_ID()) ?></td>
												<td><?php echo get_field('field_585b452b93be2', get_the_ID()) ?></td>
												<td><?php echo get_field('field_585b4631b4ac9', get_the_ID()) ?></td>
											</tr>

											</tbody>
										</table>
									</div>
								</div>
							</a>
						</li>
					<?php else: ?>
						<li class="control-list-item">
							<a href="<?php the_permalink() ?>">
								<h2 class="control-list-item-heading"><?php the_title() ?></h2>
								<div class="control-list-content row">
									<div>
										<img class="control-list-image" src="<?php echo get_field('field_585b42c5151fc', get_the_ID()) ?>" alt="" width="127" />
									</div>
									<div>
										<table class="control-spec-table" style="table-layout: unset !important;">
											<colgroup>
												<col width="86">
												<col width="51">
												<col width="80">
												<col width="105">
												<col width="66">
												<col width="106">
												<col width="71">
												<col width="77">
											</colgroup>
											<thead>
											<tr class="control-spec-table-heading-row">
												<th scope="col" colspan="4">
													AC Line Input
												</th>
												<th scope="col" colspan="5">
													Drive Output
												</th>
												<th scope="col">
													&nbsp;
												</th>
											</tr>
											<tr class="control-spec-table-subheading-row">
												<th scope="col" rowspan="2">Voltage (V) 50/60 Hz</th>
												<th scope="col" rowspan="2">PHASE (O)</th>
												<th scope="col" rowspan="2">Maximum Current (A)</th>
												<th scope="col" rowspan="2">Fuse or circuit breaker rating (A)</th>
												<th scope="col" rowspan="2">Voltage range (V)</th>
												<th scope="col" rowspan="2" style="width: 7%;">PHASE (O)</th>
												<th scope="col" rowspan="2">Max. cont. load current (RMS A/0)</th>
												<th scope="col" colspan="2">Max. power</th>
												<th scope="col" rowspan="2">Enclosure Type</th>
											</tr>
											<tr>
												<th scope="col" class="control-spec-table-adjacent-col">HP</th>
												<th scope="col">KW</th>
											</tr>
											</thead>
											<tbody>
											<tr>
												<td><?php echo get_field('field_585b8366a1258', get_the_ID()) ?></td>
												<td rowspan="2"><?php echo get_field('field_585b839ba125a', get_the_ID()) ?></td>
												<td><?php echo get_field('field_585b83ada125b', get_the_ID()) ?></td>
												<td><?php echo get_field('field_585b83cda125d', get_the_ID()) ?></td>
												<td rowspan="2"><?php echo get_field('field_585b83faa125f', get_the_ID()) ?></td>
												<td rowspan="2"><?php echo get_field('field_585b839ba125z', get_the_ID()) ?></td>
												<td rowspan="2"><?php echo get_field('field_585b841ea1260', get_the_ID()) ?></td>
												<td rowspan="2" class="control-spec-table-adjacent-col"><?php echo get_field('field_585b843aa1261', get_the_ID()) ?></td>
												<td rowspan="2"><?php echo get_field('field_585b8448a1262', get_the_ID()) ?></td>
												<td rowspan="2"><?php echo get_field('field_585b433232863', get_the_ID()) ?></td>
											</tr>
											<tr>
												<td><?php echo get_field('field_585b837ca1259', get_the_ID()) ?></td>
												<td><?php echo get_field('field_585b83baa125c', get_the_ID()) ?></td>
												<td><?php echo get_field('field_585b83e4a125e', get_the_ID()) ?></td>
											</tr>
											</tbody>
										</table>
									</div>
								</div>
							</a>
						</li>
					<?php endif; ?>
				<?php endwhile; ?>
			</ul>
		</div>

		<?php get_sidebar() ?>
	</div>
<?php else: ?>
	<div class="row product-detail">
		<div id="ac-controls" class="col-md-9 pull-right">
			<div class="row">
				<div class="col-md-12">
					<?php if($post->post_parent): ?>
						<h1 class="gearbox-heading"><?php echo get_field('field_5877aad7ac042', $post->post_parent) ?>: <?php the_title() ?></h1>
					<?php else: ?>
						<h1 class="gearbox-heading"><?php the_title() ?></h1>
					<?php endif; ?>
					<?php the_content() ?>
				</div>
			</div>

			<div class="row">
				<div class="col-md-4">
					<ul class="list-unstyled alternate-product-spec-list">
						<?php while( have_rows('field_585c08a34d617') ): the_row(); ?>
							<li><?php echo get_sub_field('field_585c08b24d618') ?></li>
						<?php endwhile ?>
					</ul>

					<?php /* <a href="<?php bloginfo('template_url'); ?>/quote-add.php?control=<?php echo get_the_title() ?>" class="btn btn-primary btn-alternate btn-block btn-lg quote-add">Add To Quote</a> */ ?>
				</div>

				<div class="col-md-8 alternate-product-image-wrapper">
					<img class="pull-right" src="<?php echo get_field('field_585b42c5151fc', get_the_ID()) ?>" alt="" width="254" />
				</div>
			</div>

			<div class="row">
				<div class="col-md-4">
					<a href="<?php echo get_field('field_5862ca5cadc6c', get_the_ID()) ?>" class="btn btn-primary btn-thin btn-pdf btn-alternate-product">Download Specs</a>
				</div>

				<div class="col-md-4">
					<a href="<?php echo get_field('field_5862ca6fadc6d', get_the_ID()) ?>" class="btn btn-primary btn-thin btn-pdf btn-alternate-product">Download Manual</a>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<?php if(get_field('field_585b815d23e96', get_the_ID()) == "BLDC"): ?>
						<table class="control-spec-table control-spec-table-bldc control-spec-table-alternate">
							<colgroup>
								<col width="66" />
								<col width="65" />
								<col width="77" />
								<col width="40" />
								<col width="40" />
								<col width="55" />
								<col width="47" />
								<col width="47" />
								<col width="50" />
							</colgroup>
							<thead>
							<tr class="control-spec-table-heading-row">
								<th></th>
								<th scope="col" colspan="4">
									Power
								</th>
								<th scope="col" colspan="4">
									Speed Control
								</th>
							</tr>
							<tr class="control-spec-table-subheading-row">
								<th scope="col" rowspan="2">Enclosure Type</th>
								<th scope="col" rowspan="2">Supply Voltage (V)</th>
								<th scope="col" rowspan="2">Motor Voltage (V)</th>
								<th scope="col" colspan="2">Current (A)</th>
								<th scope="col" rowspan="2">Closed loop</th>
								<th scope="col" rowspan="2">Speed pot.</th>
								<th scope="col" rowspan="2">DC Signal</th>
								<th scope="col" rowspan="2">Digital Control</th>
							</tr>
							<tr>
								<th scope="col" class="control-spec-table-adjacent-col">Cont.</th>
								<th scope="col">Peak</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td><?php echo get_field('field_585b433232863', get_the_ID()) ?></td>
								<td><?php echo get_field('field_585b4377fea9c', get_the_ID()) ?></td>
								<td><?php echo get_field('field_585b43a548a3a', get_the_ID()) ?></td>
								<td class="control-spec-table-adjacent-col"><?php echo get_field('field_585b43d223a65', get_the_ID()) ?></td>
								<td><?php echo get_field('field_585b4b7d5d245', get_the_ID()) ?></td>
								<td><?php echo get_field('field_585b43f5dd318', get_the_ID()) ?></td>
								<td><?php echo get_field('field_585b441771a9a', get_the_ID()) ?></td>
								<td><?php echo get_field('field_585b452b93be2', get_the_ID()) ?></td>
								<td><?php echo get_field('field_585b4631b4ac9', get_the_ID()) ?></td>
							</tr>

							</tbody>
						</table>
					<?php else: ?>
						<table class="control-spec-table control-spec-table-alternate">
							<colgroup>
								<col width="86">
								<col width="51">
								<col width="80">
								<col width="105">
								<col width="66">
								<col width="106">
								<col width="71">
								<col width="77">
							</colgroup>
							<thead>
							<tr class="control-spec-table-heading-row">
								<th scope="col" colspan="4">
									AC Line Input
								</th>
								<th scope="col" colspan="5">
									Drive Output
								</th>
								<th scope="col">
									&nbsp;
								</th>
							</tr>
							<tr class="control-spec-table-subheading-row">
								<th scope="col" rowspan="2">Voltage (V) 50/60 Hz</th>
								<th scope="col" rowspan="2">PHASE (O)</th>
								<th scope="col" rowspan="2">Maximum Current (A)</th>
								<th scope="col" rowspan="2">Fuse or circuit breaker rating (A)</th>
								<th scope="col" rowspan="2">Voltage range (V)</th>
								<th scope="col" rowspan="2">PHASE (O)</th>
								<th scope="col" rowspan="2">Max. cont. load current (RMS A/0)</th>
								<th scope="col" colspan="2">Max. power</th>
								<th scope="col" rowspan="2">Enclosure Type</th>
							</tr>
							<tr>
								<th scope="col" class="control-spec-table-adjacent-col">HP</th>
								<th scope="col">KW</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td><?php echo get_field('field_585b8366a1258', get_the_ID()) ?></td>
								<td rowspan="2"><?php echo get_field('field_585b839ba125a', get_the_ID()) ?></td>
								<td><?php echo get_field('field_585b83ada125b', get_the_ID()) ?></td>
								<td><?php echo get_field('field_585b83cda125d', get_the_ID()) ?></td>
								<td rowspan="2"><?php echo get_field('field_585b83faa125f', get_the_ID()) ?></td>
								<td rowspan="2"><?php echo get_field('field_585b839ba125z', get_the_ID()) ?></td>
								<td rowspan="2"><?php echo get_field('field_585b841ea1260', get_the_ID()) ?></td>
								<td rowspan="2" class="control-spec-table-adjacent-col"><?php echo get_field('field_585b843aa1261', get_the_ID()) ?></td>
								<td rowspan="2"><?php echo get_field('field_585b8448a1262', get_the_ID()) ?></td>
								<td rowspan="2"><?php echo get_field('field_585b433232863', get_the_ID()) ?></td>
							</tr>
							<tr>
								<td><?php echo get_field('field_585b837ca1259', get_the_ID()) ?></td>
								<td><?php echo get_field('field_585b83baa125c', get_the_ID()) ?></td>
								<td><?php echo get_field('field_585b83e4a125e', get_the_ID()) ?></td>
							</tr>
							</tbody>
						</table>
					<?php endif; ?>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12 alternate-product-schematic">
					<?php echo get_field('field_58641620e4a55', get_the_ID()); ?>
				</div>
			</div>

			<?php if(have_rows('field_58898b01f9017')): ?>
				<div class="row">
					<div class="col-md-12 alternate-product-features">
						<table>
							<?php while( have_rows('field_58898b01f9017') ): the_row(); ?>
								<tr>
									<td><?php echo get_sub_field('field_58898b1ef9018') ?></td>
									<td><?php echo get_sub_field('field_58898b32f9019') ?></td>
									<td><?php echo get_sub_field('field_58898b3df901a') ?></td>
								</tr>
							<?php endwhile ?>
						</table>
					</div>
				</div>
			<?php endif; ?>
		</div>

		<?php get_sidebar() ?>
	</div>
<?php endif; ?>