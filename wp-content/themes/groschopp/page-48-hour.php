<?php
/*

	Template name: 48 hr
	
*/
?>

<?php get_header(); ?>

<!-- main -->
<div id="main">

	<form id="modal" class="clearfix" action="">
		
		<div class="left-col">
			<h2>
				Model #BL6540
				<small>Use this menu to configure the most common custom options available in 48 hours for the motor you have selected</small>
			</h2>
		</div>
		<div class="right-col centered">
			<img src="<?php bloginfo('template_url') ?>/images/phone-cta.png" alt="Questions? Ask an expert. 800.829.4135" />
		</div>
		
		<hr>
		
		<div class="left-col">
			<div class="accordion">
				<section class="options">
					<header>
						<span>Drive Shaft</span>
					</header>
					<div class="option-content" style="display: none;">
						
							<input type="radio" name="drive-shaft" value="3/4 Output Shaft Junction Box (Standard)">3/4 Output Shaft Junction Box (Standard)<br>
							<input type="radio" name="drive-shaft" value="1 Output Shaft">1" Output Shaft<br>
							<input type="radio" name="drive-shaft" value="1 1/4 Output Shaft">1 1/4" Output Shaft<br>
							<input type="radio" name="drive-shaft" value="Crosshole">Crosshole<br>
							<input type="radio" name="drive-shaft" value="Internal Thread">Internal Thread<br>
							<input type="radio" name="drive-shaft" value="External Thread">External Thread
							<div>
								<input type="radio" name="drive-shaft" value="Custom Size">Custom Size
								<input type="text" name="drive-shaft-custom-size" />
							</div>
							<div>
								<input type="radio" name="drive-shaft" value="Custom Length">Custom Length
								<input type="text" name="drive-shaft-custom-length" />
							</div>
							
					</div>
				</section>
				<section class="options">
					<header>
						<span>2nd Rear Shaft</span>
					</header>
					<div class="option-content" style="display: none;">
						word
					</div>
				</section>
				<section class="options">
					<header>
						<span>Drive End Bell</span>
					</header>
					<div class="option-content" style="display: none;">
						word
					</div>
				</section>
			</div>
		</div>
		<div class="right-col">
			<img src="<?php bloginfo('template_url') ?>/images/modal-img.jpg" alt="" />
			
			<h3>Submit your own motor print.</h3>
			<p>We'll work with you to create the perfect solution.</p>
			<a class="text-btn small" href="">Upload Your Own</a>
			
			<h3>Do you have special options not offered here?</h3>
			<p>Send us a note, our in house experts can customize beyond the options offered here, tell us about us your challenge.</p>
			<textarea id="special-options"></textarea>
		</div>
		
		<footer class="modal-controls">
			<input class="text-btn" type="button" value="Cancel" />
			<input class="text-btn green" type="submit" value="Add to Quote" />
		</footer>
	
	</form>
	
</div>

<?php get_footer(); ?>a