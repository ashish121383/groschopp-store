<?php get_header(); ?>
<div id="main">
	<div id="content">

		<?php if(isset($_GET['id'])): ?>
		<?php $product = get_product($_GET['id']) ?>
		<?php $category = pods('product', get_the_ID()); ?>

		<?php if($_GET['added']): ?>
		<div class="success">Product added to quote cart</div>
		<?php endif ?>

		<div class="product-box">

			<div class="visual">

				<?php if($product->type_id == 1 && strpos($product->model, "FC") !== false): ?>
				<iframe src="<?php bloginfo('url') ?>/data/keyshot/AC8060FC/index.html" width="325" height="313"></iframe>	
				<?php endif ?>

				<?php if($product->type_id == 1 && strpos($product->model, "NV") !== false): ?>
				<iframe src="<?php bloginfo('url') ?>/data/keyshot/AC8060NV/index.html" width="325" height="313"></iframe>	
				<?php endif ?>

				<?php if($product->type_id == 2 && strpos($product->model, "PM601") !== false): ?>
				<iframe src="<?php bloginfo('url') ?>/data/keyshot/PM6013/index.html" width="325" height="313"></iframe>	
				<?php endif ?>

				<?php if($product->type_id == 2 && strpos($product->model, "PM801") !== false): ?>
				<iframe src="<?php bloginfo('url') ?>/data/keyshot/PM8018/index.html" width="325" height="313"></iframe>	
				<?php endif ?>

				<?php if($product->type_id == 2 && strpos($product->model, "PM10816") !== false): ?>
				<iframe src="<?php bloginfo('url') ?>/data/keyshot/PM10816/index.html" width="325" height="313"></iframe>	
				<?php endif ?>

				<?php if($product->type_id == 2 && strpos($product->model, "PM10818") !== false): ?>
				<iframe src="<?php bloginfo('url') ?>/data/keyshot/PM10818/index.html" width="325" height="313"></iframe>	
				<?php endif ?>

				<?php if($product->type_id == 3 && strpos($product->model, "RA26") !== false): ?>
				<iframe src="<?php bloginfo('url') ?>/data/keyshot/PM8018HV_RA2600T/index.html" width="325" height="313"></iframe>	
				<?php endif ?>

				<?php if($product->type_id == 3 && strpos($product->model, "RA30") !== false): ?>
				<iframe src="<?php bloginfo('url') ?>/data/keyshot/PM8018HV_RA3000T/index.html" width="325" height="313"></iframe>	
				<?php endif ?>		

				<?php if($product->type_id == 3 && strpos($product->model, "RA40") !== false): ?>
				<iframe src="<?php bloginfo('url') ?>/data/keyshot/PM8018HV_RA4000T/index.html" width="325" height="313"></iframe>	
				<?php endif ?>

				<?php if($product->type_id == 3 && strpos($product->model, "RA50") !== false): ?>
				<iframe src="<?php bloginfo('url') ?>/data/keyshot/PM8018HV_RA5000T/index.html" width="325" height="313"></iframe>	
				<?php endif ?>

				<?php if($product->type_id == 6 && strpos($product->model, "PL73") !== false && strpos($product->model, "FC") !== false): ?>
				<iframe src="<?php bloginfo('url') ?>/data/keyshot/AC9060FC-PL7300/index.html" width="325" height="313"></iframe>	
				<?php endif ?>

				<?php if($product->type_id == 6 && strpos($product->model, "PL73") !== false && strpos($product->model, "NV") !== false): ?>
				<iframe src="<?php bloginfo('url') ?>/data/keyshot/AC9060NV-PL7300/index.html" width="325" height="313"></iframe>	
				<?php endif ?>

				<?php if($product->type_id == 6 && strpos($product->model, "FC") !== false && substr($product->model, -1) === "i"): ?>
				<iframe src="<?php bloginfo('url') ?>/data/keyshot/AC8060FC-PL6200i/index.html" width="325" height="313"></iframe>	
				<?php endif ?>

				<?php if($product->type_id == 6 && strpos($product->model, "NV") !== false && substr($product->model, -1) === "i" ): ?>
				<iframe src="<?php bloginfo('url') ?>/data/keyshot/AC8060NV-PL6200i/index.html" width="325" height="313"></iframe>	
				<?php endif ?>

				<?php if($product->type_id == 7 && strpos($product->model, "PL73") !== false): ?>
				<iframe src="<?php bloginfo('url') ?>/data/keyshot/PM8018LV-PL7300/index.html" width="325" height="313"></iframe>	
				<?php endif ?>

				<?php if($product->type_id == 7 && strpos($product->model, "PL52") !== false): ?>
				<iframe src="<?php bloginfo('url') ?>/data/keyshot/PM8018HV-PL5200i/index.html" width="325" height="313"></iframe>	
				<?php endif ?>

				<?php if($product->type_id == 7 && strpos($product->model, "PL62") !== false): ?>
				<iframe src="<?php bloginfo('url') ?>/data/keyshot/PM8018HV-PL6200i/index.html" width="325" height="313"></iframe>	
				<?php endif ?>

				<?php if($product->type_id == 7 && strpos($product->model, "PL81") !== false): ?>
				<iframe src="<?php bloginfo('url') ?>/data/keyshot/PM8018LV-PL8100i/index.html" width="325" height="313"></iframe>	
				<?php endif ?>

				<?php if($product->type_id == 8 && strpos($product->model, "PS19") !== false): ?>
				<iframe src="<?php bloginfo('url') ?>/data/keyshot/PM8018HV-PS1900/index.html" width="325" height="313"></iframe>	
				<?php endif ?>

				<?php if($product->type_id == 8 && strpos($product->model, "PS21") !== false): ?>
				<iframe src="<?php bloginfo('url') ?>/data/keyshot/PM8018LV-PS2100/index.html" width="325" height="313"></iframe>	
				<?php endif ?>

				<?php if($product->type_id == 8 && strpos($product->model, "PS23") !== false): ?>
				<iframe src="<?php bloginfo('url') ?>/data/keyshot/PM8018LV-PS2300/index.html" width="325" height="313"></iframe>	
				<?php endif ?>

				<?php if($product->type_id == 11 && strpos($product->model, "NV") !== false): ?>
				<iframe src="<?php bloginfo('url') ?>/data/keyshot/AC8060NV-RP7300/index.html" width="325" height="313"></iframe>	
				<?php endif ?>

				<?php if($product->type_id == 11 && strpos($product->model, "FC") !== false): ?>
				<iframe src="<?php bloginfo('url') ?>/data/keyshot/AC8060FC-RP7300/index.html" width="325" height="313"></iframe>	
				<?php endif ?>

				<?php if($product->type_id == 12 && strpos($product->model, "NV") !== false): ?>
				<iframe src="<?php bloginfo('url') ?>/data/keyshot/AC9060NV-RA4000/index.html" width="325" height="313"></iframe>	
				<?php endif ?>

				<?php if($product->type_id == 12 && strpos($product->model, "FC") !== false): ?>
				<iframe src="<?php bloginfo('url') ?>/data/keyshot/AC9060FC-RA4000/index.html" width="325" height="313"></iframe>	
				<?php endif ?>

				<?php if($product->type_id == 14): ?>
				<iframe src="<?php bloginfo('url') ?>/data/keyshot/PM8018HV-RP7300/index.html" width="325" height="313"></iframe>	
				<?php endif ?>

				<?php if($product->type_id == 18 && strpos($product->model, "NV") !== false): ?>
				<iframe src="<?php bloginfo('url') ?>/data/keyshot/AC9060NV-PS2100/index.html" width="325" height="313"></iframe>	
				<?php endif ?>

				<?php if($product->type_id == 18 && strpos($product->model, "FC") !== false): ?>
				<iframe src="<?php bloginfo('url') ?>/data/keyshot/AC9060FC-PS2100/index.html" width="325" height="313"></iframe>	
				<?php endif ?>

				<?php if($product->type_id == 23): ?>
				<iframe src="<?php bloginfo('url') ?>/data/keyshot/BL6520/index.html" width="325" height="313"></iframe>	
				<?php endif ?>

				<?php if($product->type_id == 24 && strpos($product->model, "PL73") !== false): ?>
				<iframe src="<?php bloginfo('url') ?>/data/keyshot/BL6520-PL7305/index.html" width="325" height="313"></iframe>	
				<?php endif ?>

				<?php if($product->type_id == 24 && substr($product->model, -1) === "i" ): ?>
				<iframe src="<?php bloginfo('url') ?>/data/keyshot/BL6560-PL6200i/index.html" width="325" height="313"></iframe>	
				<?php endif ?>

				<?php if($product->type_id == 25): ?>
				<iframe src="<?php bloginfo('url') ?>/data/keyshot/BL6560-PS2100/index.html" width="325" height="313"></iframe>	
				<?php endif ?>

				<?php if($product->type_id == 26): ?>
				<iframe src="<?php bloginfo('url') ?>/data/keyshot/BL6520-RA3000T/index.html" width="325" height="313"></iframe>	
				<?php endif ?>

				<?php if($product->type_id == 27): ?>
				<iframe src="<?php bloginfo('url') ?>/data/keyshot/BL6520-RP7300/index.html" width="325" height="313"></iframe>	
				<?php endif ?>


				
				<span class="visual-guide">Click and drag the image above in any direction to rotate the product 360&deg;</span>		
			</div>

			<div class="description">

				<h2>
					<small><?php the_title() ?></small>Product #<?php echo $product->ordering_number ?>
				</h2>

				<ul class="features">
					<li>
						<span>Model No:</span>
						<strong><?php echo $product->model ?></strong>
					</li>
					<li>
						<span>Description:</span>
						<strong><?php echo $product->voltage ?>V <?php echo $product->phase ?></strong> | <strong><?php echo $product->system_hp ?>hp</strong> | <strong><?php echo $product->output_speed ?> RPM</strong>
					</li>
					<li>
						<span>CAD Files:</span>

            <?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/Cad_Pdf/'.$product->cadfile.'.pdf')): ?>
            <a href="<?php get_bloginfo('url') ?>/data/other/Cad_Pdf/<?php echo $product->cadfile ?>.pdf" target="_blank">CAD PDF</a>
            <?php $nofiles = false; ?>
            <?php endif; ?>
            <?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/Cad_Pdf/'.$product->cadfile.'.PDF')): ?>
            <a href="<?php get_bloginfo('url') ?>/data/other/Cad_Pdf/<?php echo $product->cadfile ?>.PDF" target="_blank">CAD PDF</a>
            <?php $nofiles = false; ?>
            <?php endif; ?>

						<?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/other/3DCad_STEP/'.$product->cadfile.'.zip')): ?>
						<a href="<?php get_bloginfo('url') ?>/data/other/3DCad_STEP/<?php echo $product->cadfile ?>.zip">3DCad STEP</a>
						<?php $nofiles = false; ?>
						<?php endif; ?>

						<div class="pdf-full">
							<?php if(strlen($product->ordering_number) == 4): ?>
							<?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/other/Performance/0'.$product->ordering_number.'.pdf')): ?>
							<a class="pdf" href="<?php get_bloginfo('url') ?>/data/other/Performance/0<?php echo $product->ordering_number ?>.pdf" target="_blank">View the Performance Data Curve</a>
							<?php endif; ?>
							<?php else: ?>
							<?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/other/Performance/'.$product->ordering_number.'.pdf')): ?>
							<a class="pdf" href="<?php get_bloginfo('url') ?>/data/other/Performance/<?php echo $product->ordering_number ?>.pdf" target="_blank">View the Performance Data Curve</a>
							<?php endif; ?>	
							<?php endif; ?>
						</div>
					</li>
				</ul>

				<section id="callout">
					<div class="centered centered-content">
						<a class="text-btn yellow" href="<?php echo get_permalink(4917).'?id='.$product->id ?>">Customize It</a>
						<a class="text-btn green" href="<?php bloginfo('template_url'); ?>/quote-add.php?id=<?php echo $product->id ?>">Add to Quote</a>
					</div>
					<!-- <h3><img src="<?php bloginfo('template_url') ?>/images/48-hour.png" alt="48 Hour Custom Gearmotors. All models ship within 48 hours!" /></h3> -->
				</section>

			</div>

		</div>

      
		<!-- details-box -->
		<ul class="tabs">
			<li><a href="#features">Features &amp; Options</a></li>
			<li><a href="#cad">CAD Files</a></li>
			<li><a href="#resources">Product Resources</a></li>
		</ul>

		<div class="details-box">
			<div id="features">
				<div class="column">
					<h4>Features</h4>
					<?php echo $category->field('features') ?>
				</div>
		
				<div class="column">
					<h4>Options</h4>
					<?php echo $category->field('options') ?>
		
					<?php if($category->field('show_controls')): ?>
					<a class="text-arrow" href="<?php echo $category->field('controls_link') ?>">See Controls for this Product</a>
					<?php endif ?>
					
				</div>
			</div>

			<div id="cad">
				<ul>
				    <?php $nofiles = true; ?>
				    <?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/other/Cad_Pdf/'.$product->cadfile.'.pdf')): ?>
					<li><a href="<?php get_bloginfo('url') ?>/data/other/Cad_Pdf/<?php echo $product->cadfile ?>.pdf" target="_blank">Cad_Pdf</a></li>
					<?php $nofiles = false; ?>
					<?php endif; ?>
					<?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/other/Cad_Pdf/'.$product->cadfile.'.PDF')): ?>
					<li><a href="<?php get_bloginfo('url') ?>/data/other/Cad_Pdf/<?php echo $product->cadfile ?>.PDF" target="_blank">Cad_Pdf</a></li>
					<?php $nofiles = false; ?>
					<?php endif; ?>
					
					<?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/other/3DCad_IGES/'.$product->cadfile.'.zip')): ?>
					<li><a href="<?php get_bloginfo('url') ?>/data/other/3DCad_IGES/<?php echo $product->cadfile ?>.zip">3DCad_IGES</a></li>
					<?php $nofiles = false; ?>
					<?php endif; ?>
					<?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/other/3DCad_STEP/'.$product->cadfile.'.zip')): ?>
					<li><a href="<?php get_bloginfo('url') ?>/data/other/3DCad_STEP/<?php echo $product->cadfile ?>.zip">3DCad_STEP</a></li>
					<?php $nofiles = false; ?>
					<?php endif; ?>
					<?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/other/Cad_Dwg/'.$product->cadfile.'.zip')): ?>
					<li><a href="<?php get_bloginfo('url') ?>/data/other/Cad_Dwg/<?php echo $product->cadfile ?>.zip">Cad_Dwg</a></li>
					<?php $nofiles = false; ?>
					<?php endif; ?>
					<?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/other/Cad_Dxf/'.$product->cadfile.'.zip')): ?>
					<li><a href="<?php get_bloginfo('url') ?>/data/other/Cad_Dxf/<?php echo $product->cadfile ?>.zip">Cad_Dxf</a></li>
					<?php $nofiles = false; ?>
					<?php endif; ?>
					
					<?php if($nofiles == true): ?>
					<li>Not applicable to this application</li>
					<?php endif; ?>
				</ul>
			</div>

			<div id="resources">
				<ul>
					<?php if(strlen($product->ordering_number) == 4): ?>
					<?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/other/Performance/0'.$product->ordering_number.'.pdf')): ?>
					<li><a href="<?php get_bloginfo('url') ?>/data/other/Performance/0<?php echo $product->ordering_number ?>.pdf" target="_blank">Performance Data</a></li>
					<?php endif; ?>
					<?php else: ?>
					<?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/other/Performance/'.$product->ordering_number.'.pdf')): ?>
					<li><a href="<?php get_bloginfo('url') ?>/data/other/Performance/<?php echo $product->ordering_number ?>.pdf" target="_blank">Performance Data</a></li>
					<?php endif; ?>	
					<?php endif; ?>
					
					<?php if(in_array($product->type_id, array(1,6,11,12,18))): ?>
					<li><a href="<?php get_bloginfo('url') ?>/data/other/AC-Motor-Connection-Diagram.pdf" target="_blank">AC Connection Diagram</a></li>
					<?php endif; ?>
					
					<?php if(in_array($product->type_id, array(2,3,7,8,14,16))): ?>
					<li><a href="<?php get_bloginfo('url') ?>/data/other/DC-Motor-Connection-Diagram.pdf" target="_blank">PM Connection Diagram</a></li>
					<?php endif; ?>

					<?php if(in_array($product->type_id, array(23,24,25,26,27))): ?>
					<li><a href="<?php get_bloginfo('url') ?>/data/other/brushless-dc-motor-connection-diagram.pdf" target="_blank">Brushless Connection Diagram</a></li>
					<?php endif; ?>
				</ul>
			</div>
		</div>

		<?php else: ?>	

		<div id="sm-icons">
			Share with a friend: <span class='st_facebook' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span><span class='st_twitter' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span><span class='st_email' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span><span class='st_sharethis' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span><span class='st_plusone' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span>
		</div>

		<?php if($_GET['added']): ?>
		<div class="success">Product added to quote cart</div>
		<?php endif ?>

		<?php if (have_posts()) : ?>
	
		<?php while (have_posts()) : the_post(); ?>

			<?php if(get_children(array('post_parent' => get_the_ID(), 'post_type' => 'product'))): ?>
			<?php query_posts(array('post_type' => 'product', 'post_parent' => get_the_ID(), 'meta_key' => 'display_in_list', 'meta_value' => '1')); ?>
			<?php get_template_part('partials/grid') ?>
			<?php else: ?>
			<?php if(get_meta('options')): ?>
			<?php get_template_part('partials/products') ?>
			<?php else: ?>
			<div class="post">
				<div class="title">
					<h1><?php the_title(); ?></h1>
				</div>
				
				<div class="content">					
					<?php the_content(); ?>
				</div>
			</div>
			<?php endif; endif ?>
		
		<?php endwhile; ?>

		<?php endif; ?>

		<?php endif; ?>
	</div>



	<?php get_sidebar(); ?>
</div>


<?php get_footer(); ?>