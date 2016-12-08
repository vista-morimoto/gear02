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
//$css       = SCF::get('css');
//$bodyClass = SCF::get('body_class');
//$bodyAttr  = SCF::get('body_attribute');
//$underlayer = (!is_front_page())? ' underlayer': '';
global $editTitle;
global $bodyClass;
global $description;
global $cssLink;
global $jsLink_top;
global $breadcrumbs;

$title     = get_the_title();

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="format-detection" content="telephone=no">
<title><?php if($editTitle){ echo $editTitle.'｜'; } elseif(isset($title) && !is_front_page()) { echo $title.'｜';} ?>京都の感動エンターテイメント ギア-GEAR-</title>
<meta name="description" content="<?php if($description){echo $description;} else {echo '日本発！日本初！大人も、子どもも夢中になれる、京都で出逢える感動エンターテイメント『ギア-GEAR-』は、絶賛ロングラン公演中！「ノンバーバル（＝言葉に頼らない）パフォーマンス」だから、世代も国籍も越えて、みんなで楽しめます！';} ?>">
<?php get_template_part('header_ogp');?>

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

<?php if( !is_front_page() ): ?>
<!-- head_box -->
<div class="head_box">
<?php endif;?>

<header class="<?php if( is_front_page() ){ echo "pageHeader";} else { echo "underlayerHeader";} ?>">
<div class="titleBox clearfix">
<h1 class="siteName">京都の感動エンターテイメント<br>ギア-GEAR-</h1>
<div class="logo"><a href="/"><img src="<?php echo THEME_IMAGES; ?>/logo_gear.png" alt="ギア-GEAR-" width="100%"></a></div>
<div class="btnBox sp_none">
<ul class="snsBtns">
	<li class="snsBtns_item"><a href="https://twitter.com/nvpgear" target="_blank" class="ani-opacity" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
	<li class="snsBtns_item"><a href="https://www.facebook.com/cco.gear" target="_blank" class="ani-opacity" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
	<li class="snsBtns_item"><a href="https://www.instagram.com/gear_kyoto/" target="_blank" class="ani-opacity" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
	<li class="snsBtns_item"><a href="https://www.youtube.com/channel/UCrQv_h2ZnHw0hk6CdVBQOsQ" target="_blank" class="ani-opacity" title="YouTube"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
	<li class="snsBtns_item"><a href="https://www.tripadvisor.jp/Attraction_Review-g298564-d2616330-Reviews-Gear_Art_Complex_1928-Kyoto_Kyoto_Prefecture_Kinki.html" target="_blank" class="ani-opacity" title="トリップアドバイザー"><i class="fa fa-tripadvisor" aria-hidden="true"></i></a></li>
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
	<li class="gNaviList_item"><a href="/" class="ani-reverseBtn">HOME</a></li>
	<li class="gNaviList_item<?php if (is_page('about') || is_parent_slug() == 'about' || is_post_type_archive('voice')){	echo ' current';} ?>"><a href="/about/" class="ani-reverseBtn">作品紹介</a>
	<div class="gNaviList_ul_box">
	<ul>
		<li><a href="/about/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_about.png" alt="『ギア』とは" /><span>『ギア』とは</span></a></li>
		<li><a href="/about/character/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_character.png" alt="キャラクター" /><span>キャラクター</span></a></li>
		<li><a href="/about/cast/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_cast.png" alt="キャスト" /><span>キャスト</span></a></li>
		<li><a href="/about/staff/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_staff.png" alt="スタッフ" /><span>スタッフ</span></a></li>
		<li<?php if (is_post_type_archive('voice')){ echo ' class="current"';} ?>><a href="/about/voice/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_voice.png" alt="お客さまの声" /><span>お客さまの声</span></a></li>
		<li><a href="/about/history/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_history.png" alt="公演履歴" /><span>公演履歴</span></a></li>
	</ul>
	</div>
	</li>
	<li class="gNaviList_item<?php if (is_page('ticket') || is_parent_slug() == 'ticket' || is_parent_slug() == 'reserved'){	echo ' current';} ?>"><a href="/ticket/" class="ani-reverseBtn">チケット</a>
	<div class="gNaviList_ul_box">
	<ul>
		<li><a href="/ticket/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_ticket.png" alt="購入方法" /><span>購入方法</span></a></li>
		<li><a href="/ticket/seat/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_seat.png" alt="座席表" /><span>座席表</span></a></li>
		<li><a href="/ticket/cast_schedule/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_cast_schedule.png" alt="キャストスケジュール" /><span>キャストスケジュール</span></a></li>
		<li><a href="/ticket/privilege/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_privilege.png" alt="誕生月プラン" /><span>誕生月プラン</span></a></li>
		<li<?php if (is_parent_slug() == 'reserved'){	echo ' class="current"';} ?>><a href="/ticket/reserved/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_reserved.png" alt="団体鑑賞、貸切公演" /><span>団体鑑賞・貸切公演</span></a></li>
	</ul>
	</div>
	</li>
	<li class="gNaviList_item<?php if (is_page('access') || is_parent_slug() == 'access'){	echo ' current';} ?>"><a href="/access/" class="ani-reverseBtn">アクセス</a>
	<div class="gNaviList_ul_box">
	<ul class="gNavi_three_items">
		<li><a href="/access/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_map.png" alt="MAP" /><span>MAP</span></a></li>
		<li><a href="/access/areainfo/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_areainfo.png" alt="周辺情報" /><span>周辺情報</span></a></li>
		<li><a href="/access/theatre/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_theatre.png" alt="劇場紹介" /><span>劇場紹介</span></a></li>
	</ul>
	</div>
	</li>
	<li class="gNaviList_item<?php if (is_page('info') || is_parent_slug() == 'info'){	echo ' current';} ?>"><a href="/info/" class="ani-reverseBtn">よくあるお問合せ</a>
	<div class="gNaviList_ul_box">
	<ul class="gNavi_two_items">
		<li><a href="/info/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_faq.png" alt="よくあるお問合せ" /><span>よくあるお問合せ</span></a></li>
		<li><a href="/info/contact/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_contact.png" alt="お問合せ窓口" /><span>お問合せ窓口</span></a></li>
	</ul>
	</div>
	</li>
	<li class="gNaviList_item<?php if (is_page('forfans') || is_post_type_archive('event') || is_parent_slug() == 'forfans'){	echo ' current';} ?>"><a href="/forfans/" class="ani-reverseBtn">FOR FANS</a>
	<div class="gNaviList_ul_box">
	<ul class="gNavi_three_items">
		<li<?php if (is_page('forfans') || is_post_type_archive('event')){ echo ' class="current"';} ?>><a href="/forfans/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_event.png" alt="イベント" /><span>イベント</span></a></li>
		<li><a href="/forfans/fanclub/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_fanclub.png" alt="ファンクラブ" /><span>ファンクラブ</span></a></li>
		<li><a href="/forfans/goods/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_goods.png" alt="グッズ" /><span>グッズ</span></a></li>
	</ul>
	</div>
	</li>
