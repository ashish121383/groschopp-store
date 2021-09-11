$(document).ready(function() {

    var speed = $('#narrow-search #speed'),
        torque = $('#narrow-search #torque'),
        power = $('#narrow-search #power');

    var power_data = power.data("ionRangeSlider"),
        speed_data = speed.data("ionRangeSlider"),
        torque_data = torque.data("ionRangeSlider");

    power_data.update({ disable: true });
    $('#power-dropdown').prop('disabled', true);

    torque_data.update({ disable: true });
    $('#torque-dropdown').prop('disabled', true);

    $(".motor-select-dominate").click(function() {

        $(".motor-select-dominate").removeClass('selected');
        $(".dominate-dropdown").prop('disabled', false);
        $(this).addClass("selected");

        speed_data.update({ disable: false });
        power_data.update({ disable: false });
        torque_data.update({ disable: false });
        
        var chosenSlider = $(this).attr("value");

        if(chosenSlider == "speed") {
            power_data.update({ disable: true });
            torque_data.update({ disable: true });
            $('#power-dropdown').prop('disabled', true);
            $('#torque-dropdown').prop('disabled', true);
        } else if(chosenSlider == "power") {
            torque_data.update({ disable: true });
            speed_data.update({ disable: true });
            $('#torque-dropdown').prop('disabled', true);
            $('#speed-dropdown').prop('disabled', true);
        } else {
            speed_data.update({ disable: true });
            power_data.update({ disable: true });
            $('#speed-dropdown').prop('disabled', true);
            $('#power-dropdown').prop('disabled', true);
        }

        //loadMotorData($('#results-list').data('parameters'));
    });

    $(".motor-select-phase").click(function() {

        var data = $.deparam($('#results-list').attr('data-parameters'));
        $("button.motor-select-phase").removeClass('selected');

        if($(this).attr('value') == "all") {
            $("button.motor-select-phase").removeClass('selected');
            $(this).addClass("selected");

            data.phase = 0;

        } else {
            $("button.motor-select-phase-all").removeClass("selected");
            $(this).addClass("selected");

            data.phase = $(this).attr('value');
        }

        loadMotorData($.param(data));
    });

    $(".motor-select-voltage").click(function() {
        
        var data = $.deparam($('#results-list').attr('data-parameters'));
        $("button.motor-select-voltage").removeClass('selected');

        if($(this).attr('value') == "all") {
            $("button.motor-select-voltage").removeClass('selected');
            $(this).addClass("selected");

            data.voltage = 0;
        } else {
            $("button.motor-select-voltage-all").removeClass("selected");
            $(this).addClass("selected");

            var voltageArray = [];

            $(".motor-select-voltage.selected").each(function(index, element) {
                voltageArray[index] = $(element).attr('value');
            });

            data.voltage = voltageArray.join("|");
        }

        loadMotorData($.param(data));
    });

    $(".motor-select-gearbox").click(function() {
        
        var data = $.deparam($('#results-list').attr('data-parameters'));

        $('button.motor-select-gearbox').removeClass('selected');
        $(this).addClass("selected");

        filterMotors();
    });

    $(".motor-select-motor").click(function() {

        $('button.motor-select-motor').removeClass('selected');
        $(this).addClass("selected");

        var buttonValue = $(this).attr("value");

        $("button.motor-select-phase").prop('disabled', true).removeClass("selected");

        if($("button.motor-select-dominate.selected").length == 0) {
            $("button.motor-select-dominate").prop('disabled', false);
            $("button.motor-select-dominate").first().addClass("selected");
            speed_data.update({ disable: false });
            $("button.motor-select-gearbox").prop('disabled', false);
            $("button.motor-select-voltage-all").addClass("selected");
        }

        if($("button.motor-select-gearbox.selected").length == 0) {
            $("button.motor-select-gearbox").first().addClass("selected");
        }

        if(buttonValue == "ac") {
            $("button.motor-select-phase").prop('disabled', false);
            $("button.motor-select-phase-all").addClass("selected");
            $("button.motor-select-phase-dc").prop('disabled', true).removeClass("selected");
            $("button.motor-select-voltage").removeClass("selected");
            $("button.motor-select-voltage").prop('disabled', true).removeClass("selected");
            $("button.motor-select-voltage-all, button.voltage-115, button.voltage-230").prop('disabled', false);
            $("button.motor-select-voltage-all").addClass("selected");
        } else if(buttonValue == "dc") {
            // 163 230
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
            $("button.motor-select-gearbox, button.motor-select-voltage, button.motor-select-phase, button.motor-select-dominate").prop('disabled', true).removeClass("selected");
            speed_data.update({ disable: true });
            power_data.update({ disable: true });
            torque_data.update({ disable: true });
            $('#speed-dropdown, #torque-dropdown, #power-dropdown').prop('disabled', true);
        }

        var data = $.deparam($('#results-list').attr('data-parameters'));

        filterMotors();
    });


    function filterMotors() {

        var data = $.deparam($('#results-list').attr('data-parameters'));

        var gearbox = $('button.motor-select-gearbox.selected').attr('value');
        var motor = $('button.motor-select-motor.selected').attr('value');

        var motor_id = 0;
        var gearbox_id = 0;

        switch(motor) {
            case "dc":
                motor_id = 2;
                if(data.voltage == 163 || data.voltage == 230) {
                    data.voltage = 0;
                }
                data.phase = 0;
                break;
            case "ac":
                motor_id = 1;
                if(data.voltage != 115 || data.voltage != 230) {
                    data.voltage = 0;
                }
                break;
            case "brushless":
                motor_id = 23;
                if(data.voltage != 24 || data.voltage != 163) {
                    data.voltage = 0;
                }
                data.phase = 0;
                break;
            default:
                motor_id = "1|2|23";
        }

        switch(gearbox) {
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
            data.ids = motor_id;
        }
    
        loadMotorData($.param(data));
    }
    

    function loadMotorData(data, firstload) {

        $.ajax({
          type: 'GET',
          url: $('#results-list').data('url') + '/template-parts/content-table.php',
          data: data,
          cache: false,
          beforeSend: function() {
            $('#results-list').append('<div class="loading"></div>');
            $('.loading').fadeIn(1500);
          },
          success: function(res) {
            $('#results-list').html(res);

            console.log("MOTOR SEARCH");

            var parameterData = $.deparam(data);

            var results_list = $('#results-list'),
                speed_min = $('#speed-slider').data('speedMin'),
                speed_selected_min = $('#speed-slider').data('speedSelectedMin'),
                speed_max = $('#speed-slider').data('speedMax'),
                speed_selected_max = $('#speed-slider').data('speedSelectedMax'),
                speed_data = speed.data("ionRangeSlider"),
                torque_min = $('#torque-slider').data('torqueMin'),
                torque_selected_min = $('#torque-slider').data('torqueSelectedMin'),
                torque_max = $('#torque-slider').data('torqueMax'),
                torque_selected_max = $('#torque-slider').data('torqueSelectedMax'),
                torque_data = torque.data("ionRangeSlider"),
                power_min = $('#power-slider').data('powerMin'),
                power_selected_min = $('#power-slider').data('powerSelectedMin'),
                power_max = $('#power-slider').data('powerMax'),
                power_selected_max = $('#power-slider').data('powerSelectedMax'),
                power_data = power.data("ionRangeSlider");

            speed_data.update({
              min: speed_min,
              max: speed_max,
            });

            torque_data.update({
              min: torque_min,
              max: torque_max,
            });

            power_data.update({
              min: power_min,
              max: power_max,
            });

            var chosenSlider = $(".motor-select-dominate.selected").attr("value");

            // if(chosenSlider == "speed") {
            //   power_data.update({ from: power_selected_min, to: power_selected_max });
            //   torque_data.update({ from: torque_selected_min, to: torque_selected_max });
            // } else if(chosenSlider == "power") {
            //   speed_data.update({ from: speed_selected_min, to: speed_selected_max });
            //   torque_data.update({ from: torque_selected_min, to: torque_selected_max });
            // } else {
            //   speed_data.update({ from: speed_selected_min, to: speed_selected_max });
            //   power_data.update({ from: power_selected_min, to: power_selected_min });
            // }

            if(chosenSlider == "speed") {
              power_data.update({ from: power_min, to: power_max });
              torque_data.update({ from: torque_min, to: torque_max });
            } else if(chosenSlider == "power") {
              speed_data.update({ from: speed_min, to: speed_max });
              torque_data.update({ from: torque_min, to: torque_max });
            } else {
              speed_data.update({ from: speed_min, to: speed_max });
              power_data.update({ from: power_min, to: power_max });
            }
            
            // speed_data.update({ from: speed_min, to: speed_max });
            // torque_data.update({ from: torque_min, to: torque_max });
            // power_data.update({ from: power_min, to: power_max });
            
            console.log("SPEED: " + speed_min, speed_max);
            console.log("POWER: " + power_min, power_max);
            console.log("TORQUE: " + torque_min, torque_max);

            if(firstload) {
              speed_data.update({ from: speed_min, to: speed_max });
            }

            results_list.attr('data-parameters', data);
            results_list.append('<div class="loading"></div>');
            $('.loading').fadeOut(1500);
          }
        })  
    }
});