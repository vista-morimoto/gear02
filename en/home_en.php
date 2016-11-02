<?php /*Template Name: 英語 - TOP */ ?>
<?php 
$bodyClass ='top';
$cssLink = '
<link rel="stylesheet" href="'.THEME_CSS.'/top.css">
';
$jsLink_top = '
<script src="'.THEME_JS.'/lib/jquery.inview.min.js"></script>'
;
$jsLink_btm = '
<script src="'.THEME_JS.'/top.js"></script>
<script src="'.THEME_JS.'/calender.js"></script>
';
get_template_part( 'en/header_en' );
?>

<main class="mainContents">
<article>
<!--mainVisual-->
<section id="mainVisual" class="section parallax-window" data-parallax="scroll" data-image-src="<?php echo THEME_IMAGES; ?>/top/img_main.png" data-z-index="1">

<div class="sectionInner">
<h1 class="siteTitle"><img src="<?php echo THEME_IMAGES; ?>/top/logo.png" alt="ギアーGEARー"></h1>

<ul class="actions">
	<li><a id="modalOpen_400" href="#animatedModal_400" class="ani-opacity">Watch Video</a></li>
	<li><a href="/en/ticket/" class="ani-opacity">Buy Tickets</a></li>
</ul>

<ul class="snsBtns">
	<li><a href="https://twitter.com/gearkyoto" target="_blank" class="ani-opacity"><img src="<?php echo THEME_IMAGES; ?>/top/icon_twitter.png" alt="Twitter"></a></li>
	<li><a href="https://www.facebook.com/cco.gear" target="_blank" class="ani-opacity"><img src="<?php echo THEME_IMAGES;	 ?>/top/icon_fb.png" alt="Facebook"></a></li>
<li><a href="https://www.instagram.com/gear_kyoto/" target="_blank" class="ani-opacity"><img src="<?php echo THEME_IMAGES; ?>/top/icon_instagram.png" alt="Instagram"></a></li>
	<li><a href="https://www.youtube.com/channel/UCrQv_h2ZnHw0hk6CdVBQOsQ" target="_blank" class="ani-opacity"><img src="<?php echo THEME_IMAGES; ?>/top/icon_youtube.png" alt="YouTube"></a></li>
	<li><a href="https://www.tripadvisor.com/Attraction_Review-g298564-d2616330-Reviews-Gear_Art_Complex_1928-Kyoto_Kyoto_Prefecture_Kinki.html" target="_blank" class="ani-opacity"><img src="<?php echo THEME_IMAGES; ?>/top/icon_tripadvisor.png" alt="Tripadvisor"></a></li>
</ul>

<!--<ul class="bnrs">
<li><a href="#" class="ani-opacity"><img src="<?php echo THEME_IMAGES; ?>/top/bnr_01.jpg" alt="バナー"></a></li>
<li><a href="#" class="ani-opacity"><img src="<?php echo THEME_IMAGES; ?>/top/bnr_01.jpg" alt="バナー"></a></li>
</ul>-->
</div>

<div class="news">
<h2>NEWS</h2>
<ul>
<?php 
if (!is_archive()) {
	$args = array(/* 配列に複数の引数を追加 */
	'post_type' => 'news',
	'posts_per_page' => 5,
	'post_status' => 'publish',
	'paged' => $paged
	);
}
?>
<?php $the_query = new WP_Query( $args ); ?>
<?php if ( $the_query->have_posts() ) :?>
<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
<li><a href="/press/news/?lang=en"><?php the_time('Y.m.d'); ?>　<?php the_title(); ?></a></li>
<?php endwhile;?>
<?php else: ?>
<li>No Post</li>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
</ul>
</div>
</section>
<!--/mainVisual-->

<!--ABOUT AREA-->
<section id="about" class="section parallax-window" data-parallax="scroll" data-image-src="<?php echo THEME_IMAGES; ?>/top/bg_about.jpg" data-z-index="1">
<div class="sectionInner">
<div class="contentsSlider">

<!--GEAR?-->
<div class="box">
<h2>GEAR?</h2>
<div class="visualBox_img">
<img src="<?php echo THEME_IMAGES; ?>/top/about.jpg" alt="GEAR?" />
<p class="txt_01">Created in Japan, and first of its kind in Japan!<br>
A moving performance awaits you in Kyoto.</p>								
</div>							
<p class="txt_02 closeArea">First of its kind in Japan, GEAR is a unique non-verbal performance that stimulates your five senses with a moving story set in the future. Accompanied by impressive stage effects set up using techniques ranging from those used in Kabuki plays to the latest technologies, GEAR is bound to offer you a theatrical experience you will never forget!</p>
<p class="closeBtn"></p>
</div>

