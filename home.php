<?php /*Template Name: TOP */ ?>
<?php 
$bodyClass ='top';
$cssLink = '
<link rel="stylesheet" href="'.THEME_CSS.'/top.css">
';
$jsLink_top = '
<script src="'.THEME_JS.'/lib/jquery.inview.min.js"></script>
';
$jsLink_btm = '
<script src="'.THEME_JS.'/top.js"></script>
<script src="'.THEME_JS.'/calender.js"></script>
';
get_header();
?>
<main class="mainContents">
<article>

<!--mainVisual-->
<section id="mainVisual" class="section parallax-window" data-parallax="scroll" data-image-src="<?php echo THEME_IMAGES; ?>/top/img_main.png" data-z-index="1">

<div class="sectionInner">
<h1 class="siteTitle"><img src="<?php echo THEME_IMAGES; ?>/top/logo.png" alt="ギアーGEARー"></h1>

<ul class="actions">
<li><a id="modalOpen_400" href="#animatedModal_400" class="ani-opacity"><span class="actions_en">Watch Video</span><span class="actions_jp">動画を見る</span></a></li>
<li><a href="/ticket/" class="ani-opacity"><span class="actions_en">Tickets</span><span class="actions_jp">チケット情報</span></a></li>
</ul>

<ul class="snsBtns">
<li><a href="https://twitter.com/nvpgear" target="_blank" class="ani-opacity"><img src="<?php echo THEME_IMAGES; ?>/top/icon_twitter.png" alt="Twitter"></a></li>
<li><a href="https://www.facebook.com/cco.gear" target="_blank" class="ani-opacity"><img src="<?php echo THEME_IMAGES; ?>/top/icon_fb.png" alt="Facebook"></a></li>
<li><a href="https://www.instagram.com/gear_kyoto/" target="_blank" class="ani-opacity"><img src="<?php echo THEME_IMAGES; ?>/top/icon_instagram.png" alt="Instagram"></a></li>
<li><a href="https://www.youtube.com/channel/UCrQv_h2ZnHw0hk6CdVBQOsQ" target="_blank" class="ani-opacity"><img src="<?php echo THEME_IMAGES; ?>/top/icon_youtube.png" alt="YouTube"></a></li>
<li><a href="https://www.tripadvisor.jp/Attraction_Review-g298564-d2616330-Reviews-Gear_Art_Complex_1928-Kyoto_Kyoto_Prefecture_Kinki.html" target="_blank" class="ani-opacity"><img src="<?php echo THEME_IMAGES; ?>/top/icon_tripadvisor.png" alt="トリップアドバイザー"></a></li>
</ul>

<div class="scroll"><span></span></div>

</div>

<div id="news" class="news">
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
<li><a href="/press/news/"><?php the_time('Y.m.d'); ?>　<?php the_title(); ?></a></li>
<?php endwhile;?>
<?php else: ?>
<li>記事がありません。</li>
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
<img src="<?php echo THEME_IMAGES; ?>/top/about.jpg" alt="GEARとは" />
<p class="txt_01">観客動員数10万人突破！<br>日本発！日本初！京都で出逢える<br class="pc_none">感動エンターテイメント</p>					
</div>							
<p class="txt_02 closeArea">日本発×日本初のノンバーバル（＝言葉に頼らない）パフォーマンス『ギア-GEAR-』。光や映像と連動したマイム、ブレイクダンス、マジック、ジャグリングによる迫力のパフォーマンスで感動のストーリーを描くとともに、セリフを使わない ”ノンバーバル”という演出により、小さなお子さまや外国の方までもが、言葉の壁を越えて楽しんでいただけます。</p>
<p class="closeBtn"></p>
</div>					

