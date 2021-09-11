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
		
		<form method="post" action="<?php bloginfo('template_url'); ?>/form-action.php">
			<input type="hidden" name="form" value="contact" />
			
			<small style="color:#f00; font-size: 10px; margin-bottom: 10px;"><em>Please complete all fields.</em></small>
			
			<ul>
				<li>
					<label>Name</label>
					<input type="text" name="name" id="name" placeholder="name" />
				</li>
				<li class="alt">
					<label>Phone</label>
					<input type="text" name="phone" id="phone" placeholder="###-###-####" />
				</li>
				<li>
					<label>Email</label>
					<input type="text" name="email" id="email" placeholder="name@example.com" />
				</li>
				<li class="alt">
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
				</li>
				<li id="other_field" style="display:none;">
				    <label>Other</label>
				    <input type="text" name="other" id="other" />
				</li>
				<li>
					<label>Message</label>
					<textarea name="message" id="message"></textarea>
				</li>
				<li>
					<label>&nbsp;</label>
					<input type="submit" value="Send Message" onclick="return validCheck()" />
				</li>
			</ul>
		</form>
		
		<script type="text/javascript">
		
			function validCheck() {
				if(document.getElementById('how_did_you_hear_about_us').value.length == 0 || (document.getElementById('how_did_you_hear_about_us').value == 'Other' && document.getElementById('other').value.length == 0) || document.getElementById('name').value.length == 0 || document.getElementById('phone').value.length == 0 || document.getElementById('email').value.length == 0 || document.getElementById('message').value.length == 0) { 
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

	</div>
	<!-- sidebar -->
	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>