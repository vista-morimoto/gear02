<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Gear
 */
/* $css       = SCF::get('css');
$bodyClass = SCF::get('body_class');
$bodyAttr  = SCF::get('body_attribute'); 
$underlayer = (!is_front_page())? ' underlayer': '';*/
global $editTitle;
global $bodyClass;
global $description;
global $cssLink;
global $jsLink_top;
global $breadcrumbs;

$title   = get_the_title();
$toppage = ($bodyClass == 'top')? TRUE: '';

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="format-detection" content="telephone=no">
<title><?php if($editTitle){ echo $editTitle.'｜'; } elseif(isset($title) && !$toppage) { echo $title.'｜';} ?>GEAR - non-verbal performance -</title>
<meta name="description" content="<?php if($description){echo $description;} else {echo 'Not a play,not a musial,not a circus!Give you miracle moments!GEAR is world-top-non-verbal-performance produced in Kyoto! If you go to Kyoto, it is recommended! Never miss it!!';} ?>">
<?php get_template_part('en/header_ogp_en');?>

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="shortcut icon" href="<?php echo HOME_URI; ?>/favicon.ico" >

<!-- CSS -->
<link href='https://fonts.googleapis.com/css?family=Archivo+Black' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo THEME_CSS; ?>/lib/animate.css">
<link rel="stylesheet" href="<?php echo THEME_CSS; ?>/lib/slick.css">
<link rel="stylesheet" href="<?php echo THEME_CSS; ?>/lib/slick-theme.css">
<link rel="stylesheet" href="<?php echo THEME_CSS; ?>/lib/li-scroller.css">
<link rel="stylesheet" href="<?php echo THEME_CSS; ?>/style.css">
<link rel="stylesheet" href="<?php echo THEME_CSS; ?>/mega_menu.css">
<?php //echo $css; ?>

<!-- JS -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo THEME_JS; ?>/lib/jquery-2.2.0.min.js"><\/script>')</script>
<script src="<?php echo THEME_JS; ?>/mega_menu.js"></script>

<!-- PAGE -->
<?php if ($cssLink) { echo $cssLink."\n"; } ?>
<?php if ($jsLink_top) { echo $jsLink_top."\n"; } ?>
<link rel="stylesheet" href="<?php echo THEME_CSS; ?>/en.css">

<?php wp_head(); ?>
</head>

