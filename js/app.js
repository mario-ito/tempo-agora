jQuery(function($){

	var auto;

	var autocomplete = new google.maps.places.Autocomplete($('#city')[0], { types: ['(cities)'] });

	google.maps.event.addListener(autocomplete, 'place_changed', function () {
		IsplaceChange = true;

		var place = $('#city').val();
		var api_url = '//api.openweathermap.org/data/2.5/weather?q='+place+'&units=metric&lang=pt&APPID=c7934f7af2357d326c99af17980bd7d7';

		clearWeatherInfo();
		$('#weather').css('display','block').addClass('preloader');
		autocenter();

		$.ajax({
			type: 'get',
			url: api_url,
			dataType: 'json',
			success: function(d){
				if (d.hasOwnProperty('weather')) {
					weatherInfo(d, place);
				} else {
					clearWeatherInfo()
					$('#weather h3').html('Cidade não encontrada');
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {
				clearWeatherInfo()
				$('#weather h3').html('Cidade não encontrada');
				console.log(jqXHR);
				console.log(textStatus);
				console.log(errorThrown);
			}
		});

		$('#city').val('');
	});

	function weatherInfo(d, place) {
		$('#weather').removeClass('preloader');
		var icon = '<img src="http://openweathermap.org/img/w/'+d.weather[0].icon+'.png" />';
		$('#weather h3').html(place);
		$('#icon').html(icon);
		$('#description').html(d.weather[0].description);
		$('#temperature').html(d.main.temp + '&deg;C');
		autocenter();
	}

	function clearWeatherInfo(){
		$('#weather').removeClass('preloader');
		$('#weather h3').empty();
		$('#icon').empty();
		$('#description').empty();
		$('#temperature').empty();
	}

	function autocenter() {
		var h = $('#container').height();
		var n = Math.round( $('body').height()/2 - h/2 );
		$('#container').css('margin-top', n+'px');
	}

	$.when( autocenter() ).done(function() {
       $('#container').css('opacity', '1');
	});

	window.addEventListener("resize", autocenter);

});
