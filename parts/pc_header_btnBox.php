<?php
global $bodyClass;
$toppage    = ($bodyClass == 'top')? TRUE: '';//TOPページ判定（日本語・英語）
$toppage_pc = (($bodyClass == 'top') && !is_mobile())? TRUE: '';//PC TOPページ判定（日本語・英語）
?>
<div class="btnBox <?php if( !$toppage_pc ){ echo "sp_none";} ?>">
<ul class="snsBtns">
	<li class="snsBtns_item"><a href="https://twitter.com/nvpgear" target="_blank" class="ani-opacity" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
	<li class="snsBtns_item"><a href="https://www.facebook.com/cco.gear" target="_blank" class="ani-opacity" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
	<li class="snsBtns_item"><a href="https://www.instagram.com/gear_kyoto/" target="_blank" class="ani-opacity" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
	<li class="snsBtns_item"><a href="https://www.youtube.com/channel/UCrQv_h2ZnHw0hk6CdVBQOsQ" target="_blank" class="ani-opacity" title="YouTube"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
	<li class="snsBtns_item"><a href="https://www.tripadvisor.jp/Attraction_Review-g298564-d2616330-Reviews-Gear_Art_Complex_1928-Kyoto_Kyoto_Prefecture_Kinki.html" target="_blank" class="ani-opacity" title="トリップアドバイザー"><i class="fa fa-tripadvisor" aria-hidden="true"></i></a></li>
</ul>
<?php //if( $toppage_pc ): ?>
<div class="newsBtn"><a href="/press/news/" class="ani-opacity">ニュース</a></div>
<?php //endif; ?>
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
