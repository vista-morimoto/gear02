<?php /*Template Name: チケット予約 - TOP */ ?>
<?php 
$description = '京都で出逢える感動エンターテイメント『ギア-GEAR-』の公演スケジュール、チケット（前売・当日）購入方法、料金、空席カレンダー予約に関する注意事項のご案内。';

$cssLink = '
<link rel="stylesheet" href="'.THEME_CSS.'/ticket.css">
<link rel="stylesheet" href="'.THEME_CSS.'/calendar.css">
';
$jsLink_top = '';
$jsLink_btm = '
<script src="'.THEME_JS.'/calender.js"></script>
<script src="'.THEME_JS.'/ticket.js"></script>
';
get_header();
?>

<?php
//最終更新日のチェック
$args = array(/* 配列に複数の引数を追加 */
	'post_type' => 'calenders',
	'posts_per_page' => -1,
	'post_status' => 'publish',
	'paged' => $paged
	);
?>

<?php $the_query = new WP_Query( $args ); ?>
<?php if ( $the_query->have_posts() ) :?>
<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

<?php 
$update = get_the_modified_date('Y-m-d');
if ( strtotime($lastupdate) < strtotime($update)){
	$lastupdate = $update;
}
//echo date('Y年n月j日', strtotime($lastupdate));
?>
<?php endwhile;?>
<?php endif; ?>
<?php wp_reset_postdata(); ?>

<script>
//pagetop
$(function() {
	var topBtn = $('.navi_footer .prev , .navi_footer .next');	
	topBtn.click(function () {
	$('body,html').animate({
	scrollTop: 0
		}, 500);
	return false;
	});
});
</script>
<main class="mainContents ticket">
<article>
<section id="ticket" class="section">

<div id="calenderArea" class="sectionInner">
<h3 class="contentsTitle">公演日程</h3>
<div class="ad">
<ul class="legend pc_none">
<li><span class="haveToSpace">◎</span>余裕があります</li>
<li><span class="noRoom">●</span>少なくなっています</li>
<li><span class="few">▲</span>残りわずか!!</li>
<li><span class="full">×</span>前売完売<span>（当日券は​別途​販売​予定）</span></li>
<li><span class="daytime">■</span>ギアの日割</li>
<li><span class="kids">■</span>キッズデー</li>
</ul>

<ul class="calenderNavi clearfix navi">
	<li class="calenderNavi_item">
	<div class="selectWrapper">
	<select name="" id="">
	<!--  v-forを使ってschedulesVm.selectの値を全て表示。itemはschedulesVm.selectの各値 -->
	<option value="{{slug}}" v-for="item in select">{{item}}</option>
	</select>
	</div>
	</li>

	<li class="calenderNavi_item prev"><a href="#" class="ani-reverseBtn"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> 前の月へ</a></li>
	<li class="calenderNavi_item next"><a href="#" class="ani-reverseBtn">次の月へ <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a></li>
</ul>


<!-- Vue.js のテンプレート機能を使ってカレンダーを表示 -->
<!-- カレンダーをtableではなくolで作っているのは、7日毎の折り返しが厳しいため。 -->
<!-- 100％を7で割ったパーセントをliの幅としfloatを使うことで自動で折り返しています。高さはheightLineで合わせています。 -->
<template v-for="item in schedule"><!-- calender.jsのschedulesVm変数のdata.scheduleをforで回し、1周毎に値をitemに入れる。itemは配列 -->
<div class="calenderWrapper"><!-- v-if="$index == 0"-->
<div class="calender">
<h3 class="calender_month">{{year[$index]}}.{{month[$index]}}</h3>
<!-- itemとは関係なく、calender.jsのschedulesVm変数のdata.month(配列)の値をセット。$indexはv-for="item in schedule"のインデックス。 -->
<ol class="calender_head clearfix">
	<li>月</li><li>火</li><li>水</li><li>木</li><li>金</li><li class="sat">土</li><li class="sun">日</li>
</ol>
<ol class="calender_body clearfix">
<!-- Vue.js のテンプレート入れ子 -->
<template v-for="days in item"><!-- v-for="item in schedule"のitemを、1周毎にdaysに入れる。daysは配列ではなくオブジェクト。 -->
<!-- paddingとは例えば、2016年6月であれば、1日が水曜日なので月・火が、30日が木曜日なので金・土・日がそれぞれ前月・次月になり、その空白にする日のこと。 -->
<!-- 下記1～3のいずれかのタグが挿入される。 -->

<!-- １.days.paddingに値があれば&nbsp;を挿入。{}が三重なのは、&nbsp;をHTML文字列として扱うため。 -->
<template v-if="days.padding"><li class="padding">{{{days.padding}}}</li></template>

