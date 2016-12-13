<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Gear
 */
$js  = SCF::get('javascript');
global $jsLink_btm;
?>

<footer class="pageFooter">
<div class="footerInner">
<div class="clearfix">
<p class="logo"><img src="<?php echo THEME_IMAGES; ?>/img_title.png" alt="ギア"></p>
<div class="contact">
	<ul class="address">
		<li>ART COMPLEX 1928内 (通常開館 10:00-19:00)</li>
		<li class="icofootTEL">075-254-6520（チケット窓口　0120-937-882）</li>
		<li class="icofootFAX">075-254-6521</li>
		<li class="icofootMAIL"><a href="mailto:info@gear.ac">info@gear.ac</a></li>
	</ul>
</div>
<ul class="snsBtns">
	<li class="snsBtns_item"><a href="https://twitter.com/nvpgear" target="_blank" class="ani-opacity"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
	<li class="snsBtns_item"><a href="https://www.facebook.com/cco.gear" target="_blank" class="ani-opacity"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
	<li class="snsBtns_item"><a href="https://www.instagram.com/gear_kyoto/" target="_blank" class="ani-opacity"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
	<li class="snsBtns_item"><a href="https://www.youtube.com/channel/UCrQv_h2ZnHw0hk6CdVBQOsQ" target="_blank" class="ani-opacity"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
	<li class="snsBtns_item"><a href="https://www.tripadvisor.jp/Attraction_Review-g298564-d2616330-Reviews-Gear_Art_Complex_1928-Kyoto_Kyoto_Prefecture_Kinki.html" target="_blank" class="ani-opacity"><i class="fa fa-tripadvisor" aria-hidden="true"></i></a></li>
</ul>
</div>
<nav class="footerNavi clearfix">
	<dl class="footerNavi_box">
		<dt class="footerNavi_title"><a href="/about/">作品紹介</a></dt>
		<dd class="footerNavi_list">
		<ul>
			<li class="footerNavi_list_item"><a href="/about/">『ギア』とは</a></li>
			<li class="footerNavi_list_item"><a href="/about/character/">キャラクター</a></li>
			<li class="footerNavi_list_item"><a href="/about/cast/">キャスト</a></li>
			<li class="footerNavi_list_item"><a href="/about/staff/">スタッフ</a></li>
			<li class="footerNavi_list_item"><a href="/about/voice/">お客さまの声</a></li>
			<li class="footerNavi_list_item"><a href="/about/history/">公演履歴</a></li>
		</ul>
		</dd>
	</dl>
	<dl class="footerNavi_box">
		<dt class="footerNavi_title"><a href="/ticket/">チケット</a></dt>
		<dd class="footerNavi_list">
		<ul>
			<li class="footerNavi_list_item"><a href="/ticket/">購入方法</a></li>
			<li class="footerNavi_list_item"><a href="/ticket/seat/">座席表</a></li>
			<li class="footerNavi_list_item"><a href="/ticket/cast_schedule/">キャスト<br>スケジュール</a></li>
			<li class="footerNavi_list_item"><a href="/ticket/privilege/">誕生月プラン</a></li>
			<li class="footerNavi_list_item"><a href="/ticket/reserved/">団体鑑賞・貸切公演</a></li>
		</ul>
		</dd>
	</dl>
	<dl class="footerNavi_box">
		<dt class="footerNavi_title"><a href="/access/">アクセス</a></dt>
		<dd class="footerNavi_list">
		<ul>
			<li class="footerNavi_list_item"><a href="/access/">MAP</a></li>
			<li class="footerNavi_list_item"><a href="/access/areainfo/">周辺情報</a></li>
			<li class="footerNavi_list_item"><a href="/access/theatre/">劇場紹介</a></li>
		</ul>
		</dd>
	</dl>
	<dl class="footerNavi_box">
		<dt class="footerNavi_title"><a href="/info/">よくあるお問合せ</a></dt>
		<dd class="footerNavi_list">
		<ul>
			<li class="footerNavi_list_item"><a href="/info/">よくあるお問合せ</a></li>
			<li class="footerNavi_list_item"><a href="/info/contact/">お問合せ窓口</a></li>
		</ul>
		</dd>
	</dl>
	<dl class="footerNavi_box">
		<dt class="footerNavi_title"><a href="/forfans/">FOR FANS</a></dt>
		<dd class="footerNavi_list">
		<ul>
			<li class="footerNavi_list_item"><a href="/forfans/">イベント</a></li>
			<li class="footerNavi_list_item"><a href="/forfans/fanclub/">ファンクラブ</a></li>
			<li class="footerNavi_list_item"><a href="/forfans/goods/">グッズ</a></li>
		</ul>
		</dd>
	</dl>
	<dl class="footerNavi_box">
		<dt class="footerNavi_title"><a href="/press/">プレス窓口</a></dt>
		<dd class="footerNavi_list">
		<ul>
			<li class="footerNavi_list_item"><a href="/press/">プレスリリース</a></li>
			<li class="footerNavi_list_item"><a href="/press/media/">メディア掲載情報</a></li>
			<!--<li class="footerNavi_list_item"><a href="/press/library/">映像・写真<br>ライブラリ</a></li>-->
			<li class="footerNavi_list_item"><a href="/press/news/">ニュース</a></li>
			<li class="footerNavi_list_item"><a href="/press/past_news/">過去ニュース<br>(～2016年9月以前)</a></li>
		</ul>
		</dd>
	</dl>
	<dl class="footerNavi_box recruit">
		<dt class="footerNavi_title noAction"><a href="/recruit/">採用情報</a></dt>
		<dd class="footerNavi_list">
		<ul>
			<li class="footerNavi_list_item"><a href="/recruit/">採用情報</a></li>
		</ul>
		</dd>
	</dl>
