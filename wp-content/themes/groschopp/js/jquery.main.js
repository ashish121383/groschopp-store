$(function(){
	initCufon();
	initClickableTableTR();
	initMotorMatchForm();
	initPage();
	initSlideShow();
	initShareButton();
	initUnhideOther();
	initAddItemToCart();
});

function initShareButton() {
	$("#share-btn").click(function() {
		$("#sm-icons").toggle();
	});
}

function initUnhideOther() {
	$('#how_did_you_hear_about_us').click(function() {
		if($(this).val() == 'Other') {
			$("#other_field").show();
		} else {
			$("#other_field").hide();
		}
	});
}

function initCufon() {
	Cufon.replace('.promo p', { fontFamily: 'Eurostile', hover: true });
	Cufon.replace('.promo a, .heading-box  h2, .marked-text, .page-heading h1, .description h2, .description h3, .btn, .text-btn, .text-arrow, #img-controls button, .tabs a, .details-box h4, #modal h2, .accordion span', { fontFamily: 'Eurostile Bold', hover: true });
}

function initClickableTableTR() {
	$('tr', '#result-list').click(function() {
		var href = $(this).find("a").attr("href");
		if(href) {
			window.location = href;
		}
	});
}

function initCloseFancybox() {
	$('#inline').click(function(){
	  $.fn.fancybox.close();
	});
}

function initAddItemToCart() {
	$('a.modal').click(function() {
		var currentNum = parseFloat($('#numQuoteCart').text()) + 1;

		$('#numQuoteCart').text(currentNum);		
	});
}

function initMotorMatchForm() {
  var $voltageElement = $('#voltage'),
    $phaseElement = $('#phase'),
    $speedElement = $('#speed'),
    $motorTypeElement = $('#motor_type');

  $('.performance').click(function() {
    if($(this).val() == 0) {
      $speedElement.attr("disabled",false);
      $("#speed_label").empty().append("Speed ( <i style='color:green;'>required</i> )");
      $("#torque").attr("disabled",false);
      $("#torque_label").empty().append("Torque ( <i style='color:green;'>required</i> )");
      $("#power").attr("disabled",true);
      $("#power_label").empty().append("Power");
    }
    if($(this).val() == 1) {
      $speedElement.attr("disabled",false);
      $("#speed_label").empty().append("Speed ( <i style='color:green;'>required</i> )");
      $("#torque").attr("disabled",true);
      $("#torque_label").empty().append("Torque");
      $("#power").attr("disabled",false);
      $("#power_label").empty().append("Power ( <i style='color:green;'>required</i> )");
    }
    if($(this).val() == 2) {
      $speedElement.attr("disabled",true);
      $("#speed_label").empty().append("Speed");
      $("#torque").attr("disabled",false);
      $("#torque_label").empty().append("Torque ( <i style='color:green;'>required</i> )");
      $("#power").attr("disabled",false);
      $("#power_label").empty().append("Power ( <i style='color:green;'>required</i> )");
    }
  });

  $motorTypeElement.bind('change', function (e) {
    var selectedValue = $(e.target).val();
    onMotorTypeChange.call(this, selectedValue);
  });

  $voltageElement.bind('change', function(e) {
    var selectedValue = $(e.target).val();
    onVoltageChange.call(this, selectedValue);
  });

  $phaseElement.click(function() {
    if($(this).val() == "3ph 50Hz" || $(this).val() == "3ph 60Hz") {
      if($('#motor_type').val() == 1) {
        updateVoltageOptions([230]);
      }
    }

    if($(this).val() == "1ph 50Hz" && $voltageElement.val() != 115 || $(this).val() == "1ph 60Hz" && $voltageElement.val() != 115) {
      if($('#motor_type').val() == 1) {
        updateVoltageOptions([115, 230]);
      }
    }
  });
}

function updateVoltageOptions(voltageValues) {
  var $voltageElement = $('#voltage'),
    $allOption = $('<option/>').val('All').text('All'),
    $optionsWrapper = $('<select/>'), // Temp wrapper used in place of live DOM
    voltage, voltageOption, i, len;

  $optionsWrapper.append($allOption);

  for (i = 0, len = voltageValues.length; i < len; i++) {
    voltage = voltageValues[i];
    voltageOption = $('<option/>');
    voltageOption.val(voltage).text(voltage);
    $optionsWrapper.append(voltageOption);
  }

  // Update live DOM with wrapper content
  $voltageElement.empty().html($optionsWrapper.html());
}

