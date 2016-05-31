/***************** jQuery Scroll up function ******************/

$(function () {
  jQuery.scrollUp({
    scrollName: 'scrollUp', // Element ID
    topDistance: '300', // Distance from top before showing element (px)
    topSpeed: 300, // Speed back to top (ms)
    animation: 'fade', // Fade, slide, none
    animationInSpeed: 200, // Animation in speed (ms)
    animationOutSpeed: 200, // Animation out speed (ms)
    scrollText: '', // Text for element
    activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
  });
});

/***************** Old browsers warning message ******************/

var $oldBrowserMessage = $('<!--[if lt IE 9]><h2 style="text-align:center; font-size: 42px;">Warning. This website requires a safe and up-to-date internet browser.</h2><p style="padding: 50px; text-align:center; font-size: 36px;">Your internet browser is out of date and may be unsafe.<br />Please visit <a href="http://browsehappy.com">browsehappy.com</a> to upgrade your browser with one of the latest versions.</a></p><![endif]-->');

$("main").prepend($oldBrowserMessage);


/***************** Waypoints on Homepage ******************/
/*
$(document).ready(function() {

	$('.wp1').waypoint(function() {
		$('.wp1').addClass('animated fadeInLeft');
	}, {
		offset: '75%'
	});
	$('.wp2').waypoint(function() {
		$('.wp2').addClass('animated fadeInUp');
	}, {
		offset: '75%'
	});
	$('.wp3').waypoint(function() {
		$('.wp3').addClass('animated zoomIn');
	}, {
		offset: '75%'
	});
	$('.wp4').waypoint(function() {
		$('.wp4').addClass('animated fadeInLeft');
	}, {
		offset: '75%'
	});
	$('.wp5').waypoint(function() {
		$('.wp5').addClass('animated fadeInUp');
	}, {
		offset: '75%'
	});
	$('.wp6').waypoint(function() {
		$('.wp6').addClass('animated bounceInLeft');
	}, {
		offset: '75%'
	});
	$('.wp7').waypoint(function() {
		$('.wp7').addClass('animated fadeInUp');
	}, {
		offset: '75%'
	});
	$('.wp8').waypoint(function() {
		$('.wp8').addClass('animated zoomIn');
	}, {
		offset: '75%'
	});

});
*/