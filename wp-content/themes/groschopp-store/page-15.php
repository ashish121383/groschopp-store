<?php /* Template Name: Resources */ ?>
<?php get_header(); ?>

	<div class="row resources">

		<div class="col-sm-8">
			<h1><?php the_title() ?></h1>
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<div class="row">
						<div class="col-xs-6">
							<a class="resource" href="<?php echo get_permalink(1080) ?>">
								<div>
									<span>STP</span>
									<span>Calculator</span>
								</div>
							</a>
						</div>

						<div class="col-xs-6">
							<a class="resource alt" href="<?php echo get_permalink(1110) ?>">
								<div>
									<span>Compare</span>
									<span>Motor</span>
									<span>Types</span>
								</div>
							</a>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6">
					<div class="row">
						<div class="col-xs-6">
							<a class="resource sm-alt" href="<?php echo get_permalink(6628) ?>">
								<div>
									<span>Upload</span>
									<span>Specs</span>
								</div>
							</a>
						</div>

						<div class="col-xs-6">
							<a class="resource alt sm-reg" href="<?php echo get_permalink(8038) ?>">
								<div>
									<span>Download</span>
									<span>Literature</span>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<div class="row">
						<div class="col-xs-6">
							<a class="resource alt sm-reg" href="<?php echo get_permalink(8040) ?>">
								<div>
									<span>Wiring</span>
									<span>Diagrams</span>
								</div>
							</a>
						</div>

						<div class="col-xs-6">
							<a class="resource sm-alt" href="<?php echo get_permalink(307) ?>">
								<div>
									<span>How to</span>
									<span>Determine</span>
									<span>Motor</span>
									<span>Specs</span>
								</div>
							</a>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6">
					<div class="row">
						<div class="col-xs-6">
							<a class="resource alt" href="<?php echo get_permalink(8042) ?>">
								<div>
									<span>Equations &</span>
									<span>Conversions</span>
								</div>
							</a>
						</div>

						<div class="col-xs-6">
							<a class="resource" href="<?php echo get_permalink(1074) ?>">
								<div>
									<span>Reading</span>
									<span>Motortec&trade;</span>
									<span>Data</span>
									<span>Sheets</span>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<div class="row">
						<div class="col-xs-6">
							<a class="resource" href="<?php echo get_permalink(1055) ?>">
								<div>
									<span>Using the</span>
									<span>Motor</span>
									<span>Search</span>
									<span>Tool</span>
								</div>
							</a>
						</div>

						<div class="col-xs-6">
							<a class="resource alt" href="<?php echo get_permalink(8044) ?>">
								<div>
									<span>How to</span>
									<span>Customize</span>
									<span>a Motor</span>
								</div>
							</a>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6">
					<div class="row">
						<div class="col-xs-6">
							<a class="resource sm-alt" href="<?php echo get_permalink(8046) ?>">
								<div>
									<span>Trouble</span>
									<span>Shooting</span>
									<span>Guide</span>
								</div>
							</a>
						</div>

						<div class="col-xs-6">
							<a class="resource alt sm-reg" href="<?php echo get_permalink(6454) ?>">
								<div>
									<span>FAQS</span>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<aside class="col-sm-4">
			<img class="alignright" class="hidden-xs hidden-sm" src="<?php bloginfo('template_url') ?>/images/resources-guy.png" alt="">
			<h2>Still have questions?</h2>
			<?php while(have_posts()): the_post() ?>
				<?php the_content() ?>
			<?php endwhile ?>
		</aside>

	</div>

<?php get_footer(); ?>