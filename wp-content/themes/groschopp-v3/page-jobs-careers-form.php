<?php get_header(); ?>

    <div class="row">

    	<div class="col-sm-12 col-md-9 pull-right content">
    	
    		<h1>Jobs & Careers Form</h1>
    		
    		<?php if (have_posts()): ?>
				<?php while (have_posts()) : the_post(); ?>
				
				<?php the_content() ?>
				
				<br>
				<br>
				
				<form method="post" action="<?php bloginfo('template_url'); ?>/form-action.php">
		      <input type="hidden" name="form" value="employment" />
		      <ul>
		        <li class="alt">
		          <label>Position applying for <span class="req">*</span></label>
		          <input type="text" name="position" id="position" />
		        </li>
		        <li>
		          <label>First Name <span class="req">*</span></label>
		          <input type="text" name="first_name" id="first_name" />
		        </li>
		        <li class="alt">
		          <label>Last Name <span class="req">*</span></label>
		          <input type="text" name="last_name" id="last_name" />
		        </li>
		        <li>
		          <label>Middle Name <span class="req">*</span></label>
		          <input type="text" name="middle_name" id="middle_name" />
		        </li>
		        <li class="alt">
		          <label>Street Address <span class="req">*</span></label>
		          <input type="text" name="street_address" id="street_address" />
		        </li>
		        <li>
		          <label>City <span class="req">*</span></label>
		          <input type="text" name="city" id="city" />
		        </li>
		        <li class="alt">
		          <label>State <span class="req">*</span></label>
		          <input type="text" name="state" id="state" />
		        </li>
		        <li>
		          <label>Zip Code <span class="req">*</span></label>
		          <input type="text" name="zip_code" id="zip_code" />
		        </li>
		        <li class="alt">
		          <label>Telephone <span class="req">*</span></label>
		          <input type="text" name="telephone" id="telephone" />
		        </li>
		        <li>
		          <label>Email Address <span class="req">*</span></label>
		          <input type="text" name="email_address" id="email_address" />
		        </li>
		        <li class="alt">
		          <label>Are you 18 or older?</label>
		          <ul>
		            <li><input type="radio" name="areyou18orolder" value="Yes" checked > Yes</li>
		            <li><input type="radio" name="areyou18orolder" value="No"> No</li>
		          </ul>
		        </li>
		        <li>
		          <label>Are you eligible to work in the United States?</label>
		          <ul>
		            <li><input type="radio" name="eligible_us" value="Yes" checked > Yes</li>
		            <li><input type="radio" name="eligible_us" value="No"> No</li>
		          </ul>
		        </li>
		        <li class="alt">
		          <label>What areas of employment are you interested in?</label>
		          <ul>
		            <li><input type="checkbox" name="interest[]" value="Manufacturing (Assembly)"> Manufacturing (Assembly)</li>
		            <li><input type="checkbox" name="interest[]" value="Sales/Marketing"> Sales/Marketing</li>
		            <li><input type="checkbox" name="interest[]" value="Operations"> Operations</li>
		            <li><input type="checkbox" name="interest[]" value="Administration"> Administration</li>
		            <li><input type="checkbox" name="interest[]" value="Engineering"> Engineering</li>
		          </ul>
		        </li>
		        <li>
		          <label>What shifts can you work (for manufacturing)?</label>
		          <ul>
		            <li><input type="checkbox" name="shift[]" value="First"> First</li>
		            <li><input type="checkbox" name="shift[]" value="Second"> Second</li>
		            <li><input type="checkbox" name="shift[]" value="Third"> Third</li>
		          </ul>
		        </li>
		        <li class="alt">
		          <label>What type of employment are you seeking?</label>
		          <ul>
		            <li><input type="checkbox" name="employment[]" value="Full Time"> Full Time</li>
		            <li><input type="checkbox" name="employment[]" value="Part Time"> Part Time</li>
		          </ul>
		        </li>
		        <li>
		          <label>Are you currently employed?</label>
		          <ul>
		            <li><input type="radio" name="employed" value="Yes" checked> Yes</li>
		            <li><input type="radio" name="employed" value="No"> No</li>
		          </ul>
		        </li>
		      </ul>
		      
		      <h2>Employment History</h2>
		      <ul>
		        <li>
		          <label>1. Present or Most Recent Employer</label>
		          <ul>
		            <li>
		              <label>Name of Employer</label>
		              <input type="text" name="employer1" />
		            </li>
		            <li>
		              <label>Your Position</label>
		              <input type="text" name="position1" />
		            </li>
		          </ul>
		        </li>
		        <li class="alt">
		          <label>2. Next Previous Employer</label>
		          <ul>
		            <li>
		              <label>Name of Employer</label>
		              <input type="text" name="employer2" />
		            </li>
		            <li>
		              <label>Your Position</label>
		              <input type="text" name="position2" />
		            </li>
		          </ul>
		        </li>
		      </ul>
		      
		      <h2>Education History</h2>
		      <ul>
		        <li>
		          <label>1. Institution</label>
		          <ul>
		            <li>
		              <label>Name</label>
		              <input type="text" name="school1" />
		            </li>
		            <li>
		              <label>Years Attended</label>
		              <input type="text" name="years1" />
		            </li>
		            <li>
		              <label>Diploma/Degree Received</label>
		              <input type="text" name="degree1" />
		            </li>
		          </ul>
		        </li>
		        <li class="alt">
		          <label>2. Institution</label>
		          <ul>
		            <li>
		              <label>Name</label>
		              <input type="text" name="school2" />
		            </li>
		            <li>
		              <label>Years Attended</label>
		              <input type="text" name="years2" />
		            </li>
		            <li>
		              <label>Diploma/Degree Received</label>
		              <input type="text" name="degree2" />
		            </li>
		          </ul>
		        </li>
		        <li>
		          <label>&nbsp;</label>
		          <input class="text-btn" type="submit" value="Submit Request" onclick=" return validCheck()" />
		        </li>
		      </ul>
		    </form>
		    
		    <script type="text/javascript">
	      function validCheck() {
	      	if(document.getElementById('first_name').value.length == 0 || document.getElementById('last_name').value.length == 0 || document.getElementById('middle_name').value.length == 0 || document.getElementById('street_address').value.length == 0 || document.getElementById('city').value.length == 0 || document.getElementById('state').value.length == 0 || document.getElementById('zip_code').value.length == 0 || document.getElementById('telephone').value.length == 0 || document.getElementById('email_address').value.length == 0) { 
	        	alert('Please fill in all required fields') 
	          return false;
	        }
	        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/,
	        		address = document.getElementById('email_address').value;
	        
	        if(reg.test(address) == false) {
	        	alert('Invalid Email Address');
	          return false;
	        }
	        return true;
	      }
		    </script>
	      
	      <?php endwhile; endif ?>

			</div>
		
			<?php get_sidebar(); ?>
			
		</div>

<?php get_footer(); ?>
