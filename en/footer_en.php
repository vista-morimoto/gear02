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
<p class="logo"><img src="<?php echo THEME_IMAGES; ?>/img_title.png" alt="GEAR"></p>
<div class="contact">
<ul class="address">
	<li>Information ”GEAR" administration office ART COMPLEX 1928<br><span>[Operating hours]<br>Weekday: from 10am to 7pm<br>Sat, Sun and Public holidays:from 9am to 7pm</span></li>
	<li class="icofootTEL">075-254-6520 <span>(Japanese)</span></li>
	<li class="icofootFAX">075-254-6521</li>
	<li class="icofootMAIL"><a href="mailto:hi@gear.ac">hi@gear.ac</a> <span>(English)</span></li>
</ul>
</div>
<ul class="snsBtns">
	<li class="snsBtns_item"><a href="https://twitter.com/gearkyoto" target="_blank" class="ani-opacity" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
	<li class="snsBtns_item"><a href="https://www.facebook.com/cco.gear" target="_blank" class="ani-opacity" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
	<li class="snsBtns_item"><a href="https://www.instagram.com/gear_kyoto/" target="_blank" class="ani-opacity" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
	<li class="snsBtns_item"><a href="https://www.youtube.com/channel/UCrQv_h2ZnHw0hk6CdVBQOsQ" target="_blank" class="ani-opacity" title="YouTube"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
	<li class="snsBtns_item"><a href="https://www.tripadvisor.com/Attraction_Review-g298564-d2616330-Reviews-Gear_Art_Complex_1928-Kyoto_Kyoto_Prefecture_Kinki.html" target="_blank" class="ani-opacity" title="TripAdvisor"><i class="fa fa-tripadvisor" aria-hidden="true"></i></a></li>
</ul>
</div>
<nav class="footerNavi clearfix">
<dl class="footerNavi_box">
	<dt class="footerNavi_title"><a href="/en/about/">THE SHOW</a></dt>
	<dd class="footerNavi_list">
	<ul>
		<li class="footerNavi_list_item"><a href="/en/about/">ABOUT</a></li>
		<li class="footerNavi_list_item"><a href="/en/about/character/">CHARACTER</a></li>
		<li class="footerNavi_list_item"><a href="/en/about/cast/">CAST</a></li>
		<li class="footerNavi_list_item"><a href="/en/about/staff/">CREW</a></li>
		<li class="footerNavi_list_item"><a href="/about/voice/?lang=en">ACCLAIM</a></li>
		<li class="footerNavi_list_item"><a href="/en/about/history/">PAST PERFORMANCES</a></li>
	</ul>
	</dd>
</dl>
<dl class="footerNavi_box">
	<dt class="footerNavi_title"><a href="/en/ticket/">TICKETS</a></dt>
	<dd class="footerNavi_list">
	<ul>
		<li class="footerNavi_list_item"><a href="/en/ticket/">PURCHASE TICKETS</a></li>
		<li class="footerNavi_list_item"><a href="/en/ticket/seat/">SEATING CHART</a></li>
		<!--<li class="footerNavi_list_item"><a href="/en/ticket/cast_schedule/">キャスト<br>スケジュール</a></li>-->
		<li class="footerNavi_list_item"><a href="/en/ticket/privilege/">BIRTHDAY MONTH PLAN</a></li>
		<!--<li class="footerNavi_list_item"><a href="/en/ticket/reserved/">団体鑑賞・貸切公演</a></li>-->
	</ul>
	</dd>
</dl>
<dl class="footerNavi_box">
	<dt class="footerNavi_title"><a href="/en/access/">ACCESS</a></dt>
	<dd class="footerNavi_list">
	<ul>
		<li class="footerNavi_list_item"><a href="/en/access/">MAP</a></li>
		<li class="footerNavi_list_item"><a href="/en/access/areainfo/">SIGHTSEEING</a></li>
		<li class="footerNavi_list_item"><a href="/en/access/theatre/">VENUE</a></li>
	</ul>
	</dd>
</dl>
<dl class="footerNavi_box">
	<dt class="footerNavi_title"><a href="/en/info/">FAQ</a></dt>
	<dd class="footerNavi_list">
	<ul>
		<li class="footerNavi_list_item"><a href="/en/info/">FAQ</a></li>
		<!--<li class="footerNavi_list_item"><a href="/en/info/contact/">お問合せ窓口</a></li>-->
	</ul>
	</dd>
</dl>
<dl class="footerNavi_box">
	<dt class="footerNavi_title"><a href="/en/forfans/">FOR FANS</a></dt>
	<dd class="footerNavi_list">
	<ul>
		<li class="footerNavi_list_item"><a href="/forfans/?lang=en">EVENT</a></li>
		<!--<li class="footerNavi_list_item"><a href="/en/forfans/fanclub/">ファンクラブ</a></li>-->
		<li class="footerNavi_list_item"><a href="/en/forfans/goods/">SOUVENIRS</a></li>
	</ul>
	</dd>
</dl>
<dl class="footerNavi_box">
	<dt class="footerNavi_title"><a href="/en/press/">PRESS CONTACT</a></dt>
	<dd class="footerNavi_list">
	<ul>
		<li class="footerNavi_list_item"><a href="/en/press/">PRESS RELEASE</a></li>
		<li class="footerNavi_list_item"><a href="/en/press/media/">IN THE PRESS</a></li>
		<!--<li class="footerNavi_list_item"><a href="/en/press/library/">映像・写真<br>ライブラリ</a></li>-->
		<li class="footerNavi_list_item"><a href="/press/news/?lang=en">NEWS</a></li>
		<li class="footerNavi_list_item"><a href="/press/past_news/?lang=en">PAST NEWS</a></li>
	</ul>
	</dd>
</dl>
<dl class="footerNavi_box recruit">
	<dt class="footerNavi_title noAction"><a href="/en/recruit/">WORKING ENVIRONMENT</a></dt>
	<dd class="footerNavi_list">
	<ul>
		<li class="footerNavi_list_item"><a href="/en/recruit/">WORKING ENVIRONMENT</a></li>
	</ul>
	</dd>
</dl>
</nav>
<div><small>Copyright (C) 2011 ART COMPLEX Group All rights reserved.</small></div>
</div>
</footer>

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