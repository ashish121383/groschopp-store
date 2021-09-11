<div id="products" class="col-sm-12 col-md-9 pull-right">
	<h1><?php the_title() ?></h1>
  
  <?php while(have_posts()): the_post() ?>
  <?php //the_content() ?>
  <?php endwhile ?>
  
  <div class="controls">
  	<h2>AC Controls</h2>
  	<a href="">
  		<img src="<?php bloginfo('template_url') ?>/images/ac-controls.png" alt="AC Controls">
  	</a>
  	<p>Groschopp's AC motor controls include 1/10, 1/5, and 1 HP options. Groschopp's AC controls range from 2.4 to 4 amps continuous and includes chassis, IP20,IP50, and IP65 enclosure options for your AC motor or gear motor.</p>
  </div>
  
  <div class="controls">
  	<h2>BLDC Controls</h2>
  	<a href="">
  		<img src="<?php bloginfo('template_url') ?>/images/bldc-controls.png" alt="BLDC Controls">
  	</a>
  	<p>Groschopp's brushless DC motor controls range from 3.1 amps to 20 amps continuous. Groschopphas high volt, low volt/low current, low volt/high current and low volt control options for your BLDC motor or gear motor. Groschopp also has 120 VAC, 10-54 VDC and 128-48 VDC options.</p>
  </div>
  
</div>

<?php get_sidebar() ?>