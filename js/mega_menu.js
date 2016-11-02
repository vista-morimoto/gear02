// JavaScript Document
$(document).ready(function () {

    "use strict";
    //子のulを持ったliをチェックしてトグルアイコンの為のclass付与
    $('.gNavi > ul > li:has( > ul)').addClass('menu-dropdown-icon');

    $('.gNavi > ul > li > ul:not(:has(ul))').addClass('normal-sub');

    //ウィンドウサイズをチェックしてスマフォ用とデスクトップ用にトグル
    // $(".gNavi > ul").before("<a href=\"#\" class=\"menu-mobile\">ナビゲーション</a>");
    // $(".gNavi > ul > li:first-child").before("<li class=\"gNaviList_item pc_none\"><a href=\"/\" class=\"ani-reverseBtn\"><span>HOME</span></a></li>");
   
   $(document).ready(function() {
	   if ($(window).width() > 943) {
	//グローバルナビの設定
	$('.gNavi > ul > li').on({
	'mouseenter': function(){
		$(this).children("div.gNaviList_ul_box").stop(true, true).fadeToggle(150);
		$(this).children("a").addClass("gNaviList_ul_box_hover");
	},
	'mouseleave': function(){
		$(this).children("div.gNaviList_ul_box").fadeOut("fast");
		$(this).children("a").removeClass("gNaviList_ul_box_hover");
	}
	});
	} 
	});
   
	/* $(".gNavi > ul > li").hover(function (e) {
        if ($(window).width() > 943) {
            $(this).children("div.gNaviList_ul_box").stop(true, false).fadeToggle(150);
            e.preventDefault();
        }
    });
    $("div.gNaviList_ul_box").hover(function (e) {
        if ($(window).width() > 943) {
            $(this).prev().toggleClass("gNaviList_ul_box_hover");
        }
    }); */

    $(".gNavi > ul > li").click(function (e) {
        if ($(window).width() <= 943) {
             $(this).children("div.gNaviList_ul_box").slideToggle();
             e.preventDefault();
             $(this).toggleClass('open');
        }
    });

    $(".gNavi > ul > li > div > ul > li").click(function (e) {
        if ($(window).width() <= 943) {
	           var href = jQuery(this).attr("href");
               location.href = href;
               e.stopPropagation();
        }
    });

    $(".gNavi-mobile").click(function (e) {
        $(".gNavi > ul").toggleClass('show-on-mobile');
        e.preventDefault();
    });


    // $('div.gNaviList_ul_box').hover().prev().css("border-bottom", "3px dotted #ff0000");

});