<div class="col-sm-12 col-md-9 pull-right content">
    
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <header class="entry-header">
            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        </header>

        <div class="entry-content">
            <?php the_content(); ?>
        </div>

    </article>

</div>