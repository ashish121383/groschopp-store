			</div>
		</div>
		<!-- footer -->
		<div id="footer">
			<div class="footer-holder">
				<div class="footer-frame">	
					<div class="footer-container">
						<!-- fourcolumns -->
						<div class="fourcolumns">
						
							<div class="column col1">
							  <div class="holder">
								  <a href="#"><img src="<?php bloginfo('template_url'); ?>/images/badge_MadeInUSA.png" alt="image description" width="151" height="127" /></a>
							  </div>
							</div>
							<!-- footer-list -->
							<?php wp_list_bookmarks(array(
								    'orderby'          => 'name',
								    'order'            => 'ASC',
								    'category_name'    => 'Popular Links',
								    'title_li'         => '',
								    'title_before'     => '<strong class="title">',
								    'title_after'      => '</strong>',
								    'category_orderby' => 'name',
								    'category_order'   => 'ASC',
								    'class'            => 'linkcat',
								    'category_before'  => '<div class="column">',
								    'category_after'   => '</div>' ));
							 ?> 
							 <?php wp_list_bookmarks(array(
								    'orderby'          => 'name',
								    'order'            => 'ASC',
								    'category_name'    => 'GroschoppStories&trade;',
								    'title_li'         => '',
								    'title_before'     => '<strong class="title">',
								    'title_after'      => '</strong>',
								    'category_orderby' => 'name',
								    'category_order'   => 'ASC',
								    'class'            => 'linkcat',
								    'category_before'  => '<div class="column">',
								    'category_after'   => '</div>' ));
							 ?>  
							 
							<div class="column">
							  <strong class="title">Connect with Groschopp</strong>
								<!-- socials -->
								<ul class="socials">
									<li><a href="http://www.facebook.com/GroschoppInc" target="_blank" class="facebook">facebook</a></li>
									<li><a href="http://twitter.com/Groschopp" target="_blank" class="twitter">twitter</a></li>
									<li><a href="http://www.linkedin.com/company/610205?goback=%2Efps_PBCK_Groschopp+Inc" target="_blank" class="linkedin">linkedin</a></li>
									<li><a href="https://plus.google.com/105799250491995037769/posts" target="_blank" class="google">google+</a></li>
									<li><a href="http://www.youtube.com/user/Groschopp1" target="_blank" class="youtube">youtube</a></li>
								</ul>
							</div>
							
						</div>
						<!-- info -->
						<ul class="info">
							<li><a href="<?php echo get_permalink(11) ?>">Contact Us</a></li>
							<li>1-800-829-4135  /  712-722-4135 </li>
							<li><a href="<?php echo get_permalink(86) ?>">Terms &amp; Conditions</a></li>
							<li>Copyright <?php echo date("Y") ?> &copy; Groschopp, Inc.</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<form id="modal" class="clearfix" action="" style="display: none;">
	
		<button type="button" class="simplemodal-close"></button>
		
		<h1>Groschopp 48 Hour Custom Gearmotors</h1>
		
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

	<?php wp_footer(); ?>

	<?php if(is_page(925)): ?>
	<!-- Google Code for Quote Cart Conversion Page -->
	<script type="text/javascript">
	/* <![CDATA[ */
	var google_conversion_id = 1071320427;
	var google_conversion_language = "en";
	var google_conversion_format = "2";
	var google_conversion_color = "ffffff";
	var google_conversion_label = "_WBvCN2p9gQQ65rs_gM";
	var google_conversion_value = 0;
	/* ]]> */
	</script>
	<script type="text/javascript" src="http://www.googleadservices.com/pagead/conversion.js">
	</script>
	<noscript>
	<div style="display:inline;">
	<img height="1" width="1" style="border-style:none;" alt="" src="http://www.googleadservices.com/pagead/conversion/1071320427/?value=0&amp;label=_WBvCN2p9gQQ65rs_gM&amp;guid=ON&amp;script=0"/>
	</div>
	</noscript>
	<?php endif ?>
	
	<script src="<?php bloginfo('template_url'); ?>/js/video-switcher.js" type="text/javascript"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/fancybox/fancybox.js" type="text/javascript"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/simplemodal.min.js" type="text/javascript"></script>
	
	<!--[if lt IE 9]>
	
	<script src="<?php bloginfo('template_url'); ?>/js/placeholder.js" type="text/javascript"></script>
	
	![endif]-->

  <script type="text/javascript">
  
  $('a.modal').fancybox();
  
  $("a.video-popup").fancybox({
    overlayShow: true,
    frameWidth: 640,
    frameHeight: 360,
    type: "iframe",
	});

  $(function() {

    var mainSource = $('img.featured-img-main');
    var preservedMain = mainSource.attr('src');

    $('img.featured-img-secondary')
    .on('mouseenter', function(e) {
        mainSource.attr('src', $(e.target).attr('src'));
    })
    .on('mouseleave', function() {
        mainSource.attr('src', preservedMain);
    });
  	
  	// tabs //
		$('ul.tabs').each(function(){
	    // For each set of tabs, we want to keep track of
	    // which tab is active and it's associated content
	    var $active, $content, $links = $(this).find('a');
	
	    // If the location.hash matches one of the links, use that as the active tab.
	    // If no match is found, use the first link as the initial active tab.
	    $(this).find('a').addClass('inactive');
	    $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
	    $active.addClass('active').removeClass('inactive');
	
	    $content = $($active[0].hash);
	
	    // Hide the remaining content
	    $links.not($active).each(function () {
	      $(this.hash).hide();
	    });
	
	    // Bind the click event handler
	    $(this).on('click', 'a', function(e){
	      // Make the old tab inactive.
	      $active.removeClass('active').addClass('inactive');
	      $content.hide();
	
	      // Update the variables with the new link and content
	      $active = $(this);
	      $content = $(this.hash);
	
	      // Make the tab active.
	      $active.addClass('active').removeClass('inactive');
	      $content.show();
	
	      // Prevent the anchor's default click action
	      e.preventDefault();
	    });
	  });
	  
	  <?php if(is_page(5141)): ?>
	  // Load dialog on click //
		$('.launch-modal').click(function(e) {
			e.preventDefault();
			$('#modal').modal();
		});
		<?php endif ?>
		
		// Accordion //
	  var header = $('.accordion header');
	
	  header.click(function() {
	
	    $this = $(this);
	    if($this.hasClass('active')) {
	      $this.removeClass('active').next().slideUp(500);
	    } else {
	      $this.addClass('active').next().slideDown(500);
	    }
	    return false;
	  });
		
	});

	</script>
	
	<script type="text/javascript">

  setTimeout(function(){var a=document.createElement("script");
  var b=document.getElementsByTagName("script")[0];
  a.src=document.location.protocol+"//dnn506yrbagrg.cloudfront.net/pages/scripts/0010/5183.js?"+Math.floor(new Date().getTime()/3600000);
  a.async=true;a.type="text/javascript";b.parentNode.insertBefore(a,b)}, 1);
  </script>
  
  <script type="text/javascript">
  document.write(unescape("%3Cscript src='" + ((document.location.protocol=="https:")?"https://snapabug.appspot.com":"http://www.snapengage.com") + "/snapengage-groschopp.js' type='text/javascript'%3E%3C/script%3E"));</script><script type="text/javascript">
  SnapABug.addButton("0f046c50-c0ec-420c-b2f7-030d3a9c435e","1","45%", true);
  </script>

  <script type="text/javascript">
  $(function(){
    $('.tooltip .icon').on('mouseenter', function(){
      console.log('this');
      $(this).siblings('.tip').fadeIn();
    });

    $(function(){
      $('.tooltip .icon').on('mouseleave', function(){
        console.log('that');
        $(this).siblings('.tip').fadeOut();
      });
    })
  });
  </script>

  <script type="text/javascript">
  $(function(){
		$('#mm-stp-opt-stp, #mm-stp-opt-mm').on('change', function() {
    	$('#mm-stp').submit();
    })
  });
  </script>
  <!-- Old GA
  <script type="text/javascript">
	function trackLink(link,category,action,push)
	{
		try
		{
			var pageTracker=_gat._getTracker("UA-25473852-1"); 
				pageTracker._trackEvent(category,action); 
			if(push)
			{
				setTimeout('document.location = "' + link + '"', 100); 
			}
		}catch(err){}
	}
	
	$('.SnapABug_Button').click( function() {
		trackLink('','public website','live support button',false);
		$('#SnapABug_WP').css('display', 'block');
	});
	</script>
	-->

	<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-25473852-1']);
	  _gaq.push(['_trackPageview']);

	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>
  
  <?php
	if(is_single())
	{
		echo "<script>";
		$category = get_the_category();
		foreach($category as $thiscategory)
		{
			echo "_gaq.push(['_trackEvent','Blog','Post Category View','".$thiscategory->cat_name."']);  ";
		}
		echo "_gaq.push(['_trackEvent','Blog','Post View','".get_the_title()."']);  ";
		echo "</script>";
	}
	?>

</body>
</html>