<!--CHARACTER-->
<div class="box">
<h2>CHARACTER</h2>
<div class="characterBox">
<div class="mime">
<div class="characterBox_img"><img src="<?php echo THEME_IMAGES; ?>/top/chara_mime.png" alt="MIME"></div>
<div class="characterBox_text">
<h3>MIME</h3>
<p>The responsible and stubborn leader of the RoboRoids, but with a humorous side. The oldest of the RoboRoids.</p>
</div>
</div>
<div class="breakin close">
<div class="characterBox_img"><img src="<?php echo THEME_IMAGES; ?>/top/chara_breakin.png" alt="BREAKIN’"></div>
<div class="characterBox_text">
<h3>BREAKIN’</h3>
<p>A RoboRoid brimming with curiosity. Full of energy and constantly running around all over the place.</p>
</div>
</div>
<div class="magic closeArea">
<div class="characterBox_img"><img src="<?php echo THEME_IMAGES; ?>/top/chara_magic.png" alt="MAGIC"></div>
<div class="characterBox_text">
<h3>MAGIC</h3>
<p>An ostentatious, cool-headed lone wolf RoboRoid. Tends to do different things from everyone else. Strength lies in stable designs.</p>
</div>
</div>
<div class="juggling closeArea">
<div class="characterBox_img"><img src="<?php echo THEME_IMAGES; ?>/top/chara_juggling.png" alt="JUGGLING"></div>
<div class="characterBox_text">
<h3>JUGGLING</h3>
<p>An earnest but inefficient and somewhat clumsy RoboRoid. Tends to break machinery when working.</p>
</div>
</div>
<div class="doll closeArea">
<div class="characterBox_img"><img src="<?php echo THEME_IMAGES; ?>/top/chara_doll.png" alt="DOLL"></div>
<div class="characterBox_text">
<h3>DOLL</h3>
<p>The doll that was once made in this factory. Falls into the factory unexpectedly one day and is led by curiosity to start playing with the RoboRoids, becoming more and more human every day.</p>
</div>
</div>

<p class="closeBtn"></p>
</div>

</div>

<!--CAST-->
<div class="box">
<h2>CAST</h2>
<ul class="castBox">
<li><a href="/en/about/cast/">CAST PROFILE</a></li>
<li><a href="/ticket/cast_schedule/">CAST SCHEDULE</a></li>
</ul>
</div>

</div>
</div>

<div class="bg" data-stellar-ratio="0.05"></div>

</section>
<!--/ABOUT AREA-->

<!--COMMENT-->
<section class="comment section parallax-window" data-parallax="scroll" data-image-src="<?php echo THEME_IMAGES; ?>/top/bg_comment_01.jpg" data-z-index="1">
<div class="sectionInner">
<p>FANTASTIC!!! SUPERB! BRILLIANT!!!<br>I am SO impressed!<br><span>（40's Female・Self employed・Norway）</span></p>
</div>
<div class="bg" data-stellar-ratio="0.05"></div>
</section>
<!--/COMMENT-->	

<!--TICKET AREA-->
<section id="ticket" class="section parallax-window" data-parallax="scroll" data-image-src="<?php echo THEME_IMAGES; ?>/top/bg_ticket.jpg" data-z-index="1">
<div id="calenderArea" class="sectionInner">
<div class="contentsSlider">

<!--TICKET-->
<div class="box">
<h2>TICKET</h2>
<div class="ticketBox">

<!---▽カレンダー仮ここから-->
<!-- Vue.js のテンプレート機能を使ってカレンダーを表示 -->
<!-- カレンダーをtableではなくolで作っているのは、7日毎の折り返しが厳しいため。 -->
<!-- 100％を7で割ったパーセントをliの幅としfloatを使うことで自動で折り返しています。高さはheightLineで合わせています。 -->
<template v-for="item in schedule"><!-- calender.jsのschedulesVm変数のdata.scheduleをforで回し、1周毎に値をitemに入れる。itemは配列 -->
<div class="calenderWrapper"><!-- v-if="$index == 0"-->
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
</div>
</template>

