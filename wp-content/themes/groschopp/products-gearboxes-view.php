		
	<?php query_posts('cat='.GearboxesSpeedReducers.'&posts_per_page=1&p='.$_GET['t']); ?>
	<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); $more=0; ?>
	
	<ul>
		<?php if($_GET['t'] == 6): ?>
		<li><a href="?t=947">Parallel</a></li>
		<li><a href="?t=949">Shaft Planetary</a></li>
		<li><a href="?t=953">Right Angle</a></li>
		<li><a href="?t=951">Planetary Right Angle</a></li>
		<?php endif; ?>
	</ul>
	
	<?php the_content() ?>
	
	<?php endwhile; endif; wp_reset_query(); ?>