function updatePhaseOptions(phaseValues) {
  var $phaseElement = $('#phase'),
      $allOption = $('<option/>').val('All').text('All'),
      $optionsWrapper = $('<select/>'), // Temp wrapper used in place of live DOM
      phase, phaseOption, i, len;

  $optionsWrapper.append($allOption);

  for (i = 0, len = phaseValues.length; i < len; i++) {
    phase = phaseValues[i];
    phaseOption = $('<option/>');
    phaseOption.val(phase).text(phase);
    $optionsWrapper.append(phaseOption);
  }

  // Update live DOM with wrapper content
  $phaseElement.empty().html($optionsWrapper.html());
}

function onMotorTypeChange(selectedValue) {
  var $phaseElement = $('#phase'),
    voltageValues = [],
    disablePhase = false;

  switch (selectedValue) {

    // AC Motor
    case "1":
      if($phaseElement.val() == "3ph 50Hz" || $phaseElement.val() == "3ph 60Hz") {
        voltageValues = [230];
			} else {
        voltageValues = [115, 230];
      }
      disablePhase = false;
      break;

    // Brushless DC Motor
    case "23":
      voltageValues = [24, 163];
      disablePhase = true;
      break;

    // DC Motor
    case "2":
      voltageValues = [12, 24, 90, 115, 130, 180];
      disablePhase = true;
      break;
    default:
    // Do nothing
  }

  updateVoltageOptions(voltageValues);

  if ($phaseElement.length > 0) {
    $phaseElement.attr('disabled', disablePhase);
  }
}

function onVoltageChange(selectedValue) {
  var phaseValues = [];

  if(selectedValue == 115 && $motorTypeElement.val() == 1) {
    phaseValues = ['1ph 50Hz', '1ph 60Hz'];
  } else {
    phaseValues = ['1ph 50Hz', '1ph 60Hz', '3ph 50Hz', '3ph 60Hz'];
  }

  updatePhaseOptions(phaseValues);
}

// slideshow init
function initSlideShow() {
	$('div.promo').fadeGallery({
		slideElements:'.slides > li',
		pagerLinks:'.switcher-holder ul>li',
		autoRotation:true,
		switchTime:5000,
		duration:700
	});
}


