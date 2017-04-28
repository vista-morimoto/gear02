<?php /*Template Name: 英語 - チケット購入 - TOP */ ?>
<?php 
$cssLink = '
<link rel="stylesheet" href="'.THEME_CSS.'/ticket.css">
<link rel="stylesheet" href="'.THEME_CSS.'/calendar.css">
';
$jsLink_top = '';
$jsLink_btm = '
<script src="'.THEME_JS.'/calender.js"></script>
<script src="'.THEME_JS.'/ticket.js"></script>
';
get_template_part( 'en/header_en' );
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
if ( strtotime($lastupdate) < strtotime($update)  ){
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
<h3 class="contentsTitle">THE SHOW SCHEDULE</p></h3>
<div class="ad"> 

<ul class="legend pc_none">
	<li class="state"><span class="haveToSpace">○</span>For best availability</li>
	<!-- <li><span class="noRoom">●</span>少なくなっています</li> -->
	<li class="state"><span class="few">△</span>Limited availability</li>
	<li class="state"><span class="full">完売</span>Not available</li>
	<!--<li><span class="haveToSpace">●</span>For best availability</li>
	<li><span class="noRoom">●</span>Available</li>
	<li><span class="few">●</span>Limited availability</li>
	<li><span class="full">●</span>Not available</li>-->
	<li><span class="daytime">■</span>Special price</li>
	<li><span class="kids">■</span>For all age</li>
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

<li class="calenderNavi_item prev"><a href="#" class="ani-reverseBtn"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Previous Month</a></li>
<li class="calenderNavi_item next"><a href="#" class="ani-reverseBtn">Next Month <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a></li>
</ul>


<!-- Vue.js のテンプレート機能を使ってカレンダーを表示 -->
<!-- カレンダーをtableではなくolで作っているのは、7日毎の折り返しが厳しいため。 -->
<!-- 100％を7で割ったパーセントをliの幅としfloatを使うことで自動で折り返しています。高さはheightLineで合わせています。 -->
<template v-for="item in schedule"><!-- calender.jsのschedulesVm変数のdata.scheduleをforで回し、1周毎に値をitemに入れる。itemは配列 -->
<div class="calenderWrapper">
<div class="calender">
<h3 class="calender_month">{{year[$index]}}.{{month[$index]}}</h3><!-- itemとは関係なく、calender.jsのschedulesVm変数のdata.month(配列)の値をセット。$indexはv-for="item in schedule"のインデックス。 -->
<ol class="calender_head clearfix">
	<li>MON</li><li>TUE</li><li>WED</li><li>THU</li><li>FRI</li><li class="sat">SAT</li><li class="sun">SUN</li>
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
	<span v-if="days.etc" class="suspend">{{days.etc}}</span>
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
	<li class="state"><span class="haveToSpace">○</span>For best availability</li>
	<!-- <li><span class="noRoom">●</span>少なくなっています</li> -->
	<li class="state"><span class="few">△</span>Limited availability</li>
	<li class="state"><span class="full">完売</span>Not available</li>
	<!--<li><span class="haveToSpace">●</span>For best availability</li>
	<li><span class="noRoom">●</span>Available</li>
	<li><span class="few">●</span>Limited availability</li>
	<li><span class="full">●</span>Not available</li>-->
	<li><span class="daytime">■</span>Special price</li>
	<li><span class="kids">■</span>For all age</li>
</ul>
</div>

</template>

<ul class="calenderNavi clearfix navi pc_none navi_footer">
	<li class="calenderNavi_item prev"><a href="#" class="ani-reverseBtn"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Previous Month</a></li>
	<li class="calenderNavi_item next"><a href="#" class="ani-reverseBtn">Next Month <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a></li>
</ul>

<div class="calendarBtn"><a href="https://opossum.jp/form/?*Y3M9b1UzFHYZWbKOeyuduK1WM2SORs5qecPDkhoNbU-" class="link_form" target="_blank">Buy Tickets</a></div>

<div class="loader"><i class="fa fa-cog fa-spin fa-fw"></i><br><span>Loading...</span></div>  
</div>
</div>


<!--料金-->
<section class="contents">
<div class="fee clearfix">
<h3 class="contentsTitle">TICKET FEE<span></span></h3>
<div class="ad">		
<table>

<tr class="sp_none">
<th rowspan="2">All Seats Reserved.</th><th colspan="3">ADVANCE</th><th>AT DOOR</th></tr>

<tr class="sp_none">
<td class="area">Special Area</td><td class="area">Standard Area</td><td class="area">Side Area</td><td rowspan="4" class="theday">ADVANCE<br>&plus;<br>an extra 500JPY per person<br><span class="f14">(except Side Area)</span></td></tr>

<tr class="tl">
<th>General</th><td data-label="■Special Area">4,200JPY</td><td data-label="□Standard Area">3,700JPY</td><td data-label="■Side Area">2,700JPY</td></tr>

<tr class="tl">
<th>University students<br>Seniors over 60</th><td data-label="■Special Area">3,200JPY</td><td data-label="□Standard Area">2,700JPY</td><td data-label="■Side Area">1,700JPY</td></tr>

<tr class="tl">
<th>Elementary, Junior high- and High school students</th><td data-label="■Special Area">2,200JPY</td><td data-label="□Standard Area">1,700JPY</td><td data-label="■Side Area">1,200JPY</td></tr>

<tr class="tl child">
<th>Preschool children / Ages 4-6</th><td colspan="4">Free of charge<br><span class="f14">※We don’t allow kids under 3 years of age to enter the theatre for security reason.<br><span class="underline">But every 1st&3rd Saturday of the month,we welcome any aged children for noon show.</span></span></td></tr>

<tr class="pc_none">
<th>【AT DOOR】</th><td>ADVANCE &plus; an extra 500JPY per person(except Side Area)<!--<br>※幼児（4歳～未就学児）は無料--></td></tr>

</table>

<p class="tc">DOOR OPEN 30min before the show starts</p>

<div class="zaseki clearfix">
<a href="/en/ticket/seat/" class="ani-reverseBtn">View seating chart</a>
<p class="notes">※Side area seats located on the corner and little bit far from stage.</p>
</div>

<!--<div class="caution">
<div>
<h4><img src="<?php echo THEME_URI; ?>/ticket/img/index/icon_caution.png" alt="注意事項">チケット予約に関する注意事項</h4>
<p>※一般チケット以外、要証明書<br>
※お一人様一公演10枚まで購入が可能です。<br>
11名以上での鑑賞をご検討の場合は、『ギア』インフォメーションまで必ずご連絡ください。<br>
（11枚以上は、団体鑑賞としてお申込みください）<br>
※小学校低学年（3年生）以下のお子様のご来場は、大人1名様につき2名様までといたします。あらかじめご了承ください。<br>
※お申込者情報を偽っての大量申し込み、また購入意思の無い申し込みは迷惑行為となりますので禁止させて頂きます。<br>
※上記のような迷惑行為が発覚した場合、ご入場をお断りする場合がございます。また､上記理由による返金は一切対応致しかねますので予めご了承ください｡</p>
</div>
<div>
<h4><img src="<?php echo THEME_URI; ?>/ticket/img/index/icon_caution.png" alt="注意事項">入場に関する注意事項</h4>
<p>※開演時刻の5分前までにはご着席いただきますようご協力をお願いします。
尚、開演時刻を過ぎてご来場されますと、演出の都合上、15分ほどはお席にご案内することができません。また、開演後は、全て2階席へのご案内となります。<br>
<br>
※上演中、途中退出された場合も同様に、元のお席へご案内することができない場合がございます。あらかじめご了承ください。</p>
</div>
</div>-->


<div class="calendarBtn"><a href="https://opossum.jp/form/?*Y3M9b1UzFHYZWbKOeyuduK1WM2SORs5qecPDkhoNbU-" class="link_form" target="_blank">Buy Tickets</a>
</div>
</div>
</div>
</section>

<section class="contents">
<div class="contact">
<h3 class="contentsTitle">TICKETING ENQUIRY<span></span></h3>
<div class="ad"> 
<p>For ticketing enquiry kindly contact <a href="mailto:hi@gear.ac">hi@gear.ac</a>　or as follows；<br>
<br>
KYOTO TOURIST INFORMATION CENTER（H.I.S）<br>
Phone: 075-253-0288<br>
Hours open to visitors: Open daily from 09:00 to 18:00<br>
Languages: English, Chinese,Korean and Thai<br>
</p>
</div>
</div>
</section>

</section>
</article>
</main>

<?php get_template_part( 'en/footer_en' ); ?>