</ul>
</nav>
</div>
<!-- PCのgNaviここまで -->

<!-- スマホのgNaviここから -->
<a id="modalOpen_500" href="#animatedModal_500" class="pc_none"><i class="fa fa-bars" aria-hidden="true"></i></a>
<div id="animatedModal_500" class="wrapModal animated animatedModal_500-off fadeOut pc_none" style="display:none;">
<div class="modal-content">
<a  id="btn-close-modal" class="close-animatedModal_500"><img src="<?php echo THEME_IMAGES; ?>/gnavi/close.png"></a>

<div class="menu-container">
<nav class="gNavi">
<div class="gNaviList">
<div class="logo"><img src="<?php echo THEME_IMAGES; ?>/logo_gear.png" alt="ギア-GEAR-" width="100%"></div>
<p><a href="/">HOME</a></p>
</div>
<ul class="gNaviList">
	<li class="gNaviList_item"><a href="/about/" class="ani-reverseBtn">作品紹介</a>
	<div class="gNaviList_ul_box">
	<ul>
		<li><a href="/about/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_about.png" alt="『ギア』とは" /><span>『ギア』とは</span></a></li>
		<li><a href="/about/character/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_character.png" alt="キャラクター" /><span>キャラクター</span></a></li>
		<li><a href="/about/cast/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_cast.png" alt="キャスト" /><span>キャスト</span></a></li>
		<li><a href="/about/staff/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_staff.png" alt="スタッフ" /><span>スタッフ</span></a></li>
		<li><a href="/about/voice/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_voice.png" alt="お客さまの声" /><span>お客さまの声</span></a></li>
		<li><a href="/about/history/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_history.png" alt="公演履歴" /><span>公演履歴</span></a></li>
	</ul>
	</div>
	</li>
	<li class="gNaviList_item"><a href="/ticket/" class="ani-reverseBtn">チケット</a>
	<div class="gNaviList_ul_box">
	<ul>
		<li><a href="/ticket/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_ticket.png" alt="購入方法" /><span>購入方法</span></a></li>
		<li><a href="/ticket/seat/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_seat.png" alt="座席表" /><span>座席表</span></a></li>
		<li><a href="/ticket/cast_schedule/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_cast_schedule.png" alt="キャストスケジュール" /><span>キャストスケジュール</span></a></li>
		<li><a href="/ticket/privilege/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_privilege.png" alt="誕生月プラン" /><span>誕生月プラン</span></a></li>
		<li><a href="/ticket/reserved/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_reserved.png" alt="団体鑑賞、貸切公演" /><span>団体鑑賞・貸切公演</span></a></li>
	</ul>
	</div>
	</li>
	<li class="gNaviList_item"><a href="/access/" class="ani-reverseBtn">アクセス</a>
	<div class="gNaviList_ul_box">
	<ul class="gNavi_three_items">
		<li><a href="/access/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_map.png" alt="MAP" /><span>MAP</span></a></li>
		<li><a href="/access/areainfo/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_areainfo.png" alt="周辺情報" /><span>周辺情報</span></a></li>
		<li><a href="/access/theatre/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_theatre.png" alt="劇場紹介" /><span>劇場紹介</span></a></li>
	</ul>
	</div>
	</li>
	<li class="gNaviList_item"><a href="/info/" class="ani-reverseBtn">よくあるお問合せ</a>
	<div class="gNaviList_ul_box">
	<ul class="gNavi_two_items">
		<li><a href="/info/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_faq.png" alt="よくあるお問合せ" /><span>よくあるお問合せ</span></a></li>
		<li><a href="/info/contact/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_contact.png" alt="お問合せ窓口" /><span>お問合せ窓口</span></a></li>
	</ul>
	</div>
	</li>
	<li class="gNaviList_item"><a href="/forfans/" class="ani-reverseBtn">FOR FANS</a>
	<div class="gNaviList_ul_box">
	<ul class="gNavi_three_items">
		<li><a href="/forfans/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_event.png" alt="イベント" /><span>イベント</span></a></li>
		<li><a href="/forfans/fanclub/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_fanclub.png" alt="ファンクラブ" /><span>ファンクラブ</span></a></li>
		<li><a href="/forfans/goods/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_goods.png" alt="グッズ" /><span>グッズ</span></a></li>
	</ul>
	</div>
	</li>
