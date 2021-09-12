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
    min_interval: 10,
    onFinish: function(data) {

      var speedData = $.deparam($('#results-list').attr('data-parameters'));
      
      speedData.speed_from = data.from;
      speedData.speed_to = data.to;

    	loadMotorData($.param(speedData));
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
    min_interval: 10,
    onFinish: function(data) {
      
      var torqueData = $.deparam($('#results-list').attr('data-parameters'));
      
      torqueData.torque_from = data.from;
      torqueData.torque_to = data.to;

      loadMotorData($.param(torqueData));
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
    min_interval: 10,
    onFinish: function(data) {

      var powerData = $.deparam($('#results-list').attr('data-parameters'));
      
      powerData.power_from = data.from;
      powerData.power_to = data.to;

      loadMotorData($.param(powerData));
    }
	});

  loadMotorData($('#results-list').data('parameters'), true);

  $('#results-list').on('click', 'a.norefresh', function(e) {
    e.preventDefault();

    loadMotorData($(this).attr('href').replace('?', ''));

  });

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

        console.log("FUNCTIONS");

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

        // if(chosenSlider == "speed") {
        //   power_data.update({ from: power_min, to: power_max });
        //   torque_data.update({ from: torque_min, to: torque_max });
        // } else if(chosenSlider == "power") {
        //   speed_data.update({ from: speed_min, to: speed_max });
        //   torque_data.update({ from: torque_min, to: torque_max });
        // } else {
        //   speed_data.update({ from: speed_min, to: speed_max });
        //   power_data.update({ from: power_min, to: power_max });
        // }

        speed_data.update({ from: speed_min, to: speed_max });
        torque_data.update({ from: torque_min, to: torque_max });
        power_data.update({ from: power_min, to: power_max });

        //speed_data.update({ from: speed_selected_min, to: speed_selected_max });
      
        results_list.attr('data-parameters', data);
        results_list.append('<div class="loading"></div>');
        $('.loading').fadeOut(1500);
      }
    })  
  }

  $('.dominant-parameter').click(function() {

    var power_data = power.data("ionRangeSlider"),
        speed_data = speed.data("ionRangeSlider"),
        torque_data = torque.data("ionRangeSlider");
    
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
    } else if(chosenSlider == "power") {
        torque_data.update({ disable: true });
        speed_data.update({ disable: true });
    } else {
        speed_data.update({ disable: true });
        power_data.update({ disable: true });
    }
  })

  $('.voltage-parameter').click(function() {
      
      var voltageData = $.deparam($('#results-list').attr('data-parameters'));
      var voltageValue = $(this).attr('value');
      $('.voltage-parameter').removeClass('selected');

      if(voltageValue !== '0') {
        $('.voltage-all').removeClass('selected');
        //voltageData.voltage = $(this).attr('value');
        $(this).addClass("selected");

        var voltageArray = [];

        $(".voltage-parameter.selected").each(function(index, element) {
          voltageArray[index] = $(element).attr('value');
        });

        voltageData.voltage = voltageArray.join("|");
      } else {
        $('.voltage-all').addClass('selected');
        voltageData.voltage = 0;
      }
      
      loadMotorData($.param(voltageData));    
  })

  $('.phase-parameter').click(function() {
      
      var data = $.deparam($('#results-list').attr('data-parameters'));
      $("button.phase-parameter").removeClass('selected');

      if($(this).attr('value') != 0) {
          $("button.phase-all").removeClass("selected");
          $(this).addClass("selected");

          data.phase = $(this).attr('value');
      } else {
          $("button.phase-parameter").removeClass('selected');
          $(this).addClass("selected");

          data.phase = 0;
      }

      loadMotorData($.param(data));
  })