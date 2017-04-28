'use strict';

(function (win, doc, $) {
	"use strict";

	var gear = win.GEAR; //script.jsで設定
	var $win = $(win);
	var $doc = $(doc);
	var $body = $('body');
	var $characterBoxItem = $('.characterBox > div');

	/* -----------------------------------------------------------------------
 ## Load event ############################################################
 ----------------------------------------------------------------------- */
		//PCの場合
		//スムーススクロールのみ
		$("body").niceScroll({
			scrollspeed: 35,
			mousescrollstep: 35,
		});
		//読み込み時に画像フェードイン表示
		$(window).load(function() {
			$(".parallax-mirror").fadeIn(500);
		});

	/* -----------------------------------------------------------------------
 ## Slider ################################################################
 ----------------------------------------------------------------------- */
	// $('#about .contentsSlider').slick({
	// 	autoplay: false,
	// 	dots: false,
	// 	infinite: false,
	// 	speed: 750,
	// 	easing: 'easeOutCirc'
	//
	// });
	$('#contentsTab .contentsSlider').slick({
    autoplay: false,
    autoplaySpeed: 2000,
    arrows: false,
	swipe: false,
    asNavFor: '#contentsTabNav'
	});
	$('#contentsTabNav').slick({
    slidesToShow: 6,
		slidesToScroll: 1,
    focusOnSelect: true,
		asNavFor: '#contentsTab .contentsSlider'
	});
	
	$(window).load(function () {
		$(function() {
				 var imgBox = $('#mainVisualSlide');
				 var fadeSpeed = 1500;
				 var switchDelay = 6000;
				 imgBox.find('div').hide();
				 imgBox.find('div:first').stop().fadeIn(fadeSpeed);
				 setInterval(function(){
						 imgBox.find('div:first-child').fadeOut(fadeSpeed)
						 .next('div').fadeIn(fadeSpeed)
						 .end().appendTo(imgBox);
				 },switchDelay);
		 });
	 });


	/* -----------------------------------------------------------------------
 ## accordion #############################################################
 ----------------------------------------------------------------------- */
	function setAccordion() {
			destroyAccordion();
			setHoverAccordion();
	}
	function setHoverAccordion() {
		//ホバーで開くアコーディオン
		$characterBoxItem.on('mouseenter', function () {
			$characterBoxItem.not(this).addClass('inactive');
			$(this).addClass('active');
		});
		$characterBoxItem.on('mouseleave', function () {
			$characterBoxItem.removeClass('inactive');
			$(this).removeClass('active');
		});
	}
	function destroyAccordion() {
		//登録されているアコーディオン用のイベントを全削除
		$characterBoxItem.off('click');
		$characterBoxItem.off('mouseenter');
		$characterBoxItem.off('mouseleave');
	}

	/* -----------------------------------------------------------------------
 ## Twitter ##########################################################
 -----------------------------------------------------------------------*/
 	function getTwTimeline() {
    //ツイッターのタイムラインを取得してリストに渡す
    //本番と開発環境でパスが違うので注意
    $.ajax({
      url: '/_wp/wp-content/themes/gear/php/tw.php',
      type: 'GET'
    }).done(function (data) {
      var tweet = JSON.parse(data);
      var $twList = $('.twList');
      var li;
      var fragment = document.createDocumentFragment();
      $.each(tweet, function (num, val) {
        //ツイートを一件ずつliに入れていく
        li = document.createElement('li');
        li.setAttribute('class', 'twList_item');
        li.innerHTML = val;
        fragment.appendChild(li);
      });
      $twList.append(fragment); //li要素のグループをラッパータグに追加
      //$('.twTicker').ticker(); tickerを実行する（jquery.ticker.min.js）
      // $('.twTicker .twList').marquee({pauseOnHover:true,pauseSpeed:5000,scrollSpeed:5000});
      $('.twTicker .twList').marquee({
      //speed in milliseconds of the marquee
      duration: 20000,
      //gap in pixels between the tickers
      gap: 0,
      //time in milliseconds before the marquee will start animating
      delayBeforeStart: 0,
      //'left' or 'right'
      direction: 'left',
      //true or false - should the marquee be duplicated to show an effect of continues flow
      duplicated: true
  	});

	if (win.GEAR.isNarrow()) {	 $('.twTicker .twList').marquee({ duration: 12000}); }

	}).fail(function (e) {
      console.error(e);
    });
  }

	/* -----------------------------------------------------------------------
 ## init ##########################################################
 -----------------------------------------------------------------------*/

	function init() {
		//初期処理
		setAccordion();
		getTwTimeline();
	}
	init();
}).call(undefined, window, document, jQuery);