<ul class="legend">
<li><span class="haveToSpace">●</span>For best availability</li>
<li><span class="noRoom">●</span>Available</li>
<li><span class="few">●</span>Limited availability</li>
<li><span class="full">●</span>Not available</li>
<li><span class="daytime">■</span>Special price</li>
<li><span class="kids">■</span>For all age</li>
</ul>

<ul class="navi">
<!--<li class="wide"><a href="/en/ticket/">MORE</a></li>-->
<li class="wide"><a href="https://opossum.jp/form/?*Y3M9b1UzFHYZWbKOeyuduK1WM2SORs5qecPDkhoNbU-" target="_blank">BUY TICKETS</a></li>
<li><a href="/en/ticket/privilege/">BIRTHDAY MONTH PLAN</a></li>
<li><a href="/en/ticket/seat/">SEATING CHART</a></li>
<li><a href="/ticket/cast_schedule/">CAST SCHEDULE</a></li>

</ul>

<!--<p class="closeBtn"></p>-->

</div>
</div>


<!--CAST SCHEDULE-->
<div class="box">
<h2>CAST SCHEDULE</h2>
<div class="castSchedule">
<!-- Vue.jsで監視している範囲（次回のキャストスケジュール用） -->
<!-- v-cloakは値がセットされるまでの属性。値がセットされると削除される。css側に[v-cloak]{opacity:0;}を記述しています。 -->
<!-- Vue.jsで監視している範囲（次回のキャストスケジュール用）ここまで -->
<div class="nextStage">
<h3 class="nextStage_title">NEXT <br class="pc_none">STAGE</h3>						
<p class="nextStage_date" v-cloak>{{nextstage.date}}</p><span class="weeks">{{nextstage.weeks}}</span><!--<span class="weeks">14:00{{nextstage.time}}</span>-->
<div class="otherBtn"><a href="/ticket/cast_schedule/">MORE</a></div>
</div>						
<div class="nextCast">
<dl class="mime">
<dt>MIME</dt><dd>{{nextstage.mime}}</dd>
</dl>
<dl class="breakin">
<dt>BREAKIN'</dt><dd>{{nextstage.breakin}}</dd>
</dl>
<dl class="magic">
<dt>MAGIC</dt><dd>{{nextstage.magic}}</dd>
</dl>
<dl class="jaggling">
<dt>JUGGLING</dt><dd>{{nextstage.jaggling}}</dd>
</dl>
<dl class="doll">
<dt>DOLL</dt><dd>{{nextstage.dall}}</dd>
</dl>
</div>
</div>
</div>

</div>
</div>

</section>
<!--/TICKET AREA-->

<!--COMMENT-->
<section class="comment section parallax-window" data-parallax="scroll" data-image-src="<?php echo THEME_IMAGES; ?>/top/bg_comment_02.jpg" data-z-index="1">
<div class="sectionInner">
<p>Very fun!<br class="pc_none"> Touched all the senses.<br><span>（20's Male・Full time employed・UK）</span></p>
</div>
<div class="bg" data-stellar-ratio="0.05"></div>
</section>
<!--/COMMENT-->

<!--ACCESS AREA-->
<section id="map" class="section parallax-window" data-parallax="scroll" data-image-src="<?php echo THEME_IMAGES; ?>/top/bg_access.jpg" data-z-index="1">
<div class="sectionInner">
<h2>ACCESS</h2>
<img src="<?php echo THEME_URI; ?>/access/img/map/img_02_en.jpg" alt="地図"/>
<p class="address">GEAR Theater（ART COMPLEX 1928）<br>ZIP 604-8082 56 Benkeiishicho, Nakagyo-ku, Kyoto City 1928 build. 3F</p>
<ul class="navi">
<li><a href="https://www.google.co.jp/maps?q=ART+COMPLEX+1928&hl=ja&sll=35.008768,135.766532&sspn=0.010949,0.021136&brcurrent=3,0x6001062b6f570db9:0x408c4afef6d460fd,0&hq=ART+COMPLEX+1928&t=m&z=16" target="_blank">Google Maps</a></li>
<li><a href="/en/access/areainfo/">SIGHTSEEING</a></li>
</ul>
</div>
</section>
<!--/ACCESS AREA-->

<!--COMMENT-->
<section class="comment section parallax-window" data-parallax="scroll" data-image-src="<?php echo THEME_IMAGES; ?>/top/bg_comment_03.jpg" data-z-index="1">
<div class="sectionInner">
<p>It was really cool and fun to watch!<br class="pc_none"> Great concept! :)<br><span>（10’s Female・Student・USA）</span></p>
</div>
<div class="bg" data-stellar-ratio="0.05"></div>
</section>
<!--/COMMENT-->

