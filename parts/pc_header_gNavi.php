<?php
global $bodyClass;
$toppage    = ($bodyClass == 'top')? TRUE: '';//TOPページ判定（日本語・英語）
$toppage_pc = (($bodyClass == 'top') && !is_mobile())? TRUE: '';//PC TOPページ判定（日本語・英語）
?>
<div class="menu-container <?php if( !$toppage_pc ){ echo "sp_none";} ?>">
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
	<li class="gNaviList_item<?php if (is_page('ticket') || is_parent_slug() == 'ticket' || is_parent_slug() == 'reserved'){	echo ' current';} ?>"><a href="/ticket/" class="ani-reverseBtn">公演日程・チケット</a>
	<div class="gNaviList_ul_box">
	<ul>
		<li><a href="/ticket/"><img src="<?php echo THEME_IMAGES; ?>/gnavi/btn_ticket.png" alt="購入方法" /><span>公演日程・購入方法</span></a></li>
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
	<li class="gNaviList_item<?php if (is_page('forfans') || is_post_type_archive('event') || is_parent_slug() == 'forfans'|| is_parent_slug() == 'fanclub'){	echo ' current';} ?>"><a href="/forfans/" class="ani-reverseBtn">FOR FANS</a>
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
