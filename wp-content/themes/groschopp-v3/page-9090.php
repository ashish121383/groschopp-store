<?php get_header() ?>

	<div class="row">
		<div class="col-sm-12 col-md-9 pull-right content">

			<div class="search-section search-products">
				<h2>Products:</h2>
				<div id="results-list" class="table-responsive">

                </div>
			</div>

            <?php $blogs = new WP_Query(array('post_type' => 'post', 's' => $_GET['s'])); ?>
            <?php if($blogs->have_posts()): ?>
			<div class="search-section search-articles">
				<h2>Blogs & Articles:</h2>
                <?php while($blogs->have_posts()): $blogs->the_post() ?>
                <article>
					<strong><a href="<?php the_permalink() ?>"><?php the_title() ?></a></strong><br>
					<p><?php groschopp_posted_on(); ?><br>
					<?php the_excerpt() ?></p>
				</article>
                <?php endwhile ?>
			</div>
            <?php endif; ?>

            <?php $products = new WP_Query(array('post_type' => 'product', 's' => $_GET['s'])); ?>
            <?php if($products->have_posts()): ?>
            <div class="search-section search-products">
                <h2>Products:</h2>
                <div class="results-grid">
                    <?php while($products->have_posts()): $products->the_post() ?>
                    <a class="search-result product" href="">
                        <div>
	                        <?php
	                        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'product_photo' );
	                        $url = $thumb['0'];
	                        ?>
                            <img class="visible-xs alignright" src="<?php echo $url ?>" alt="<?php echo get_the_title() ?>">
                            <?php the_title() ?>
                        </div>
                    </a>
                    <?php endwhile ?>
                </div>
            </div>
            <?php endif; ?>

            <?php $videos = new WP_Query(array('post_type' => 'video', 's' => $_GET['s'])) ?>
            <?php if($videos->have_posts()): ?>
            <div class="search-section search-videos">
                <h2>Videos:</h2>
                <div class="results-grid">
                    <?php while($videos->have_posts()): $videos->the_post() ?>
                    <a class="search-result video" href="">
                        <div>
	                        <?php
	                        if(has_post_thumbnail()):
		                        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'youtube-thumb' );
		                        $url = $thumb['0'];
                            ?>
                            <img src="<?php echo $url; ?>" alt="">
	                        <?php endif ?>
                            <?php the_title() ?>
                        </div>
                    </a>
                    <?php endwhile; ?>
                </div>
            </div>
            <?php endif; ?>

			<?php $whitepapers = new WP_Query(array('post_type' => 'whitepaper', 's' => $_GET['s'])) ?>
			<?php if($whitepapers->have_posts()): ?>
                <div class="search-section search-articles">
                    <h2>Whitepapers:</h2>
					<?php while($whitepapers->have_posts()): $whitepapers->the_post() ?>
                        <article>
                            <strong><a href="<?php the_permalink() ?>"><?php the_title() ?></a></strong><br>
                            <p><?php the_excerpt() ?></p>
                        </article>
					<?php endwhile ?>
                </div>
			<?php endif; ?>

			<?php $case_studies = new WP_Query(array('post_type' => 'case_study', 's' => $_GET['s'])) ?>
			<?php if($case_studies->have_posts()): ?>
                <div class="search-section search-articles">
                    <h2>Case Studies:</h2>
					<?php while($case_studies->have_posts()): $case_studies->the_post() ?>
                        <article>
                            <strong><a href="<?php the_permalink() ?>"><?php the_title() ?></a></strong><br>
                            <p><?php the_excerpt() ?></p>
                        </article>
					<?php endwhile ?>
                </div>
			<?php endif; ?>
		</div>
		
		<?php get_sidebar() ?>
	</div>

<?php get_footer() ?>