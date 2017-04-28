<?php /*Template Name: TOP（PC） */ ?>
<?php 
global $bodyClass;
global $cssLink;
global $jsLink_btm;
global $jsLink_btm;

$bodyClass ='top';
$cssLink = '
<link rel="stylesheet" href="'.THEME_CSS.'/pc_top.css">
';
$jsLink_top = '
<script src="'.THEME_JS.'/lib/jquery.inview.min.js"></script>
';
$jsLink_btm = '
<script src="'.THEME_JS.'/pc_top.js"></script>
<script src="'.THEME_JS.'/pc_calender.js"></script>
';
get_header();
?>


<!--mainVisual-->
<!-- <section id="mainVisual" class="section parallax-window" data-parallax="scroll" data-image-src="<?php echo THEME_IMAGES; ?>/pc_top/mv/top_main01.jpg" data-z-index="1"> -->
<div id="mainVisual" class="section">
	<div class="sectionInner">
		<h1 class="siteTitle"><img src="<?php echo THEME_IMAGES; ?>/top/logo.png" alt="ギアーGEARー"></h1>
		<div class="scroll"><span></span></div>
	</div>
	<div id="mainVisualSlide">
		<div><img src="<?php echo THEME_IMAGES; ?>/pc_top/mv/top_main01.png" alt=""></div>
		<div><img src="<?php echo THEME_IMAGES; ?>/pc_top/mv/top_main02.png" alt=""></div>
		<div><img src="<?php echo THEME_IMAGES; ?>/pc_top/mv/top_main03.png" alt=""></div>
		<div><img src="<?php echo THEME_IMAGES; ?>/pc_top/mv/top_main04.png" alt=""></div>
		<div><img src="<?php echo THEME_IMAGES; ?>/pc_top/mv/top_main05.png" alt=""></div>
		<div><img src="<?php echo THEME_IMAGES; ?>/pc_top/mv/top_main06.png" alt=""></div>
		<div><img src="<?php echo THEME_IMAGES; ?>/pc_top/mv/top_main07.png" alt=""></div>
		<div><img src="<?php echo THEME_IMAGES; ?>/pc_top/mv/top_main08.png" alt=""></div>
	</div>
	
</div>
<!--/mainVisual-->

<main class="mainContents">
<article>

<div id="topBtnArea">
	<ul class="actions cf">
		<li id="pvBtn"><a id="modalOpen_400" href="#animatedModal_400" class="ani-opacity"><img src="<?php echo THEME_IMAGES; ?>/pc_top/top_pvBtn.png" alt="「紹介動画」を見る"></a></li>
		<li id="tripBtn"><a href="https://www.tripadvisor.jp/Attraction_Review-g298564-d2616330-Reviews-Gear_Art_Complex_1928-Kyoto_Kyoto_Prefecture_Kinki.html" target="_blank"><img src="<?php echo THEME_IMAGES; ?>/pc_top/top_tripBtn.png" alt="トリップアドバイザー"></a></li>
		<li id="voiceBtn"><a href="/about/voice/"><img src="<?php echo THEME_IMAGES; ?>/pc_top/top_voiceBtn.png" alt="お客様の声"></a></li>
		<li id="ticketBtn"><a href="/ticket/"><img src="<?php echo THEME_IMAGES; ?>/pc_top/top_ticketBtn.png" alt="当日券情報"></a></li>
	</ul>
</div>

