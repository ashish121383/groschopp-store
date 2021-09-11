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

	     	var product_id = $this.data('productId');
	      var image = $this.data('image');

	      $('.custom-' + image).remove();
	    } else {
	      $this.addClass('active').next().slideDown(500);
	      
	      var product_id = $this.data('productId');
	      var image = $this.data('image');

	      if(image) {
	      	$('.custom-images').prepend("<img src='<?php echo get_bloginfo('url') ?>/data/customize/" + product_id + "/" + image + ".png' class='custom-" + image + " custom-overlay' />");
	    	}
	    }
	    return false;
	  });

	  var expandAll = $('#expandAll');

	  expandAll.click(function() {
	  	$('.accordion').find('header').addClass('active');
	  	$('.accordion').find('.option-content').slideDown(500);
	  });

	  var collapseAll = $('#collapseAll');

	  collapseAll.click(function() {
	  	$('.accordion').find('header').removeClass('active');
	  	$('.accordion').find('.option-content').slideUp(500);
	  });
		
	});

	</script>
	
	<script type="text/javascript">

  setTimeout(function(){var a=document.createElement("script");
  var b=document.getElementsByTagName("script")[0];
  a.src=document.location.protocol+"//dnn506yrbagrg.cloudfront.net/pages/scripts/0010/5183.js?"+Math.floor(new Date().getTime()/3600000);
  a.async=true;a.type="text/javascript";b.parentNode.insertBefore(a,b)}, 1);
  </script>
  
  <!-- begin SnapEngage code -->
   <script type="text/javascript">
     (function() {
       var se = document.createElement('script'); se.type =
   'text/javascript'; se.async = true;
       se.src =
   '//storage.googleapis.com/code.snapengage.com/js/0f046c50-c0ec-420c-b2f7-030d3a9c435e.js';
       var done = false;
       se.onload = se.onreadystatechange = function() {
         if
   (!done&&(!this.readyState||this.readyState==='loaded'||this.readyState==='complete'))
   {
           done = true;
           /* Place your SnapEngage JS API code below */
           /* SnapEngage.allowChatSound(true); Example JS API:
   Enable sounds for Visitors. */
         }
       };
       var s = document.getElementsByTagName('script')[0];
   s.parentNode.insertBefore(se, s);
     })();
   </script>
   <!-- end SnapEngage code -->

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


<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-25473852-1', 'auto');
  ga('send', 'pageview');

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

	<script type="text/javascript">_satellite.pageBottom();</script>
</body>
</html>