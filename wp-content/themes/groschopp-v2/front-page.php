<?php get_header(); ?>

<!-- promo -->
<div class="promo">
	<div class="holder">
		<div class="frame">
			<!-- slides -->
			<?php query_posts('post_type=Slide&posts_per_page=-1'); ?>
			<?php if (have_posts()) : global $wp_query; $post_count=$wp_query->post_count; ?>
				<ul class="slides">
					<?php while (have_posts()) : the_post(); ?>
					
					<?php /* CHANGED TO .center-oriented AND .right-oriented, LEFT ADDS NO CLASS */ ?>

						<?php if(get_post_meta($post->ID, 'text_orientation', true) === "none"): ?>
						<li>
							<a href="<?php echo get_post_meta($post->ID, 'button_link', true) ?>">
							<?php the_post_thumbnail( 'slide-post-thumbnail' ); ?>
							</a>
						</li>
						<?php else: ?>
						<li class="<?php echo get_post_meta($post->ID, 'text_orientation', true) ?>">
							<?php the_post_thumbnail( 'slide-post-thumbnail' ); ?>
							<div class="text-holder">
								<?php remove_filter('the_content', 'wpautop'); the_content(''); ?> 

								<div class="row"><a href="<?php echo get_post_meta($post->ID, 'button_link', true) ?>"><span><?php echo get_post_meta($post->ID, 'button_text', true) ?></span><em></em></a></div>
							</div>
						</li>
						<?php endif; ?>
					<?php endwhile; ?>
				</ul>
				<!-- switcher -->
				<div class="switcher">
					<div class="switcher-holder">
						<a href="#" class="prev">prev</a>
						<ul>
							<?php for($i=0; $i<$post_count; $i++) : ?>
								<li <?php if($i==0) : ?>class="active"<?php endif; ?>><a href="#"><?php echo $i; ?></a></li>
							<?php endfor; ?>
						</ul>
						<a href="#" class="next">next</a>
					</div>
					<div class="switcher-r"></div>
				</div>
			<?php endif; wp_reset_query(); ?>
		</div>
	</div>
</div>
<!-- main -->
<div id="main">
	<!-- heading-box -->
	<div class="heading-box">
		<div class="options-bar">
			<?php $sq = get_search_query() ? get_search_query() : 'Product # / Keyword'; ?>
			<form method="get" class="search" id="searchform" action="<?php echo get_category_link(Products) ?>" >
				<fieldset>
				<label for="search"> Search:</label>
					<span class="text"><input class="txt" id="search" name="s" value="<?php echo $sq; ?>" onfocus="if(this.defaultValue==this.value) {this.value = '';}" onblur="if (this.value == '') {this.value = this.defaultValue;}" /></span>
					<input type="image" src="<?php bloginfo('template_url'); ?>/images/btn-go.gif" value="Search" class="btn-search" alt="go" />
				</fieldset>
			</form>
		</div>
		<h2>Our Products</h2>
	</div>
	<!-- threecolumns -->
	<div class="threecolumns">
	
		<?php $motors = pods('product', 4815) ?>
		<div class="column">
			<a href="<?php echo get_permalink(4815); ?>">
				<?php echo pods_image ($motors->field('product_photo'), 'product-post-thumbnail') ?>
				<strong class="title">Motors</strong>
			</a>
			<p><?php echo $motors->field('product_details_excerpt') ?></p>
			<ul class="menu">
				<li><a href="<?php echo get_permalink(606) ?>">Motor Search</a></li>
				<li><a href="<?php echo get_permalink(4815); ?>">Browse All Motors</a></li>
			</ul>
		</div>
		
		<?php $gearmotors = pods('product', 4852) ?>
		<div class="column">
			<a href="<?php echo get_permalink(4852) ?>">
				<?php echo pods_image ($gearmotors->field('product_photo'), 'product-post-thumbnail') ?>
				<strong class="title">Gearmotors</strong>
			</a>
			<p><?php echo $gearmotors->field('product_details_excerpt') ?></p>
			<ul class="menu">
				<li><a href="<?php echo get_permalink(606) ?>">Motor Search</a></li>
				<li><a href="<?php echo get_permalink(4852) ?>">Browse All Gearmotors</a></li>
			</ul>
		</div>

		<?php $gearboxes = pods('product', 4853) ?>
		<div class="column">
			<a href="<?php echo get_permalink(4853); ?>">
				<?php echo pods_image ($gearboxes->field('product_photo'), 'product-post-thumbnail') ?>
				<strong class="title">Gearboxes &amp; Speed Reducers</strong>
			</a>
			<p><?php echo $gearboxes->field('product_details_excerpt') ?></p>
			<ul class="menu">
				<li><a href="<?php echo get_permalink(4853); ?>">Browse Gearboxes &amp; Speed Reducers</a></li>
			</ul>
		</div>
		
	</div>
	<!-- twocolumns -->
	<div class="twocolumns">
	
			<div class="column">
				
				<div class="heading-box">
					<h2>Featured Video</h2>
				</div>
				<?php $video = pods('video', array('limit' => 1, 'where' => "featured.meta_value = 1", 'orderby' => 'RAND()')); ?>
				<?php while($video->fetch()): ?>
				<iframe width="450" height="253" src="<?php echo get_meta('_links_to', $video->field('ID')) ?>?rel=0" frameborder="0" allowfullscreen></iframe>
				<?php endwhile ?>
				<a href="<?php echo get_permalink(5639) ?>">View Additional Videos</a>  
			
			</div>
		
		<?php query_posts('cat='.Blog.'&posts_per_page=2'); ?>
		<?php if (have_posts()) : ?>
			<div class="column">
				<div class="heading-box">
					<h2>Recent Posts</h2>
				</div>
				<ul class="posts-list">
					<?php while (have_posts()) : the_post(); $more=0; ?>
					<li>
						<em class="date"><?php the_time('M'); ?><span><?php the_time('d'); ?></span></em>
						<div class="text">
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<?php the_excerpt() ?>
						</div>
					</li>
					<?php endwhile; ?>
				</ul>
			</div>
		<?php endif; wp_reset_query(); ?>
		
	</div>
</div>

<?php get_footer(); ?>