<!-- ２.days.suspendの値がtrue(=休演日に設定されている日)であれば、日付とetcの項目を挿入。 -->
	<li v-if="days.suspend" class="otherday">
		<span class="day {{days.holiday}}">{{days.day}}</span>
		<span class="week {{days.holiday}}">{{days.weeks}}</span>
		{{days.etc}}
	</li>

<!-- ３.paddingもsuspendもfalseだった場合に挿入される。 -->
	<li v-if="!days.padding && !days.suspend">
		<span class="day {{days.holiday}}">{{days.day}}</span>
		<span class="week {{days.holiday}}">{{days.weeks}}</span>
		<span class="matinee {{days.service}}"><span class="{{days.matinee_unsold}}">{{days.matinee}}</span></span>
		<span class="soiree {{days.service}}"><span class="{{days.soiree_unsold}}">{{days.soiree}}</span></span>
	</li>

</template>
<!-- v-for="item in schedule"の終了タグ -->
</ol>
</div>
<ul class="legend">
	<li><span class="haveToSpace">◎</span>余裕があります</li>
	<li><span class="noRoom">●</span>少なくなっています</li>
	<li><span class="few">▲</span>残りわずか!!</li>
	<li><span class="full">×</span>前売完売<span>（当日券は​別途​販売​予定​）</span></li>
	<li class="tooltip tipdaytime"><span class="daytime">■</span>ギアの日割<em>毎週月曜日（祝日を除く）は14時、19時公演共に500円OFF！</em></li>
	<li class="tooltip tipkids"><span class="kids">■</span>キッズデー<em>毎月第1・3土曜日12時公演は普段ご入場いただけない4歳未満のお子さまも一緒にご入場いただけます（要予約）</em></li>
</ul>
</div>
</template>

<ul class="calenderNavi clearfix navi pc_none navi_footer">
	<li class="calenderNavi_item prev"><a href="#" class="ani-reverseBtn"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> 前の月へ</a></li>
	<li class="calenderNavi_item next"><a href="#" class="ani-reverseBtn">次の月へ <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a></li>
</ul>

<div class="loader"><i class="fa fa-cog fa-spin fa-fw"></i><br><span>Loading...</span></div>
</div>
</div>

<!--料金-->
<section class="contents">
<div class="fee clearfix">
<h3 class="contentsTitle">料金<span></span></h3>
<div class="ad">
<table>
	<tr class="sp_none">
		<th rowspan="2">全席指定</th><th colspan="3">前売</th><th>当日</th>
	</tr>
	<tr class="sp_none">
		<td class="area">スペシャルエリア</td><td class="area">スタンダードエリア</td><td class="area">サイドエリア</td><td rowspan="4" class="theday">前売料金<br>&plus;<br>500円<br><span class="f14">（サイドエリアは前売と同額）</span></td></tr>
	<tr class="tl">
		<th>一般</th><td data-label="■スペシャルエリア">4,200円</td><td data-label="□スタンダードエリア">3,700円</td><td data-label="■サイドエリア">2,700円</td></tr>
	<tr class="tl">
		<th>大学生<br>専門学校生<br>60歳以上</th><td data-label="■スペシャルエリア">3,200円</td><td data-label="□スタンダードエリア">2,700円</td><td data-label="■サイドエリア">1,700円</td></tr>
	<tr class="tl">
		<th>小学生～高校生</th><td data-label="■スペシャルエリア">2,200円</td><td data-label="□スタンダードエリア">1,700円</td><td data-label="■サイドエリア">1,200円</td></tr>
<tr class="tl child">
		<th>幼児（4歳～未就学児）</th><td colspan="4">無料<span class="f14">（事前にお電話にてご予約ください。<span class="underline">4歳未満はキッズデー公演のみ入場可</span>）</span></td></tr>
	<tr class="pc_none">
		<th>【当日券】</th><td>上記前売料金&plus;500円（サイドエリアは前売と同額）<br>※幼児（4歳～未就学児）は無料</td></tr>
</table>

<p class="tc">受付・当日券販売は開演の1時間前から、開場は開演の30分前から開始いたします</p>

<div class="zaseki">
<a href="/ticket/seat/" class="ani-reverseBtn">座席表を見る</a>
<p class="notes">※サイドエリアは、1階席後方端及び2階後方のお席となります。
舞台セット及び客席、映像機器の配置上、一部シーンによっては見えづらい席となります。予めご了承の上、チケットをお買い求めください。<br>
※ギアインフォメーションまたはカンフェティのみの取り扱いとなります。</p>
</div>

