'use strict';

(function ($) {

  var $select = $('.calenderNavi_item select');
  var $prevBtn = $('.calenderNavi_item.prev');
  var $nextBtn = $('.calenderNavi_item.next');
  var index = 0;

  //Vue.js 参考
  //https://jp.vuejs.org/guide/
  //http://qiita.com/hosomichi/items/3faf74b7141081731a75
  //http://phiary.me/vue-js-tutorial-try/
  //http://dotinstall.com/lessons/basic_vuejs
  /* -----------------------------------------------------------------------
  ## Vue.jsの設定 ##########################################################
  ----------------------------------------------------------------------- */
  //el = Vue.jsで監視する範囲
  var schedulesVm = new Vue({
    el: '#calenderArea',
    data: {
      schedule: [],
      select: [],
      year: [],
	  month: [],
      nextstage: []
    }
  });
  //$watch()で値を監視し、セットされた後にfunction内を実行。
  schedulesVm.$watch('schedule', function () {
    //カレンダーのセルの高さを合わせる。
    $('.calender_body li').heightLine({ minWidth: 640 });
  }, { deep: true });

  /* -----------------------------------------------------------------------
  ## ajaxの設定 ############################################################
  ----------------------------------------------------------------------- */
  var slug = getSlug();
  var d, next, list;

  /* ################# カレンダー用 ################# */
  $.ajax({
    // url: '/wp-content/themes/gear/php/calender.php',
    url: '/_wp/wp-content/themes/gear/php/calender.php',
    type: 'POST'
  }).done(function (data) {
    d = JSON.parse(data); //calender.phpからJSONを取得
	//getSelectItem(d.slugs); //月選択用セレクトボックス用データをschedulesVm.selectにセット
    getSelectItem(d.calList); //月選択用セレクトボックス用データをschedulesVm.selectにセット(変更：slugs⇒calList)
    getSchedule(d.scheduleList, slug); //schedulesVmのdata.scheduleに各月のデータをセット
    getScheduleYear(d.year); //schedulesVmのdata.monthに何月なのかをセット
	getScheduleMonth(d.month); //schedulesVmのdata.monthに何月なのかをセット
    setPrevNextBtn(d.calList); //ボタンの挙動をセット
	
	$('.calenderNavi, .calenderWrapper , .calendarBtn').fadeIn(800); //セレクトボックスのエリアとスケジュール表をフェードイン	
    $('.loader').fadeOut(800, function () {
      //ローダーをフェードアウト後クラスを削除
      $('.loading').removeClass('loading');
    });
	
  }).fail(function (e) {
    console.error(e);
  });

  /* ################# NEXT STAGE用 ################# */
  $.ajax({
    // url: '/wp-content/themes/gear/php/cast_schedule.php',
    url: '/_wp/wp-content/themes/gear/php/cast_schedule.php',
    type: 'POST',
    data: { 'item': 'nextStage' } //cast_schedule.phpからnextStageだけを返してもらう
  }).done(function (data) {
    next = JSON.parse(data); //cast_schedule.phpからJSONを取得
    getNextStage(next); //次回の公演日時とキャストをschedulesVmのdata.nextstageにセット	
  }).fail(function (e) {
    console.error(e);
  });

  /* -----------------------------------------------------------------------
  ## 関数群 ################################################################
  ----------------------------------------------------------------------- */
  function getSelectItem(data) {
    //年月のスラッグリストを受け取って、schedulesVm.selectにセットする。
    $.each(data, function (key, val) {
      schedulesVm.select.push(val);
    });
  }

  function getSchedule(data, slug) {
    //スケジュールのデータ(data)を受け取って、月単位でschedulesVm.scheduleにセットする。
    //URLにクエリをセットすることで(ex.http://***/***.html?date=201606)、その月だけを取得可能。
     var flag = false;
    if (slug === '') {
      //slugの値が空の場合
      $.each(data, function (key, val) {
        //data(=各月のデータ)をeachで回す。
        if (val !== '' && flag === false) {
          //各月のデータが空ではない場合、一月ずつschedulesVm.scheduleにプッシュする。
          schedulesVm.schedule.push(val);
          flag = true;
        } else if (val === '' && flag === false) {
          //各月のデータが空の場合、schedulesVm.scheduleに{nodata: ''}をプッシュし、データがない旨のメッセージを入れる。
          schedulesVm.schedule.push({ nodata: '' });
          schedulesVm.schedule[0].nodata = '表示できるデータはありません。';
          flag = true;
        }
      });
    } else {
      //slugの値が空ではない場合
      $.each(data, function (key, val) {
        //キャストスケジュールのデータをeachで回す。
        if (key === slug) {
          //key=年月とslug=年月が一致した場合
          if (val !== '') {
            //スケジュールデータがあればschedulesVm.scheduleにセット。
            schedulesVm.schedule.push(val);
          } else {
            //スケジュールデータがなければschedulesVm.scheduleに{nodata: ''}をセットしてメッセージを追加。
            schedulesVm.schedule.push({ nodata: '' });
            schedulesVm.schedule[0].nodata = '表示できるデータはありません。';
          }
        }
      });
    }
  }
  function getScheduleMonth(data) {
    //データとして用意されている月の配列をschedulesVm.monthにセットする。
    $.each(data, function (key, val) {
      schedulesVm.month.push(zeroPad(val));
    });
  }
  function getScheduleYear(data) {
    //データとして用意されている月の配列をschedulesVm.monthにセットする。
    $.each(data, function (key, val) {
      schedulesVm.year.push(val);
    });
  }
  function getNextStage(data) {
    //次回の公演データ(data)を受け取って、schedulesVm.nextstageにセットする。
    var month = data.date.replace(/([0-9]{4})\.([0-9]{2})\.([0-9]{2})/, '$2'); //日付から月を取得
    var day = data.date.replace(/([0-9]{4})\.([0-9]{2})\.([0-9]{2})/, '$3'); //日付から日を取得
    var date = parseInt(month, 10) + '.' + day; //取得した月日をドットでつなぐ
    data.date = date;
    schedulesVm.nextstage = data;
  }
  function getSlug() {
    //URLをチェックして、特定の月だけを表示させるクエリ(ex.http://***/***.html?date=201606)がセットされていたらその値を返す。
    var query = location.search;
    var slug;
    if (query === '') {
      //クエリがない場合は空文字を返す。
      slug = '';
    } else {
      //クエリがある場合はsplit()を使って分割していく。
      query = query.split('?')[1].split('#')[0].split('&');
      query.forEach(function (val) {
        var v = val.split('=');
        //dateという値があれば、そのペアになってる値を返す。
        if (v[0] === 'date') {
          slug = v[1];
        }
      });
    }
    return slug;
  }
  function zeroPad(num) {
    //一桁の数字にゼロ詰めをして二桁にする。
    return ('0' + num).slice(-2);
  }

  function setPrevNextBtn(calList) {
    //「前の月へ」「次の月へ」のボタンの挙動
    var max = calList.length - 1;
    var currentVal, currentIndex;
    switchBtn(index, max);

    //「前の月へ」のボタンをおした時
    $prevBtn.on('click', function (e) {
      e.preventDefault();
      getCurrentIndex();
      if (currentIndex !== 0) {
        index = currentIndex - 1;
        switchBtn(index, max);
        schedulesVm.schedule = [];
        schedulesVm.month = [];
		schedulesVm.year = [];
        schedulesVm.schedule.push(d.scheduleList[calList[index]]);
        schedulesVm.month.push(zeroPad(d.month[index]));
		schedulesVm.year.push(d.year[index]);
        $select.val(calList[index]);
      }
    });

    //「次の月へ」のボタンをおした時
    $nextBtn.on('click', function (e) {
      e.preventDefault();
      getCurrentIndex();
      if (currentIndex !== max) {
        index = currentIndex + 1;
        switchBtn(index, max);
        schedulesVm.schedule = [];
        schedulesVm.month = [];
		schedulesVm.year = [];
        schedulesVm.schedule.push(d.scheduleList[calList[index]]);
        schedulesVm.month.push(zeroPad(d.month[index]));
		schedulesVm.year.push(d.year[index]);
        $select.val(calList[index]);
      }
    });

    function getCurrentIndex() {
      currentVal = $select.val();
      $.each(calList, function (key, val) {
        if (val === currentVal) {
          currentIndex = key;
        }
      });
    }
  }

  //「前の月へ」「次の月へ」のボタンの表示・非表示
  function switchBtn(index, max) {
    //現在選択しているselectボックスのインデックスが0か最大値かによってボタンの表示・非表示を切り替える。
    if (index === 0) {
      $prevBtn.removeClass('show').addClass('hide');
    } else {
      $prevBtn.removeClass('hide').addClass('show');
    }
    if (index === max) {
      $nextBtn.removeClass('show').addClass('hide');
    } else {
      $nextBtn.removeClass('hide').addClass('show');
    }
  }

  /* -----------------------------------------------------------------------
  ## イベントの設定 ########################################################
  ----------------------------------------------------------------------- */
  $('.calenderNavi_item select').on('change', function () {
    //年月のセレクトボックスを変更すると実行される。
    var slug = $(this).val(); //選択した年月を取得
    var currentIndex;
    $.each(d.calList, function (key, val) {
      if (val === slug) {
        currentIndex = key;
      }
    });

    schedulesVm.schedule = []; //schedulesVm.scheduleを一旦空にする。
    schedulesVm.month = []; //schedulesVm.scheduleを一旦空にする。
	schedulesVm.year = []; //schedulesVm.scheduleを一旦空にする。
    schedulesVm.month.push(zeroPad(d.month[currentIndex])); //空にした後、選択している月のデータをschedulesVm.scheduleにセット。
	schedulesVm.year.push(d.year[currentIndex]); //空にした後、選択している月のデータをschedulesVm.scheduleにセット。
    schedulesVm.schedule.push(d.scheduleList[slug]); //空にした後、選択している月のデータをschedulesVm.scheduleにセット。
    switchBtn(currentIndex, d.calList.length - 1); //「前の月」「次の月」のボタンの挙動をセット
  });
}).call(undefined, jQuery);



//項目のアコーディオン
$(function test(){	
	var tw = $(window).innerWidth();		 
	//768pxより小さいと実行
	if (tw <= 768) { 
		$("#ticket .ad").css("display","none");
		$("#ticket .contentsTitle").on("click", function() {
			$(this).next(".ad").slideToggle();
			$(this).toggleClass("open");
		});
	} else if ( tw >= 769 ) { //PC
		$('#ticket .ad').css('display','block');
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
			$("#ticket .ad").css("display","none");
			$("#ticket .contentsTitle").off("click"); //重複イベント削除
			$("#ticket .contentsTitle").on("click", function() {
				$(this).next(".ad").slideToggle();
				$(this).toggleClass("open");
			});
		} else if ( tw >= 769 ) { //PC
			$('#ticket .ad').css('display','block');
			$('#ticket .contentsTitle').off('click'); //重複イベント削除
		}
	}, 100);			
});