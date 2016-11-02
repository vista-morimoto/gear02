(function($){

	/* -----------------------------------------------------------------------
	## /ticket ###############################################################
	----------------------------------------------------------------------- */
	//「今後の日程をもっと見る」のアコーディオン
	$('.ticket_schedule .nowon').on('click', function(e){
		e.preventDefault();
		var $accWrapper = $('.accordionWrapper');
		if($accWrapper.hasClass('open')){
			$accWrapper.slideUp().removeClass('open');
			$(this).html('今後の日程をもっと見る <i class="fa fa-chevron-circle-down" aria-hidden="true"></i>');
		} else {
			$accWrapper.slideDown().addClass('open');
			$(this).html('閉じる <i class="fa fa-chevron-circle-up" aria-hidden="true"></i>');
		}
	});
}).call(this, jQuery);

	//「注意事項」のアコーディオン
$(function(){	
			var tw = $(window).innerWidth();				 
			if (tw <= 768) {
				$("#ticket .fee .caution h4").on("click", function() {
						$(this).next().slideToggle();
						$(this).toggleClass("open");
				});
			}
	});
	//リサイズ時
	var tw = $(window).innerWidth(); //横幅取得
	var timer = false;	
	$(window).resize(function() {		
			tw = $(window).innerWidth(); //リサイズの度に横幅再取得
			if (timer !== false) {
				clearTimeout(timer);
			}			
			timer = setTimeout(function() {
				// windowのリサイズ完了時
					if ( tw <= 768 ) { //スマホ
							$('#ticket .caution p').css('display','none');
							$('#ticket .fee h4').off('click'); //重複イベント削除
							$("#ticket .fee .caution h4").on("click", function() {
									$(this).next().slideToggle();
									$(this).toggleClass("open");
							});
					}else if ( tw >= 769 ) { //PC
							$('#ticket .caution p').css('display','block');
							$('#ticket .fee h4').off('click'); //重複イベント削除
					}
			}, 100);			
		});
	