</nav>
<div><small>Copyright (C) 2011 ART COMPLEX Group All rights reserved.</small></div>
</div>
</footer>

<!-- PCのfixedNavここから -->
<nav id="fixedNav">
<p><a href="/ticket/#purchase" title="チケット購入"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_purchase.png" alt="購入する" /></a></p>
</nav>
<!-- PCのfixedNavここまで -->

<!--Pagetop-->
<p id="pageTop"><i class="fa fa-angle-up"></i></p>
<!--/Pagetop-->

<!-- ########### scripts ########### -->
<!-- plugin --><script src="//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script>window.jQuery.easing || document.write('<script src="<?php echo THEME_JS; ?>/lib/jquery.easing.min.js"><\/script>')</script>
<!-- plugin --><script src="//cdnjs.cloudflare.com/ajax/libs/vue/1.0.24/vue.min.js"></script>
<script>window.Vue || document.write('<script src="<?php echo THEME_JS; ?>/lib/vue.min.js"><\/script>')</script>
<!-- plugin --><script src="<?php echo THEME_JS;?>/lib/is.min.js"></script>
<!-- plugin --><script src="<?php echo THEME_JS;?>/lib/velocity.min.js"></script>
<!-- plugin --><script src="<?php echo THEME_JS;?>/lib/jquery.ba-throttle-debounce.min.js"></script>
<!-- plugin --><script src="<?php echo THEME_JS;?>/lib/jquery.heightLine.js"></script>
<!-- plugin --><script src="<?php echo THEME_JS;?>/lib/jquery.nicescroll.min.js"></script>
<!-- plugin --><script src="<?php echo THEME_JS;?>/lib/parallax.min.js"></script>
<!-- plugin --><script src="<?php echo THEME_JS;?>/lib/slick.min.js"></script>
<!-- plugin --><script src="<?php echo THEME_JS;?>/lib/jquery.ticker.min.js"></script>
<!-- plugin --><script src="<?php echo THEME_JS;?>/lib/jquery.marquee.min.js"></script>
<!-- plugin --><script src="<?php echo THEME_JS;?>/lib/jquery.li-scroller.1.0.js"></script>
<!-- plugin --><script src="<?php echo THEME_JS;?>/lib/animatedModal.min.js"></script>
<!-- custom --><script src="<?php echo THEME_JS;?>/script.js"></script>

<!-- PAGE -->
<?php echo $js; ?>
<?php if ($jsLink_btm) { echo $jsLink_btm."\n"; } ?>
<!-- ########### /scripts ########### -->

<?php wp_footer(); ?>
<?php get_template_part( 'ga' );?>
</body>
</html>