<section id="news">
	<div class="newsBox cf">
		<div class="postArea">
		<h2>最新のニュース</h2>
		
		<?php 
		if (!is_archive()) {
			$args = array(/* 配列に複数の引数を追加 */
			'post_type' => 'news',
			'tax_query' => array(
				array(
					'taxonomy' => 'news_category',
					'field' => 'slug',
					'terms' => 'important',
					),
			),
			'posts_per_page' => 1,
			'post_status' => 'publish',
			'paged' => $paged
			);
		}
		?>
		<?php $the_query = new WP_Query( $args ); ?>
		<?php if ( $the_query->have_posts() ) :?>
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<dl class="fixPost cf">
			<dt class="date"><?php the_time('Y.m.d'); ?></dt>
			<dd><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></dd>
		</dl>
		<?php endwhile;?>
		<?php else: ?>
		
		<?php endif; ?>
		<?php wp_reset_postdata(); ?>
		
		<?php 
		if (!is_archive()) {
			$args = array(/* 配列に複数の引数を追加 */
			'post_type' => 'news',
			'tax_query' => array(
				array(
					'taxonomy' => 'news_category',
					'field' => 'slug',
					'terms' => 'important',
					'operator' => 'NOT IN',
					),
			),
			'posts_per_page' => 2,
			'post_status' => 'publish',
			'paged' => $paged
			);
		}
		?>
		<?php $the_query = new WP_Query( $args ); ?>
		<?php if ( $the_query->have_posts() ) :?>
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<dl class="cf">
			<dt class="date"><?php the_time('Y.m.d'); ?></dt>
			<dd><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></dd>
		</dl>
		<?php endwhile;?>
		<?php else: ?>
		<p>記事がありません。</p>
		<?php endif; ?>
		<?php wp_reset_postdata(); ?>
		
		<!--<dl class="cf">
			<dt class="date">2016.12.31</dt>
			<dd><a href="#">【テレビ出演情報】『ギア』出演中のマジシャン・新子景視が「新春しゃべくり超豪華初笑い6時間半！ネプくりぃむチュート元日から大暴れSP」(日本テレビ)に登場します！</a></dd>
		</dl>
		<dl class="cf">
			<dt class="date">2016.12.31</dt>
			<dd><a href="#">お客様の声を更新しました</a></dd>
		</dl>-->
		</div>
		<div class="btnArea">
			<a href="/press/news/" class="btn">最新のニュース一覧</a>
		</div>
	</div>

</section>


<!--contentsTabNav-->

<div id="contentsTabNav" class="cf">
	<div id="navAbout" class="navList slick-current">ギアとは？</div>
	<div id="navCharacter" class="navList">キャラクター</div>
	<div id="navCalender" class="navList">公演スケジュール</div>
	<div id="navCast" class="navList">キャスト<br>スケジュール</div>
	<div id="navMap" class="navList">アクセス</div>
	<div id="navfaq" class="navList">よくあるお問合せ</div>
</div>

