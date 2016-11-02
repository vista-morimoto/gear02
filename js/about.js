'use strict';

(function (win, doc, $) {
	"use strict";

	var gear = win.GEAR;
	var $win = $(win);
	var $doc = $(doc);
	var $body = $('body');

	/* -----------------------------------------------------------------------
 ## Cast page #############################################################
 ----------------------------------------------------------------------- */
	if (location.pathname === '/about/cast/') {
		$('.js-castGenre').not('.mime').hide();
		$('.categoryWrapper').height($('.mime').height());
		$('.genreNavi_item a').on('click', function (e) {
			e.preventDefault();
			var target = $(this).attr('href').replace('#', '');
			var $target = $('.' + target);
			$('.genreNavi_item').removeClass('active');
			$(this).addClass('active');
			$('.js-castGenre').velocity({ opacity: 0 }, { duration: 600, display: 'none', complete: function complete() {
					$target.velocity({ opacity: 1 }, { easing: 'ease-out', duration: 600, display: 'block' });
					$('.categoryWrapper').height($target.height());
				} });
		});
	}

	/* -----------------------------------------------------------------------
 ## Staff page ############################################################
 ----------------------------------------------------------------------- */
	if (location.pathname === '/about/staff/') {
		var target;
		$(".openModal").on('click', function (e) {
			target = $(this).data('name');
		});
		$(".openModal").animatedModal({
			modalTarget: 'staffDetails',
			animatedIn: 'fadeInRight',
			animatedOut: 'fadeOutLeft',
			color: 'rgba(0,0,0,.85)',
			beforeOpen: function beforeOpen() {
				$('#' + target).show();
			},
			afterClose: function afterClose() {
				$('#' + target).hide();
			}
		});
		$('#staffDetails').on('click', function (e) {
			if (e.target.tagName.toLowerCase() === 'aside') $('.close-staffDetails').click();
		});
	}
	


	/* -----------------------------------------------------------------------
 ## Slider ################################################################
 ----------------------------------------------------------------------- */
	$('#aboutGear .contentsSlider').slick({
		infinite: false,
		speed: 750,
		easing: 'easeOutCirc',
		dots: true,
	});
}).call(undefined, window, document, jQuery);


	/* -----------------------------------------------------------------------
 ## Youtube ################################################################
 ----------------------------------------------------------------------- */
$(function($){
	$('#video').click(function() {
		$("#video").html('<iframe width="560" height="315" id="player" src="//www.youtube.com/embed/PqHt1qCzY44?rel=0&autoplay=1&showinfo=0" frameborder="0" allowfullscreen></iframe>');
	});
	$('a#btn-close-modal').click(function() {
		$("#video").html('<div id="play_button"><span>PLAY MOVIE</span></div>');
	});
});


	/* -----------------------------------------------------------------------
 ## About page ################################################################
 ----------------------------------------------------------------------- */
//GEAR回転
$(function() {
	//rotation_01
	$('.rotation_01').on('inview', function(event, isInView) {
		// 要素がウィンドウの表示領域に現れたときに実行する処理
		setTimeout(function(){
			var style = '<link rel="stylesheet" href="/_wp/wp-content/themes/gear/css/rotation_01.css">';
			$('head link:last').after(style);
		},1000);
	});
	//rotation_02
	$('.rotation_02').on('inview', function(event, isInView) {
		setTimeout(function(){
			var style = '<link rel="stylesheet" href="/_wp/wp-content/themes/gear/css/rotation_02.css">';
			$('head link:last').after(style);
		},500);
	});
	//rotation_03
	$('.rotation_03').on('inview', function(event, isInView) {
		setTimeout(function(){
			var style = '<link rel="stylesheet" href="/_wp/wp-content/themes/gear/css/rotation_03.css">';
			$('head link:last').after(style);
		},1500);
	});
	//rotation_04
	$('.rotation_04').on('inview', function(event, isInView) {
		setTimeout(function(){
			var style = '<link rel="stylesheet" href="/_wp/wp-content/themes/gear/css/rotation_04.css">';
			$('head link:last').after(style);
		},1000);
	});
});