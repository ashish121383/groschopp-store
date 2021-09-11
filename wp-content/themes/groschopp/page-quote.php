<?php get_header(); ?>

<!-- main -->
<div id="main">
	<!-- content -->
	<div id="content">

		<?php if (have_posts()) : ?>
	
		<?php while (have_posts()) : the_post(); ?>
		
			<div class="post">
				<div class="content">
					<?php the_content(); ?>
				</div>
			</div>
		
		<?php endwhile; ?>

		<?php endif; ?>
		
		<?php //print_r($_COOKIE); ?>
		
		<h1>Contact Information &amp; Quote Details</h1>
		
		<?php if($_COOKIE['quote']): ?>
		<form method="post" action="<?php bloginfo('template_url'); ?>/form-action.php" id="page-quote">
			<input type="hidden" name="form" value="quote" />
			
			<div id="selected-prods">
			
				<h3>Selected Products</h3>
				<ul>
				
					<?php foreach($_COOKIE['quote'] as $k => $v): ?>
					<?php $product = get_product($v) ?>
				
					<li>
					
						<span class="num">Prod# <?php echo $product->ordering_number ?></span> | <span class="model">Model: <?php echo $product->model ?><input type="hidden" name="product[]" value="<?php echo $product->id ?>" /></span><span class="remove"><a href="<?php bloginfo('template_url'); ?>/quote-remove.php?product=<?php echo $k ?>">Remove</a></span>
					
					</li>
					
					<?php endforeach; ?>
				
				</ul>

				<hr style="color:#ebb716; margin-bottom:5px;" />
				Return to our <a href="http://www.groschopp.com/category/products/">products page</a><br/> to continue shopping.
			
			</div>
			
			<ul>
				<li class="alt">
					<label>Name <span class="req">*</span></label>
					<input type="text" name="name" id="name" />
				</li>
				<li>
					<label>Company Name <span class="req">*</span></label>
					<input type="text" name="company" id="company" />
				</li>
				<li class="alt">
					<label>State <span class="req">*</span></label>
					<input type="text" name="state" id="state" />
				</li>
				<li>
					<label>Phone <span class="req">*</span></label>
					<input type="text" name="phone" id="phone" />
				</li>
				<li class="alt">
					<label>Email <span class="req">*</span></label>
					<input type="text" name="email" id="email" />
				</li>
				<li>
          <label>&nbsp;</label>
          <select name="how_did_you_hear_about_us" id="how_did_you_hear_about_us">
          		<option value="How did you hear about us?">How did you hear about us?</option>
              <option value="Google">Google</option>
              <option value="Referral">Referral</option>
              <option value="Global Spec">Global Spec</option>
              <option value="Thomas Net">Thomas Net</option>
              <option value="Machine Design">Machine Design</option>
              <option value="Other">Other</option>
          </select>
          <span class="req">*</span>
				</li>
				<li>
					<label>I'm looking for</label>
					<ul id="product-list">
						<li>
							<input type="radio" name="looking_for" value="Prototype Run" checked />
							<label>Prototype Run</label>
						</li>
						<li>
							<input type="radio" name="looking_for" value="Production Run" />
							<label>Production Run </label>
						</li>
					</ul>
				</li>
				<li class="alt">
					<label>Primary Market</label>
					<input type="text" name="primary_market" id="primary_market" />
				</li>
				<li>
					<label>Est. Units/Year</label>
					<input type="text" name="units_per_year" id="units_per_year" />
				</li>
				<li class="alt">
					<label>Comments</label>
					<textarea name="comments" id="comments"></textarea>
				</li>
				<li id="other_field" style="display:none;">
				    <label>Other <span class="req">*</span></label>
				    <input type="text" name="other" id="other" />
				</li>
				<li>
					<label>&nbsp;</label>
					<input type="submit" value="Submit" id="submit" onclick="return validCheck()" />
				</li>
			</ul>
		</form>
		
		<script type="text/javascript">
		
			function validCheck() {
				if(document.getElementById('name').value.length == 0 || document.getElementById('state').value.length == 0 || document.getElementById('company').value.length == 0 || document.getElementById('phone').value.length == 0 || document.getElementById('email').value.length == 0) { 
					alert('Please fill in all required fields') 
					return false;
				}
				if(document.getElementById('how_did_you_hear_about_us').value == 'How did you hear about us?') {
					alert('Please let us know how you heard about us!')
					return false;
				}
				var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
			    var address = document.getElementById('email').value;
			    if(reg.test(address) == false) {
			 
			       alert('Invalid Email Address');
			       return false;
			    }
				return true;
				
			}
		
		</script>
		<?php else: ?>
		<h2>Please add some motors to your cart to begin building your quote</h2>
		
		<strong>What are you looking for?</strong>
		<ul>
			<li><a href="/category/products/motors/">Motors</a></li>
			<li><a href="/category/products/gearmotors/">Gearmotors</a></li>
			<li><a href="/category/products/gearboxes-speed/">Gearboxes</a></li>
			<li><a href="/gear-motor-match/">GearMotorMatch&trade;</a>
		</ul>	
		<?php endif; ?>

	</div>
	<!-- sidebar -->
	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>