    	</div>

    </div>
    
    <div class="push"></div>
    
  </div>

  <footer id="site-footer">

      <div class="container">
      
          <div class="social-bookmarks">
              <a href="https://www.instagram.com/groschopp.inc/" target="_blank"></a>
              <a href="https://www.pinterest.com/groschopp/" target="_blank"></a>
              <a href="https://www.facebook.com/GroschoppInc" target="_blank"></a>
              <a href="https://www.linkedin.com/company/groschopp" target="_blank"></a>
              <a href="https://twitter.com/groschopp" target="_blank"></a>
              <a href="https://plus.google.com/+GroschoppIncMotors" target="_blank"></a>
              <a href="https://www.youtube.com/user/Groschopp1" target="_blank"></a>
          </div>

          <div class="row">
          
              <div class=" col-xs-6 col-sm-3 col-md-2">
              	<img src="<?php echo get_template_directory_uri() ?>/images/logo-iso.png" alt="">
              </div>
              
              <div class="hidden-xs col-sm-5 col-md-7">
                <?php echo do_shortcode('[simple-links orderby="" category="Column1" separator="<br>"]'); ?>
                <?php echo do_shortcode('[simple-links count="5" orderby="" category="Column2" separator="<br>"]'); ?>
            		<img class="map" src="<?php echo get_template_directory_uri() ?>/images/us-map.png" alt="">
              </div>
              
              <div class="col-xs-6 col-sm-4 col-md-3 text-right">
              
                <a class="phone" href="tel:712 722 4135">712.722.4135</a>
                <a class="phone" href="tel:800 829 4135">800.829.4135</a>
                <hr>
                <a href="mailto:sales@groschopp.com">sales@groschopp.com</a>

                <hr>
                <address>
                420 15th St. NE<br>
                Sioux Center, IA 51250 USA
                </address>
              
              </div>
          
          </div>
          
      </div>

  </footer>
  
  <div id="overlay"></div>
  
  <div id="how-to">
		<span class="close-btn"></span>
		<h3>How to use the Motor Search Tool</h3>
		<p>Narrow your search by selecting motor type, gearbox, voltage, and phase options for your desired motor.</p>
		
		<ul>
			<li>Yellow represents selected option.</li>
			<li>Dark gray represents available options.</li>
			<li>Light gray represents options not available with previously selected criteria.</li>
		</ul>
		
		<p>Select a dominant variable: choose one of the three parameters to narrow your search. The selected variable determines which slider bar you will be able to manually move.</p>
		<p>Use the slider corresponding to your dominant variable to further narrow your motor selection. The other sliders will automatically move to show available ranges based on the range of your selected variable.</p>
		<p>Results will upload as your search criteria changes. If you have any questions regarding your results or how to use the search tool, you can chat with us using the green tab on the left-hand side of your screen.</p>
		<hr>
		<p>Note: Groschopp Universal motors are custom built to fit your application so no additional options are available to narrow the search. Selecting the Universal motor type will prompt a message taking you to the Universal product page.</p>
	</div>
	
	<div id="not-sure">
		<span class="close-btn"></span>
		<h3>Not sure what you need?</h3>
		<p>One of our team members would be happy to help. Contact us at 800-829-4135 or by email at <a href="mailto:sales@groschopp.com">sales@groschopp.com</a>. You can also chat with us using the green tab on the left side of your screen.</p>
		<div class="text-center">
			<button type="button">return to search</button>
			<a class="link" href="<?php echo get_permalink(11) ?>">send us an email</a>
		</div>
	</div>
	
	<div id="universal">
		<span class="close-btn"></span>
		<h3>Universal Motors</h3>
		<img class="alignright" src="<?php bloginfo('template_url') ?>/images/universal.png" alt="">
		<p>Groschopp Universal motors are custom built to fit your application so no additional options are available to narrow the search. Standard frame sizes and motor features can be found on the Universal page.</p>
		<div class="text-center">
			<button type="button">return to search</button>
			<a class="link" href="<?php echo get_permalink(6193) ?>">go to Universal page</a>
		</div>
	</div>
	
	<button id="plus" type="button"></button>

  <script src="<?php echo get_template_directory_uri() ?>/js/jquery-3.1.1.min.js"></script>
  <script>window.jQuery || document.write('<script src="<?php echo get_template_directory_uri() ?>/scripts/vendor/jquery.min.js"><\/script>')</script>
  <script src="<?php echo get_template_directory_uri() ?>/js/bootstrap.min.js"></script>
  <script src="<?php echo get_template_directory_uri() ?>/js/popup.min.js"></script>
  <script src="<?php echo get_template_directory_uri() ?>/js/ion.rangeSlider.min.js"></script>
  <script src="<?php echo get_template_directory_uri() ?>/js/url.min.js"></script>
  <script src="<?php echo get_template_directory_uri() ?>/js/plupload.full.min.js"></script>
  <script src="//assets.adobedtm.com/c876840ac68fc41c08a580a3fb1869c51ca83380/satelliteLib-e25a7a2809960ff41d3a500aed3092762647bdc6.js"></script>
  <script src="<?php echo get_template_directory_uri() ?>/js/functions.js"></script>
  <?php if(!is_page(5639)): ?>
  <script src="<?php echo get_template_directory_uri() ?>/js/motor-search-2.js"></script>
  <?php endif; ?>
	
	<?php if(is_user_logged_in()): ?>
	<script>
  // sticky header
	var header = $('#site-header'),
			header_h = header.height() + 28,
			main = $('#site-main');
			
	main.css('padding-top', header_h);
  </script>
	<?php else: ?>
  <script>
  // sticky header
	var header = $('#site-header'),
			header_h = header.height() + 60,
			main = $('#site-main');
			
	main.css('padding-top', header_h);
  </script>
  <?php endif ?>
  
  <?php wp_footer() ?>

  <!-- begin SnapEngage code -->
  <script type="text/javascript">
	(function() {
		var se = document.createElement('script'); se.type = 'text/javascript'; se.async = true;
		se.src = '//storage.googleapis.com/code.snapengage.com/js/0f046c50-c0ec-420c-b2f7-030d3a9c435e.js';
		var done = false;
		se.onload = se.onreadystatechange = function() {
			if(!done&&(!this.readyState||this.readyState==='loaded'||this.readyState==='complete')) {
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

  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-25473852-1', 'auto');
  ga('send', 'pageview');
  </script>
        
  <?php if(is_page(4917)): ?>
  <script>
  var uploader = new plupload.Uploader({
	      runtimes : 'html5,flash,silverlight,html4',
	      browse_button : 'pickfiles', // you can pass in id...
	      container : document.getElementById('container'), // ... or DOM Element itself
	      url : '<?php echo get_bloginfo('template_url') ?>/upload-form.php',
	      flash_swf_url : '../js/Moxie.swf',
	      silverlight_xap_url : '../js/Moxie.xap',
          
        filters : {
          max_file_size : '10mb',
          mime_types: [
              {title : "PDF Files", extensions : "pdf"}
          ]
        },
      
        init: {
        	PostInit: function() {
          	document.getElementById('filelist').innerHTML = '';
      			document.getElementById('uploadfiles').onclick = function() {
	            //document.getElementById('pickfiles').style.visibility = 'hidden';
	            uploader.start();
	            return false;
            };
          },
      
          FilesAdded: function(up, files) {
          	plupload.each(files, function(file) {
            	document.getElementById('filelist').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b><input type="hidden" name="files[]" value="' + file.name + '"></div>';
            });
          },
      
         	UploadProgress: function(up, file) {
          	document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
          },
      
          Error: function(up, err) {
          	document.getElementById('console').innerHTML += "\nError #" + err.code + ": " + err.message;
          },
      
          UploadComplete: function() {
          	$('#modal').submit();
          }
        }
      });
      
  uploader.init();
    
  // Custom example logic
  $(document).ready(function() {

    //// accordion
    var header = $('.accordion header'),
        expandAll = $('#expandAll'),
        collapseAll = $('#collapseAll');

    header.click(function() {
      $this = $(this);
      if($this.hasClass('active')) {
        $this.removeClass('active').next().slideUp(500);

        var product_id = $this.data('productId'),
            image = $this.data('image');

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

  </script>
  <?php endif ?>

<!-- Start of HubSpot Embed Code -->
  <script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/2938536.js"></script>
<!-- End of HubSpot Embed Code -->

  <script type="text/javascript">
  /* <![CDATA[ */
  var google_conversion_id = 1071320427;
  var google_custom_params = window.google_tag_params;
  var google_remarketing_only = true;
  /* ]]> */
  </script>
  <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js"></script>
  <noscript>
  <div style="display:inline;">
		<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/1071320427/?value=0&amp;guid=ON&amp;script=0"/>
	</div>
	</noscript>
	
	<style>
	html {
		margin-top: 0 !important;
	}
	</style>

    <script type="text/javascript">
        var wto = wto || [];
        wto.push(['setWTID', 'groschopp']);
        wto.push(['webTraxs']);
        (function() {
            var wt = document.createElement('script');
            wt.src = document.location.protocol + '//www.webtraxs.com/wt.php';
            wt.type = 'text/javascript';
            wt.async = true;
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(wt, s);
        })();

    </script>
    <noscript><img src="http://www.webtraxs.com/webtraxs.php?id=groschopp&st=img" alt="" /></noscript>

    <!-- Google Tag Manager -->
    <noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-54X3KF"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-54X3KF');</script>
    <!-- End Google Tag Manager -->

</body>
</html>