<section id="contentsTab">
	<div class="sectionInner">
	<div class="contentsSlider">
		<!--GEAR?-->
		<div id="about" class="box cf">
			<div class="visualBox_img">
			<img src="<?php echo THEME_IMAGES; ?>/pc_top/about.jpg" alt="GEARとは" />
			</div>
			<div class="cont">
				<h3 class="txt_01">観客動員数12万人突破！<br>日本発！日本初！<br>京都で出逢える<br>感動エンターテイメント！</h3>
				<p>日本発×日本初のノンバーバル（＝言葉に頼らない）パフォーマンス『ギア-GEAR-』。光や映像と連動したマイム、ブレイクダンス、マジック、ジャグリングによる迫力のパフォーマンスで感動のストーリーを描くとともに、セリフを使わない ”ノンバーバル”という演出により、小さなお子さまや外国の方までもが、言葉の壁を越えて楽しんでいただけます。</p>
				<a href="/about/" class="btn">もっと見る</a>
			</div>
		</div>

		<!--CHARACTER-->
		<div id="character" class="box">
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
			<div class="doll closeArea">
				<div class="characterBox_img"><img src="<?php echo THEME_IMAGES; ?>/top/chara_doll.png" alt="ドール"></div>
				<div class="characterBox_text">
					<h3>ドール<span>DOLL</span></h3>
					<p>かつてのこの工場で作られていた「人形（ドール）」。ある日、ひょんなことから工場に落ちてきて、「好奇心」からロボロイド達と遊ぶうちに少しずつ「人間」に近づいていく。</p>
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
			<!-- <p class="closeBtn"></p> -->
			</div>
		</div>
		<!--CHARACTERここまで-->

		<!--TICKET AREA-->
		<div id="calender" class="box">
			<div id="calenderArea" class="">

			<!--TICKET-->
			<div class="ticketBox">

			<ul class="calenderNavi clearfix navi">
				<li class="calenderNavi_item calenderNavi_item_select">
					<div class="selectWrapper">
						<select name="" id="" tabindex="0">
						<option value="{{slug}}" v-for="item in select">{{item}}</option>
						</select>
					</div>
				</li>
				<!--<li class="calenderNavi_item prev"><a href="#" class="ani-reverseBtn"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> 前の月へ</a></li>
				<li class="calenderNavi_item next"><a href="#" class="ani-reverseBtn">次の月へ <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a></li>-->
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
				</div>
			</template>
			</div>

			<div id="calenderInfo" class="cf">
				<ul class="legend">
					<li><span class="haveToSpace">○</span>空席あり</li>
					<!-- <li><span class="noRoom">●</span>少なくなっています</li> -->
					<li><span class="few">△</span>残りわずか</li>
					<li><span class="full">完売</span>前売完売<small>（当日券は別途販売予定）</small></li>
				</ul>
				<ul class="specialday">
					<li>
						<dl>
							<dt><span class="daytime">■</span>ギアの日割</dt>
							<dd>毎週月曜日（祝日を除く）は<br>14時、19時公演共に500円OFF！</dd>
						</dl>
					</li>
					<li>
						<dl>
							<dt><span class="kids">■</span>キッズデー</dt>
							<dd>毎月第1・3土曜日12時公演は<br>4歳未満のお子さまも一緒にご入場が可能。<br>ご予約はギア事務局（0120-937-882）まで。</dd>
						</dl></li>
				</ul>
				<ul class="calenderBtns">
					<li id="moreBtn" class="wide"><a href="/ticket/" tabindex="0">
						<img src="<?php echo THEME_URI; ?>/img/pc_top/calender_moreBtn.png" alt="カレンダーをもっと見る">
						</a></li>
					<li id="birthBtn"><a href="/ticket/privilege/" tabindex="0">
						<img src="<?php echo THEME_URI; ?>/img/pc_top/calender_birthBtn.png" alt="誕生月プラン">
						</a></li>
					<li id="seatBtn"><a href="/ticket/seat/" tabindex="0">
						<img src="<?php echo THEME_URI; ?>/img/pc_top/calender_seatBtn.png" alt="座席表">
						</a></li>
				</ul>
			</div>


			<!--<p class="closeBtn"></p>-->

			</div>


			<?php /*
			<div class="ticketBox">
				<ul class="calenderNavi clearfix navi">
					<li class="calenderNavi_item calenderNavi_item_select">
					<div class="selectWrapper">
						<select name="" id="">
						<option value="{{slug}}" v-for="item in select">{{item}}</option>
						</select>
					</div>
					</li>
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
				</div><!-- calender_view -->

				<ul class="legend">
					<li><span class="haveToSpace">●</span>余裕があります</li>
					<li><span class="noRoom">●</span>少なくなっています</li>
					<li><span class="few">●</span>残りわずか!!</li>
					<li><span class="full">●</span>前売完売<span>（当日券は​別途​販売​予定）</span></li>
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
			データ取得前のソース
			*/ ?>
			</div>
		</div><!-- calenderここまで -->

		<!--CAST SCHEDULE-->
		<div id="cast" class="box">
			<div class="castSchedule">
			<!-- Vue.jsで監視している範囲（次回のキャストスケジュール用） -->
			<!-- v-cloakは値がセットされるまでの属性。値がセットされると削除される。css側に[v-cloak]{opacity:0;}を記述しています。 -->
			<!-- Vue.jsで監視している範囲（次回のキャストスケジュール用）ここまで -->
			<div class="nextStage">
				<h3 class="nextStage_title">NEXT STAGE</h3>
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
				<dl class="doll">
				<dt>DOLL</dt><dd>{{nextstage.dall}}</dd>
				</dl>
				<dl class="magic">
				<dt>MAGIC</dt><dd>{{nextstage.magic}}</dd>
				</dl>
				<dl class="jaggling">
				<dt>JUGGLING</dt><dd>{{nextstage.jaggling}}</dd>
				</dl>
				
			</div>
			</div>
		</div>
		<!--/CAST SCHEDULEここまで-->

		<!--map-->
		<div id="map" class="box">

			<div id="mapImg">
				<img src="<?php echo THEME_URI; ?>/img/pc_top/access.png" alt="地図"/>
				<h3>ギア専用劇場（ART COMPLEX 1928）</h3>
				<p class="address">〒604-8082　京都府京都市中京区弁慶石町56  1928ビル3F</p>
			</div>

			<div class="cont">
				<ul>
					<li id="printBtn"><a href="/pdf/access_map.pdf" target="_blank">
						<img src="<?php echo THEME_URI; ?>/img/pc_top/access_printBtn.png" alt="地図を印刷する PDFダウンロード">
					</a></li>
					<li id="mapBtn"><a href="https://www.google.co.jp/maps?q=ART+COMPLEX+1928&hl=ja&sll=35.008768,135.766532&sspn=0.010949,0.021136&brcurrent=3,0x6001062b6f570db9:0x408c4afef6d460fd,0&hq=ART+COMPLEX+1928&t=m&z=16" target="_blank">
						<img src="<?php echo THEME_URI; ?>/img/pc_top/access_mapBtn.png" alt="GoogleMaps">
					</a></li>
					<li id="hotelBtn"><a href="/access/areainfo/">
						<img src="<?php echo THEME_URI; ?>/img/pc_top/access_hotelBtn.png" alt="周辺情報">
					</a></li>
				</ul>
			</div><!-- cont -->
		</div>
		<!--/mapここまで-->

		<!--FAQ-->
		<div id="faq" class="box">
			<div class="faqBox cf">
				<dl>
					<dt id="reservTit">チケット予約・<br>会場について</dt>
					<dd><a href="/info/#today">当日券は購入できますか？</a></dd>
					<dd><a href="/info/#value">お得なチケットありますか？</a></dd>
					<dd><a href="/info/#runtime">上演時間はどれくらいですか？<br>途中休憩はありますか？</a></dd>
				</dl>
				<dl>
					<dt id="childTit">お子さま連れの<br>お客さまへ</dt>
					<dd><a href="/info/#kidsday">キッズデーとは？</a></dd>
					<dd><a href="/info/#place">おむつ替えや授乳ができる<br>場所はありますか？</a></dd>
					<dd><a href="/info/#volume">大きな音量で音が流れたり、<br>暗くなる場面が有りますか？</a></dd>
				</dl>
				<dl>
					<dt id="disabilityTit">障がいをお持ちの<br>お客さまへ</dt>
					<dd><a href="/info/#disability">障がいをお持ちのお客さまへ</a></dd>
					<dd><a href="/info/#wheelchair">車椅子に座ったままで<br>観劇することは可能ですか？</a></dd>
					<dd><a href="/info/#sign">手話案内の申し込み方法を<br>おしえてください。</a></dd>
				</dl>
			</div><!-- faqBox -->
			<a href="/info/" class="btn">もっと見る</a>
		</div>
		<!--/FAQここまで-->

	</div><!-- contentsSlider -->
	</div><!-- sectionInner -->
