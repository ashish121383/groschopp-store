<?php $orderby = (isset($_GET['orderby']))? $_GET['orderby'] : "voltage" ; ?>
<?php $products = get_products_by_model($_GET['s'], $orderby) ?>

<?php //echo "<pre>".print_r($products, true)."</pre>"; exit; ?>

<?php

global $wpdb;

$wpdb->query($wpdb->prepare("INSERT INTO search_log (id, term, created_at) VALUES(null, %s, NOW())", $_GET['s']));

if(count($products) == 1):

	$url = get_permalink(get_page_by_title($products[0]->ordering_number, 'OBJECT', 'product')->ID);
	echo "<meta http-equiv='refresh' content='0;url=$url'>";
	exit;

endif;

get_header(); ?>

    <div class="row">

        <div class="col-sm-12 col-md-9 pull-right content">
	    <?php if ( have_posts() ) : ?>

            <header class="entry-header">
                <h1 class="entry-title"><?php printf( esc_html__( 'Search Results for: %s', 'groschopp' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
            </header><!-- .page-header -->

		    <?php /* Start the Loop */ ?>
		    <?php while ( have_posts() ) : the_post(); ?>

			    <?php
			    /**
			     * Run the loop for the search to output the results.
			     * If you want to overload this in a child theme then include a file
			     * called content-search.php and that will be used instead.
			     */
			    get_template_part( 'template-parts/content', 'search' );
			    ?>

		    <?php endwhile; ?>

		    <?php the_posts_navigation(); ?>

	    <?php else : ?>

		    <?php get_template_part( 'template-parts/content', 'none' ); ?>

	    <?php endif; ?>
        </div>

        <?php get_sidebar(); ?>

    </div>

<?php get_footer(); ?>