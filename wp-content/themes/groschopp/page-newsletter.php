<?php get_header(); ?>

<!-- main -->
<div id="main">
	<!-- content -->
	<div id="content">
	
		<div id="sm-icons">
			Share with a friend: <span class='st_facebook' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span><span class='st_twitter' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span><span class='st_email' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span><span class='st_sharethis' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span><span class='st_plusone' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span>
		</div>
	
		<?php if (have_posts()) : ?>
	
		<?php while (have_posts()) : the_post(); ?>
		
			<div class="post">
				<div class="content">
					<?php the_content(); ?>
				</div>
			</div>
		
		<?php endwhile; ?>

		<?php endif; ?>
		
		<form method="post" action="<?php bloginfo('template_url'); ?>/form-action.php">
			<input type="hidden" name="form" value="newsletter" />
			<ul>
				<li>
					<label>First Name <span class="req">*</span></label>
					<input type="text" id="first_name" name="first_name" />
				</li>
				<li class="alt">
					<label>Last Name <span class="req">*</span></label>
					<input type="text" id="last_name" name="last_name" />
				</li>
				<li>
					<label>Company Name <span class="req">*</span></label>
					<input type="text" id="company_name" name="company_name" />
				</li>
				<li class="alt">
					<label>Email Address <span class="req">*</span></label>
					<input type="text" id="email_address" name="email_address" />
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
					<label>Phone <span class="req">*</span></label>
					<input type="text" id="phone" name="phone" />
				</li>
				<li class="alt">
					<label>Address 1</label>
					<input type="text" name="address1" />
				</li>
				<li>
					<label>Address 2</label>
					<input type="text" name="address2" />
				</li>
				<li class="alt">
					<label>City</label>
					<input type="text" name="city" />
				</li>
				<li>
					<label>State</label>
					<input type="text" name="state" />
				</li>
				<li class="alt">
					<label>Zip</label>
					<input type="text" name="zip" />
				</li>
				<li>
					<label>Country <span class="req">*</span></label>
					<input type="text" id="country" name="country" />
				</li>
				<!--<li class="alt">
					<label>Other</label>
					<input type="text" name="other" />
				</li>-->
				<li class="alt">
					<label>Company Type</label>
					<input type="text" name="company_type" />
				</li>
				<li id="other_field" style="display:none;">
				    <label>Other <span class="req">*</span></label>
				    <input type="text" name="other" id="other" />
				</li>
				<li class="alt">
					<label>Motors</label>
					<ul>
						<li><input type="checkbox" name="motors[]" value="AC" /> AC</li>
						<li><input type="checkbox" name="motors[]" value="PMDC" /> PMDC</li>
						<li><input type="checkbox" name="motors[]" value="Brushless" /> Brushless</li>
						<li><input type="checkbox" name="motors[]" value="Universal" /> Universal</li>
						<li><input type="checkbox" name="motors[]" value="Custom/Components" /> Custom/Components</li>
					</ul>
				</li>
				<li>
					<label>Gearmotors</label>
					<ul>
						<li><input type="checkbox" name="gearmotors[]" value="AC" /> AC</li>
						<li><input type="checkbox" name="gearmotors[]" value="PMDC" /> PMDC</li>
						<li><input type="checkbox" name="gearmotors[]" value="Brushless" /> Brushless</li>
						<li><input type="checkbox" name="gearmotors[]" value="Universal" /> Universal</li>
						<li><input type="checkbox" name="gearmotors[]" value="Right Angle" /> Right Angle</li>
						<li><input type="checkbox" name="gearmotors[]" value="Planetary" /> Planetary</li>
						<li><input type="checkbox" name="gearmotors[]" value="Parallel Shaft" /> Parallel Shaft</li>
						<li><input type="checkbox" name="gearmotors[]" value="Custom" /> Custom</li>
					</ul>
				</li>
				<li class="alt">
					<label>Gearboxes</label>
					<ul>
						<li><input type="checkbox" name="gearboxes[]" value="Parallel Shaft" /> Parallel Shaft</li>
						<li><input type="checkbox" name="gearboxes[]" value="Planetary" /> Planetary</li>
						<li><input type="checkbox" name="gearboxes[]" value="Worm (Right Angle)" /> Worm (Right Angle)</li>
						<li><input type="checkbox" name="gearboxes[]" value="Bevel (Right Angle)" /> Bevel (Right Angle)</li>
						<li><input type="checkbox" name="gearboxes[]" value="Custom" /> Custom</li>
					</ul>
				</li>
				<li>
					<label>Controls</label>
					<ul>
						<li><input type="checkbox" name="controls[]" value="Controls" /> Controls</li>
					</ul>
				</li>
				<li class="alt">
					<label>Integration Services</label>
					<ul>
						<li><input type="checkbox" name="integrated_services[]" value="Integration Services" /> Integration Services</li>
					</ul>
				</li>
				<li>
					<label>&nbsp;</label>
					<input type="submit" value="Submit" id="submit" onclick="return validCheck()" />
				</li>
			</ul>
		</form>
		
		<script type="text/javascript">
		
			function validCheck() {
				if(document.getElementById('first_name').value.length == 0 || (document.getElementById('how_did_you_hear_about_us').value == 'Other' && document.getElementById('other').value.length == 0) || document.getElementById('last_name').value.length == 0 || document.getElementById('company_name').value.length == 0 ||document.getElementById('email_address').value.length == 0 || document.getElementById('phone').value.length == 0 || document.getElementById('country').value.length == 0) { 
					alert('Please fill in all required fields') 
					return false;
				}
				if(document.getElementById('how_did_you_hear_about_us').value == 'How did you hear about us?') {
					alert('Please let us know how you heard about us!')
					return false;
				}
				var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
			    var address = document.getElementById('email_address').value;
			    if(reg.test(address) == false) {
			 
			       alert('Invalid Email Address');
			       return false;
			    }
				return true;
				
			}
		
		</script>

	</div>
	<!-- sidebar -->
	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>