<div class="caution">
<div>
<h4><img src="<?php echo THEME_URI; ?>/ticket/img/index/icon_caution.png" alt="注意事項">チケット予約に関する注意事項</h4>
<p>※一般チケット以外、要証明書<br>
※お一人様一公演10枚まで購入が可能です。<br>
11名以上での鑑賞をご検討の場合は、『ギア』インフォメーションまで必ずご連絡ください。<br>
（11枚以上は、団体鑑賞としてお申込みください）<br>
<a href="/ticket/reserved/form/">団体鑑賞・貸切公演　お申込みフォームはこちら</a><br>
※小学校低学年（3年生）以下のお子様のご来場は、大人1名様につき2名様までといたします。あらかじめご了承ください。<br>
※お申込者情報を偽っての大量申し込み、また購入意思の無い申し込みは迷惑行為となりますので禁止させて頂きます。<br>
※上記のような迷惑行為が発覚した場合、ご入場をお断りする場合がございます。また､上記理由による返金は一切対応致しかねますので予めご了承ください｡</p>
</div>
<div>
<h4><img src="<?php echo THEME_URI; ?>/ticket/img/index/icon_caution.png" alt="注意事項">入場に関する注意事項</h4>
<p>
※開演時刻の5分前までにはご着席いただきますようご協力をお願いします。<br>
尚、開演時刻を過ぎてご来場されますと、演出の都合上、15分ほどはお席にご案内することができません。また、開演後は、全て2階席へのご案内となります。<br>
<br>
※上演中、途中退出された場合も同様に、元のお席へご案内することができない場合がございます。あらかじめご了承ください。
</p>
</div>
</div>
</div>
</div>
</section>

<!--前売りチケット-->
<section class="contents">
<div class="prereserve clearfix">
<h3 class="contentsTitle">前売チケット予約<span></span></h3>
<div class="ad">
<h4><img src="<?php echo THEME_URI; ?>/ticket/img/index/icon_pc.png" alt="インターネットで予約"><br>
インターネットで予約</h4>
<div class="leftBox mb100"> <a href="http://l-tike.com/gear/" target="_blank" class="img hover ani-reverseBtn"><img src="<?php echo THEME_URI; ?>/ticket/img/index/logo_ltike.png" alt="ローチケ"></a>
<p class="tc">公演の3日前まで受付</p>
</div>
<div class="rightBox"> <a href="http://www.confetti-web.com/detail.php?tid=34941&" target="_blank" class="img hover ani-reverseBtn"><img src="<?php echo THEME_URI; ?>/ticket/img/index/logo_confetti.png" alt="Confetti"></a>
<p class="tc">公演前日の23:59まで受付</p>
</div>
<h4><img src="<?php echo THEME_URI; ?>/ticket/img/index/icon_tel.png" alt="電話でチケット予約"><br>
電話でチケット予約</h4>
<div class="leftBox">
<div class="img"><img src="<?php echo THEME_URI; ?>/ticket/img/index/logo_ltike.png" alt="ローチケ"></div>
<p class="tc tel"> <span><img src="<?php echo THEME_URI; ?>/ticket/img/index/icon_phone.png" alt="tel">0570-084-005</span><br>
（自動ガイダンス：24時間対応）<br>
<span><img src="<?php echo THEME_URI; ?>/ticket/img/index/icon_phone.png" alt="tel">0570-000-407</span><br>
（オペレーター対応：受付時間：10:00～20:00）</p>
<div class="ltike_cord">
<p>※下記Lコードが必要となります。</p>
<dl class="clearfix">
<dt>・11月公演</dt><dd>51231</dd>
<dt>・12月公演</dt><dd>51232</dd>
<dt>・1月公演</dt><dd>59901</dd>
</dl>
</div>
</div>
<div class="rightBox">
<div class="img"><img src="<?php echo THEME_URI; ?>/ticket/img/index/logo_confetti.png" alt="Confetti"></div>
<p class="tc tel"><span><img src="<?php echo THEME_URI; ?>/ticket/img/index/icon_phone.png" alt="tel">0120-240-540</span><br>
（受付時間・平日10:00-18:00）</p>
</div>
</div>
</div>
</section>

<!--当日チケット-->
<section class="contents">
<div class="theday">
<h3 class="contentsTitle">当日チケット予約<span></span></h3>
<div class="ad">
<div class="leftBox">
<div class="img"><img src="<?php echo THEME_URI; ?>/ticket/img/index/logo_gear.png" alt="ギア"></div>
<p class="tc">ギアインフォメーション</p>
<p class="tc tel"><span><img src="<?php echo THEME_URI; ?>/ticket/img/index/icon_phone.png" alt="tel">0120-937-882</span><br>
（平日：10:00-19:00　土日祝：9:00-19:00）<br>
※フリーコールにつながらない場合 075-254-6520</p>
</div>
<div class="rightBox">
<p>公演当日の午前10時（土日祝日公演は午前9時）から開演の直前まで受付しております。<br>
料金は当日券料金となり、ご精算は会場受付でご精算いただきますようお願いいたします。<br>
なお、見づらいお席へのご案内となる可能性がございます。あらかじめご了承ください。</p>
</div>
</div>
</div>
</section>

</section>
</article>
</main>

<?php get_footer(); ?>