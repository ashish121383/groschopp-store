<?php
/*

	Template name: single test
	
*/
?>

<?php get_header(); ?>

<!-- main -->
<div id="main">

	<div id="content">
			                        
		<!-- product-box -->
		<div class="product-box">
		
		  <!-- visual -->
		  <div class="visual">
		  	<img src="<?php bloginfo('template_url') ?>/images/prod-placeholder.jpg">
		  	<div id="img-controls" class="centered centered-content">
		  		<button type="button" class="selected">3D Rotation</button>
		  		<button type="button">Front</button>
		  		<button type="button">Side</button>
		  	</div>
		  </div>
		  
		  <!-- description -->
		  <div class="description">
		  
		  	<h2>
		  		<small>AC Motors</small>Product # 5120
		  	</h2>
		    
		    <!-- features -->
		    <ul class="features">
		      <li>
		        <span>Model No:</span>
		        <strong>AC6540FC</strong>
		      </li>
		      <li>
		        <span>Description:</span>
		        <strong>115v 1ph 60Hz</strong> | <strong>0.027 hp</strong> | <strong>1480 rpm</strong>
		      </li>
		      <li>
		        <span>CAD Files:</span>
		        <a class="pdf" href="">CAD PDF</a>
		        <a class="pdf" href="">3dCAD Step</a>
		        <div class="pdf-full">
		        	<a class="pdf" href="">View the Performance Data Curve</a>
		        </div>
		      </li>
		    </ul>
		    
		    <section id="callout">
		    	<div class="centered centered-content">
		    		<a class="text-btn yellow" href="http://www.groschopp.com/?page_id=5151">Customize It</a>
		    		<a class="text-btn green" href="">Add to Quote</a>
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
          <ul>
          	<li>AC Motors are constructed with class "H" insulation components allowing for running temperatures up to 180 degrees C</li>
            <li>Die-cast aluminum endbells</li>
            <li>Ball-bearing construction</li>
            <li>Tough, all-aluminum frame</li>
            <li>Durable powder coating paint</li>
            <li>Innovative cooling channels inside the frame to eliminate lint, dust and other debris build up in the fins</li>
            <li>Available in both TEFC (totally enclosed fan-cooled) and TENV (totally enclosed non-vented) designs.</li>
          </ul>
        </div>
        <div class="column">
          <h4>Options</h4>
          <ul>
          	<li>Foot Mount (See outline drawing)</li>
            <li>IP66</li>
          </ul>
          <a class="text-arrow" href="">See Controls for this Product</a>
        </div>
      </div>
    </div>
    		
	</div>
	
	<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>