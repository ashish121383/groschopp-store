<?php $orderby = (isset($_GET['orderby']))? $_GET['orderby'] : "voltage" ; ?>
<?php $products = get_products_by_model($_GET['s'], $orderby) ?>

<?php //echo "<pre>".print_r($products, true)."</pre>"; exit; ?>

<?php

global $wpdb;

$wpdb->query($wpdb->prepare("INSERT INTO search_log (id, term, created_at) VALUES(null, %s, NOW())", $_GET['s']));

if(count($products) == 1):

	$args = array('where' => 'd.groschopp_database_id = '.$products[0]->type_id, 'limit' => 1);

	$product_url = pods('product_id', $args);

	$url = $product_url->field('search_slug')."?id=".$products[0]->id;

	echo "<meta http-equiv='refresh' content='0;url=$url'>";
	exit;

endif;

?>

<?php get_header(); ?>

    <section id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

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

        </main><!-- #main -->
    </section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>