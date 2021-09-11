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
			<input type="hidden" name="form" value="specs" />
			<ul>
				<li>
					<label for="name">Name <span class="req">*</span></label>
					<input type="text" name="name" id="name" />
				</li>
				<li class="alt">
					<label>State <span class="req">*</span></label>
					<input type="text" name="state" id="state" />
				</li>
				<li>
					<label>Company <span class="req">*</span></label>
					<input type="text" name="company" id="company" />
				</li>
				<li class="alt">
					<label>Phone <span class="req">*</span></label>
					<input type="text" name="phone" id="phone" />
				</li>
				<li>
					<label>Email Address <span class="req">*</span></label>
					<input type="text" name="email_address" id="email_address" />
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
				<li class="alt">
					<label>Application Description <span class="req">*</span></label>
					<textarea name="application_description" id="application_description"></textarea>
				</li>
				<li>
					<label>Motor Quantity</label>
					<input type="text" name="motor_quantity" />
				</li>
				<li class="alt">
					<label>Estimated Units Per Year</label>
					<input type="text" name="units_per_year" />
				</li>
				<li>
					<label>Motor Type</label>
					<ul>
						<li><input type="radio" name="motor_type" value="DC" checked /> DC</li>
						<li><input type="radio" name="motor_type" value="AC" /> AC</li>
						<li><input type="radio" name="motor_type" value="Brushless DC" /> Brushless DC</li>
						<li><input type="radio" name="motor_type" value="Universal / Motor Components" /> Universal / Motor Components</li>
						<li><input type="radio" name="motor_type" value="Other" /> Other</li>
						<li><input type="radio" name="motor_type" value="None" /> None</li>
					</ul>
				</li>
				<li class="alt">
					<label>Life Requirements</label>
					<input type="text" name="life_requirements" /> Hours
				</li>
				<li>
					<label>Voltage</label>
					<ul>
						<li><input type="text" name="voltage_volts" /> Volts</li>
						<li><input type="text" name="voltage_ACDC" /> AC/DC</li>
						<li><input type="text" name="voltage_phase" /> Phase/Frequency</li>
					</ul>
				</li>
				<li class="alt">
					<label>Control</label>
					<ul>
						<li><input type="radio" value="yes" name="control_yn" checked /> Yes</li>
						<li><input type="radio" value="no" name="control_yn" /> No</li>
						<li><input type="text" name="type" /></li>
					</ul>
				</li>
				<li>
					<label>Rated Speed</label>
					<input type="text" name="rated_speed" /> RPM
				</li>
				<li class="alt">
					<label>Rated Torque</label>
					<input type="text" name="rated_torque" /> lb-in
				</li>
				<li>
					<label>Rated Power</label>
					<input type="text" name="rated_power" /> Watts
				</li>
				<li class="alt">
					<label>Duty Cycle</label>
					<ul>
						<li><input type="radio" name="duty_cycle" value="Continuous" checked /> Continuous</li>
						<li><input type="radio" name="duty_cycle" value="Intermittent" /> Intermittent</li>
						<li><input type="text" name="off_time" /> Off Time</li>
						<li><input type="text" name="on_time" /> On Time</li>
					</ul>
				</li>
				<li>
					<label>Max Envelope Size (inches)</label>
					<ul>
						<li><input type="text" name="max_envelope_length" /> Length</li>
						<li><input type="text" name="max_envelope_height" /> Height</li>
						<li><input type="text" name="max_envelope_width" /> Width</li>
					</ul>
				</li>
				<li class="alt">
					<label>Mounting</label>
					<ul>
						<li><input type="radio" name="mounting" value="Foot" checked /> Foot</li>
						<li><input type="radio" name="mounting" value="Face" /> Face</li>
						<li><input type="radio" name="mounting" value="Other" /> Other</li>
						<li><input type="text" name="mounting_other" /> (if other)</li>
					</ul>
				</li>
				<li>
					<label>Noise Requirement</label>
					<ul>
						<li><input type="radio" name="noise_requirement" checked /> Yes</li>
						<li><input type="radio" name="noise_requirement" /> No</li>
						<li><input type="text" name="max_db" /> Max DB.</li>
					</ul>
				</li>
				<li class="alt">
					<label>Speed Reducer (Gearbox)</label>
					<ul>
						<li><input type="radio" name="speed_reducer" value="Parallel Shaft (PS)" checked /> Parallel Shaft (PS)</li>
						<li><input type="radio" name="speed_reducer" value="Right Angle (RA)" /> Right Angle (RA)</li>
						<li><input type="radio" name="speed_reducer" value="Planetary (PL)" /> Planetary (PL)</li>
						<li><input type="radio" name="speed_reducer" value="Right Angle Planetary (RP)" /> Right Angle Planetary (RP)</li>
					</ul>
				</li>
				<li>
					<label>Overhung Load</label>
					<ul>
						<li><input type="radio" name="overhung_load" value="Yes" checked /> Yes</li>
						<li><input type="radio" name="overhung_load" value="No" /> No</li>
					</ul>
				</li>
				<li class="alt">
					<label>Brake</label>
					<ul>
						<li><input type="radio" name="brake" value="Yes" checked /> Yes</li>
						<li><input type="radio" name="brake" value="No" /> No</li>
					</ul>
				</li>
				<li>
					<label>Optical Encoder</label>
					<ul>
						<li><input type="radio" name="optical_encoder" value="Yes" checked /> Yes</li>
						<li><input type="radio" name="optical_encoder" value="No" /> No</li>
					</ul>
				</li>
				<li class="alt">
					<label>Agency Approvals</label>
					<ul>
						<li><input type="checkbox" name="agency_approval[]" value="UL" /> UL</li>
						<li><input type="checkbox" name="agency_approval[]" value="CSA" /> CSA</li>
						<li><input type="checkbox" name="agency_approval[]" value="CE" /> CE</li>
						<li><input type="checkbox" name="agency_approval[]" value="RoHS" /> RoHS</li>
						<li><input type="checkbox" name="agency_approval[]" value="Other" /> Other</li>
						<li><input type="text" name="agency_approval[]" /> (if other)</li>
					</ul>
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
				if(document.getElementById('name').value.length == 0 || document.getElementById('state').value.length == 0 || document.getElementById('company').value.length == 0 || document.getElementById('phone').value.length == 0 || document.getElementById('email_address').value.length == 0 || document.getElementById('application_description').value.length == 0) { 
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