<!--CHARACTER-->
<div class="box">
<h2>CHARACTER</h2>
<div class="characterBox">
<div class="mime">
<div class="characterBox_img"><img src="<?php echo THEME_IMAGES; ?>/top/chara_mime.png" alt="マイム"></div>
<div class="characterBox_text">
<h3>マイム<span>MIME</span></h3>
<p>真面目で頑固なロボロイド達のリーダー、だけどひょうきんな一面もある。一番古いロボロイド。</p>
</div>
</div>
<div class="breakin close">
<div class="characterBox_img"><img src="<?php echo THEME_IMAGES; ?>/top/chara_breakin.png" alt="ブレイクダンス"></div>
<div class="characterBox_text">
<h3>ブレイクダンス<span>BREAKIN'</span></h3>
<p>好奇心が旺盛なロボロイド。元気一杯で、常にあっちへ行ったりこっちへ行ったり、落ち着きがない。</p>
</div>
</div>
<div class="magic closeArea">
<div class="characterBox_img"><img src="<?php echo THEME_IMAGES; ?>/top/chara_magic.png" alt="マジック"></div>
<div class="characterBox_text">
<h3>マジック<span>MAGIC</span></h3>
<p>キザでクールな一匹狼のロボロイド。みんなとは違う行動をすることが多い。安定感のある設計が自慢。</p>
</div>
</div>
<div class="juggling closeArea">
<div class="characterBox_img"><img src="<?php echo THEME_IMAGES; ?>/top/chara_juggling.png" alt="ジャグリング"></div>
<div class="characterBox_text">
<h3>ジャグリング<span>JUGGLING</span></h3>
<p>真面目だけれど要領が悪くて、ちょっぴりドジなロボロイド。ちょこちょこ動いては、あちこちで機械を壊したりする。</p>
</div>
</div>
<div class="doll closeArea">
<div class="characterBox_img"><img src="<?php echo THEME_IMAGES; ?>/top/chara_doll.png" alt="ドール"></div>
<div class="characterBox_text">
<h3>ドール<span>DOLL</span></h3>
<p>かつてのこの工場で作られていた「人形（ドール）」。ある日、ひょんなことから工場に落ちてきて、「好奇心」からロボロイド達と遊ぶうちに少しずつ「人間」に近づいていく。</p>
</div>
</div>
								
<p class="closeBtn"></p>
</div>								

</div>					

<!--CAST-->
<div class="box">
<h2>CAST</h2>
<ul class="castBox">
<li><a href="/about/cast/">キャストプロフィール</a></li>
<li><a href="/ticket/cast_schedule/">キャストスケジュール</a></li>
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
<p>言葉がなくても表情で思いが伝わる。<br>表情の大切さを感じました。<br><span>（京都府 40代女性）</span></p>
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

<ul class="calenderNavi clearfix navi">
	<li class="calenderNavi_item calenderNavi_item_select">
	<div class="selectWrapper">
	<select name="" id="">
	<option value="{{slug}}" v-for="item in select">{{item}}</option>
	</select>
	</div>
	</li>

	<li class="calenderNavi_item prev"><a href="#" class="ani-reverseBtn"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> 前の月へ</a></li>
	<li class="calenderNavi_item next"><a href="#" class="ani-reverseBtn">次の月へ <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a></li>
</ul>

<div class="calender_view">
<!---▽カレンダー仮ここから-->
<!-- Vue.js のテンプレート機能を使ってカレンダーを表示 -->
<!-- カレンダーをtableではなくolで作っているのは、7日毎の折り返しが厳しいため。 -->
<!-- 100％を7で割ったパーセントをliの幅としfloatを使うことで自動で折り返しています。高さはheightLineで合わせています。 -->
<template v-for="item in schedule"><!-- calender.jsのschedulesVm変数のdata.scheduleをforで回し、1周毎に値をitemに入れる。itemは配列 -->
<div class="calenderWrapper"><!-- v-if="$index == 0"-->
<div class="calender">
<h3 class="calender_month">{{year[$index]}}.{{month[$index]}}</h3><!-- itemとは関係なく、calender.jsのschedulesVm変数のdata.month(配列)の値をセット。$indexはv-for="item in schedule"のインデックス。 -->
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
</div>
</template>
</div>			 

<ul class="legend pc_none">
<li><span class="haveToSpace">●</span>余裕があります</li>
<li><span class="noRoom">●</span>少なくなっています</li>
<li><span class="few">●</span>残りわずか!!</li>
<li><span class="full">●</span>前売完売<span>（当日券は​別途​販売​予定）</span></li>
<li><span class="daytime">■</span>ギアの日割</li>
<li><span class="kids">■</span>キッズデー</li>
</ul>

<ul class="legend sp_none">
<li><span class="haveToSpace">◎</span>余裕があります</li>
<li><span class="noRoom">●</span>少なくなっています</li>
<li><span class="few">▲</span>残りわずか!!</li>
<li><span class="full">×</span>前売完売<span>（当日券は​別途​販売​予定）</span></li>
<li><span class="daytime">■</span>ギアの日割</li>
<li><span class="kids">■</span>キッズデー</li>
</ul>
          
<ul class="navi">
<!--<li class="wide"><a href="/ticket/">カレンダーをもっと見る</a></li>-->
<li class="wide"><a href="/ticket/">チケット予約</a></li>
<li><a href="/ticket/privilege/">誕生月プラン</a></li>
<li><a href="/ticket/seat/">座席表</a></li>
<li><a href="/ticket/cast_schedule/">キャストスケジュール</a></li>
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
<div class="otherBtn"><a href="/ticket/cast_schedule/">すべて見る</a></div>
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
<p>日本にこんな楽しい<br class="pc_none">ノンバーバルshowがあったなんて!!<br><span>（岐阜県 30代女性）</span></p>
</div>
<div class="bg" data-stellar-ratio="0.05"></div>
</section>
<!--/COMMENT-->