<body <?php body_class($bodyClass); ?>>
<div id="fb-root"></div>
<script>
(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/ja_KS/sdk.js#xfbml=1&version=v2.6";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

<?php if( !$toppage ): ?>
<!-- head_box -->
<div class="head_box">
<?php endif;?>

<header class="<?php if( $toppage ){ echo "pageHeader";} else { echo "underlayerHeader";} ?>">
<div class="titleBox clearfix">
<h1 class="siteName">GEAR - non-verbal performance -</h1>
<div class="logo"><a href="/en/"><img src="<?php echo THEME_IMAGES; ?>/logo_gear.png" alt="GEAR - non-verbal performance -" width="100%"></a></div>
<div class="btnBox sp_none">
<ul class="snsBtns">
	<li class="snsBtns_item"><a href="https://twitter.com/gearkyoto" target="_blank" class="ani-opacity" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
	<li class="snsBtns_item"><a href="https://www.facebook.com/cco.gear" target="_blank" class="ani-opacity" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
	<li class="snsBtns_item"><a href="https://www.instagram.com/gear_kyoto/" target="_blank" class="ani-opacity" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
	<li class="snsBtns_item"><a href="https://www.youtube.com/channel/UCrQv_h2ZnHw0hk6CdVBQOsQ" target="_blank" class="ani-opacity" title="YouTube"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
	<li class="snsBtns_item"><a href="https://www.tripadvisor.com/Attraction_Review-g298564-d2616330-Reviews-Gear_Art_Complex_1928-Kyoto_Kyoto_Prefecture_Kinki.html" target="_blank" class="ani-opacity" title="TripAdvisor"><i class="fa fa-tripadvisor" aria-hidden="true"></i></a></li>
</ul>
<ul class="language">
	<li><a href="#" class="ani-opacity"><span>Language</span></a>
	<ul>
		<li><a href="/" class="ani-opacity">日本語</a></li>
		<li><a href="/en/" class="ani-opacity">English</a></li>
		<li><a href="/cht/" class="ani-opacity">繁體中文</a></li>
		<li><a href="/chs/" class="ani-opacity">简体中文</a></li>
		<li><a href="/kr/" class="ani-opacity">한국</a></li>
		<!--<li><a href="http://www.gearshow.ru/" class="ani-opacity">в России</a></li>-->
	</ul>
	</li>
</ul>
</div>
</div>
<!-- PCのgNaviここから -->
<div class="menu-container sp_none">
<nav class="gNavi">
<ul class="gNaviList">
	<li class="gNaviList_item"><a href="/en/" class="ani-reverseBtn">HOME</a></li>
	<li class="gNaviList_item<?php if (is_page('about') || is_parent_slug() == 'about' || is_post_type_archive('voice')){	echo ' current';} ?>"><a href="/en/about/" class="ani-reverseBtn">THE SHOW</a>
	<div class="gNaviList_ul_box">
	<ul>
		<li><a href="/en/about/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_about.png" alt="ABOUT" /><span>ABOUT</span></a></li>
		<li><a href="/en/about/character/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_character.png" alt="CHARACTER" /><span>CHARACTER</span></a></li>
		<li><a href="/en/about/cast/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_cast.png" alt="CAST" /><span>CAST</span></a></li>
		<li><a href="/en/about/staff/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_staff.png" alt="CREW" /><span>CREW</span></a></li>
		<li<?php if (is_post_type_archive('voice')){ echo ' class="current"';} ?>><a href="/about/voice/?lang=en"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_voice.png" alt="ACCLAIM" /><span>ACCLAIM</span></a></li>
		<li><a href="/en/about/history/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_history.png" alt="PAST PERFORMANCES" /><span class="LH1_1">PAST<br>PERFORMANCES</span></a></li>
	</ul>
	</div>
	</li>
	<li class="gNaviList_item<?php if (is_page('ticket') || is_parent_slug() == 'ticket' || is_parent_slug() == 'reserved'){	echo ' current';} ?>"><a href="/en/ticket/" class="ani-reverseBtn">TICKETS</a>
	<div class="gNaviList_ul_box">
	<ul class="gNavi_three_items">
		<li><a href="/en/ticket/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_ticket.png" alt="PURCHASE TICKETS" /><span>PURCHASE TICKETS</span></a></li>
		<li><a href="/en/ticket/seat/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_seat.png" alt="SEATING CHART" /><span>SEATING CHART</span></a></li>
		<!--<li><a href="/en/ticket/cast_schedule/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_cast_schedule.png" alt="キャストスケジュール" /><span>キャストスケジュール</span></a></li>-->
		<li><a href="/en/ticket/privilege/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_privilege.png" alt="BIRTHDAY MONTH PLAN" /><span class="LH1_1">BIRTHDAY<br>MONTH PLAN</span></a></li>
		<!--<li<?php if (is_parent_slug() == 'reserved'){	echo ' class="current"';} ?>><a href="/en/ticket/reserved/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_reserved.png" alt="団体鑑賞、貸切公演" /><span>団体鑑賞・貸切公演</span></a></li>-->
	</ul>
	</div>
	</li>
	<li class="gNaviList_item<?php if (is_page('access') || is_parent_slug() == 'access'){ echo ' current';} ?>"><a href="/en/access/" class="ani-reverseBtn">ACCESS</a>
	<div class="gNaviList_ul_box">
	<ul class="gNavi_three_items">
		<li><a href="/en/access/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_map.png" alt="MAP" /><span>MAP</span></a></li>
		<li><a href="/en/access/areainfo/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_areainfo.png" alt="SIGHTSEEING" /><span>SIGHTSEEING</span></a></li>
		<li><a href="/en/access/theatre/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_theatre.png" alt="VENUE" /><span>VENUE</span></a></li>
	</ul>
	</div>
	</li>
	<li class="gNaviList_item<?php if (is_page('info') || is_parent_slug() == 'info'){ echo ' current';} ?>"><a href="/en/info/" class="ani-reverseBtn">FAQ</a>
	<!--<div class="gNaviList_ul_box">
	<ul class="gNavi_two_items">
		<li><a href="/en/info/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_faq.png" alt="よくあるお問合せ" /><span>よくあるお問合せ</span></a></li>
		<li><a href="/en/info/contact/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_contact.png" alt="お問合せ窓口" /><span>お問合せ窓口</span></a></li>
	</ul>
	</div>-->
	</li>
	<li class="gNaviList_item<?php if (is_page('forfans') || is_post_type_archive('event') || is_parent_slug() == 'forfans'){ echo ' current';} ?>"><a href="/forfans/?lang=en" class="ani-reverseBtn">FOR FANS</a>
	<div class="gNaviList_ul_box">
	<ul class="gNavi_two_items">
		<li<?php if (is_page('forfans') || is_post_type_archive('event')){ echo ' class="current"';} ?>><a href="/forfans/?lang=en"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_event.png" alt="EVENT" /><span>EVENT</span></a></li>
		<!--<li><a href="/en/forfans/fanclub/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_fanclub.png" alt="ファンクラブ" /><span>ファンクラブ</span></a></li>-->
		<li><a href="/en/forfans/goods/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_goods.png" alt="SOUVENIRS" /><span>SOUVENIRS</span></a></li>
	</ul>
	</div>
	</li>
</ul>
</nav>
</div>
<!-- PCのgNaviここまで -->

<!-- スマホのgNaviここから -->
<a id="modalOpen_500" href="#animatedModal_500" class="pc_none">
<i class="fa fa-bars" aria-hidden="true"></i>
</a>
<div id="animatedModal_500" class="wrapModal animated animatedModal_500-off fadeOut pc_none" style="display:none;">
<div class="modal-content">
<a  id="btn-close-modal" class="close-animatedModal_500"><img src="<?php echo THEME_IMAGES; ?>/gnavi/close.png"></a>
<div class="menu-container">
<nav class="gNavi">
<div class="gNaviList">
<div class="logo"><img src="<?php echo THEME_IMAGES; ?>/logo_gear.png" alt="GEAR - non-verbal performance -" width="100%"></div>
<p><a href="/en/">HOME</a></p>
</div>
<ul class="gNaviList">
	<li class="gNaviList_item"><a href="/en/about/" class="ani-reverseBtn">THE SHOW</a>
	<div class="gNaviList_ul_box">
	<ul>
		<li><a href="/en/about/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_about.png" alt="ABOUT" /><span>ABOUT</span></a></li>
		<li><a href="/en/about/character/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_character.png" alt="CHARACTER" /><span>CHARACTER</span></a></li>
		<li><a href="/en/about/cast/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_cast.png" alt="CAST" /><span>CAST</span></a></li>
		<li><a href="/en/about/staff/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_staff.png" alt="CREW" /><span>CREW</span></a></li>
		<li><a href="/about/voice/?lang=en"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_voice.png" alt="ACCLAIM" /><span>ACCLAIM</span></a></li>
		<li><a href="/en/about/history/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_history.png" alt="PAST PERFORMANCES" /><span>PAST PERFORMANCES</span></a></li>
	</ul>
	</div>
	</li>
	<li class="gNaviList_item"><a href="/en/ticket/" class="ani-reverseBtn">TICKETS</a>
	<div class="gNaviList_ul_box">
	<ul>
		<li><a href="/en/ticket/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_ticket.png" alt="PURCHASE TICKETS" /><span>PURCHASE TICKETS</span></a></li>
		<li><a href="/en/ticket/seat/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_seat.png" alt="SEATING CHART" /><span>SEATING CHART</span></a></li>
		<!--<li><a href="/en/ticket/cast_schedule/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_cast_schedule.png" alt="キャストスケジュール" /><span>キャストスケジュール</span></a></li>-->
		<li><a href="/en/ticket/privilege/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_privilege.png" alt="BIRTHDAY MONTH PLAN" /><span>BIRTHDAY MONTH PLAN</span></a></li>
		<!--<li><a href="/en/ticket/reserved/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_reserved.png" alt="団体鑑賞、貸切公演" /><span>団体鑑賞・貸切公演</span></a></li>-->
	</ul>
	</div>
	</li>
	<li class="gNaviList_item"><a href="/en/access/" class="ani-reverseBtn">ACCESS</a>
	<div class="gNaviList_ul_box">
	<ul class="gNavi_three_items">
		<li><a href="/en/access/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_map.png" alt="MAP" /><span>MAP</span></a></li>
		<li><a href="/en/access/areainfo/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_areainfo.png" alt="SIGHTSEEING" /><span>SIGHTSEEING</span></a></li>
		<li><a href="/en/access/theatre/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_theatre.png" alt="VENUE" /><span>VENUE</span></a></li>
	</ul>
	</div>
	</li>
	<li class="gNaviList_item"><a href="/en/info/" class="ani-reverseBtn">FAQ</a>
	<div class="gNaviList_ul_box">
	<ul class="gNavi_two_items">
		<li><a href="/en/info/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_faq.png" alt="FAQ" /><span>FAQ</span></a></li>
		<!--<li><a href="/en/info/contact/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_contact.png" alt="お問合せ窓口" /><span>お問合せ窓口</span></a></li>-->
	</ul>
	</div>
	</li>
	<li class="gNaviList_item"><a href="/forfans/?lang=en" class="ani-reverseBtn">FOR FANS</a>
	<div class="gNaviList_ul_box">
	<ul class="gNavi_three_items">
		<li><a href="/forfans/?lang=en"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_event.png" alt="EVENT" /><span>EVENT</span></a></li>
		<!--<li><a href="/en/forfans/fanclub/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_fanclub.png" alt="ファンクラブ" /><span>ファンクラブ</span></a></li>-->
		<li><a href="/en/forfans/goods/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_goods.png" alt="SOUVENIRS" /><span>SOUVENIRS</span></a></li>
	</ul>
	</div>
	</li>
	</ul>
	<ul class="gNaviList">
	<li class="gNaviList_item"><a href="/en/press/" class="ani-reverseBtn">PRESS CONTACT</a>
	<div class="gNaviList_ul_box">
	<ul>
		<li><a href="/en/press/"><span>PRESS RELEASE</span></a></li>
		<li><a href="/en/press/media/"><span>IN THE PRESS</span></a></li>
		<!--<li><a href="/en/press/library/"><span>映像・写真ライブラリ</span></a></li>-->
		<li><a href="/press/news/?lang=en"><span>NEWS</span></a></li>
		<li><a href="/press/past_news/?lang=en"><span>PAST NEWS</span></a></li>
	</ul>
	</div>
	</li>
	<li class="gNaviList_item"><a href="/en/recruit/" class="ani-reverseBtn">WORKING ENVIRONMENT</a>
	<div class="gNaviList_ul_box">
	<ul>
		<li><a href="/en/recruit/"><span>WORKING ENVIRONMENT</span></a></li>
	</ul>
	</div>
	</li>
	<li class="gNaviList_item"><a href="/en/recruit/" class="ani-reverseBtn">Language</a>
	<div class="gNaviList_ul_box">
	<ul>
		<li><a href="/"><span>日本語</span></a></li>
		<li><a href="/en/"><span>English</span></a></li>
		<li><a href="/cht/"><span>繁體中文</span></a></li>
		<li><a href="/chs/"><span>简体中文</span></a></li>
		<li><a href="/kr/"><span>한국</span></a></li>
		<!--<li><a href="http://www.gearshow.ru/" target="_blank"><span>в России</span></a></li>-->
	</ul>
	</div>
	</li>
	</ul>
	<div class="gNaviList">
	<ul class="snsBtns">
		<li class="snsBtns_item"><a href="https://twitter.com/gearkyoto" target="_blank" class="ani-opacity" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
		<li class="snsBtns_item"><a href="https://www.facebook.com/cco.gear" target="_blank" class="ani-opacity" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
		<li class="snsBtns_item"><a href="https://www.instagram.com/gear_kyoto/" target="_blank" class="ani-opacity" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
		<li class="snsBtns_item"><a href="https://www.youtube.com/channel/UCrQv_h2ZnHw0hk6CdVBQOsQ" target="_blank" class="ani-opacity" title="YouTube"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
		<li class="snsBtns_item"><a href="https://www.tripadvisor.com/Attraction_Review-g298564-d2616330-Reviews-Gear_Art_Complex_1928-Kyoto_Kyoto_Prefecture_Kinki.html" target="_blank" class="ani-opacity" title="TripAdvisor"><i class="fa fa-tripadvisor" aria-hidden="true"></i></a></li>
	</ul>
</div>
</nav>
</div>


</div>
</div>
<!-- スマホのgNaviここまで -->

</header>

<?php if( !$toppage ): ?>
<h2 class="sectionSubTitle"><?php if($editTitle) { echo $editTitle;} else the_title(); ?></h2>

<ol class="breadcrumbs sp_none">
<?php
if($breadcrumbs){ echo $breadcrumbs; }
elseif(function_exists('bcn_display')) { bcn_display();}
?>
</ol>

</div>
<!--/head_box-->
<?php endif; ?>