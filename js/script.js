/* -----------------------------------------------------------------------
## サイト全体のスクリプト ################################################
----------------------------------------------------------------------- */
(function (win, doc, $) {
	"use strict";
	
	var $win = $(win);
	var $doc = $(doc);
	var $body = $('body');
	var $pageHeader = $('.pageHeader');
	var $fixedNav = $('#fixedNav');
	var $gNaviList = $('.gNaviList');
	var $menuBtn = $('.menuBtn');
	var $h1txt = $('h1.siteName');
	var $overlay = $('.overlay');
	var isLayer = $('.underlayerHeader').size(); //.underlayerHeaderがあるかチェック(=下層かどうかチェック)
	var $underlayerHeader = isLayer > 0 ? $('.underlayerHeader') : null; //下層ならjQueryオブジェクトをセット。そうでないならnullをセット。
	var ww = window.innerWidth;
	var fb = $('.fbWrapper').html();
	var gNaviTop = isLayer > 0 ? $('.gNavi').offset().top : 0; //下層ならgNaviのtop位置を取得。そうでないなら0をセット。
	var GEAR = {};

  /* -----------------------------------------------------------------------
  ## SNS ###################################################################
  ----------------------------------------------------------------------- */
  function fbReload() {
    $('.fbWrapper').html(fb);
    window.FB.XFBML.parse();
  } 

	/* -----------------------------------------------------------------------
 ## Global navigation #####################################################
 ----------------------------------------------------------------------- */
  function gNaviSwitch(sctop) {
    //グローバルナビの挙動
    if (sctop > 50) {
      $pageHeader.addClass('on');
			$(".pageHeader.on").fadeIn(1000);
			//$(".pageHeader.on").animate({opacity:"1"}, 2000, "easeInCubic");
			//$(".pageHeader.on").animate({display:"block"}, 2000, "easeInCubic");
    } else {
      $pageHeader.removeClass('on');	
			$(".pageHeader").fadeOut(500);

			//$(".pageHeader.on").css("opacity","0");

    }
}

  function fixedNavSwitch(sctop) {
    //挙動
	
	if (ww <= 768) {
		$('#fixedNav').css({'display': 'none'});
	} else {
		if (sctop > 50) {
			//$pageHeader.addClass('on');
			$fixedNav.fadeIn(1000);
			//$(".pageHeader.on").animate({opacity:"1"}, 2000, "easeInCubic");
			//$(".pageHeader.on").animate({display:"block"}, 2000, "easeInCubic");
		} else {
			//$pageHeader.removeClass('on');	
			$fixedNav.fadeOut(500);
			//$(".pageHeader.on").css("opacity","0");
		}
	}
}



  function underlayerGnavi(sctop) {
    //下層のグローバルナビの挙動
    if (sctop > 66) {
      $underlayerHeader.addClass('float');
    } else {
      $underlayerHeader.removeClass('float');
    }
  }
  function initMobileMenuBtn() {
    //スマホ用のメニューボタンのクリックイベント
    $menuBtn.on('click', function (e) {
      e.preventDefault();
      if ($body.hasClass('onMenu')) {
        //メニューボタンを押した時にbodyのクラスにonMenuがついていた場合
        $win.off('.noScroll'); //スクロール解除
        $body.removeClass('onMenu'); //bodyのクラスからonMenuを削除
        $overlay.fadeOut(); //オーバーレイをフェードアウト
      } else {
          //メニューボタンを押した時にbodyのクラスにonMenuがついていない場合
          $win.on('touchmove.noScroll', function (e) {
            e.preventDefault();
          }); //スクロールを止める
          $body.addClass('onMenu'); //bodyのクラスにonMenuを追加
          $overlay.fadeIn(); //オーバーレイをフェードイン
        }
    });
    $overlay.on('click', function () {
      //オーバーレイをクリックした時、メニューボタンのクリックイベントを実行する
      $menuBtn.trigger('click');
    });
    // リサイズしたら表示位置を再取得
	/* $(window).on('resize', function(){
		modalResize();
	}); */
	
	
	
  }



  $(function(){
      var i = 0;
      while( i < 500) { //modalの数だけ
        i += 1;
        $("#modalOpen_" + i).animatedModal({ 
            modalTarget:'animatedModal_' + i,
            animatedIn:'fadeIn', 
            animatedOut:'fadeOut',
            //color:'#3498db',
        });
      }
     });

    $("#modalOpen_500").click(
    function(){
      $("#animatedModal_500").css("display","");
    }
  );
  

	/* -----------------------------------------------------------------------
 ## Internal link #########################################################
 ----------------------------------------------------------------------- */
  $('a[href^="#"]').not('a[href$="#"]').on('click', function (e) {
    //hrefが#からはじまり、#で終わっていないaタグのクリックイベント
    e.preventDefault();
    if (!$(this).hasClass('noscroll')) {
      //aタグのクラスにnoscrollがついていない場合下記を実行(=noscrollをつけた場合はスムーススクロールしない)
      var target = $(this).attr('href');
      var headerHeight = win.GEAR.isMobile() || win.GEAR.isNarrow() ? 0 : 44; //PC用のレイアウトになってる場合、固定されているグロナビ分スクロール量を増やす。スマホ用のレイアウトは0。
      $(target).velocity('scroll', { duration: 800, easing: 'easeOutQuint', offset: headerHeight * -1 }); //スクロール実行
    }
  });

	/* -----------------------------------------------------------------------
 ## heightLine ############################################################
 ----------------------------------------------------------------------- */
	$('.footerNavi_box').heightLine({
		minWidth: 769
	});
  /* -----------------------------------------------------------------------
  ## accordion ############################################################
  ----------------------------------------------------------------------- */

   $(function(){
				$(".qaBox_list dt").on("click", function() {
            $(this).next().slideToggle();
            $(this).toggleClass("dd_open");
        });	
    });
   
	/* -----------------------------------------------------------------------
 ## Device check ##########################################################
 ----------------------------------------------------------------------- */
  //デバイスをチェックする関数
  function checkDevice() {
    if (is.mobile()) {
      //is.min.jsを使って判断
      $body.attr('data-device', 'mobile'); //モバイルの場合は、data-device属性にmobileをセット
    } else {
        $body.attr('data-device', 'pc'); //PCの場合は、data-device属性にpcをセット
      }
  }
  GEAR.isMobile = function () {
    //GEARにisMobileメソッドを登録。実行するとbodyのdata-deviceをチェックしてマッチすればtrueを返す。
    return $body.attr('data-device') === 'mobile' ? true : false;
  };
  GEAR.isPc = function () {
    //GEARにisPcメソッドを登録。実行するとbodyのdata-deviceをチェックしてマッチすればtrueを返す。
    return $body.attr('data-device') === 'pc' ? true : false;
  };

	/* -----------------------------------------------------------------------
 ## Window size check #####################################################
 ----------------------------------------------------------------------- */
  //画面幅をチェックする関数
  function checkWinWidth(ww) {
    if (ww <= 768) {
      //画面サイズが768以下の場合
      $body.attr('data-winsize', 'narrow'); //data-winsize属性にnarrowをセット
    } else {
        //画面サイズが769以上の場合
        $body.attr('data-winsize', 'wide'); //data-winsize属性にwideをセット
      }
  }
  GEAR.isNarrow = function () {
    //GEARにisNarrowメソッドを登録。実行するとbodyのdata-winsizeをチェックしてマッチすればtrueを返す。
    return $body.attr('data-winsize') === 'narrow' ? true : false;
  };
  GEAR.isWide = function () {
    //GEARにisWideメソッドを登録。実行するとbodyのdata-winsizeをチェックしてマッチすればtrueを返す。
    return $body.attr('data-winsize') === 'wide' ? true : false;
  };

	/* -----------------------------------------------------------------------
 ## Scroll event ##########################################################
 ----------------------------------------------------------------------- */
  function scrollEvent() {
    //スクロールされるたびに実行
    var sctop = $win.scrollTop(); //スクロール距離を取得
    gNaviSwitch(sctop); //gNaviSwitch関数にスクロール距離を渡す
    if (isLayer > 0 && win.GEAR.isPc() && win.GEAR.isWide()) underlayerGnavi(sctop); //PCで画面幅が広い場合、underlayerGnaviにスクロール距離を渡す
    fixedNavSwitch(sctop); //gNaviSwitch関数にスクロール距離を渡す
  };
  $win.on('scroll', scrollEvent);

	/* -----------------------------------------------------------------------
 ## Resize event ##########################################################
 ----------------------------------------------------------------------- */
  function resizeEvent() {
    if (win.GEAR.isNarrow()) {
      /* スマホ用フッターアコーディオンのセット */
      if (!$._data($('.footerNavi_title').get(0)).events) {
        //すでにクリックイベントが設定されているかチェック
        $('.footerNavi_title').removeClass('open');
        $('.footerNavi_list').hide();
        $('.footerNavi_title').not('noAction').on('click', function (e) {
          //クラスにfooterNavi_titleがあり、noActionがついてない場合、アコーディオンの挙動をする(=noActionがついていれば、アコーディオンにならない)
          e.preventDefault();
          var $this = $(this);
          if ($this.hasClass('open')) {
            $this.removeClass('open').next().stop(true, true).slideUp();
          } else {
            $this.addClass('open').next().stop(true, true).slideDown();
          }
        });
      }
    } else {
      /* PCの場合は不要なので、フッターアコーディオンの解除 */
      $('.footerNavi_list').show();
      $('.footerNavi_title').off('click').removeClass('open');
      $('.footerNavi_box').heightLine('refresh');
    }
  }
  $win.on('resize', $.throttle(600, function () {
    //画面幅をリサイズした時に実行する関数。throttleにより、リサイズしている間、600ms毎に実行される。
    ww = $win.innerWidth(); //画面幅取得
    checkWinWidth(ww); //画面幅チェック
    fbReload(); //Facebookのボックスを可変させるため再読み込み
    resizeEvent(); //resizeEvent関数を実行
  }));

	/* -----------------------------------------------------------------------
 ## Initialized ###########################################################
 ----------------------------------------------------------------------- */
  function init() {
    //ページを読み込んだ時に実行する初期処理の関数
    checkDevice();
    checkWinWidth(ww);
    gNaviSwitch($win.scrollTop());
    initMobileMenuBtn();
    //getTwTimeline();
    resizeEvent();
  }
  win.GEAR = GEAR; //windowにGEARを追加し、GEAR(isMobileなどのメソッドを登録したもの)を渡す。
  init(); //初期処理実行
}).call(undefined, window, document, jQuery);


  /* -----------------------------------------------------------------------
  ## ページトップへ戻るボタン ###########################################################
  ----------------------------------------------------------------------- */
$(function() {
    var topBtn = $('#pageTop');    
    topBtn.hide();
    //スクロールが100に達したらボタン表示
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            topBtn.fadeIn();
        } else {
            topBtn.fadeOut();
        }
    });
    //スクロールしてトップ
    topBtn.click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 500);
        return false;
    });
});

  /* -----------------------------------------------------------------------
  ## URL ###########################################################
  ----------------------------------------------------------------------- */
$(function(){
	var url = window.location.pathname;
	$('.gNavi li a[href="'+url+'"]').parent().addClass('current');
});