// slideshow plugin
$.fn.fadeGallery = function(options){
	var _options = $.extend({
		slideElements:'div.slideset > div',
		pagerLinks:'div.pager a',
		btnNext:'a.next',
		btnPrev:'a.prev',
		btnPlayPause:'a.play-pause',
		btnPlay:'a.play',
		btnPause:'a.pause',
		pausedClass:'paused',
		disabledClass: 'disabled',
		playClass:'playing',
		activeClass:'active',
		loadingClass:'ajax-loading',
		loadedClass:'slide-loaded',
		dynamicImageLoad:false,
		dynamicImageLoadAttr:'alt',
		currentNum:false,
		allNum:false,
		startSlide:null,
		noCircle:false,
		pauseOnHover:true,
		autoRotation:false,
		autoHeight:false,
		onBeforeFade:false,
		onAfterFade:false,
		onChange:false,
		disableWhileAnimating:false,
		switchTime:3000,
		duration:650,
		event:'click'
	}, options);

	return this.each(function(){
		// gallery options
		if(this.slideshowInit) return; else this.slideshowInit;
		var _this = $(this);
		var _slides = $(_options.slideElements, _this);
		var _pagerLinks = $(_options.pagerLinks, _this);
		var _btnPrev = $(_options.btnPrev, _this);
		var _btnNext = $(_options.btnNext, _this);
		var _btnPlayPause = $(_options.btnPlayPause, _this);
		var _btnPause = $(_options.btnPause, _this);
		var _btnPlay = $(_options.btnPlay, _this);
		var _pauseOnHover = _options.pauseOnHover;
		var _dynamicImageLoad = _options.dynamicImageLoad;
		var _dynamicImageLoadAttr = _options.dynamicImageLoadAttr;
		var _autoRotation = _options.autoRotation;
		var _activeClass = _options.activeClass;
		var _loadingClass = _options.loadingClass;
		var _loadedClass = _options.loadedClass;
		var _disabledClass = _options.disabledClass;
		var _pausedClass = _options.pausedClass;
		var _playClass = _options.playClass;
		var _autoHeight = _options.autoHeight;
		var _duration = _options.duration;
		var _switchTime = _options.switchTime;
		var _controlEvent = _options.event;
		var _currentNum = (_options.currentNum ? $(_options.currentNum, _this) : false);
		var _allNum = (_options.allNum ? $(_options.allNum, _this) : false);
		var _startSlide = _options.startSlide;
		var _noCycle = _options.noCircle;
		var _onChange = _options.onChange;
		var _onBeforeFade = _options.onBeforeFade;
		var _onAfterFade = _options.onAfterFade;
		var _disableWhileAnimating = _options.disableWhileAnimating;

		// gallery init
		var _anim = false;
		var _hover = false;
		var _prevIndex = 0;
		var _currentIndex = 0;
		var _slideCount = _slides.length;
		var _timer;
		if(_slideCount < 2) return;

		_prevIndex = _slides.index(_slides.filter('.'+_activeClass));
		if(_prevIndex < 0) _prevIndex = _currentIndex = 0;
		else _currentIndex = _prevIndex;
		if(_startSlide != null) {
			if(_startSlide == 'random') _prevIndex = _currentIndex = Math.floor(Math.random()*_slideCount);
			else _prevIndex = _currentIndex = parseInt(_startSlide);
		}
		_slides.hide().eq(_currentIndex).show();
		if(_autoRotation) _this.removeClass(_pausedClass).addClass(_playClass);
		else _this.removeClass(_playClass).addClass(_pausedClass);

		// gallery control
		if(_btnPrev.length) {
			_btnPrev.bind(_controlEvent,function(){
				prevSlide();
				return false;
			});
		}
		if(_btnNext.length) {
			_btnNext.bind(_controlEvent,function(){
				nextSlide();
				return false;
			});
		}
		if(_pagerLinks.length) {
			_pagerLinks.each(function(_ind){
				$(this).bind(_controlEvent,function(){
					if(_currentIndex != _ind) {
						if(_disableWhileAnimating && _anim) return;
						_prevIndex = _currentIndex;
						_currentIndex = _ind;
						switchSlide();
					}
					return false;
				});
			});
		}

		// play pause section
		if(_btnPlayPause.length) {
			_btnPlayPause.bind(_controlEvent,function(){
				if(_this.hasClass(_pausedClass)) {
					_this.removeClass(_pausedClass).addClass(_playClass);
					_autoRotation = true;
					autoSlide();
				} else {
					_autoRotation = false;
					if(_timer) clearTimeout(_timer);
					_this.removeClass(_playClass).addClass(_pausedClass);
				}
				return false;
			});
		}
		if(_btnPlay.length) {
			_btnPlay.bind(_controlEvent,function(){
				_this.removeClass(_pausedClass).addClass(_playClass);
				_autoRotation = true;
				autoSlide();
				return false;
			});
		}
		if(_btnPause.length) {
			_btnPause.bind(_controlEvent,function(){
				_autoRotation = false;
				if(_timer) clearTimeout(_timer);
				_this.removeClass(_playClass).addClass(_pausedClass);
				return false;
			});
		}

		// dynamic image loading (swap from ATTRIBUTE)
		function loadSlide(slide) {
			if(!slide.hasClass(_loadingClass) && !slide.hasClass(_loadedClass)) {
				var images = slide.find(_dynamicImageLoad) // pass selector here
				var imagesCount = images.length;
				if(imagesCount) {
					slide.addClass(_loadingClass);
					images.each(function(){
						var img = this;
						img.onload = function(){
							img.loaded = true;
							img.onload = null;
							setTimeout(reCalc,_duration);
						};
						img.setAttribute('src', img.getAttribute(_dynamicImageLoadAttr));
						img.setAttribute(_dynamicImageLoadAttr,'');
					}).css({opacity:0});

					function reCalc() {
						var cnt = 0;
						images.each(function(){
							if(this.loaded) cnt++;
						});
						if(cnt == imagesCount) {
							slide.removeClass(_loadingClass);
							images.animate({opacity:1},{duration:_duration,complete:function(){
								if($.browser.msie && $.browser.version < 9) $(this).css({opacity:'auto'})
							}});
							slide.addClass(_loadedClass)
						}
					}
				}
			}
		}

		// gallery animation
		function prevSlide() {
			if(_disableWhileAnimating && _anim) return;
			_prevIndex = _currentIndex;
			if(_currentIndex > 0) _currentIndex--;
			else {
				if(_noCycle) return;
				else _currentIndex = _slideCount-1;
			}
			switchSlide();
		}
		function nextSlide() {
			if(_disableWhileAnimating && _anim) return;
			_prevIndex = _currentIndex;
			if(_currentIndex < _slideCount-1) _currentIndex++;
			else {
				if(_noCycle) return;
				else _currentIndex = 0;
			}
			switchSlide();
		}
		function refreshStatus() {
			if(_dynamicImageLoad) loadSlide(_slides.eq(_currentIndex));
			if(_pagerLinks.length) _pagerLinks.removeClass(_activeClass).eq(_currentIndex).addClass(_activeClass);
			if(_currentNum) _currentNum.text(_currentIndex+1);
			if(_allNum) _allNum.text(_slideCount);
			_slides.eq(_prevIndex).removeClass(_activeClass);
			_slides.eq(_currentIndex).addClass(_activeClass);
			if(_noCycle) {
				if(_btnPrev.length) {
					if(_currentIndex == 0) _btnPrev.addClass(_disabledClass);
					else _btnPrev.removeClass(_disabledClass);
				}
				if(_btnNext.length) {
					if(_currentIndex == _slideCount-1) _btnNext.addClass(_disabledClass);
					else _btnNext.removeClass(_disabledClass);
				}
			}
			if(typeof _onChange === 'function') {
				_onChange(_this, _slides, _prevIndex, _currentIndex);
			}
		}
		function switchSlide() {
			_anim = true;
			if(typeof _onBeforeFade === 'function') _onBeforeFade(_this, _slides, _prevIndex, _currentIndex);
			_slides.eq(_prevIndex).stop(true, true).fadeOut(_duration,function(){
				_anim = false;
			});
			_slides.eq(_currentIndex).stop(true, true).fadeIn(_duration,function(){
				if(typeof _onAfterFade === 'function') _onAfterFade(_this, _slides, _prevIndex, _currentIndex);
			});
			if(_autoHeight) _slides.eq(_currentIndex).parent().animate({height:_slides.eq(_currentIndex).outerHeight(true)},{duration:_duration,queue:false});
			refreshStatus();
			autoSlide();
		}

		// autoslide function
		function autoSlide() {
			if(!_autoRotation || _hover) return;
			if(_timer) clearTimeout(_timer);
			_timer = setTimeout(nextSlide,_switchTime+_duration);
		}
		if(_pauseOnHover) {
			_this.hover(function(){
				_hover = true;
				if(_timer) clearTimeout(_timer);
			},function(){
				_hover = false;
				autoSlide();
			});
		}
		refreshStatus();
		autoSlide();
	});
};