</ul>
<ul class="gNaviList">
	<li class="gNaviList_item"><a href="/press/" class="ani-reverseBtn">プレス窓口</a>
	<div class="gNaviList_ul_box">
	<ul>
		<li><a href="/press/"><span>プレスリリース</span></a></li>
		<li><a href="/press/media/"><span>メディア掲載情報</span></a></li>
		<!--<li><a href="/press/library/"><span>映像・写真ライブラリ</span></a></li>-->
		<li><a href="/press/news/"><span>ニュース</span></a></li>
		<li><a href="/press/past_news/"><span>過去ニュース（～2016年9月以前）</span></a></li>
	</ul>
	</div>
	</li>
	<li class="gNaviList_item"><a href="/recruit/" class="ani-reverseBtn">採用情報</a>
	<div class="gNaviList_ul_box">
	<ul>
		<li><a href="/recruit/"><span>採用情報</span></a></li>
	</ul>
	</div>
	</li>
	<li class="gNaviList_item"><a href="/recruit/" class="ani-reverseBtn">Language</a>
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
		<li class="snsBtns_item"><a href="https://twitter.com/nvpgear" target="_blank" class="ani-opacity"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
		<li class="snsBtns_item"><a href="https://www.facebook.com/cco.gear" target="_blank" class="ani-opacity"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
		<li class="snsBtns_item"><a href="https://www.instagram.com/gear_kyoto/" target="_blank" class="ani-opacity"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
		<li class="snsBtns_item"><a href="https://www.youtube.com/channel/UCrQv_h2ZnHw0hk6CdVBQOsQ" target="_blank" class="ani-opacity"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
		<li class="snsBtns_item"><a href="https://www.tripadvisor.jp/Attraction_Review-g298564-d2616330-Reviews-Gear_Art_Complex_1928-Kyoto_Kyoto_Prefecture_Kinki.html" target="_blank" class="ani-opacity"><i class="fa fa-tripadvisor" aria-hidden="true"></i></a></li>
	</ul>
	</div>
</nav>
</div>

</div>
</div>
<!-- スマホのgNaviここまで -->

</header>

<?php if( !is_front_page() ): ?>
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
