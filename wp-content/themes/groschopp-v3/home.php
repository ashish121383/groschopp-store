<?php get_header(); ?>

		<div class="row blog-landing">
		
			<div class="col-sm-8">
				<h1>On The Blog</h1>
				<div class="row">
					<div class="col-xs-12 col-sm-6">
    				<div class="row">
							<div class="col-xs-6">
								<a class="blog-landing-item" href="<?php echo get_category_link(83) ?>">
									<div>
										<span>DC</span>
										<span>Motors &amp;</span>
										<span>Gearmotors</span>
									</div>
								</a>
							</div>
							
							<div class="col-xs-6">
								<a class="blog-landing-item alt" href="<?php echo get_category_link(82) ?>">
									<div>
										<span>AC</span>
										<span>Motors &amp;</span>
										<span>Gearmotors</span>
									</div>
								</a>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6">
    				<div class="row">
							<div class="col-xs-6">
								<a class="blog-landing-item sm-alt" href="<?php echo get_category_link(84) ?>">
									<div>
										<span>BLDC</span>
										<span>Motors &amp;</span>
										<span>Gearmotors</span>
									</div>
								</a>
							</div>
							
							<div class="col-xs-6">
								<a class="blog-landing-item alt sm-reg" href="<?php echo get_category_link(85) ?>">
									<div>
										<span>Universal</span>
										<span>Motors</span>
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
								<a class="blog-landing-item alt sm-reg" href="<?php echo get_category_link(622) ?>">
									<div>
										<span>Motor</span>
										<span>Speed</span>
										<span>Controls</span>
									</div>
								</a>
							</div>
							
							<div class="col-xs-6">
								<a class="blog-landing-item sm-alt" href="<?php echo get_category_link(86) ?>">
									<div>
										<span>Gearboxes</span>
										<span>Reducers</span>
									</div>
								</a>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6">
    				<div class="row">
							<!-- Added inline style hacks to properly align text. JS script mangles this text block -->
							<div class="col-xs-6">
								<a class="blog-landing-item alt" href="<?php echo get_category_link(63) ?>">
									<div style="padding-top: 20px">
										<span style="margin-left: -15px; line-height: 0.5em">&nbsp;How</span>
										<span>To</span>
									</div>
								</a>
							</div>
							
							<div class="col-xs-6">
								<a class="blog-landing-item" href="<?php echo get_category_link(88) ?>">
									<div>
										<span>How It</span>
										<span>Works</span>
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
								<a class="blog-landing-item" href="<?php echo get_category_link(87) ?>">
									<div>
										<span>Motor &amp;</span>
										<span>Gearmotor</span>
										<span>Selection</span>
									</div>
								</a>
							</div>
							
							<div class="col-xs-6">
								<a class="blog-landing-item alt" href="<?php echo get_category_link(89) ?>">
									<div>
										<span>Temperature,</span>
										<span>Efficiency &amp;</span>
										<span>IP Ratings</span>
									</div>
								</a>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6">
    				<div class="row">
							<div class="col-xs-6">
								<a class="blog-landing-item sm-alt" href="<?php echo get_category_link(81) ?>">
									<div>
										<span>Groschopp</span>
									</div>
								</a>
							</div>
							
							<div class="col-xs-6">
								<a class="blog-landing-item alt sm-reg" href="<?php echo get_category_link(14) ?>">
									<div>
										<span>All</span>
										<span>Blogs</span>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<aside class="col-sm-4 blog-landing-aside">
				<?php $blogs = new WP_Query(array('posts_per_page' => 3)); ?>
				<?php if($blogs->have_posts()): ?>
				<?php while($blogs->have_posts()): $blogs->the_post(); ?>
				<div>
					<h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
					<p class="blog-landing-date"><?php the_date('F j, Y') ?></p>
					<?php the_excerpt() ?>
				</div>
				<?php endwhile; wp_reset_query(); ?>
				<?php endif; ?>
			</aside>

		</div>

<?php get_footer(); ?>