<!--FAQ AREA-->
<section id="faq" class="section parallax-window en_faq" data-parallax="scroll" data-image-src="<?php echo THEME_IMAGES; ?>/top/bg_faq.jpg" data-z-index="1">
<div class="sectionInner">
<h2>FAQ</h2>
<ul>
	<li>
	<a href="https://www.tripadvisor.com/FAQ-g298564-d2616330-Gear_Art_Complex_1928.html" class="tripadviser" target="_blank"><p>TripAdvisor<br><span>Gear Art Complex 1928</span></p>
	</a>
	</li>
</ul>
</div>
</section>

<!--<section id="faq" class="section parallax-window en_faq" data-parallax="scroll" data-image-src="<?php echo THEME_IMAGES; ?>/top/bg_faq.jpg" data-z-index="1">
<div class="sectionInner">
<h2>FAQ</h2>
<ul>
<li>
<a href="https://www.tripadvisor.com/Attraction_Review-g298564-d2616330-Reviews-Gear_Art_Complex_1928-Kyoto_Kyoto_Prefecture_Kinki.html" class="tripadviser" target="_blank"><p>TripAdvisor<br><span>Gear Art Complex 1928</span></p></a></li>
</ul>				
</div>
</section>-->
<!--/FAQ AREA-->

<!--COMMENT-->
<section class="comment section parallax-window" data-parallax="scroll" data-image-src="<?php echo THEME_IMAGES; ?>/top/bg_comment_04.jpg" data-z-index="1">
<div class="sectionInner">
<p>Best entertainment. Very clever.<br><span>（60's Male・Germany）</span></p>
</div>
<div class="bg" data-stellar-ratio="0.05"></div>
</section>
<!--/COMMENT-->

<!--FOR FANS AREA-->
<section id="forFans" class="section parallax-window" data-parallax="scroll" data-image-src="<?php echo THEME_IMAGES; ?>/top/bg_forfans.jpg" data-z-index="1">
<div class="sectionInner">
<h2>FOR FANS</h2>
<ul>
<li><a href="/en/forfans/goods/">Official goods on sale</a></li>
<li><a href="/forfans/fanclub/">The fan club</a></li>
</ul>

<div class="event">
<h3>EVENT</h3>

<?php 
if (!is_archive()) {
	$args = array(/* 配列に複数の引数を追加 */
	'post_type' => 'event',
	'posts_per_page' => 1,
	'post_status' => 'publish',
	'paged' => $paged
	);
}
?>
<?php $the_query = new WP_Query( $args ); ?>
<?php if ( $the_query->have_posts() ) :?>
<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
<p class="txt"><a href="/forfans/?lang=en"><?php the_time('Y.m.d'); ?>　<?php the_title(); ?></a></p>
<?php endwhile;?>
<?php else: ?>
<p class="txt">No Post</p>
<?php endif; ?>
<?php wp_reset_postdata(); ?>

</div>	
</div>

<div class="bg" data-stellar-ratio="0.05"></div>
</section>
<!--/FOR FANS AREA-->

<aside class="sns">
<div class="tw">
<div class="twTicker">
<ul class="twList">
<li class="twList_item"></li>
<!-- ツイッターのタイムラインは/php/tw.phpでコンシューマーキーなどを設定しないと表示されません。 -->
</ul>
</div>
<div class="twIcon">
<a href="https://twitter.com/pinion_gear" target="_blank"><img src="<?php echo THEME_IMAGES; ?>/top/pinion.png" class="charactor" alt="pinion_gear"></a>
</div>
</div>
</aside>

</article>
</main>

<!--modal youtube-->
<div id="animatedModal_400" class="wrapModal">
<div class="modal-content">
<a id="btn-close-modal" class="close-animatedModal_400"><img src="<?php echo THEME_IMAGES; ?>/gnavi/close.png"></a>

<div id="video">
<div id="play_button"><span>PLAY MOVIE</span></div>
</div>

<!--<div class="youtube">
<iframe width="853" height="480" src="https://www.youtube.com/embed/PqHt1qCzY44?rel=0" frameborder="0" allowfullscreen></iframe>
</div>-->
</div>
</div>

<?php get_template_part( 'en/footer_en' ); ?>
