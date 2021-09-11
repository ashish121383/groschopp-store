<?php $orderby = (isset($_GET['orderby']))? $_GET['orderby'] : "voltage" ; ?>
<?php $products = get_products_by_model($_GET['s'], $orderby) ?>

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

<div id="main">
  <!-- content -->
  <div id="content">
    
    <?php if(strlen($_GET['s']) == 4 OR strlen($_GET['s']) == 5): ?>
    <?php if($products): ?>
    <ul class="menu">
      <li>Results <?php echo count($products) ?> | For search term "<?php echo $_GET['s'] ?>"</li>

      <?php if(get_the_ID() == ACMotors): ?>
      <li><strong class="option">Voltage Options</strong></li>
      <li><a href="?t=<?php the_ID() ?>&voltage=115">115V</a></li>
      <li><a href="?t=<?php the_ID() ?>&voltage=230">230V</a></li>
      <?php endif; ?>

      <?php if(get_the_ID() == BrushlessDCMotors): ?>
      <li><strong class="option">Voltage Options</strong></li>
      <li><a href="?t=<?php the_ID() ?>&voltage=163">163V</a></li>
      <?php endif; ?>

      <?php if(get_the_ID() == DCMotors): ?>
      <li><strong class="option">Voltage Options</strong></li>
      <li><a href="?t=<?php the_ID() ?>&voltage=12">12V</a></li>
      <li><a href="?t=<?php the_ID() ?>&voltage=24">24V</a></li>
      <li><a href="?t=<?php the_ID() ?>&voltage=90">90V</a></li>
      <li><a href="?t=<?php the_ID() ?>&voltage=115">115FWR</a></li>
      <li><a href="?t=<?php the_ID() ?>&voltage=130">130V</a></li>
      <li><a href="?t=<?php the_ID() ?>&voltage=180">180V</a></li>
      <?php endif; ?>
    </ul>
    <div id="result-list">
      <table>
        <thead>
          <tr>
            <th><a href="?t=<?php the_ID() ?>&orderby=voltage">Voltage</a></th>
            <th><a href="?t=<?php the_ID() ?>&orderby=ordering_number">Product #</a></th>
            <th><a href="?t=<?php the_ID() ?>&orderby=model">Model #</a></th>
            <th><a href="?t=<?php the_ID() ?>&orderby=output_speed">Speed (RPM)</a></th>
            <th><a href="?t=<?php the_ID() ?>&orderby=torqk">Torque (ib-in)</a></th>
            <th><a href="?t=<?php the_ID() ?>&orderby=system_hp">Motor Power (HP)</a></th>
            <th><a href="?t=<?php the_ID() ?>&orderby=phase">Phases</a></th>
            <th>&nbsp;</th>
            <th></th>
          <tr>
        </thead>
        <tbody>
      <?php $alt = false; ?>
      <?php foreach($products as $product): ?>
      <?php $args = array('where' => 'd.groschopp_database_id = '.$product->type_id, 'limit' => 1); $product_url = pods('product_id', $args); ?>
      <?php $alt = ($alt)? "alt" : "" ; ?>
          <tr>
            <td class="<?php echo $alt ?>"><?php echo $product->voltage ?></td>
            <td class="<?php echo $alt ?>"><a href="<?php echo $product_url->field('search_slug') ?>?id=<?php echo $product->id ?>"><?php echo $product->ordering_number ?></a></td>
            <td class="<?php echo $alt ?>"><?php echo $product->model ?></td>
            <td class="<?php echo $alt ?>"><?php echo $product->output_speed ?></td>
            <td class="<?php echo $alt ?>"><?php echo $product->torqk ?></td>
            <td class="<?php echo $alt ?>"><?php echo $product->system_hp ?></td>
            <td class="<?php echo $alt ?>"><?php echo $product->phase ?></td>
            <td class="<?php echo $alt ?>"><a class="fancybox" href="<?php bloginfo('template_url'); ?>/quote-add.php?id=<?php echo $product->id ?>">Add to Quote</a></td>
          </tr>
      <?php $alt = !$alt ?>
      <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <?php else: ?>
    <h2 class="center">No results found. Try a different search?</h2>
    <?php endif; ?>
    <?php else: ?>
      
    <?php query_posts($query_string . '&showposts=20'); ?>
    <?php if (have_posts()) : ?>
      <h1 class="pagetitle">Search Results</h1>
      <ul class="posts">
      <?php while (have_posts()) : the_post(); ?>
        <li>
          <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
          <?php the_excerpt(); ?>
        </li>           
      <?php endwhile; wp_reset_query(); ?>
      </ul>
      <div class="navigation">
        <div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
        <div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
      </div>
    <?php else : ?>
      <h2 class="center">No results found. Try a different search?</h2>
    <?php endif; ?>
      
    <?php endif; ?>
  
  </div>
  <!-- sidebar -->
  <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>