<!--ACCESS AREA-->
<section id="map" class="section parallax-window" data-parallax="scroll" data-image-src="<?php echo THEME_IMAGES; ?>/top/bg_access.jpg" data-z-index="1">
<div class="sectionInner">
<h2>ACCESS</h2>
<img src="<?php echo THEME_URI; ?>/access/img/map/img_02.jpg" alt="地図"/>
<p class="address">ギア専用劇場（ART COMPLEX 1928）<br class="pc_none">　〒604-8082　京都府京都市中京区弁慶石町56  1928ビル3F</p>
<ul class="navi">
<li><a href="https://www.google.co.jp/maps?q=ART+COMPLEX+1928&hl=ja&sll=35.008768,135.766532&sspn=0.010949,0.021136&brcurrent=3,0x6001062b6f570db9:0x408c4afef6d460fd,0&hq=ART+COMPLEX+1928&t=m&z=16" target="_blank">Google Maps</a></li>
<li><a href="/access/areainfo/">周辺情報</a></li>
</ul>
</div>
</section>
<!--/ACCESS AREA-->

<!--COMMENT-->
<section class="comment section parallax-window" data-parallax="scroll" data-image-src="<?php echo THEME_IMAGES; ?>/top/bg_comment_03.jpg" data-z-index="1">
<div class="sectionInner">
<p>体験したことのない世界。<br>見えるはずのないものが見えました。<br><span>（京都府 40代女性）</span></p>
</div>
<div class="bg" data-stellar-ratio="0.05"></div>
</section>
<!--/COMMENT-->

<!--FAQ AREA-->
<section id="faq" class="section parallax-window" data-parallax="scroll" data-image-src="<?php echo THEME_IMAGES; ?>/top/bg_faq.jpg" data-z-index="1">
<div class="sectionInner">
<h2>FAQ</h2>
<ul>
<li><a href="/info/#cat1">チケット予約・<br />会場について</a></li>
<li><a href="/info/#cat2">お子さま連れの<br />お客さまへ</a></li>
<li><a href="/info/#cat3">障がいをお持ちの<br />お客さまへ</a></li>
</ul>				
</div>
</section>
<!--/FAQ AREA-->

<!--COMMENT-->
<section class="comment section parallax-window" data-parallax="scroll" data-image-src="<?php echo THEME_IMAGES; ?>/top/bg_comment_04.jpg" data-z-index="1">
<div class="sectionInner">
<p>Best entertainment. Very clever.<br><span>（ドイツ 60代女性）</span></p>
</div>
<div class="bg" data-stellar-ratio="0.05"></div>
</section>
<!--/COMMENT-->

<!--FOR FANS AREA-->
<section id="forFans" class="section parallax-window" data-parallax="scroll" data-image-src="<?php echo THEME_IMAGES; ?>/top/bg_forfans.jpg" data-z-index="1">
<div class="sectionInner">
<h2>FOR FANS</h2>
<ul>
<li><a href="/forfans/goods/">会場限定のオリジナルグッズ販売中</a></li>
<li><a href="/forfans/fanclub/">ファンクラブ</a></li>
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
<p class="txt"><a href="/forfans/"><?php the_time('Y.m.d'); ?>　<?php the_title(); ?></a></p>
<?php endwhile;?>
<?php else: ?>
<p class="txt">記事がありません。</p>
<?php endif; ?>
<?php wp_reset_postdata(); ?>

<!--<p class="txt"><a href="/forfans/">2016.12.20　京都ロングラン観客動員数10万人突破＆ギア公式サイトリニューアル記念！オリジナルTシャツプレゼント！！</a></p>-->
</div>	
</div>

<div class="bg" data-stellar-ratio="0.05"></div>
</section>
<!--/FOR FANS AREA-->

<aside class="sns">
<!--<div class="fb">
<div class="fbWrapper">
<div class="fb-page" data-href="https://www.facebook.com/cco.gear" data-tabs="timeline" data-width="500px" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/cco.gear"><a href="https://www.facebook.com/cco.gear">ギア -Gear-さん</a></blockquote></div></div>
</div>
</div>-->
<div class="tw">
<div class="twTicker">
<ul class="twList">
<li class="twList_item"></li>
</ul>
</div>
<div class="twIcon">
<a href="https://twitter.com/pinion_gear" target="_blank"><img src="<?php echo THEME_IMAGES; ?>/top/pinion.png" class="charactor" alt="GEAR 公式マスコットキャラクター「ピニオンくん」"></a>
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

<?php get_footer(); ?>

