$(document).ready(function() {

	//// range slider
	var speed = $('#narrow-search #speed'),
		torque = $('#narrow-search #torque'),
		power = $('#narrow-search #power');

	speed.ionRangeSlider({
		min: 0,
		max: 100,
		from: 0,
		to: 100,
		type: 'double',
		prefix: "",
		grid: false,
		grid_num: 10,
		onFinish: function (data) {

			var speedData = $.deparam($('#results-list').attr('data-parameters'));

			speedData.speed_from = data.from;
      		speedData.speed_to = data.to;

      		loadMotorData($.param(speedData)).then(function(data) {
      			resetSliders($.param(speedData), 'speed');
      		});
		}
	});

	torque.ionRangeSlider({
		min: 0,
		max: 40,
		from: 0,
		to: 40,
		type: 'double',
		prefix: "",
		grid: false,
		grid_num: 10,
		step: 0.1,
		disable: true,
		onFinish: function (data) {

			var torqueData = $.deparam($('#results-list').attr('data-parameters'));

			torqueData.torque_from = data.from;
      		torqueData.torque_to = data.to;

      		loadMotorData($.param(torqueData)).then(function(data) {
      			resetSliders($.param(torqueData), 'torque');
      		});
		}
	});

	power.ionRangeSlider({
		min: 5,
		max: 80,
		from: 5,
		to: 80,
		type: 'double',
		prefix: "",
		grid: false,
		grid_num: 10,
		step: 0.005,
		disable: true,
		onFinish: function (data) {

			var powerData = $.deparam($('#results-list').attr('data-parameters'));

			powerData.power_from = data.from;
      		powerData.power_to = data.to;

      		loadMotorData($.param(powerData)).then(function(data) {
      			resetSliders($.param(powerData), 'power');
      		});			
		}
	});

    var power_data = power.data("ionRangeSlider"),
        speed_data = speed.data("ionRangeSlider"),
        torque_data = torque.data("ionRangeSlider");

	// loadMotorData($('#results-list').data('parameters'), true).then(function() {
	// 	resetSliders($('#results-list').data('parameters'));
	// });

    $.when(loadMotorData($('#results-list').data('parameters'))).then(
    	function(data) {
    		resetSliders(data, true);
		}
	);

	$('#results-list').on('click', 'a.norefresh', function(e) {
		e.preventDefault();

		loadMotorData($(this).attr('href').replace('?', ''));
	});

	$(".motor-select-dominate").click(function() {
		
		$(".motor-select-dominate").removeClass('selected');
		$(this).addClass("selected");

		var chosenSlider = $(this).attr("value");

		if(chosenSlider == "speed") {
            power_data.update({ disable: true });
            torque_data.update({ disable: true });
            speed_data.update({ disable: false });
            $('#power-dropdown, #torque-dropdown').prop('disabled', true);
        } else if(chosenSlider == "power") {
            torque_data.update({ disable: true });
            speed_data.update({ disable: true });
            power_data.update({ disable: false });
            $('#torque-dropdown, #speed-dropdown').prop('disabled', true);
        } else {
            speed_data.update({ disable: true });
            power_data.update({ disable: true });
            torque_data.update({ disable: false });
            $('#speed-dropdown, #power-dropdown').prop('disabled', true);
        }
	});

	$(".motor-select-phase").click(function() {

		var data = $.deparam($('#results-list').attr('data-parameters'));
		
		$(".motor-select-phase").removeClass('selected');
		$(this).addClass("selected");

		var buttonValue = $(this).attr("value");

		if($(this).attr('value') == "all") {
            data.phase = 0;
        } else {
            data.phase = $(this).attr('value');
        }

		loadMotorData($.param(data)).done(function() {
			resetSliders();
		});
	});

	$(".motor-select-voltage").click(function() {

		var data = $.deparam($('#results-list').attr('data-parameters'));
		var buttonValue = $(this).attr("value");
		var motorValue = $(".motor-select.selected").attr("value");
		
		$(".motor-select-voltage").removeClass('selected');
		$(this).addClass("selected");

		if(motorValue == "ac") {
			$("button.motor-select-phase").prop('disabled', false).removeClass("selected");
			$("button.motor-select-phase-all").addClass("selected");
		}

		if(buttonValue == 115 && motorValue == "ac") {
			$(".motor-select-phase").prop('disabled', true).removeClass("selected");
			$(".160-phase").prop('disabled', false).addClass("selected");
		}

		if(buttonValue == 230 && motorValue == "ac") {
			$(".motor-select-phase-dc").prop('disabled', true).removeClass("selected");
		}

		if($(this).attr('value') == "all") {
            data.voltage = 0;
        } else {
            var voltageArray = [];

            $(".motor-select-voltage.selected").each(function(index, element) {
                voltageArray[index] = $(element).attr('value');
            });

            data.voltage = voltageArray.join("|");
        }

		loadMotorData($.param(data)).then(function() {
			resetSliders($.param(data), true);
		});
	});

	$(".gearbox-select").click(function() {

		var data = $.deparam($('#results-list').attr('data-parameters'));
		
		$(".gearbox-select").removeClass('selected');
		$(this).addClass("selected");

		var buttonValue = $(this).attr("value");

		filterMotors();
	});

	$(".motor-select").click(function() {

		var data = $.deparam($('#results-list').attr('data-parameters'));
		
		$(".motor-select").removeClass('selected');
		$(this).addClass("selected");

		var buttonValue = $(this).attr("value");

		$("button.motor-select-phase").prop('disabled', true).removeClass("selected");

        if($("button.motor-select-dominate.selected").length == 0) {
            $("button.motor-select-dominate").first().addClass("selected");
            speed_data.update({ disable: false });
            $("button.motor-select-dominate, button.gearbox-select").prop('disabled', false);
            $("button.motor-select-voltage-all").addClass("selected");
        }

        if($("button.gearbox-select.selected").length == 0) {
            $("button.gearbox-select").first().addClass("selected");
        }

		if(buttonValue == "ac") {
            $("button.motor-select-phase-dc, button.motor-select-voltage").prop('disabled', true).removeClass("selected");
            $("button.motor-select-voltage").removeClass("selected");
            $("button.motor-select-phase, button.motor-select-voltage-all, button.voltage-115, button.voltage-230").prop('disabled', false);
			$("button.motor-select-voltage-all, button.motor-select-phase-all").addClass("selected");
		} else if(buttonValue == "dc") {
			$("button.motor-select-voltage").prop('disabled', false);
            $("button.voltage-163, button.voltage-230").prop('disabled', true).removeClass("selected");
            $("button.motor-select-phase-dc").prop('disabled', false).addClass("selected");
		} else if(buttonValue == "brushless") {
			$("button.motor-select-voltage").prop('disabled', true).removeClass("selected");
            $("button.motor-select-voltage-all, button.voltage-24, button.voltage-163").prop('disabled', false);
            $("button.motor-select-phase-dc").prop('disabled', false).addClass("selected");
            $("button.motor-select-voltage-all").addClass("selected");
		} else if(buttonValue == "all") {
			$("button.motor-select-voltage, button.motor-select-phase").prop('disabled', false);
            $("button.motor-select-phase-all").addClass("selected");
		} else {
			$("button.gearbox-select, button.motor-select-voltage, button.motor-select-phase, button.motor-select-dominate, #speed-dropdown, #torque-dropdown, #power-dropdown").prop('disabled', true).removeClass("selected");
            speed_data.update({ disable: true });
            power_data.update({ disable: true });
            torque_data.update({ disable: true });
		}

		if($("button.motor-select-voltage.selected").length == 0 && buttonValue != "universal") {
            $("button.motor-select-voltage-all").addClass("selected");
        }

		filterMotors();
	});

	function filterMotors() {

        var data = $.deparam($('#results-list').attr('data-parameters'));

        var motor_select = $('button.motor-select.selected').attr('value');
        var gearbox_select = $('button.gearbox-select.selected').attr('value');

        var motor_id = 0;
        var gearbox_id = 0;

        switch(motor_select) {
        	case "dc":
        		motor_id = [2];
        		break;
        	case "ac":
        		motor_id = [1];
        		break;
        	case "brushless":
        		motor_id = [23];
        		break;
        	default:
        		motor_id = [1,2,23];
        }

        switch(gearbox_select) {
        	case "motor_only":
        		gearbox_id = 0;
        		break;
        	case "planetary":
        		if(motor_id == 2) {
                    gearbox_id = [7];
                } else if(motor_id == 1) {
                    gearbox_id = [6];
                } else if(motor_id == 23) {
                    gearbox_id = [24];
                } else {
                    gearbox_id = [7, 6, 24];
                }
        		break;
        	case "parallel_shaft":
        		if(motor_id == 2) {
                    gearbox_id = [8];
                } else if(motor_id == 1) {
                    gearbox_id = [18];
                } else if(motor_id == 23) {
                    gearbox_id = [25];
                } else {
                    gearbox_id = [8, 18, 25];
                }
        		break;
        	case "right_angle":
        		if(motor_id == 2) {
                    gearbox_id = [3];
                } else if(motor_id == 1) {
                    gearbox_id = [12];
                } else if(motor_id == 23) {
                    gearbox_id = [26];
                } else {
                    gearbox_id = [3, 12, 26];
                }
        		break;
        	case "right_angle_planetary":
        		if(motor_id == 2) {
                    gearbox_id = [14];
                } else if(motor_id == 1) {
                    gearbox_id = [11];
                } else if(motor_id == 23) {
                    gearbox_id = [27];
                } else {
                    gearbox_id = [14, 11, 27];
                }
        		break;
        	case "all":
        		if(motor_id == 2) {
                    gearbox_id = [7, 8, 3, 14];
                } else if(motor_id == 1) {
                    gearbox_id = [6, 18, 12, 11];
                } else if(motor_id == 23) {
                    gearbox_id = [24, 25, 26, 27];
                } else {
                    gearbox_id = [7, 6, 24, 8, 18, 25, 3, 12, 26, 14, 11, 27];
                }
        		break;
        	default:
        		gearbox_id = 0;
        }

        if(gearbox_id != 0) {
            data.ids = gearbox_id.join("|");
        } else {
            data.ids = motor_id.join("|");
        }

        data = $.param(data);
		
		$.when(resetData(data)).then(function(data) {
			loadMotorData(data).then(function(data) {
				resetSliders(data, true);
			});
		});
	}

	function resetData(data) {

		var deferred = $.Deferred();
			data = $.deparam(data);

		if(data.hasOwnProperty('speed_from')) {
			delete data.speed_from;
		}

		if(data.hasOwnProperty('speed_to')) {
			delete data.speed_to;
		}

		if(data.hasOwnProperty('torque_from')) {
			delete data.torque_from;
		}

		if(data.hasOwnProperty('torque_to')) {
			delete data.torque_to;
		}

		if(data.hasOwnProperty('power_from')) {
			delete data.power_from;
		}

		if(data.hasOwnProperty('power_to')) {
			delete data.power_to;
		}

		if(data.hasOwnProperty('voltage')) {
			delete data.voltage;
		}

		if(data.hasOwnProperty('phase')) {
			delete data.phase;
		}

		data = $.param(data);

		$('#results-list').attr('data-parameters', data);

		deferred.resolve(data);

		return deferred.promise();
	}

	function resetSliders(data, attribute) {

		var deferred = $.Deferred();

		var speed_min = $('#speed-slider').data('speedMin'),
			speed_selected_min = $('#speed-slider').data('speedSelectedMin'),
			speed_max = $('#speed-slider').data('speedMax'),
			speed_selected_max = $('#speed-slider').data('speedSelectedMax'),
			torque_min = $('#torque-slider').data('torqueMin'),
			torque_selected_min = $('#torque-slider').data('torqueSelectedMin'),
			torque_max = $('#torque-slider').data('torqueMax'),
			torque_selected_max = $('#torque-slider').data('torqueSelectedMax'),
			power_min = $('#power-slider').data('powerMin'),
			power_selected_min = $('#power-slider').data('powerSelectedMin'),
			power_max = $('#power-slider').data('powerMax'),
			power_selected_max = $('#power-slider').data('powerSelectedMax');

		if(attribute == 'speed') {
			torque_data.update({
			  from: torque_selected_min,
			  to: torque_selected_max
			});

			power_data.update({
			  from: power_selected_min,
			  to: power_selected_max
			});
		} else if(attribute == 'torque') {
			speed_data.update({
			  from: speed_selected_min,
			  to: speed_selected_max
			});

			power_data.update({
			  from: power_selected_min,
			  to: power_selected_max
			});
		} else if(attribute == 'power') {
			speed_data.update({
			  from: speed_selected_min,
			  to: speed_selected_max
			});

			torque_data.update({
			  from: torque_selected_min,
			  to: torque_selected_max
			});
		} else {
			if (speed_data) {
				speed_data.update({
				  min: speed_min,
				  max: speed_max,
				  from: speed_min,
				  to: speed_max
				});
			}

			if (torque_data) {
				torque_data.update({
				  min: torque_min,
				  max: torque_max,
				  from: torque_min,
				  to: torque_max
				});
			}

			if (power_data) {
				power_data.update({
				  min: power_min,
				  max: power_max,
				  from: power_min,
				  to: power_max
				});
			}
		}

    deferred.resolve();

    return deferred.promise();
	}

	function loadMotorData(data) {

		var deferred = $.Deferred();
	    
		var url = $('#results-list').data('url');

		if (url) {
	    $.ajax({
	      type: 'GET',
	      url: url + '/template-parts/content-table.php',
	      data: data,
	      cache: false,
	      beforeSend: function() {
	        $('#results-list').append('<div class="loading"></div>');
	        $('.loading').fadeIn(1500);
	      },
	      success: function(res) {

	      	var results_list = $('#results-list');

	        results_list.html(res);

	        results_list.attr('data-parameters', data);
	        results_list.append('<div class="loading"></div>');

	        //history.pushState({}, null, "?" + data);
	      },
	      complete: function() {

	      	deferred.resolve(data);
	      	$('.loading').fadeOut(1500);
	      }
			});

	  }

		return deferred.promise();
	}
});