</section>
<!--/contentsTabNav-->


<!--COMMENT-->
<div id="comment">
<div class="sectionInner">

	<div id="leftBig" class="phArea">
		<div class="fadeImg"><img src="<?php echo THEME_URI; ?>/img/pc_top/top_comment_leftBig01.jpg" alt="">
		</div>
		<div class="fadeImg"><img src="<?php echo THEME_URI; ?>/img/pc_top/top_comment_leftBig02.jpg" alt="">
		</div>
		<div class="fadeImg"><img src="<?php echo THEME_URI; ?>/img/pc_top/top_comment_leftBig03.jpg" alt="">
		</div>
		<div class="fadeImg"><img src="<?php echo THEME_URI; ?>/img/pc_top/top_comment_leftBig04.jpg" alt="">
		</div>
	</div>
	<div id="commentTxt">
		<!--<p>Best entertainment. Very clever.<span>（ドイツ 60代女性）</span></p>
		<p>言葉がなくても表情で思いが伝わる。<br>表情の大切さを感じました。<span>（京都府 40代女性）</span></p>
		<p>体験したことのない世界。<br>見えるはずのないものが見えました。<span>（京都府 40代女性）</span></p>
		<p>日本にこんな楽しい<br>ノンバーバルshowがあったなんて!!<span>（岐阜県 30代女性）</span></p>-->
		<p>ラストシーンで涙がでた。何故なんだろう。<span>（50代男性・会社役員）</span></p>
		<p>何回来ても始まるまでのワクワク感。<br>何回来ても新しい感動<span>（40代女性・主婦）</span></p>
		<p>言葉がないのに楽しめる。<br>言葉がないから面白い。<span>（10代男性・学生）</span></p>
		<p>It was fun and make me happy!<span>（20代女性・香港）</span></p>
	</div>
	<div id="rightBig" class="phArea">
			<div class="fadeImg"><img src="<?php echo THEME_URI; ?>/img/pc_top/top_comment_rightBig01.jpg" alt=""></div>
			<div class="fadeImg"><img src="<?php echo THEME_URI; ?>/img/pc_top/top_comment_rightBig02.jpg" alt=""></div>
			<div class="fadeImg"><img src="<?php echo THEME_URI; ?>/img/pc_top/top_comment_rightBig03.jpg" alt=""></div>
			<div class="fadeImg"><img src="<?php echo THEME_URI; ?>/img/pc_top/top_comment_rightBig04.jpg" alt=""></div>
	</div>
	<div id="rightbottomBig" class="phArea">
			<div class="fadeImg"><img src="<?php echo THEME_URI; ?>/img/pc_top/top_comment_rightbottomBig01.jpg" alt=""></div>
			<div class="fadeImg"><img src="<?php echo THEME_URI; ?>/img/pc_top/top_comment_rightbottomBig02.jpg" alt=""></div>
			<div class="fadeImg"><img src="<?php echo THEME_URI; ?>/img/pc_top/top_comment_rightbottomBig03.jpg" alt=""></div>
			<div class="fadeImg"><img src="<?php echo THEME_URI; ?>/img/pc_top/top_comment_rightbottomBig04.jpg" alt=""></div>
	</div>
	<div id="righttop" class="phArea">
			<div class="fadeImg"><img src="<?php echo THEME_URI; ?>/img/pc_top/top_comment_righttop01.jpg" alt=""></div>
			<div class="fadeImg"><div id="juggdivngBox"></div></div>
			<div class="fadeImg"><img src="<?php echo THEME_URI; ?>/img/pc_top/top_comment_righttop02.jpg" alt=""></div>
			<div class="fadeImg"><div id="magicBox"></div></div>
		</ul>
	</div>
	<div id="rightbottom" class="phArea">
			<div class="fadeImg"><div id="mimeBox"></div></div>
			<div class="fadeImg"><img src="<?php echo THEME_URI; ?>/img/pc_top/top_comment_rightbottom01.jpg" alt=""></div>
			<div class="fadeImg"><img src="<?php echo THEME_URI; ?>/img/pc_top/top_comment_rightbottom02.jpg" alt=""></div>
			<div class="fadeImg"><img src="<?php echo THEME_URI; ?>/img/pc_top/top_comment_rightbottom03.jpg" alt=""></div>
	</div>
	<div id="righttopSmall" class="phArea">
			<div class="fadeImg"><img src="<?php echo THEME_URI; ?>/img/pc_top/top_comment_righttopSmall01.jpg" alt=""></div>
			<div class="fadeImg"><img src="<?php echo THEME_URI; ?>/img/pc_top/top_comment_righttopSmall02.jpg" alt=""></div>
			<div class="fadeImg"><div id="dollBox"></div></div>
			<div class="fadeImg"><div id="breakinBox"></div></div>
	</div>
	<div id="rightbottomSmall" class="phArea">
			<div class="fadeImg"><img src="<?php echo THEME_URI; ?>/img/pc_top/top_comment_rightbottomSmall01.jpg" alt=""></div>
			<div class="fadeImg"><img src="<?php echo THEME_URI; ?>/img/pc_top/top_comment_rightbottomSmall02.jpg" alt=""></div>
			<div class="fadeImg"><img src="<?php echo THEME_URI; ?>/img/pc_top/top_comment_rightbottomSmall03.jpg" alt=""></div>
			<div class="fadeImg"><img src="<?php echo THEME_URI; ?>/img/pc_top/top_comment_rightbottomSmall04.jpg" alt=""></div>
	</div>

</div>
</div>
<!--/COMMENT-->

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
<!--modal youtubeここまで-->

<?php get_footer(); ?>
