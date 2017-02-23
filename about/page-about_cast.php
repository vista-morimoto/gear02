<?php /*Template Name: 作品紹介 - キャスト */ ?>
<?php 
$description = '即興マイム部門世界メダリストのマイム俳優、公式日本新記録を持つジャグラーをはじめ、個性豊かなキャストが勢ぞろい。京都で出逢える感動エンターテイメント『ギア-GEAR-』出演中のマイム、ブレイクダンス、マジック、ジャグリング、ドールのプロフィールを一挙公開。';

$cssLink = '
<link rel="stylesheet" href="'.THEME_CSS.'/about.css">
<link rel="stylesheet" href="'.THEME_CSS.'/lib/flickity.css">
';
$jsLink_top = '<script src="'.THEME_JS.'/lib/flickity.pkgd.min.js"></script>';
$jsLink_btm = '<script src="'.THEME_JS.'/about.js"></script>';
get_header();
?>

<script>
(function($){
	
$(function() {	
	$('.tab>li').click(function() {
	var num = $(this).parent().children('li').index(this);
	$('.tab').each(function(){
	$('>li',this).removeClass('current').eq(num).addClass('current');
	});
	$('.tabSection .cast_contents .cast_content').hide().eq(num).show();
	}).first().click();
	
	$('.tab.bottom>li').click(function() {
	var href= $(this).attr('data-url');
	var target = $(href == "#" || href == "" ? 'html' : href);
	$("html,body").animate(500 ,"easeOutQuint");
	return false;
	}); 

	/* $(function(){
	$("a.btn_act").click(function(){
	$('a.btn_act').removeClass('active');
	$(this).addClass('active');
	});
	$('.active').click();
	});*/

	$(".cast_mime").click(function(){
		//$("#box1").fadeIn("slow");
		$(".content_wrap").addClass('disnon');
		$(".content_wrap").eq(0).removeClass('disnon');	
	});
	$(".cast_breakdance").click(function(){
		//$("#box2").fadeIn("slow");
		$(".content_wrap").addClass('disnon');
		$(".content_wrap").eq(1).removeClass('disnon');
	});
	$(".cast_magic").click(function(){
		//$("#box3").fadeIn("slow");
		$(".content_wrap").addClass('disnon');
		$(".content_wrap").eq(2).removeClass('disnon');
	});
	$(".cast_juggling").click(function(){
		//$("#box4").fadeIn("slow");
		$(".content_wrap").addClass('disnon');
		$(".content_wrap").eq(3).removeClass('disnon');
	});
	$(".cast_doru").click(function(){
		//$("#box5").fadeIn("slow");
		$(".content_wrap").addClass('disnon');
		$(".content_wrap").eq(4).removeClass('disnon');
	});	
	
	// 特定のタブを開いて遷移
	$(window).load(function(){		
	var hash = location.hash;
	hash = (hash.match(/^#tab\d+$/) || [])[0];	
	
	if(!hash){
		$('.carousel-main').flickity({
		initialIndex:0
		});
		$('.carousel-nav').flickity({
		asNavFor: '.carousel-main',
		contain: true,
		pageDots: false
		});
	
	}else {	
		var tabname = hash.slice(4);
		var tabname = tabname - 1;
		var tabbar = tabname;
		$(".content_wrap").addClass('disnon');
		$(".content_wrap").eq(tabname).removeClass('disnon');
		$(".tab_list").removeClass('current');
		$(".tab_list").eq(tabbar).addClass('current');
		$(".tab_list_btm").removeClass('current');
		$(".tab_list_btm").eq(tabbar).addClass('current');
	
		$('.carousel-main').flickity({
			initialIndex: (tabbar)
		});
		$('.carousel-nav').flickity({
			asNavFor: '.carousel-main',
			contain: true,
			pageDots: false
		});
	}
	});

	});
})(jQuery);
</script>

<main class="mainContents">


<!--cast_area-->
<article id="cast_area">

<!--tabSection-->
<div class="tabSection">

<ul class="tab top carousel carousel-main carousel--full-width pc_none clearfix">
	<li class="carousel-cell"><a class="cast_mime btn_act"><img src="<?php echo THEME_URI; ?>/about/img/cast/1_sp.jpg" width="100%" alt="マイム"></a></li>
	<li class="carousel-cell"><a class="cast_breakdance btn_act" ><img src="<?php echo THEME_URI; ?>/about/img/cast/2_sp.jpg" width="100%" alt="ブレイクダンス"></a></li>
	<li class="carousel-cell"><a class="cast_magic btn_act" ><img src="<?php echo THEME_URI; ?>/about/img/cast/3_sp.jpg" width="100%" alt="マジック"></a></li>
	<li class="carousel-cell"><a class="cast_juggling btn_act" ><img src="<?php echo THEME_URI; ?>/about/img/cast/4_sp.jpg" width="100%" alt="ジャグリング"></a></li>
	<li class="carousel-cell"><a class="cast_doru btn_act" ><img src="<?php echo THEME_URI; ?>/about/img/cast/5_sp.jpg" width="100%" alt="ドール"></a></li>
</ul>

<ul class="tab top sp_none  clearfix">
	<li class="tab_list"><a class="cast_mime" href="#cast_area"><img src="<?php echo THEME_URI; ?>/about/img/cast/1.jpg" width="100%" alt="マイム"></a></li>
	<li class="tab_list"><a class="cast_breakdance" href="#cast_area"><img src="<?php echo THEME_URI; ?>/about/img/cast/2.jpg" width="100%" alt="ブレイクダンス"></a></li>
	<li class="tab_list"><a class="cast_magic" href="#cast_area"><img src="<?php echo THEME_URI; ?>/about/img/cast/3.jpg" width="100%" alt="マジック"></a></li>
	<li class="tab_list"><a class="cast_juggling" href="#cast_area"><img src="<?php echo THEME_URI; ?>/about/img/cast/4.jpg" width="100%" alt="ジャグリング"></a></li>
	<li class="tab_list"><a class="cast_doru" href="#cast_area"><img src="<?php echo THEME_URI; ?>/about/img/cast/5.jpg" width="100%" alt="ドール"></a></li>
</ul>



<!--cast_contents-->
<div class="cast_contents">


<!--**********************mime**********************-->
<div class="content_wrap">
<div id="box1 tab1" class="cast_content">

<div class="mime_category_title pc_none">
マイム
</div>


<!--いいむろなおき-->
<div class="mime_area cast_box clearfix">
<div class="profile_box pc_right_sp_none">
<h3 class="cast_name">いいむろなおき<span>Naoki Iimuro</span></h3>
<p class="cast_category">マイム俳優</p>
<div class="bar sp_none"></div>
<p class="cast_profile">
フランス・パリ市マルセル・マルソー国際マイム学院卒業。ニデルメイエ国立音楽院コンテンポラリーダンス科最上級クラス首席卒業。1998年、拠点をフランスから日本に移し、「いいむろなおきマイムカンパニー」の名称で活動開始。舞台公演、ワークショップや外部指導、マイム演出、海外フェスティバルへの参加等、幅広く活動中。<br>
スタイリッシュで洗練されたスピード感あふれる舞台をテーマとしながら、常に笑いを忘れない作風は、まさに「関西生まれのおフランス育ち」。<br>
2005年　文化庁新進芸術家海外留学制度研修員<br>
2009年　文化・芸術のオリンピック「第3回世界デルフィックゲーム大会」即興マイム部門金メダリスト<br>
2011年　兵庫県芸術奨励賞受賞
</p>
<div class="go_site_btn"><a href="http://mime1166.com/" target="_blank">関連サイト</a></div>
<div class="cast_schedule_btn"><a href="/ticket/cast_schedule/"><span class="icon-schedule mr10"></span><span class="text">キャストスケジュールを見る</span></a></div>
</div>
<div class="pic_box pc_left_sp_none"><img src="<?php echo THEME_URI; ?>/about/img/cast/photo/iimuro.jpg" ><p>Photo by Yoshikazu Inoue</p></div>
</div>

<!--岡村渉-->
<div class="mime_area cast_box clearfix">
<div class="profile_box fleft">
<h3 class="cast_name">岡村渉<span>Wataru Okamura</span></h3>
<p class="cast_category">マイム俳優</p>
<div class="bar sp_none"></div>
<p class="cast_profile">
大阪芸術大学芸術学部美術学科卒業。<br>
海外で観たストリートパフォーマンスがきっかけでマイムに興味を持ち、2008年よりいいむろなおき氏に師事。<br>
2012年よりいいむろなおきマイムカンパニーの舞台作品や学校公演に出演。<br>
舞台公演を中心にマイム俳優として活動を行う中で、もっと気軽にマイムを楽しんでもらえる機会を作りたいと考え、2014年から『WAO!!パントマイムコメディ』としてストリートパフォーマンスを開始。<br>
たくさんの人にマイムの楽しさと魅力を伝えていきたいと願い、様々な場所で表現活動を行っている。
</p>
<!--<div class="go_site_btn"><a href="#">関連サイト</a></div>-->
<div class="cast_schedule_btn"><a href="/ticket/cast_schedule/"><span class="icon-schedule mr10"></span><span class="text">キャストスケジュールを見る</span></a></div>
</div>
<div class="pic_box fright"><img src="<?php echo THEME_URI; ?>/about/img/cast/photo/okamura.jpg" ><p>Photo by Yoshikazu Inoue</p></div>
</div>

<!--谷啓吾-->
<div class="mime_area cast_box clearfix">
<div class="profile_box pc_right_sp_none">
<h3 class="cast_name">谷啓吾<span>Keigo Tani</span></h3>
<p class="cast_category">マイム俳優</p>
<div class="bar sp_none"></div>
<p class="cast_profile">
大阪芸術大学芸術学部舞台芸術学科卒業。<br>
卒業後は主に関西の小劇場を中心に俳優活動を行い、自ら脚本・演出・プロデュースなども手掛ける。<br>
表現の幅を広げるべくマイム俳優いいむろなおきに師事。<br>
現在ではマイム作品への出演をはじめ、舞台芸術を中心に映画やTVドラマに出演。活動の幅を広げている。
</p>
<!--<div class="go_site_btn"><a href="#">関連サイト</a></div>-->
<div class="cast_schedule_btn"><a href="/ticket/cast_schedule/"><span class="icon-schedule mr10"></span><span class="text">キャストスケジュールを見る</span></a></div>
</div>
<div class="pic_box pc_left_sp_none"><img src="<?php echo THEME_URI; ?>/about/img/cast/photo/tani.jpg" ><p>Photo by Yoshikazu Inoue</p></div>
</div>

<!--大熊隆太郎-->
<div class="mime_area cast_box clearfix">
<div class="profile_box fleft">
<h3 class="cast_name">大熊隆太郎<span>Ryutaro Okuma</span></h3>
<p class="cast_category">マイム俳優</p>
<div class="bar sp_none"></div>
<p class="cast_profile">
関西小劇場で舞台俳優をしながらも、マイム作品での海外公演やいいむろなおきマイムラボセカンドへの参加、ダンスイベントの出演など、身体表現を用いて幅広く活動している。<br>
また自身が代表を務める劇団「壱劇屋」では脚本・演出も担当し、マイム表現を混合した演劇作品をつくる。<br>
DANCE COMPLEX 2008審査員特別賞。ロクソドンタ演劇祭2010優勝。應典院舞台芸術祭space×drama2012優秀劇団。
</p>
<!--<div class="go_site_btn"><a href="#">関連サイト</a></div>-->
<div class="cast_schedule_btn"><a href="/ticket/cast_schedule/"><span class="icon-schedule mr10"></span><span class="text">キャストスケジュールを見る</span></a></div>
</div>
<div class="pic_box fright"><img src="<?php echo THEME_URI; ?>/about/img/cast/photo/ohkuma.jpg" ><p>Photo by Yoshikazu Inoue</p></div>
</div>

<!--松永和也-->
<div class="mime_area cast_box clearfix">
<div class="profile_box pc_right_sp_none">
<h3 class="cast_name">松永和也<span>Kazuya Matsunaga</span></h3>
<p class="cast_category">マイム俳優</p>
<div class="bar sp_none"></div>
<p class="cast_profile">
主に関西の小劇場を中心に俳優活動を行う。演劇公演の他、ダンス作品やテレビCM、映画出演など、その活動領域は多岐に渡る。<br>
高校在学中にいいむろなおき氏に出会い、パントマイムの魅力を知る。卒業後より同氏に師事。「いいむろなおきマイムラボ・セカンド」への参加や、マイム公演「ザ・マイムアワー」出演など、マイム表現の可能性を日々探求している。<br>
その端正な顔立ちとコミカルな演技とのギャップを武器に、急成長を続ける若手注目株である。
</p>
<!--<div class="go_site_btn"><a href="#">関連サイト</a></div>-->
<div class="cast_schedule_btn"><a href="/ticket/cast_schedule/"><span class="icon-schedule mr10"></span><span class="text">キャストスケジュールを見る</span></a></div>
</div>
<div class="pic_box pc_left_sp_none"><img src="<?php echo THEME_URI; ?>/about/img/cast/photo/matsunaga.jpg" ><!--<p>Photo by Yoshikazu Inoue</p>--></div>
</div>


</div>
</div>
<!--**********************/mime**********************-->



<!--**********************breakdance**********************-->
<div class="content_wrap disnon">
<div id="box2 tab2" class="cast_content">

<div class="breakdance_category_title pc_none">
ブレイクダンス
</div>


<!--HIDE-->
<div class="breakdance_area cast_box clearfix">
<div class="profile_box pc_right_sp_none">
<h3 class="cast_name">HIDE</h3>
<p class="cast_category">ダンサー</p>
<div class="bar sp_none"></div>
<p class="cast_profile">
ドイツで開催されたブレイクダンスの最も大きく歴史のある世界大会「Battle of The Year International」で2007年度にてショーケース部門優勝という成績を残す。国内外のダンス大会で優勝経験多数。そして世界最大級のストリートダンスコンテスト「JAPAN DANCE DELIGHT」vol.15,16と2年連続でオープニングアクトとして出演。また『しょぎょーむじょーブラザーズ』として Toshi-Rock と共に大阪を中心に全国各地でストリートパフォーマンスを行っている。日本でも数少ないシルク・ドゥ・ソレイユ登録ダンサー。<br>
<br>
※現在、自身の活動に専念するため『ギア』への出演は長期お休みしております。
</p>
<!--<div class="go_site_btn"><a href="#">関連サイト</a></div>-->
<div class="cast_schedule_btn"><a href="/ticket/cast_schedule/"><span class="icon-schedule mr10"></span><span class="text">キャストスケジュールを見る</span></a></div>
</div>
<div class="pic_box pc_left_sp_none"><img src="<?php echo THEME_URI; ?>/about/img/cast/photo/hide.jpg" ><p>Photo by Yoshikazu Inoue</p></div>
</div>

<!--KATSU-->
<div class="breakdance_area cast_box clearfix">
<div class="profile_box fleft">
<h3 class="cast_name">KATSU</h3>
<p class="cast_category">ダンサー</p>
<div class="bar sp_none"></div>
<p class="cast_profile">
日本が世界に誇る『一撃』の主要メンバー。<br>
『一撃』としてブレイクダンスの世界大会である『Battle of The Year』の日本代表として2002年、2005年に出場し2005年度にはショー部門で優勝、バトル部門では2位と名実共に世界トップレベルとなる。その他国内外において優勝経験多数。<br>
現在はブレイクダンスを原点にジャンルレスなBODY ARTISTとして活動し、舞台公演などストリートシーン以外での活動も精力的に行っている。バレエダンサーやコンテンポラリーダンサーと共に、実験的アーティスト集団『ALPHACT』でも活動中。<br>
また、DIGITAL GROOVE ROCK BAND『1.G.K』ではボーカルやプログラマー兼プロデューサーとしても活動。LINKIN PARK 『the catalyst』Remixコンテストにて日本人初,TOP10受賞。ダンスとROCK BANDの新しい融合を試み、日本のみならず世界から評価を受け、CMソングなどを手がけ著名なアーティストとも多数共演している。
</p>
<!--<div class="go_site_btn"><a href="#">関連サイト</a></div>-->
<div class="cast_schedule_btn"><a href="/ticket/cast_schedule/"><span class="icon-schedule mr10"></span><span class="text">キャストスケジュールを見る</span></a></div>
</div>
<div class="pic_box fright"><img src="<?php echo THEME_URI; ?>/about/img/cast/photo/katsu.jpg" ><p>Photo by Yoshikazu Inoue</p></div>
</div>

<!--達矢-->
<div class="breakdance_area cast_box clearfix">
<div class="profile_box pc_right_sp_none">
<h3 class="cast_name">達矢<span>TATSUYA</span></h3>
<p class="cast_category">ダンサー</p>
<div class="bar sp_none"></div>
<p class="cast_profile">
ダイナミックな動きからスタイリッシュな動きまで、何でもこなすオールラウンダー。<br>
世界一を決めるブレイクダンスの大会『Battle of The Year』その日本大会において2008年-2位・2010年-2位の成績を収める。ダンス界において知らない人はいない世界最大のストリートダンスコンテスト『JAPAN DANCE DELIGHT』各地の予選を勝ち上がり2009年. 2010年 ともにFINALISTに選ばれる。<br>
その他イベントで優勝経験多数。スクール講師も務める。
</p>
<!--<div class="go_site_btn"><a href="#">関連サイト</a></div>-->
<div class="cast_schedule_btn"><a href="/ticket/cast_schedule/"><span class="icon-schedule mr10"></span><span class="text">キャストスケジュールを見る</span></a></div>
</div>
<div class="pic_box pc_left_sp_none"><img src="<?php echo THEME_URI; ?>/about/img/cast/photo/tatsuya.jpg" ><p>Photo by Yoshikazu Inoue</p></div>
</div>

<!--YOPPY-->
<div class="breakdance_area cast_box clearfix">
<div class="profile_box fleft">
<h3 class="cast_name">YOPPY</h3>
<p class="cast_category">ダンサー</p>
<div class="bar sp_none"></div>
<p class="cast_profile">
日本が世界に誇る『一撃』の主要メンバー。世界最大のブレイクダンスの大会『Battle of The Year』その日本大会においてベスト4の成績を収める他、ブロンクスnight 3on3優勝、UK B-Boy Championships Japan Final二年連続ベスト16など、数々の賞歴を誇る。ダイナミックでパワフルな動きや、繊細なステップワークなど、様々なスタイルを得意とする。現在はダンスバトルの審査員やダンスイベントのMCも務め、多岐にわたって活躍している。
</p>
<!--<div class="go_site_btn"><a href="#">関連サイト</a></div>-->
<div class="cast_schedule_btn"><a href="/ticket/cast_schedule/"><span class="icon-schedule mr10"></span><span class="text">キャストスケジュールを見る</span></a></div>
</div>
<div class="pic_box fright"><img src="<?php echo THEME_URI; ?>/about/img/cast/photo/yoppy.jpg" ><p>Photo by Yoshikazu Inoue</p></div>
</div>

<!--たっちん-->
<div class="breakdance_area cast_box clearfix">
<div class="profile_box pc_right_sp_none">
<h3 class="cast_name">たっちん<span>Tatchyn</span></h3>
<p class="cast_category">ダンサー</p>
<div class="bar sp_none"></div>
<p class="cast_profile">
高い身体能力を活かした瞬発力とスピードを武器に、スキルフルな技を取り入れた独創的なムーヴで観るものを魅了する。<br>
世界で最も大きなブレイクダンスの大会の一つである『Battle of The Year』2014年大会において、日本予選優勝、World Finalベスト4という輝かしい成績を収める。<br>
その他、R-16日本予選2年連続優勝（2013、2014）、同World Finalショー部門1位、バトル部門2位（2013）、IBEチームバトル優勝（2010）など、国内外問わず数々の賞歴を誇る。<br>
現在は様々なダンスイベントに出場しながらインストラクターやイベントのゲストダンサー、ジャッジを務めるなどマルチな活躍を見せている。
</p>
<!--<div class="go_site_btn"><a href="#">関連サイト</a></div>-->
<div class="cast_schedule_btn"><a href="/ticket/cast_schedule/"><span class="icon-schedule mr10"></span><span class="text">キャストスケジュールを見る</span></a></div>
</div>
<div class="pic_box pc_left_sp_none"><img src="<?php echo THEME_URI; ?>/about/img/cast/photo/tacchin.jpg" ><p>Photo by Saori Kawanishi</p></div>
</div>

<!--ワンヤン-->
<div class="breakdance_area cast_box clearfix">
<div class="profile_box fleft">
<h3 class="cast_name">ワンヤン</h3>
<p class="cast_category">ダンスアクロバットアーティスト</p>
<div class="bar sp_none"></div>
<p class="cast_profile">
14歳で中国国家雑技団に入団し、チャイニーズポール・フープダイビング・アクロバット・シーソーなどを担当。18歳でオランダのサーカス専門学校の講師に抜擢される。その後はヨーロッパで数々のイベントやショーに出演。<br>
2014年に来日してからは、忍者ショーやテーマパーク、各種イベントでのパフォーマンスから、アクロバットやカンフーの講師まで、幅広く活動している。
</p>
<!--<div class="go_site_btn"><a href="#">関連サイト</a></div>-->
<div class="cast_schedule_btn"><a href="/ticket/cast_schedule/"><span class="icon-schedule mr10"></span><span class="text">キャストスケジュールを見る</span></a></div>
</div>
<div class="pic_box fright"><img src="<?php echo THEME_URI; ?>/about/img/cast/photo/wangyang.jpg" ><p>Photo by Yusuke Otsuki</p></div>
</div>



</div>
</div>
<!--**********************/breakdance**********************-->


<!--**********************magic**********************-->
<div class="content_wrap disnon">
<div id="box3 tab3" class="cast_content">


<div class="magic_category_title pc_none">
マジック
</div>

<!--新子景視-->
<div class="magic_area cast_box clearfix">
<div class="profile_box pc_right_sp_none">
<h3 class="cast_name">新子景視<span>Keishi Atarashi</span></h3>
<p class="cast_category">マジシャン</p>
<div class="bar sp_none"></div>
<p class="cast_profile">
幼少の頃に目の前で観たカードマジックに魅せられ、独学でマジックを学び始める。<br>
関西大学社会学部を卒業後、世界的に有名なマジック専門会員制クラブのメンバーとなり、プロマジシャンとしてのキャリアをスタートさせる。観客の目の前で行うクロースアップマジックから、大掛かりなイリュージョンまで、幅広いジャンルのレパートリーを持つ。中でも最も得意としているのは、人の脳に潜り込み、本人しか知り得ない情報をダイレクトに読み取るという、全く新しいスタイルのマジックで、自ら「ブレインダイブ」と命名し、各方面で注目を集めている。<br>
近年では、ゴールデンタイムの特別番組を含むテレビなど、様々なメディアでも技を披露する一方、映画・舞台でのマジック監修など多方面において活躍の場を広げている。
<!--幼少の頃に目の前で観たカードマジックに魅せられ、独学でマジックを学び始める。<br>
その後、様々なステージや各種メディアへの出演をきっかけに、<br>
17歳でプロマジシャンとしてデビュー。<br>
関西大学社会学部を卒業後、世界的に有名なマジック専門会員制クラブのメンバーとなる。<br>
観客の目の前で見せるクロースアップマジックからステージマジック、大掛かりなイリュージョンまで幅広いジャンルのマジックを得意とする。<br>
また、メタルベンディングをはじめ、予知・透視・テレパシー・サイコキネシスなどの超能力や超常現象でしかありえない事象を、心理学・暗示・催眠といった様々なトリックを使って再現してみせるマインドリーダーとしても活動中。<br>
近年では、テレビCM出演や映画・舞台でのマジック監修など多方面において活躍の場を広げている。-->
</p>
<!--<div class="go_site_btn"><a href="#">関連サイト</a></div>-->
<div class="cast_schedule_btn"><a href="/ticket/cast_schedule/"><span class="icon-schedule mr10"></span><span class="text">キャストスケジュールを見る</span></a></div>
</div>
<div class="pic_box pc_left_sp_none"><img src="<?php echo THEME_URI; ?>/about/img/cast/photo/atarashi.jpg" ><!--<p>Photo by Yoshikazu Inoue</p>--></div>
</div>

<!--山下翔吾-->
<div class="magic_area cast_box clearfix">
<div class="profile_box fleft">
<h3 class="cast_name">山下翔吾<span>Shohgo Yamashita</span></h3>
<p class="cast_category">マジシャン</p>
<div class="bar sp_none"></div>
<p class="cast_profile">
映画監督を目指し京都造形芸術大学映画学科に入学。<br>
在学時にマジックに出会い、映像とマジックを融合させた作品の制作を続ける。<br>
大学卒業後、マジシャンとして上京しようと決意した直後に『ギア』への出演が決まる。<br>
この舞台を機にプロマジシャンとしての活動をスタート。<br>
近年では舞台の演出家としての活動や、2013年公開の映画 「弥勒」（監督:林海象／主演:永瀬正敏）のマジックシーンの演出など、制作者としても活動の場を広げている。
</p>
<!--<div class="go_site_btn"><a href="#">関連サイト</a></div>-->
<div class="cast_schedule_btn"><a href="/ticket/cast_schedule/"><span class="icon-schedule mr10"></span><span class="text">キャストスケジュールを見る</span></a></div>
</div>
<div class="pic_box fright"><img src="<?php echo THEME_URI; ?>/about/img/cast/photo/yamashita.jpg" ><p>Photo by Yoshikazu Inoue</p></div>
</div>

<!--橋本昌也-->
<div class="magic_area cast_box clearfix">
<div class="profile_box pc_right_sp_none">
<h3 class="cast_name">橋本昌也<span>Masaya Hashimoto</span></h3>
<p class="cast_category">マジシャン</p>
<div class="bar sp_none"></div>
<p class="cast_profile">
京都に生まれ、6歳の時にマジックグッズに魅了されたのをきっかけに独学でマジックを学び始める。<br>
17歳で独自に考案したトリックをマジック界に発表したのをきっかけに、パフォーマー＆クリエイターとしてのキャリアをスタート。観客の目と鼻の先で行う“クロースアップマジック”や、大勢を前にして舞台上で行う“ステージマジック”等を得意とする。「人の心に残るエンターテイメント」を追い求め、テーブル上から舞台上まで幅広く活動を続けている。<br>
TBS「ワンステップ！」出演。文化庁第26回国民文化祭にて京都特別賞を受賞。
</p>
<!--<div class="go_site_btn"><a href="#">関連サイト</a></div>-->
<div class="cast_schedule_btn"><a href="/ticket/cast_schedule/"><span class="icon-schedule mr10"></span><span class="text">キャストスケジュールを見る</span></a></div>
</div>
<div class="pic_box pc_left_sp_none"><img src="<?php echo THEME_URI; ?>/about/img/cast/photo/hashimoto.jpg" ><p>Photo by Yoshikazu Inoue</p></div>
</div>


<!--松田有生-->
<div class="magic_area cast_box clearfix">
<div class="profile_box fleft">
<h3 class="cast_name">松田有生<span>Yuki Matsuda</span></h3>
<p class="cast_category">マジシャン</p>
<div class="bar sp_none"></div>
<p class="cast_profile">
中学生の頃にテレビで見たマジックに衝撃を受け、独学でマジックを学び始める。大学時代より世界的マジシャン・深井洋正＆キミカ氏に師事し、卒業と同時にプロデビュー。<br />
「元気に楽しく明るく」をモットーに、テーブルマジックからステージマジックまで幅広いジャンルを得意とする。<br />
福山マジックフェスティバル6分間コンテスト優勝(’16)、同2分間コンテスト優勝(’15)、ICMマジックコンベンション2分間コンテスト第2位(’16)、マジックの祭典in千葉2分間コンテスト第2位(’15)受賞など、確かな実力とフレッシュさを併せ持つ若手の注目株である。
</p>
<!--<div class="go_site_btn"><a href="#">関連サイト</a></div>-->
<div class="cast_schedule_btn"><a href="/ticket/cast_schedule/"><span class="icon-schedule mr10"></span><span class="text">キャストスケジュールを見る</span></a></div>
</div>
<div class="pic_box fright"><img src="<?php echo THEME_URI; ?>/about/img/cast/photo/matsuda.jpg" ><p>Photo by Yusuke Otsuki</p></div>
</div>


</div>
</div>
<!--**********************/magic**********************-->


<!--**********************juggling**********************-->
<div class="content_wrap disnon">
<div id="box4 tab4" class="cast_content">

<div class="juggling_category_title pc_none">
ジャグリング
</div>

<!--酒田しんご-->
<div class="juggling_area cast_box clearfix">
<div class="profile_box pc_right_sp_none">
<h3 class="cast_name">酒田しんご<span>Shingo Sakata</span></h3>
<p class="cast_category">ジャグラー</p>
<div class="bar sp_none"></div>
<p class="cast_profile">
幼少の頃、街角の大道芸を観たことがきっかけで、ジャグリングに興味を覚える。<br>
10歳より独学でジャグリングを学び、高校在学中の17歳で7ボールジャグリング耐久時間の公式日本新記録を樹立する。<br>
シャープ製スマートフォン「AQUOS Xx2」Webムービー、朝日放送『エンカメ』『LIFE-夢のカタチ-』出演。
</p>
<div class="go_site_btn"><a href="http://www.shingosakata.com/" target="_blank">関連サイト</a></div>
<div class="cast_schedule_btn"><a href="/ticket/cast_schedule/"><span class="icon-schedule mr10"></span><span class="text">キャストスケジュールを見る</span></a></div>
</div>
<div class="pic_box pc_left_sp_none"><img src="<?php echo THEME_URI; ?>/about/img/cast/photo/sakata.jpg" ><p>Photo by Yoshikazu Inoue</p></div>
</div>

<!--Ren-->
<div class="juggling_area cast_box clearfix">
<div class="profile_box fleft">
<h3 class="cast_name">Ren</h3>
<p class="cast_category">ジャグラー</p>
<div class="bar sp_none"></div>
<p class="cast_profile">
14歳でジャグリングと出会い、独学にて技術を習得。2010年にプロデビュー。<br>
中性的なルックスと華奢な身体から繰り出される、様々な道具を使ったパフォーマンスは必見。<br>
中でも、ジャズダンスを取り入れた華麗なディアボロの演技は、唯一無二である。<br>
妖艶な雰囲気と独特な世界観で魅せるショーは観るものを虜にし、日本のみならず世界各国にまで活動の幅を広げている。
</p>
<div class="go_site_btn"><a href="http://www.juggler-ren.net" target="_blank">関連サイト</a></div>
<div class="cast_schedule_btn"><a href="/ticket/cast_schedule/"><span class="icon-schedule mr10"></span><span class="text">キャストスケジュールを見る</span></a></div>
</div>
<div class="pic_box fright"><img src="<?php echo THEME_URI; ?>/about/img/cast/photo/ren.jpg" ><p>Photo by Yoshikazu Inoue</p></div>
</div>

<!--渡辺あきら-->
<div class="juggling_area cast_box clearfix">
<div class="profile_box pc_right_sp_none">
<h3 class="cast_name">渡辺あきら<span>Akira Watanabe</span></h3>
<p class="cast_category">ジャグラー</p>
<div class="bar sp_none"></div>
<p class="cast_profile">
スタイリッシュなジャグリングと爽やかな笑顔を武器に、全国各地のイベント、舞台公演、寄席、ジャグリング指導など様々なシーンで活動中。<br>
ユニバーサルスタジオジャパン『ハリウッド・プレミア・パレード』レギュラー出演（2002～2004）や、世界屈指のパフォーマンスフェスティバル『大道芸ワールドカップin静岡』出演をはじめ、コンテスト受賞、メディア出演多数。<br>
2016年には「ももいろクローバーZ 5大ドームツアー『DOME TREK 2016』」出演など活躍の場を広げている。
</p>
<div class="go_site_btn"><a href="http://www.w-akira.com" target="_blank">関連サイト</a></div>
<div class="cast_schedule_btn"><a href="/ticket/cast_schedule/"><span class="icon-schedule mr10"></span><span class="text">キャストスケジュールを見る</span></a></div>
</div>
<div class="pic_box pc_left_sp_none"><img src="<?php echo THEME_URI; ?>/about/img/cast/photo/watanabe.jpg" ><p>Photo by Yoshikazu Inoue</p></div>
</div>

<!--深河晃-->
<div class="juggling_area cast_box clearfix">
<div class="profile_box fleft">
<h3 class="cast_name">深河晃<span>Akira Fukagawa</span></h3>
<p class="cast_category">ジャグラー</p>
<div class="bar sp_none"></div>
<p class="cast_profile">
アクロバティックな身体表現を取り入れたディアボロの演技を得意とする。<br>
2012年アメリカで行われたジャグリング世界大会(IJA)ファイナリストのほか、台湾やトルコなど、世界各地でパフォーマンスを行う。<br>
シルク・ドゥ・ソレイユ登録パフォーマー。<br>
4ディアボロハイトス公式日本記録保持。
</p>
<div class="go_site_btn"><a href="http://j-v.co.jp/" target="_blank">関連サイト</a></div>
<div class="cast_schedule_btn"><a href="/ticket/cast_schedule/"><span class="icon-schedule mr10"></span><span class="text">キャストスケジュールを見る</span></a></div>
</div>
<div class="pic_box fright"><img src="<?php echo THEME_URI; ?>/about/img/cast/photo/fukagawa.jpg" ><p>Photo by Yoshikazu Inoue</p></div>
</div>

<!--リスボン上田-->
<div class="juggling_area cast_box clearfix">
<div class="profile_box pc_right_sp_none">
<h3 class="cast_name">リスボン上田<span>Lisbon Ueda</span></h3>
<p class="cast_category">ジャグラー</p>
<div class="bar sp_none"></div>
<p class="cast_profile">
就職面接用の一発芸としてマジックを勉強し始めたが、気がついてみればジャグリングの日本チャンピオンになっていたという異色の経歴を持つ。<br>
タイトル獲得後はプロパフォーマーとして活動し、ジャグリング世界大会(IJA)で決勝に進出する他、ユニバーサル・スタジオ・ジャパン「ハリウッド・プレミア・パレード」レギュラー出演など、数々のステージで観客を魅了している。<br>
近年では宝塚歌劇団・花組公演「オーシャンズ11」の技術指導や、日伊国際共同制作オペラ「道化師」出演など活躍の場を広げている。<br>
得意技は、バトンテクニックを取り入れたデビルスティックのパフォーマンス。
</p>
<div class="go_site_btn"><a href="http://www.eonet.ne.jp/~juggling/" target="_blank">関連サイト</a></div>
<div class="cast_schedule_btn"><a href="/ticket/cast_schedule/"><span class="icon-schedule mr10"></span><span class="text">キャストスケジュールを見る</span></a></div>
</div>
<div class="pic_box pc_left_sp_none"><img src="<?php echo THEME_URI; ?>/about/img/cast/photo/risbon.jpg" ><p>Photo by Yusuke Otsuki</p></div>
</div>

<!--宮田直人-->
<div class="juggling_area cast_box clearfix">
<div class="profile_box fleft">
<h3 class="cast_name">宮田直人<span>Naoto Miyata</span></h3>
<p class="cast_category">ジャグラー</p>
<div class="bar sp_none"></div>
<p class="cast_profile">
演劇を経て大学よりジャグリングを始める。<br>
スティック系ジャグリングの大会 “FantaStick” にて優勝・準優勝を経験。<br>
2012年には日本最大のジャグリングの大会 “JJF チャンピオンシップ” にてファイナリストとなる。<br>
自身が代表を務める団体「ジャグリング・ユニット・フラトレス」では、脚本・演出を担当し、ジャグリングを舞台美術として利用した新たなジャンルの作品を創作している。
</p>
<div class="go_site_btn"><a href="http://fratres.wp.xdomain.jp" target="_blank">関連サイト</a></div>
<div class="cast_schedule_btn"><a href="/ticket/cast_schedule/"><span class="icon-schedule mr10"></span><span class="text">キャストスケジュールを見る</span></a></div>
</div>
<div class="pic_box fright"><img src="<?php echo THEME_URI; ?>/about/img/cast/photo/miyata.jpg" ><p>Photo by Yusuke Otsuki</p></div>
</div>


</div>
</div>
<!--**********************/juggling**********************-->


<!--**********************doru**********************-->
<div class="content_wrap disnon">
<div id="box5 tab5" class="cast_content">

<div class="doru_category_title pc_none">
ドール
</div>


<!--兵頭祐香-->
<div class="doru_area cast_box clearfix">
<div class="profile_box pc_right_sp_none">
<h3 class="cast_name">兵頭祐香<span>Yuka Hyodo</span></h3>
<p class="cast_category">俳優</p>
<div class="bar sp_none"></div>
<p class="cast_profile">
2003年カンヌ国際映画祭コンペティション部門正式出品作『沙羅双樹』（監督：河瀬直美）主演に抜擢されデビュー。初々しくも表情豊かな演技で鮮烈な印象を残し、初主演にして第18回高崎映画祭最優秀新人賞を受賞。<br>
2007年より、ウォーリー木下を中心に設立されたパフォーマンス集団「オリジナルテンポ」のメンバーとして活動を始め、2009年世界最大の芸術祭・エジンバラフリンジフェスティバルにて代表作の『Shut up,Play!!』が最高評価の5つ星を獲得。<br>
その後、シンガポール、韓国などアジアでの公演だけでなく、イギリス、ハンガリー、ルーマニアなどを始めとするヨーロッパ各地で公演を行う。<br>
2012年には、スロベニアのダンスカンパニー'BETONTANC'との共同制作を行い、『Audition for life』を発表し、好評を得る。<br>
舞台を中心に、TV、映画など、国内外問わず活動を行う。
</p>
<!--<div class="go_site_btn"><a href="#">関連サイト</a></div>-->
<div class="cast_schedule_btn"><a href="/ticket/cast_schedule/"><span class="icon-schedule mr10"></span><span class="text">キャストスケジュールを見る</span></a></div>
</div>
<div class="pic_box pc_left_sp_none"><img src="<?php echo THEME_URI; ?>/about/img/cast/photo/hyodo.jpg" ><p>Photo by Yoshikazu Inoue</p></div>
</div>

<!--平本茜子-->
<div class="doru_area cast_box clearfix">
<div class="profile_box fleft">
<h3 class="cast_name">平本茜子<span>Akane Hiramoto</span></h3>
<p class="cast_category">俳優</p>
<div class="bar sp_none"></div>
<p class="cast_profile">
幼少の頃よりジャズバレエを学び、NYでのダンス留学経験を経て、舞台・ドラマなどで女優として活動。<br>
その身体一杯で表現する天真爛漫な演技は、観る者を魅了する。<br>
出演作品は、ミュージカルや吉本新喜劇、NHK連続テレビ小説など多岐にわたる。<br>
一方で、振付師や脚本家としての才能も併せ持ち、舞台公演のセルフプロデュースなど、マルチな活躍を見せている。
</p>
<!--<div class="go_site_btn"><a href="#">関連サイト</a></div>-->
<div class="cast_schedule_btn"><a href="/ticket/cast_schedule/"><span class="icon-schedule mr10"></span><span class="text">キャストスケジュールを見る</span></a></div>
</div>
<div class="pic_box fright"><img src="<?php echo THEME_URI; ?>/about/img/cast/photo/hiramoto.jpg" ><p>Photo by Yoshikazu Inoue</p></div>
</div>

<!--和田ちさと-->
<!--<div class="doru_area cast_box clearfix">
<div class="profile_box pc_right_sp_none">
<h3 class="cast_name">和田ちさと<span>Chisato Wada</span></h3>
<p class="cast_category">俳優</p>
<div class="bar sp_none"></div>
<p class="cast_profile">
大阪教育大学音楽科卒業後、俳優として活動。ミュージカル「ウェスト・サイド・ストーリー」マリア役等の出演をはじめ、演劇や京都府民ホールアルティ主催のコンテンポラリーダンス公演にも出演。日本での活動を経て、NYのMichael Howard Studiosへ演劇留学。奨学生に選ばれる。演劇の他、一流コメディアンが出演する "COMIX" でも出演。帰国後、大阪・新世界のデザイン＆アートイベント「ツムテンカク2013」で企画演出したゾンビのフラッシュモブを機にグランフロントのウメキタフロアなど様々な商業施設でハロウィンイベントを演出。「ツムテンカク2015」では、味園ビル「ユニバース」にて一夜限りのキャバレーショーを復活させる。
</p>
<div class="cast_schedule_btn"><a href="/ticket/cast_schedule/"><span class="icon-schedule mr10"></span><span class="text">キャストスケジュールを見る</span></a></div>
</div>
<div class="pic_box pc_left_sp_none"><img src="<?php echo THEME_URI; ?>/about/img/cast/photo/wada.jpg" ><p>Photo by Yoshikazu Inoue</p></div>
</div>-->

<!--游礼奈-->
<div class="doru_area cast_box clearfix">
<div class="profile_box pc_right_sp_none">
<h3 class="cast_name">游礼奈<span>Reina Yu</span></h3>
<p class="cast_category">俳優</p>
<div class="bar sp_none"></div>
<p class="cast_profile">
大阪芸術大学舞台芸術学科を卒業後、同大学院に首席入学、修士号取得。主にクラシックバレエやコンテンポラリーダンスの舞台で活躍中。<br>
上海万博にて堀内充振付の舞踊作品を踊り高い評価を得るほか、KAORI aliveメンバーとしてロサンゼルスで開催された18th VIBE dance competitionに参加し、第3位受賞。<br>
その他、なかの国際ダンスコンペティション1位入賞など、国内の舞踊創作コンクールにて自ら振付・出演し多数の受賞歴あり。
</p>
<!--<div class="go_site_btn"><a href="#">関連サイト</a></div>-->
<div class="cast_schedule_btn"><a href="/ticket/cast_schedule/"><span class="icon-schedule mr10"></span><span class="text">キャストスケジュールを見る</span></a></div>
</div>
<div class="pic_box pc_left_sp_none"><img src="<?php echo THEME_URI; ?>/about/img/cast/photo/yu.jpg" ><p>Photo by Yoshikazu Inoue</p></div>
</div>

<!--佐々木ヤス子-->
<div class="doru_area cast_box clearfix">
<div class="profile_box fleft">
<h3 class="cast_name">佐々木ヤス子<span>Yasuko Sasaki</span></h3>
<p class="cast_category">俳優</p>
<div class="bar sp_none"></div>
<p class="cast_profile">神戸大学 発達科学部 人間表現学科卒業。同大学在学中より演劇活動を開始する。<br>
コメディからシリアスな役どころまで柔軟に適応できる演技力には定評があり、主に関西を拠点に活動する劇団やイベント団体から引く手あまたの注目株である。<br>
また、コンテンポラリーダンスやバレエの素養をも併せ持ち、神戸市などが主催する総合芸術祭「神戸ビエンナーレ」において、舞踊家・関典子氏の演出・監修のもと Site Specific Dance Performance #1「GATE」及び#2「KIRA」に出演するなど、幅広いフィールドで活躍している。</p>
<!--<div class="go_site_btn"><a href="#">関連サイト</a></div>-->
<div class="cast_schedule_btn"><a href="/ticket/cast_schedule/"><span class="icon-schedule mr10"></span><span class="text">キャストスケジュールを見る</span></a></div>
</div>
<div class="pic_box fright"><img src="<?php echo THEME_URI; ?>/about/img/cast/photo/sasaki.jpg" ><p>Photo by Yusuke Otsuki</p></div>
</div>

<!--中村るみ-->
<div class="doru_area cast_box clearfix">
<div class="profile_box pc_right_sp_none">
<h3 class="cast_name">中村るみ<span>Rumi Nakamura</span></h3>
<p class="cast_category">俳優</p>
<div class="bar sp_none"></div>
<p class="cast_profile">
2歳の頃にバトントワリングと出会い、国内最大級の大会「全日本バトントワーリング選手権大会」では「ダンストワール部門」および「トゥーバトン部門」において3年連続で全国大会進出、また「ソロトワール部門」でも全国大会出場経験を持つなど、数々の賞歴を誇る。<br>
高校在学時には、創作ダンス部のキャプテンとしてチームを束ね「All Japan Dance Festival-KOBE」では ’10年と’11年に連続入選、’13年「NFCC・全国ハイスクールダンスコンペティション」では入賞およびCBC賞受賞を果たす。<br>
神戸大学入学後に演劇活動をスタートし、学内での定期公演では自らが出演する他、演出や振付でも参加。<br>
また、関西の様々な劇団の公演にも出演するなど、精力的な活動を見せている。<br>
バトントワリングと創作ダンスで培った高い身体能力を活かした溌剌とした演技で、演劇界も注目する新進気鋭の若手女優である。
</p>
<!--<div class="go_site_btn"><a href="#">関連サイト</a></div>-->
<div class="cast_schedule_btn"><a href="/ticket/cast_schedule/"><span class="icon-schedule mr10"></span><span class="text">キャストスケジュールを見る</span></a></div>
</div>
<div class="pic_box pc_left_sp_none"><img src="<?php echo THEME_URI; ?>/about/img/cast/photo/nakamura.jpg" ><p>Photo by Yusuke Otsuki</p></div>
</div>


</div>
</div>
<!--**********************/doru**********************-->

</div>
<!--/cast_contents--> 

<ul class="tab bottom sp_none  clearfix"  >
	<li class="tab_list_btm"><a class="cast_mime" href="#cast_area"><img src="<?php echo THEME_URI; ?>/about/img/cast/1.jpg" width="100%" alt="マイム"></a></li>
	<li class="tab_list_btm"><a class="cast_breakdance" href="#cast_area"><img src="<?php echo THEME_URI; ?>/about/img/cast/2.jpg" width="100%" alt="ブレイクダンス"></a></li>
	<li class="tab_list_btm"><a class="cast_magic" href="#cast_area"><img src="<?php echo THEME_URI; ?>/about/img/cast/3.jpg" width="100%" alt="マジック"></a></li>
	<li class="tab_list_btm"><a class="cast_juggling" href="#cast_area"><img src="<?php echo THEME_URI; ?>/about/img/cast/4.jpg" width="100%" alt="ジャグリング"></a></li>
	<li class="tab_list_btm"><a class="cast_doru" href="#cast_area"><img src="<?php echo THEME_URI; ?>/about/img/cast/5.jpg" width="100%" alt="ドール"></a></li>
</ul>

<ul class="tab bottom carousel carousel-nav carousel--nav  carousel--full-width pc_none  clearfix">
	<li class="carousel-cell"><a class="cast_mime btn_act" href="#cast_area"><img src="<?php echo THEME_URI; ?>/about/img/cast/1_sp.jpg" width="100%" alt="マイム"></a></li>
	<li class="carousel-cell"><a class="cast_breakdance btn_act" href="#cast_area"><img src="<?php echo THEME_URI; ?>/about/img/cast/2_sp.jpg" width="100%" alt="ブレイクダンス"></a></li>
	<li class="carousel-cell"><a class="cast_magic btn_act" href="#cast_area"><img src="<?php echo THEME_URI; ?>/about/img/cast/3_sp.jpg" width="100%" alt="マジック"></a></li>
	<li class="carousel-cell"><a class="cast_juggling btn_act" href="#cast_area"><img src="<?php echo THEME_URI; ?>/about/img/cast/4_sp.jpg" width="100%" alt="ジャグリング"></a></li>
	<li class="carousel-cell"><a class="cast_doru btn_act" href="#cast_area"><img src="<?php echo THEME_URI; ?>/about/img/cast/5_sp.jpg" width="100%" alt="ドール"></a></li>
</ul>

</div>
<!--/tabSection-->
</article>
<!--/cast_area-->

</main>


<?php get_footer(); ?>