/* -----------------------------------------------------------------------
 ## Youtube ############################################################
 ----------------------------------------------------------------------- */
$(function($){
	$('#video').click(function() {
		$("#video").html('<iframe width="853" height="480" id="player" src="//www.youtube.com/embed/PqHt1qCzY44?rel=0&autoplay=1&showinfo=0" frameborder="0" allowfullscreen></iframe>');
	});
	$('a#btn-close-modal').click(function() {
		$("#video").html('<div id="play_button"><span>PLAY MOVIE</span></div>');
	});
});

/* -----------------------------------------------------------------------
 ## Scroll ############################################################
 ----------------------------------------------------------------------- */
$(function() {
    var scrollBtn = $('.scroll span');
    //スクロールが100に達したらボタン表示
    $(window).scroll(function () {
        if ($(this).scrollTop() < 50) {
            scrollBtn.fadeIn();
        } else {
            scrollBtn.fadeOut();
        }
    });
});


/* -----------------------------------------------------------------------
 ## コメント順次スライド ############################################################
 ----------------------------------------------------------------------- */

$(window).load(function(){
	$('#comment').css({ 'opacity':1,'visibility':'visible' });
	$(function() {
	    var leftBig = $('#leftBig');
			var commentTxt = $('#commentTxt');
			var rightBig = $('#rightBig');
			var rightbottomBig = $('#rightbottomBig');
			var righttop = $('#righttop');
			var rightbottom = $('#rightbottom');
			var righttopSmall = $('#righttopSmall');
			var rightbottomSmall = $('#rightbottomSmall');
			var fadeSpeed = 2000;



			// function fadeSlide(parent,switchDelay) {
		  //   parent.find('li').hide();
		  //   parent.find('li:first').stop().fadeIn(fadeSpeed);
			//
		  //   setInterval(function(){
		  //       parent.find('li:first-child').fadeOut(fadeSpeed)
		  //       .next('li').fadeIn(fadeSpeed)
		  //       .end().appendTo(parent);
		  //   },switchDelay);
			// }
			//
			// leftBig.slick({
			// 	autoplaySpeed: 2000,
			// 	autoplay:true,
			// 	arrows: false,
			// 	swipe: false,
			// 	fade: true
			// 	});


		  leftBig.slick({
					autoplay:true,
					autoplaySpeed: 4219,
			    arrows: false,
					swipe: false,
					fade: true,
					speed: 4000
				});
			rightBig.slick({
					autoplay:true,
				 autoplaySpeed: 8013,
				 arrows: false,
				 swipe: false,
				 fade: true,
				 speed: 4000
			 });
		 rightbottomBig.slick({
			 	autoplay:true,
				autoplaySpeed: 12000,
				arrows: false,
				swipe: false,
				fade: true,
				speed: 4000
			});
			righttop.slick({
					autoplay:true,
				 autoplaySpeed: 9087,
				 arrows: false,
				 swipe: false,
				 fade: true,
				 speed: 4000
			 });
			 rightbottom.slick({
				 	autoplay:true,
					autoplaySpeed: 10513,
					arrows: false,
					swipe: false,
					fade: true,
					speed: 4000
				});
			righttopSmall.slick({
					autoplay:true,
				 autoplaySpeed: 5029,
				 arrows: false,
				 swipe: false,
				 fade: true,
				 speed: 4000
			 });
			 rightbottomSmall.slick({
				 	autoplay:true,
					autoplaySpeed: 6013,
					arrows: false,
					swipe: false,
					fade: true,
					speed: 4000
				});

			// なるべく切り替えのタイミングがが重複しないように端数をいれる
			// fadeSlide(leftBig,4219);
			// fadeSlide(rightBig,8013);
			// fadeSlide(rightbottomBig,12000);
			// fadeSlide(righttop,9087);
			// fadeSlide(rightbottom,10513);
			// fadeSlide(righttopSmall,5029);
			// fadeSlide(rightbottomSmall,6013);

			commentTxt.find('p').hide();
				 commentTxt.find('p:first').stop().fadeIn(fadeSpeed);

				 setInterval(function(){
						 commentTxt.find('p:first-child').fadeOut(fadeSpeed)
						 .next('p').fadeIn(fadeSpeed)
						 .end().appendTo(commentTxt);
			},7013);
	});
});

  /* PCの場合は不要なので、フッターアコーディオンの解除 */
$('.footerNavi_list').show();
$('.footerNavi_title').off('click').removeClass('open');
$('.footerNavi_box').heightLine('refresh');
