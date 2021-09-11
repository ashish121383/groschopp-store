<?php $orderby = (isset($_GET['orderby']))? $_GET['orderby'] : "voltage" ; ?>
<?php $products = get_products_by_model($_GET['s'], $orderby) ?>

<?php

	if(count($products) == 1): 
		foreach($products as $product):
			if($product->type_id == 1):
			$url = "/category/products/motors/?t=213&id=".$product->id;
			endif;
			
			if($product->type_id == 2):
			$url = "/category/products/motors/?t=215&id=".$product->id;
			endif;
			
			if($product->type_id == 23):
			$url = "/category/products/gearmotors/?t=230&id=".$product->id;
			endif;
			
			if($product->type_id == 18):
			$url = "/category/products/gearmotors/?t=947&id=".$product->id;
			endif;
			
			if($product->type_id == 8):
			$url = "/category/products/gearmotors/?t=1163&id=".$product->id;
			endif;
			
			if($product->type_id == 12):
			$url = "/category/products/gearmotors/?t=953&id=".$product->id;
			endif;
			
			if($product->type_id == 11):
			$url = "/category/products/gearmotors/?t=951&id=".$product->id;
			endif;
			
			if($product->type_id == 7):
			$url = "/category/products/gearmotors/?t=1166&id=".$product->id;
			endif;
			
			if($product->type_id == 14):
			$url = "/category/products/gearmotors/?t=1168&id=".$product->id;
			endif;
			
			if($product->type_id == 6):
			$url = "/category/products/gearmotors/?t=949&id=".$product->id;
			endif;
			
			if($product->type_id == 3):
			$url = "/category/products/gearmotors/?t=1170&id=".$product->id;
			endif;

			if($product->type_id == 23):
			$url = "/category/products/gearmotors/?t=3726&id=".$product->id;
			endif;

			if($product->type_id == 24):
			$url = "/category/products/gearmotors/?t=3729&id=".$product->id;
			endif;

			if($product->type_id == 25):
			$url = "/category/products/gearmotors/?t=3726&id=".$product->id;
			endif;

			if($product->type_id == 26):
			$url = "/category/products/gearmotors/?t=3732&id=".$product->id;
			endif;	

			if($product->type_id == 27):
			$url = "/category/products/gearmotors/?t=3735&id=".$product->id;
			endif;	
		endforeach;
		
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
			<?php $alt = ($alt)? "alt" : "" ; ?>
					<tr>
						<td class="<?php echo $alt ?>"><?php echo $product->voltage ?></td>
						<?php if($product->type_id == 1): ?>
						<td class="<?php echo $alt ?>"><a href="/category/products/motors/?t=213&id=<?php echo $product->id ?>"><?php echo $product->ordering_number ?></a></td>
						<?php endif; ?>
						<?php if($product->type_id == 2): ?>
						<td class="<?php echo $alt ?>"><a href="/category/products/gearmotors/?t=215&id=<?php echo $product->id ?>"><?php echo $product->ordering_number ?></a></td>
						<?php endif; ?>
						<?php if($product->type_id == 23): ?>
						<td class="<?php echo $alt ?>"><a href="/category/products/gearmotors/?t=230&id=<?php echo $product->id ?>"><?php echo $product->ordering_number ?></a></td>
						<?php endif; ?>
						<?php if($product->type_id == 18): ?>
						<td class="<?php echo $alt ?>"><a href="/category/products/gearmotors/?t=947&id=<?php echo $product->id ?>"><?php echo $product->ordering_number ?></a></td>
						<?php endif; ?>
						<?php if($product->type_id == 8): ?>
						<td class="<?php echo $alt ?>"><a href="/category/products/gearmotors/?t=1163&id=<?php echo $product->id ?>"><?php echo $product->ordering_number ?></a></td>
						<?php endif; ?>
						<?php if($product->type_id == 12): ?>
						<td class="<?php echo $alt ?>"><a href="/category/products/gearmotors/?t=953&id=<?php echo $product->id ?>"><?php echo $product->ordering_number ?></a></td>
						<?php endif; ?>
						<?php if($product->type_id == 11): ?>
						<td class="<?php echo $alt ?>"><a href="/category/products/gearmotors/?t=951&id=<?php echo $product->id ?>"><?php echo $product->ordering_number ?></a></td>
						<?php endif; ?>
						<?php if($product->type_id == 7): ?>
						<td class="<?php echo $alt ?>"><a href="/category/products/gearmotors/?t=1166&id=<?php echo $product->id ?>"><?php echo $product->ordering_number ?></a></td>
						<?php endif; ?>
						<?php if($product->type_id == 14): ?>
						<td class="<?php echo $alt ?>"><a href="/category/products/gearmotors/?t=1168&id=<?php echo $product->id ?>"><?php echo $product->ordering_number ?></a></td>
						<?php endif; ?>
						<?php if($product->type_id == 6): ?>
						<td class="<?php echo $alt ?>"><a href="/category/products/gearmotors/?t=949&id=<?php echo $product->id ?>"><?php echo $product->ordering_number ?></a></td>
						<?php endif; ?>
						<?php if($product->type_id == 3): ?>
						<td class="<?php echo $alt ?>"><a href="/category/products/gearmotors/?t=1170&id=<?php echo $product->id ?>"><?php echo $product->ordering_number ?></a></td>
						<?php endif; ?>
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
