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
	if (gear.isPc()) {
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
		
		//カスタムスクロールバー
		/*$("html").niceScroll({
			scrollspeed: 100,
			mousescrollstep: 100,
			cursoropacitymin: 1,
			cursorborderradius: 0,
			autohidemod: false,
			zindex: 10100,
			background: 'rgba(255,255,255,.5)',
			cursorwidth: '10px'
		});*/
	}
	

 /* -----------------------------------------------------------------------
 ## News ticker ###########################################################
 -----------------------------------------------------------------------
	$('.newsList_item').show();
	$('.newsList').liScroll(); */

	/* -----------------------------------------------------------------------
 ## Slider ################################################################
 ----------------------------------------------------------------------- */
	$('#about .contentsSlider, #event .contentsSlider, #ticket .contentsSlider').slick({
		dots: true,
		infinite: false,
		speed: 750,
		easing: 'easeOutCirc'
	});
	$('#mainVisual .news ul').slick({
		infinite: false,
		speed: 750,
		easing: 'easeOutCirc'
	});
	
	
	/* -----------------------------------------------------------------------
 ## 格納 #############################################################
 ----------------------------------------------------------------------- */
	function kakunou() {
		if (gear.isWide()) {
			//画面幅が769以上の時、クリックで開くアコーディオンをやめて、ホバーで開くアコーディオンをセット
			//accordion();
		} else {
			//画面幅が768以下の時、ホバーで開くアコーディオンをやめて、クリックで開くアコーディオンをセット
			accordion();
		}
	}
	
	function accordion() {
		$(".closeArea").hide();

		$(".slick-next, .slick-prev").on("click", function() {
			$(".closeArea").hide();
			$(".characterBox .breakin").addClass('close');
			$(".closeBtn").removeClass("open");
		});
		
		$(".closeBtn").on("click", function() {
			$(this).siblings(".closeArea").fadeToggle("fast"); //兄弟要素の.closeAreaに適用
			$(this).toggleClass("open");
			$(this).siblings(".breakin").toggleClass("close");
		});
	}
	


	/* -----------------------------------------------------------------------
 ## accordion #############################################################
 ----------------------------------------------------------------------- */
	function setAccordion() {
		if (gear.isWide()) {
			//画面幅が769以上の時、クリックで開くアコーディオンをやめて、ホバーで開くアコーディオンをセット
			destroyAccordion();
			setHoverAccordion();
		} else {
			//画面幅が768以下の時、ホバーで開くアコーディオンをやめて、クリックで開くアコーディオンをセット
			destroyAccordion();
			setClickAccordion();
		}
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
	function setClickAccordion() {
		//クリックで開くアコーディオン
		$characterBoxItem.on('click', function () {
			if ($(this).hasClass('active')) {
				$characterBoxItem.removeClass('active');
				$characterBoxItem.removeClass('inactive');
			} else {
				$characterBoxItem.removeClass('active');
				$characterBoxItem.removeClass('inactive');
				$(this).addClass('active');
				$characterBoxItem.not(this).addClass('inactive');
			}
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
 ## Resize event ##########################################################
 -----------------------------------------------------------------------*/
	function resizeEvent() {
		if (gear.isNarrow()) {
			//画面幅が768以下の場合
			// スマホ用FAQアコーディオンのセット 
			$('.faqList_answer').hide();
			$('.faqList_question').not('noAction').on('click', function (e) {
				e.preventDefault();
				var $this = $(this);
				if ($this.hasClass('open')) {
					$this.removeClass('open').next().stop(true, true).slideUp();
				} else {
					$this.addClass('open').next().stop(true, true).slideDown();
				}
			});
			//mapWrapperの高さをリサイズ 
			$('.mapWrapper').height($('.mapWrapper').width());
		} else {
			//画面幅が769以上の場合
			//PC用FAQアコーディオンの解除 
			$('.faqList_answer').show();
			$('.faqList_question').off('click');
		}
	}
	$win.on('resize', $.throttle(600, function () {
		//画面をリサイズした時の処理
		resizeEvent();
		setAccordion();
	})); 

	function init() {
		//初期処理
		resizeEvent();
		setAccordion();
		kakunou();
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
 ## Scroll to News ############################################################
 ----------------------------------------------------------------------- */
$(".scroll span").click(function() {
	var HtmlBody = $("html,body");
	HtmlBody.animate({ scrollTop: $("#news").offset().top }, 888,'swing'); 
});
