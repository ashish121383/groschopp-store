$(document).ready(function() {

	sticky();
	resources();
	
	$(window).resize(function() {
		sticky();
		resources();
		
		if($(window).width() > 991) {
			$('#overlay, #sidebar .close_btn').hide();
			$('#sidebar').removeClass('active').show().css({
				marginTop: 0,
			});
		}
		if($(window).width() < 992) {
			$('#sidebar').hide();
			$('#sidebar.active').show();
		}
	})
  
  
  //// sticky footer
  function sticky() {
  	var footerHeight = $('#site-footer').outerHeight(),
  			stickFooterPush = $('.push').height(footerHeight);
  			
		$('#wrapper').css({'marginBottom':'-' + footerHeight + 'px'});
  }
  
  
  //// resources
  function resources() {
  	var resource = $('.resource, .blog-landing-item'),
  			resource_w = resource.width(),
  			span = $('.resource span, .blog-landing-item span'),
  			span_w = span.width();
  	
  	span.each(function() {
  		var span_text = $(this).text(),
  				string_l = span_text.length;
  				
  		$(this).css({
  			fontSize: (span_w / string_l)*1.5 + 'px',
  		})
  	})
  	resource.css({
  		height: resource_w + 30,
  	})
  }
  

  //// STP Calc
  $('.performance').click(function() {

    var performance_value = $(this).attr('value');
    $('.performance_stp').prop('disabled', false);

    console.log("Performance Click " + performance_value);

    if(performance_value == 0) {
      // speed and torque
      $('#power_stp, #power_type').prop('disabled', true);
    } else if(performance_value == 1) {
      // speed and power
      $('#torque_stp, #torque_type').prop('disabled', true);
    } else {
      // torque and power
      $('#speed_stp').prop('disabled', true);
    }
  });
  
  
  //// custom/downloads toggle
  $('.buttons li').click(function() {
  	var show_opt = $(this).index();
  	
  	$('.buttons button').removeClass('selected');
  	$(this).children().addClass('selected');
  	$('.options div').hide();
  	$('.options .opt-'+show_opt).show();
  });

  $(document).on('click', '.quote-add', function(e) {
  	e.preventDefault();

    var button = $(this);
    var quoteCartNum = $('#numQuoteCart');

  	$.ajax({
  		method: "GET",
  		url: $(this).attr('href'),
      beforeSend: function(msg) {
        button.text("Adding ...");
      },
      success: function(msg) {
        $('#submitQuoteModal').modal('toggle');
      },
      complete: function(msg) {
        var updatedQuoteCartNum = parseInt(quoteCartNum.text()) + 1;
        quoteCartNum.html(updatedQuoteCartNum);
        button.text("Add to Quote");
      }
    });
  });

  $(document).on('click', '.quote-cart-remove', function(e) {
    e.preventDefault();

    var quoteCartNum = $('#numQuoteCart');

    $.ajax({
      method: "GET",
      url: $(this).attr('href'),
      success: function(msg) {
        $.ajax({
          method: "GET",
          url: '/wp-content/themes/groschopp-v3/template-parts/content-quote.php',
          success: function(msg) {
            $('.quote-cart-list').html(msg);
          }
        });       
      },
      complete: function(msg) {
        if(parseInt(quoteCartNum.text()) > 0) {
          var updatedQuoteCartNum = parseInt(quoteCartNum.text()) - 1;
          quoteCartNum.html(updatedQuoteCartNum);
        }
      }     
    });
  });

  $('#submitQuoteModal').on('shown.bs.modal', function (e) {
    $.ajax({
      method: "GET",
      url: '/wp-content/themes/groschopp-v3/template-parts/content-quote.php',
      success: function(msg) {
        $('.quote-cart-list').html(msg);
      }
    });
  });
  
  //// search button toggle
  $('#narrow-search button').click(function() {
  	$(this).toggleClass('selected');
  });
	
	
	//// video modals
	$('.popup-youtube').magnificPopup({
    disableOn: 700,
    type: 'iframe',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,

    fixedContentPos: false
  })
  
  
  //// "q" size
  var q = $('.q'),
  		q_prev_h = q.prev().height() - 5;
  		
  q.css({
  	height: q_prev_h,
  })
 
  
  //// popups
  var how_to = $('#narrow-search .popup'),
  		how_to_pop = $('#how-to'),
  		how_to_pop_h = how_to_pop.height() / 2,
  		how_to_pop_close = $('#how-to .close-btn'),
  		not_sure = $('#narrow-search .confirm'),
  		not_sure_pop = $('#not-sure'),
  		not_sure_pop_h = not_sure_pop.height(),
  		not_sure_pop_close = $('#not-sure .close-btn, #not-sure button'),
  		universal = $('#narrow-search .universal-confirm'),
  		universal_pop = $('#universal'),
  		universal_pop_h = universal_pop.height(),
  		universal_pop_close = $('#universal .close-btn, #universal button'),
  		plus = $('#plus'),
  		plus_close = $('#sidebar .close-btn'),
  		overlay = $('#overlay');
  		
	how_to.click(function(e) {
		e.preventDefault();
		how_to_pop.css('margin-top', -how_to_pop_h);
		how_to_pop.fadeIn();
		overlay.fadeIn();
	})
	how_to_pop_close.click(function() {
		how_to_pop.fadeOut();
		overlay.fadeOut();
	})
	
	not_sure.click(function(e) {
		e.preventDefault();
		not_sure_pop.css({
			marginTop: - not_sure_pop_h / 2,
		})
		not_sure_pop.fadeIn();
		overlay.fadeIn();
	})
	not_sure_pop_close.click(function() {
		not_sure_pop.fadeOut();
		overlay.fadeOut();
	})
	
	universal.click(function(e) {
		e.preventDefault();
		universal_pop.css({
			marginTop: - universal_pop_h / 2,
		})
		universal_pop.fadeIn();
		overlay.fadeIn();
	})
	universal_pop_close.click(function() {
		universal_pop.fadeOut();
		overlay.fadeOut();
	})
	
	plus.click(function() {
		var sidebar = $('#sidebar');
		
		sidebar.addClass('active');
		if(sidebar.hasClass('active')) {
			sidebar.fadeIn();
			overlay.fadeIn();
			plus_close.show();
			var sidebar = $('#sidebar.active'),
					sidebar_h = sidebar.outerHeight(),
					sidebar_h_2 = sidebar_h / 2;
			
			sidebar.css({
				marginTop: -sidebar_h_2,
			})
		}
	})
	plus_close.click(function() {
		var sidebar = $('#sidebar'),
				overlay = $('#overlay');
				
		sidebar.removeClass('active').fadeOut();
		overlay.fadeOut();
	})
	
	overlay.click(function() {
		how_to_pop.fadeOut();
		not_sure_pop.fadeOut();
		universal_pop.fadeOut();
		
		var sidebar = $('#sidebar');
		
		sidebar.removeClass('active').hide();
		overlay.fadeOut();
		$(this).fadeOut();
	})
  
  
  //// side slideout
  /*
  var slideout = $('#slideout-sm'),
  		toggle_btn = $('#slideout-toggle');
  
  toggle_btn.click(function() {
  	if($(this).hasClass('clicked')) {
  		$(this).removeClass('clicked');
	  	slideout.animate({
	  		left: '-300',
	  	})
	  } else {
	  	$(this).addClass('clicked');
	  	slideout.animate({
	  		left: '0',
	  	})
	  }
  })
  
  $(window).resize(function() {
  	if($(window).width() < 767 || $(window).width() > 992) {
  		toggle_btn.removeClass('clicked');
	  	slideout.animate({
	  		left: '-300',
	  	}).css('position', 'static');
  	} else {
  		slideout.css('position', 'absolute');
  	}
  })
  */
})