<?php get_header(); ?>

    <div class="row">

    	<div id="motor-search" class="col-sm-12 col-md-9 pull-right content">
    	
    		<h1>Motor Search Tool</h1>
    		
    		<?php if (have_posts()): ?>
				<?php while (have_posts()) : the_post(); ?>
				
				<?php the_content() ?>
				
        <div class="clearfix">
			<form id="narrow-search" class="large">
	          <div class="one">
	          	Motor Type
	            <button type="button" value="all" class="motor-select motor-select-all selected">All motors</button>
	            <button type="button" value="dc" class="motor-select">DC</button>
	            <button type="button" value="ac" class="motor-select">AC</button>
	            <button type="button" value="brushless" class="motor-select">Brushless</button>
	            <button type="button" value="universal" class="motor-select universal-confirm">Universal</button>
	            <br>
	            Gearbox
	            <button type="button" value="motor_only" class="gearbox-select selected">Motor Only</button>
	            <button type="button" value="planetary" class="gearbox-select">Planetary</button>
	            <button type="button" value="parallel_shaft" class="gearbox-select">Parallel shaft</button>
	            <button type="button" value="right_angle" class="gearbox-select">Right angle</button>
	            <button type="button" value="right_angle_planetary" class="gearbox-select">Right angle planetary</button>
	            <button type="button" value="all" class="gearbox-select">All gearboxes</button>
	          </div>
	          
	          <div class="two">
	          	Voltage
	          	<button type="button" value="all" class="motor-select-voltage motor-select-voltage-all selected">All voltages</button>
	          	<div class="two-col">
	          		<div>
	          			<button type="button" value="12" class="motor-select-voltage voltage-12">12</button>
	          		</div>
	          		<div>
	          			<button type="button" value="130" class="motor-select-voltage voltage-130">130</button>
	          		</div>
	          	</div>
	          	<div class="two-col">
	          		<div>
	          			<button type="button" value="24" class="motor-select-voltage voltage-24">24</button>
	          		</div>
	          		<div>
	          			<button type="button" value="163" class="motor-select-voltage voltage-163">163/115</button>
	          		</div>
	          	</div>
	          	<div class="two-col">
	          		<div>
	          			<button type="button" value="90" class="motor-select-voltage voltage-90">90</button>
	          		</div>
	          		<div>
	          			<button type="button" value="180" class="motor-select-voltage voltage-180">180</button>
	          		</div>
	          	</div>
	          	<div class="two-col">
	          		<div>
	          			<button type="button" value="115" class="motor-select-voltage voltage-115">115</button>
	          		</div>
	          		<div>
	          			<button type="button" value="230" class="motor-select-voltage voltage-230">230</button>
	          		</div>
	          	</div>
	          	<br>
	          	Phase
	          	<button type="button" value="all" class="motor-select-phase motor-select-phase-all selected">All phases</button>
	          	<button type="button" value="1ph 60Hz" class="motor-select-phase 160-phase">1 ph 60 Hz</button>
	          	<button type="button" value="1ph 50Hz" class="motor-select-phase 150-phase">1 ph 50 Hz</button>
	          	<button type="button" value="3ph 60Hz" class="motor-select-phase 360-phase">3 ph 60 Hz</button>
	          	<button type="button" value="3ph 50Hz" class="motor-select-phase 350-phase">3 ph 50 Hz</button>
	          	<button type="button" value="dc" class="motor-select-phase motor-select-phase-dc">DC</button>
	          </div>
	          
	          <div class="three"> 
	          	Dominant Variable
	          	<div class="two-col offset">
	          		<div>
			          	<button type="button" value="speed" class="motor-select-dominate selected">Speed</button>
			          	<button type="button" value="torque" class="motor-select-dominate">Torque</button>
			          	<button type="button" value="power" class="motor-select-dominate">Power</button>
			          </div>
			          <div>
			          	<a class="popup" href="#"><img src="<?php bloginfo('template_url') ?>/images/q-mark-xl.png" alt=""></a>
			          </div>
			        </div>
			        <br>
	          	
	          	<div class="slide-1">
	  				Speed
	  				<input type="text" class="slider" id="speed" value="speed">
	  				<div class="unit">rpm</div>
	  				<span class="help">
	  					<div>
	  						Number of full shaft revolutions per minute.
	  					</div>
	  				</span>
	  			</div>
	  			<br>
	  			<div class="slide-2">
	  				Torque
	  				<input type="text" class="slider" id="torque" value="">
	  				<div class="unit">in-lbs</div>
	  				<span class="help">
	  					<div>
	  						The amount of force necessary to rotate an object around an axis.
	  					</div>
	  				</span>
	  			</div>
	            <br>
	            <div class="slide-3">
	  	  				Power
	  	  				<input type="text" class="slider" id="power" value="">
	  	  				<div class="unit">hp</div>
	  	  				<span class="help">
			  					<div>
			  						The rate at which work is being done, related to force, distance, and time.
			  					</div>
			  				</span>
	    	  		</div>
	            <br>
	            <div class="two-col">
	            	<div>
	            		<button type="button" class="blue confirm">Still not sure?</button>
	            	</div>
	            	<div>
	            		<button type="button" onclick="location.href='<?php echo get_the_permalink($post->ID) ?>';">reset search</button>
	            	</div>
	            	Scroll down for results
	            </div>
	        	</div>
	        </form>
	      </div>

	      <br/>	      
	      <?php endwhile; endif ?>

        <?php $dataArray = array('orderby' => 'voltage', 'ids' => '1|2|23') ?>
        
        <div class="row">
	        <div class="col-sm-12">
	          <div id="results-list" data-url="<?php bloginfo('template_url'); ?>" data-parameters="<?php echo http_build_query($dataArray) ?>" class="table-responsive">
	            
	          </div>
	        </div>
	      </div>

			</div>
		
			<?php get_sidebar(); ?>
			
		</div>

<?php get_footer(); ?>
