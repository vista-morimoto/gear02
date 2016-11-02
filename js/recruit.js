'use strict';

(function (win, doc, $) {
	"use strict";

	var gear = win.GEAR;
	var $win = $(win);
	var $doc = $(doc);
	var $body = $('body');

	/* -----------------------------------------------------------------------
 ## Slider ################################################################
 ----------------------------------------------------------------------- */
	$('#recruit .contentsSlider').slick({
		speed: 2500,
		//dots: true,
		accessibility: true,
		autoplay: true,
		dots: false,
		fade: true,
		infinite: true,
		autoplaySpeed: 500,
	});
	
	
}).call(undefined, window, document, jQuery);