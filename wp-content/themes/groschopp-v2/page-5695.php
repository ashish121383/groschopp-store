<?php get_header(); ?>

<div id="main">
  <!-- content -->
  <div id="content">
  
    <div id="sm-icons">
      Share with a friend: <span class='st_facebook' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span><span class='st_twitter' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span><span class='st_email' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span><span class='st_sharethis' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span><span class='st_plusone' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span>
    </div>

    <?php query_posts(array('post_type' => 'whitepaper', 'posts_per_page' => 8)); ?>

    <?php if (have_posts()) : $i=1; ?>
  
      <?php while (have_posts()) : the_post(); ?>
          <?php if ($i>1) : ?>
        
        <div class="marked-box">
          <?php the_post_thumbnail( 'cs-wp-thumb', array('class'=>'alignleft') ); ?>
          <div class="text-holder">
            <h2><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
            <?php the_excerpt(); ?>
            <ul class="menu">
              <li><a href="<?php echo get_permalink(); ?>">Learn More</a></li>
            </ul>
          </div>
        </div>
        <?php endif;?>
                
      <?php $i++; endwhile; ?>
        
    <?php endif; ?>
    
    <?php wp_reset_query(); ?>   
  
  </div>
  <!-- sidebar -->
  <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>