function initPage() {
	clearFormFields({
		clearInputs: true,
		clearTextareas: true,
		passwordFieldText: true,
		addClassFocus: "focus",
		filterClass: "default"
	});
}

function clearFormFields(o) {
	if (o.clearInputs == null) o.clearInputs = true;
	if (o.clearTextareas == null) o.clearTextareas = true;
	if (o.passwordFieldText == null) o.passwordFieldText = false;
	if (o.addClassFocus == null) o.addClassFocus = false;
	if (!o.filter) o.filter = "default";
	if(o.clearInputs) {
		var inputs = document.getElementsByTagName("input");
		for (var i = 0; i < inputs.length; i++ ) {
			if((inputs[i].type == "text" || inputs[i].type == "password") && inputs[i].className.indexOf(o.filterClass)) {
				inputs[i].valueHtml = inputs[i].value;
				inputs[i].onfocus = function ()	{
					if(this.valueHtml == this.value) this.value = "";
					if(this.fake) {
						inputsSwap(this, this.previousSibling);
						this.previousSibling.focus();
					}
					if(o.addClassFocus && !this.fake) {
						this.className += " " + o.addClassFocus;
						this.parentNode.className += " parent-" + o.addClassFocus;
					}
				};
				inputs[i].onblur = function () {
					if(this.value == "") {
						this.value = this.valueHtml;
						if(o.passwordFieldText && this.type == "password") inputsSwap(this, this.nextSibling);
					}
					if(o.addClassFocus) {
						this.className = this.className.replace(o.addClassFocus, "");
						this.parentNode.className = this.parentNode.className.replace("parent-"+o.addClassFocus, "");
					}
				};
				if(o.passwordFieldText && inputs[i].type == "password") {
					var fakeInput = document.createElement("input");
					fakeInput.type = "text";
					fakeInput.value = inputs[i].value;
					fakeInput.className = inputs[i].className;
					fakeInput.fake = true;
					inputs[i].parentNode.insertBefore(fakeInput, inputs[i].nextSibling);
					inputsSwap(inputs[i], null);
				}
			}
		}
	}
	if(o.clearTextareas) {
		var textareas = document.getElementsByTagName("textarea");
		for(i=0; i<textareas.length; i++) {
			if(textareas[i].className.indexOf(o.filterClass)) {
				textareas[i].valueHtml = textareas[i].value;
				textareas[i].onfocus = function() {
					if(this.value == this.valueHtml) this.value = "";
					if(o.addClassFocus) {
						this.className += " " + o.addClassFocus;
						this.parentNode.className += " parent-" + o.addClassFocus;
					}
				};
				textareas[i].onblur = function() {
					if(this.value == "") this.value = this.valueHtml;
					if(o.addClassFocus) {
						this.className = this.className.replace(o.addClassFocus, "");
						this.parentNode.className = this.parentNode.className.replace("parent-"+o.addClassFocus, "");
					}
				}
			}
		}
	}
	function inputsSwap(el, el2) {
		if(el) el.style.display = "none";
		if(el2) el2.style.display = "inline";
	}
}
