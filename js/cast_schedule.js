'use strict';

(function ($) {

  var $select = $('.castScheduleNavi_item select');
  var $prevBtn = $('.castScheduleNavi_item.prev');
  var $nextBtn = $('.castScheduleNavi_item.next');
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
    el: '#castScheduleArea',
    data: {
      select: [],
      cast: [],
      schedule: []
    }/* ,
	computed: {
  	filteredItems: function () {
	return this.$options.filters.filterBy(this.schedule[0], this.mime);
	},
	filteredItems2: function () {
	return this.$options.filters.filterBy(this.schedule[0], this.breakin);
	} 	
  }	*/
  });
  
  /* -----------------------------------------------------------------------
  ## ajaxの設定 ############################################################
  ----------------------------------------------------------------------- */
  var slug = getSlug();
  var d;

  //dataを渡すことで、必要なデータだけを取得できる。
  //subは無くても可。subを設定した場合itemは必須。
  //data: {item: 'scheduleList', sub: '201607'}
  //取得できるデータ↓
  //item => slugs,calList(追加), castList, scheduleList, nextStage
  //item:slugs        => 配列が返る
  //item:calList      => 配列が返る
  //item:castList     => sub: mime, breakin, magic, jaggling, dall
  //item:scheduleList => sub: 201606, 201607など年4桁+月2桁の数字。WPのスケジュールで作成した分だけ存在する。
  //item:nextStage    => オブジェクトが返る:
  //本番と開発環境でパスが違うので注意
  $.ajax({
    // url: '/php/cast_schedule.php',
    url: '/_wp/wp-content/themes/gear/php/cast_schedule.php',
    type: 'POST'
  }).done(function (data) {
    //cast_list.phpからJSONデータを取得。
    d = JSON.parse(data);
    //getSelectItem(d.slugs); //月選択用セレクトボックス用データをschedulesVm.selectにセット
	getSelectItem(d.calList); //月選択用セレクトボックス用データをschedulesVm.selectにセット(変更：slugs⇒calList)
    getCastList(d.castList); //キャスト選択用キャストリストデータschedulesVm.castにセット
    getSchedule(d.scheduleList, slug); //キャストスケジュールデータを月ごとにschedulesVm.scheduleにセット
    setPrevNextBtn(d.calList); //ボタンの挙動をセット	
    $('.castScheduleNavi, .castScheduleTable').fadeIn(800); //セレクトボックスのエリアとスケジュール表をフェードイン	
    $('.loader').fadeOut(800, function () {
      //ローダーをフェードアウト後クラスを削除
      $('.loading').removeClass('loading');
    });	
	stimer = setTimeout(function() { accordion_table(); }, 100);  
  }).fail(function (e) {
    console.error(e);
  });

  /* -----------------------------------------------------------------------
  ## functions #############################################################
  ----------------------------------------------------------------------- */
  function getSelectItem(data) {
    //年月のスラッグリストを受け取って、schedulesVm.selectにセットする。
    $.each(data, function (key, val) {
      schedulesVm.select.push(val);
    });
  }

  //キャストリストの取得
  function getCastList(data) {
    //data=キャスト一覧データ
    $.each(data, function (key, val) {
      //キャスト一覧データをジャンルごとにeachで回す。
      schedulesVm.cast.push(key);
      schedulesVm.cast[key] = [];
      //schedulesVm.castにジャンルごとに箱を用意。
      $.each(val, function (i, cast) {
        //各ジャンル内のキャストごとのデータをeachで回してschedulesVm.cast[key]にキャスト名を入れる。
        schedulesVm.cast[key].push(cast.name);
      });
    });
  }

  function getSchedule(data, slug) {
    //data=キャストスケジュールデータ, slug=スラッグ(年月)
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

  function getSlug() {
    //URLをチェックして、特定の月だけを表示させるクエリ(ex.http://***/***.html?date=201606)がセットされていたらその値を返す。
    var query = location.search;
    var slug;
    if (query === '') {
      //クエリがない場合は何も返さない。
      slug = '';
    } else {
      //クエリがある場合はsplit()を使って分割していく。
      query = query.split('?')[1].split('#')[0].split('&');
      query.forEach(function (val) {
        var v = val.split('=');
        if (v[0] === 'date') {
          //dateという値があれば、そのペアになってる値を返す。
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
    //「前の月へ」「次の月へ」のボタンの挙動calender.jsと同じ
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
        schedulesVm.schedule.push(d.scheduleList[calList[index]]);
        $select.val(calList[index]);
		cast_select();
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
        schedulesVm.schedule.push(d.scheduleList[calList[index]]);
        $select.val(calList[index]);
		cast_select();
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
  $('.castScheduleNavi_item select').on('change', function () {
    //年月のセレクトボックスを変更すると実行される。
    var slug = $(this).val(); //選択した年月を取得
    var currentVal = $select.val();
    var currentIndex;
	cast_select();
	accordion_table();
    $.each(d.calList, function (key, val) {
      if (val === currentVal) {
        currentIndex = key;
      }
    });

    schedulesVm.schedule = []; //schedulesVm.scheduleを一旦空にする。
    schedulesVm.schedule.push(d.scheduleList[slug]); //空にした後、選択している月のデータをschedulesVm.scheduleにセット。
    switchBtn(currentIndex, d.calList.length - 1); //「前の月」「次の月」のボタンの挙動をセット
  });

  $('.resetBtn').on('click', function () {
    //リセットボタンを押したらschedulesVm.ジャンルの値を空にする。
    //これにより、filterが解除されます。
	cast_select();
	accordion_table_reset();
    schedulesVm.mime = '';
    schedulesVm.breakin = '';
    schedulesVm.magic = '';
    schedulesVm.jaggling = '';
    schedulesVm.dall = '';
	
	
	
  });
  
  
}).call(undefined, jQuery);

/* -----------------------------------------------------------------------
 ## その他 ###############################################################
 ----------------------------------------------------------------------- */
//キャスト選択
function cast_select() {	
	stimer = setTimeout(function() {
	if( $('table.castScheduleList tbody').hasClass('cast_table') ){
		$('.no_cast').css('display','none');
	} else {
		$('.no_cast').css('display','block');
	}
	}, 100);
	accordion_table_reset();
	stimer = setTimeout(function() { accordion_table(); }, 100);
}

var stimer = false;

//ページが完全にロードされたら実行
$(window).load(function() {
  stimer = setTimeout(function() { accordion_table(); }, 100);  
});

//リサイズ時
$(window).resize(function() {
  if(stimer !== false) { clearTimeout(stimer); }
  stimer = setTimeout(function() { accordion_table(); }, 100);
});

//月選択時
function month_select() {
	stimer = setTimeout(function() { accordion_table(); }, 100);
}

//アコーディオン
function accordion_table() {
  var staffw = $(window).innerWidth(); //リサイズの度に横幅再取得

  //windowのリサイズ完了時。
  if(staffw <= 768) { //スマホ
    $("#castSchedule .castScheduleList .castScheduleAcc th").off("click"); //重複イベント削除
    //$("#castSchedule .castScheduleList .castScheduleAcc td").css("display", "none");
    $("#castSchedule .castScheduleList .castScheduleAcc th").on("click", function() {
      //$(this).siblings("td").css("display", "block");
	  $(this).siblings("td").slideToggle("fast"); //兄弟要素のtdが開く	  
      $(this).parent().toggleClass("open"); //親要素にクラスを付与
	  $(this).siblings("td").css("display", "block");
    });
  }
  else if(staffw > 768) { //PC
    $("#castSchedule .castScheduleList .castScheduleAcc td").css("display", "table-cell");
    $("#castSchedule .castScheduleList .castScheduleAcc th").off("click"); //重複イベント削除
  }
}
function accordion_table_reset() {
	$("#castSchedule .castScheduleList .castScheduleAcc td").css("display", "none");
	$("#castSchedule .castScheduleList .castScheduleAcc").removeClass("open");
}


/* -----------------------------------------------------------------------
 ## アコーディオン ###############################################################
 ----------------------------------------------------------------------- */
	/* $(function(){	
	
	$("#castSchedule .castScheduleList td").css('display','none');
	
			var staffw = $(window).innerWidth();	
			if ( staffw <= 768 ) {
				$("#castSchedule .castScheduleList td").css('display','none');
				$("#castSchedule .castScheduleList th").on("click", function() {
						$(this).siblings("td").slideToggle("fast"); //兄弟要素のtdが開く
						$(this).parent().toggleClass("open"); //親要素にクラスを付与
				});
			}
	});
	
	//リサイズ時		
	var staffw = $(window).innerWidth(); //横幅取得
	var stimer = false;	
	$(window).resize(function() {		
			staffw = $(window).innerWidth(); //リサイズの度に横幅再取得
			if (stimer !== false) {
				clearTimeout(stimer);
			}			
			stimer = setTimeout(function() {
				// windowのリサイズ完了時。
					if ( staffw <= 768 ) { //スマホ
							$('#castSchedule .castScheduleList th').off('click'); //重複イベント削除
							$("#castSchedule .castScheduleList td").css('display','none');
							$("#castSchedule .castScheduleList th").on("click", function() {
									$(this).siblings("td").slideToggle("fast"); //兄弟要素のtdが開く
									$(this).parent().toggleClass("open"); //親要素にクラスを付与
							});
					}else if ( staffw >= 769 ) { //PC
							$('#castSchedule .castScheduleList td').css('display','table-cell');
							$('#castSchedule .castScheduleList th').off('click'); //重複イベント削除
					}
			}, 100);			
		}); */
	