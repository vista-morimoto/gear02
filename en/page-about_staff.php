<?php /*Template Name: 英語 - 作品紹介 - スタッフ */ ?>
<?php 

$cssLink = '<link rel="stylesheet" href="'.THEME_CSS.'/about.css">';
$jsLink_top = '';
$jsLink_btm = '<script src="'.THEME_JS.'/about.js"></script>';
get_template_part( 'en/header_en' );
?>

<script>
$(function(){
	$(".modalOpen").animatedModal({ 
	modalTarget:'animatedModal',
	animatedIn:'fadeIn', 
	animatedOut:'fadeOut',
	//color:'#3498db',
	});
});

function clickload(id)
{
	$('#modalOpen_' + id).click(function(){
	if(id < 10) {
	id = ("0" + id).slice(-2);
	}
	$('.staff_contents').load('/_wp/wp-content/themes/gear/about/staff/staff' + id + '.html');
	});
}
$(document).ready(function() {
	for (var i = 1; i < 100; i++) {
	clickload(i);
}
});
</script>

<main class="mainContents">
<article>
<section id="staffs" class="section">

<div class="sectionInner">

<dl class="staffList">
	<dt class="part">Director</dt>
	<dd class="member">
	<ul>
		<li class="pt13">On Kyakuyou</li>
	</ul>
	</dd>
</dl>

<!--<dl class="staffList">
	<dt class="part">Production Division</dt>
	<dd class="member clearfix">
	<ul>
		<li class="pt13">Kensaku Kobayashi</li>
		<li class="pt13">Worry Kinoshita</li>
		<li class="pt13">Toru Kubiki</li>
		<li class="pt13">Naoki Iimuro</li>
		<li class="pt13">Ryutaro Okuma</li>
	</ul>
	</dd>
</dl>-->

<dl class="staffList">
	<dt class="part">Stage directors</dt>
	<dd class="member">
	<ul>
		<li class="pt13">Yuji Kohara</li>
	</ul>
	</dd>
</dl>

<dl class="staffList">
	<dt class="part">Stage design</dt>
	<dd class="member">
	<ul>
		<li class="pt13">Takahiro Shibata</li>
	</ul>
	</dd>
</dl>

<dl class="staffList">
	<dt class="part">Stage design assistants</dt>
	<dd class="member">
	<ul>
		<li class="pt13">Sayaka Ikeda</li>
		<li class="pt13">Morihiro Aono</li>
	</ul>
	</dd>
</dl>

<dl class="staffList">
	<dt class="part">Large props</dt>
	<dd class="member">
	<ul>
		<li class="pt13">Hayato Kashiwagi</li>
	</ul>
	</dd>
</dl>

<dl class="staffList">
	<dt class="part">Stage manager</dt>
	<dd class="member">
	<ul>
		<li class="pt13">Takeshi Kawahara</li>
		<li class="pt13">Yutaro Watanabbe</li>
		<li class="pt13">Mitsuhiro Ueda</li>
		<li class="pt13">Misato Taga</li>
		<li class="pt13">Makoto Sugai</li>
		<li class="pt13">Akio Tomida</li>
		<li class="pt13">Taiki Utsumi</li>
		<li class="pt13">Akihiro Nakajima</li>
		<li class="pt13">Takuro Yamashita</li>
	</ul>
	</dd>
</dl>

<dl class="staffList">
<dt class="part">Film Director</dt>
<dd class="member">
	<ul>
		<li class="pt13">Toru Kuboki</li>
		<li class="pt13">Kiyotaka Yoshimitsu</li>
	</ul>
</dd>
</dl>

<dl class="staffList">
<dt class="part">3DCG Director</dt>
<dd class="member">
	<ul>
		<li class="pt13">Kazuhiro Ishibashi</li>
	</ul>
</dd>
</dl>

<dl class="staffList">
	<dt class="part">Lighting effects</dt>
	<dd class="member">
	<ul>
		<li class="pt13">Masahiro Matsutani</li>
		<li class="pt13">Hajime Kumona</li>
	</ul>
	</dd>
</dl>

<dl class="staffList">
	<dt class="part">Light operators</dt>
	<dd class="member">
	<ul>
		<li class="pt13">Mitsuha Ishida</li>
		<li class="pt13">Naoyoshi Negoro</li>
		<li class="pt13">Hitomi Kiuchi</li>
		<li class="pt13">Sayaka Obayashi</li>
		<li class="pt13">Shiori Suzaki</li>
	</ul>
</dd>
</dl>

<dl class="staffList">
	<dt class="part">Sound effects</dt>
	<dd class="member">
	<ul>
		<li class="pt13">Rino Takabatake</a></li>
	</ul>
	</dd>
</dl>

<dl class="staffList">
	<dt class="part">Sound operators</dt>
	<dd class="member">
	<ul>
		<li class="pt13">Kyoro Morinaga</a></li>
		<li class="pt13">Yukina Michino</a></li>
		<li class="pt13">Mina Hayashi</a></li>
	</ul>
</dd>
</dl>

<dl class="staffList">
	<dt class="part">Music</dt>
	<dd class="member">
	<ul>
		<li class="pt13">Nachiho Toyoda</li>
		<li class="pt13">Jun Nishimura</li>
		<li class="pt13">KATSU</li>
		<li class="pt13">Shingo Mimura</li>
	</ul>
	</dd>
</dl>

<!--<dl class="staffList">
	<dt class="part">ピアノ演奏</dt>
	<dd class="member">
	<ul>
		<li><a id="modalOpen_26" href="#animatedModal" class="ani-uLine modalOpen">兵頭祐香</a></li>
	</ul>
	</dd>
</dl>-->
	
<dl class="staffList">
	<dt class="part">Choreography</dt>
	<dd class="member">
	<ul>
		<!--<li><a id="modalOpen_2" href="#animatedModal" class="ani-uLine modalOpen">Ryohei Kondo</a></li>-->
		<li class="pt13">Ryohei Kondo</li>
		<li class="pt13">Naoko Maki</li>
	</ul>
	</dd>
</dl>

<dl class="staffList">
	<dt class="part">Special fan production</dt>
	<dd class="member">
	<ul>
		<li class="pt13">Takayuki Tomoi</li>
	</ul>
	</dd>
</dl>

<dl class="staffList">
	<dt class="part">System design for special LED and lighting costume</dt>
	<dd class="member02">
	<ul>
		<!--<li><a href="http://www.komaden.co.jp/" target="_blank" class="ani-uLine">KOMADEN CORPORATION</a></li>
<li><a href="http://philknot.com/" target="_blank" class="ani-uLine">PHILKNOT</a></li>-->
		<li class="pt13">KOMADEN CORPORATION</li>
		<li class="pt13">PHILKNOT</li>
	</ul>
	</dd>
</dl>

<div class="clear"></div>

<dl class="staffList">
	<dt class="part">System design for Laser effects</dt>
	<dd class="member">
	<ul>
		<li class="pt13">Minoru Fujimoto</li>
		<li class="pt13">Shuhei Tsuchida</li>
	</ul>
	</dd>
</dl>

<div class="clear"></div>

<dl class="staffList">
	<dt class="part">Laser Control System Development</dt>
	<dd class="member">
	<ul>
		<li class="pt13">Hideto Kikuchi</li>
	</ul>
	</dd>
</dl>

<div class="clear"></div>

<dl class="staffList">
	<dt class="part">Small props</dt>
	<dd class="member">
	<ul>
		<li class="pt13">Mao Sakai</li>
		<li class="pt13">Misato Taga</li>
		<li class="pt13">Akiko Takeuchi</li>
	</ul>
	</dd>
</dl>

<!--<dl class="staffList">
	<dt class="part">装飾美術</dt>
	<dd class="member">
	<ul>
		<li><a id="modalOpen_35" href="#animatedModal" class="ani-uLine modalOpen">松本亜希子</a></li>
	</ul>
	</dd>
</dl>-->

<dl class="staffList">
	<dt class="part">Costume Design</dt>
	<dd class="member">
	<ul>
		<li class="pt13">Akihiro Yamada</li>
	</ul>
	</dd>
</dl>

<dl class="staffList">
	<dt class="part">Costume production</dt>
	<dd class="member">
	<ul>
		<li class="pt13">Takaaki Tsujino</li>
		<li class="pt13">Sachiko Mukai</li>
		<li class="pt13">Akiko Mori</li>
	</ul>
	</dd>
</dl>

<!--<dl class="staffList">
	<dt class="part">ロボロイド衣装製作</dt>
	<dd class="member">
	<ul>
		<li><a id="modalOpen_37" href="#animatedModal" class="ani-uLine modalOpen">辻野孝明</a></li>
	</ul>
	</dd>
</dl>

<dl class="staffList">
	<dt class="part">ドール衣装製作</dt>
	<dd class="member">
	<ul>
		<li><a id="modalOpen_38" href="#animatedModal" class="ani-uLine modalOpen">向沙知子</a></li>
	</ul>
	</dd>
</dl>-->

<dl class="staffList">
	<dt class="part">Costume Assistants</dt>
	<dd class="member">
	<ul>
		<li class="pt13">Yuichi Nakajima</li>
		<li class="pt13">Marie Mizuno</li>
	</ul>
	</dd>
</dl>

<dl class="staffList">
	<dt class="part">Makeup</dt>
	<dd class="member">
	<ul>
		<li class="pt13">KOMAKI</li>
		<li class="pt13">Mai Nakajima</li>
	</ul>
	</dd>
</dl>

<!--<dl class="staffList">
	<dt class="part">メイク管理補助</dt>
	<dd class="member">
	<ul>
		<li><a id="modalOpen_42" href="#animatedModal" class="ani-uLine modalOpen">中嶋麻衣</li>
	</ul>
	</dd>
</dl>-->

<dl class="staffList">
	<dt class="part">Image illustration</dt>
	<dd class="member">
	<ul>
		<li class="pt13">Akihiro Yamada</li>
	</ul>
	</dd>
</dl>

<dl class="staffList">
	<dt class="part">Advertising art</dt>
	<dd class="member">
		<ul>
		<li class="pt13">Yoshiko Shigematsu</li>
		<li class="pt13">Takeshi Kuroda</li>
		<li class="pt13">Sadao Tashiro</li>
		<li class="pt13">Natsuki Hosokawa</li>
	</ul>
	</dd>
</dl>

<dl class="staffList">
	<dt class="part">WEB</dt>
	<dd class="member02">
	<ul>
		<!--<li><a href="http://slowcamp.info" target="_blank" class="ani-uLine">Ryota Yamaguchi </a></li>
		<li><a href="http://www.vista.co.jp/" target="_blank" class="ani-uLine">VISTA ARTS </a></li>-->
		<li class="pt13">Ryota Yamaguchi</li>
		<li class="pt13">VISTA ARTS</li>
	</ul>
	</dd>
</dl>

<!--<dl class="staffList">
	<dt class="part">コーディネーター</dt>
	<dd class="member">
	<ul>
		<li class="pt13">城戸遥</li>
	</ul>
	</dd>
</dl>

<dl class="staffList">
	<dt class="part">事務局</dt>
	<dd class="member">
	<ul>
		<li class="pt13">林るみ</li>
	</ul>
	</dd>
</dl>-->
		
<dl class="staffList">
	<dt class="part">Production</dt>
	<dd class="member">
	<ul>
		<li class="pt13">Haruka Kido</li>
		<li class="pt13">Rino Takabatake</li>
		<li class="pt13">Yuji Kohara</li>
		<li class="pt13">Rumi Hayashi</li>
		<li class="pt13">Saika Miki</li>
		<li class="pt13">Ryusuke Shigeta</li>
		<li class="pt13">Hirofumi Shimokawa</li>
		<!--<li class="pt13">Shiori Suzaki</li>-->
		<li class="pt13">Masako Hatano</li>
		<li class="pt13">Mayuko Hanamaki</li>
		<li class="pt13">Yui Hosokai</li>
		<li class="pt13">Kazunori Maeda</li>
		<li class="pt13">Yasuhito Wakabayashi</li>
		<li class="pt13">Jyunichi Wada</li>
	</ul>
	</dd>
</dl>

<dl class="staffList">
	<dt class="part">Production  Assistants</dt>
	<dd class="member">
	<ul>
		<li class="pt13">Kayoko Ichimura</li>
		<li class="pt13">Moe Inoue</li>
		<li class="pt13">Narumi Onishi</li>
		<li class="pt13">Kana Ozawa</li>
		<li class="pt13">Aiko Ono</li>
		<li class="pt13">Mako Kurita</li>
		<li class="pt13">Mami Satake</li>
		<li class="pt13">Yuya Shimizu</li>
		<li class="pt13">Anna Shirai</li>
		<li class="pt13">Mana Shiratori</li>
		<li class="pt13">Makoto Sugai</li>
		<li class="pt13">Akiko Takigawa</li>
		<li class="pt13">Azusa Tada</li>
		<li class="pt13"> Yukari Chikushi</li>
		<li class="pt13">Yoko Tsuji</li>
		<li class="pt13">Sayuki Doso</li>
		<li class="pt13">Mai Nakajima</li>
		<li class="pt13">Mizuki Nishimura</li>
		<li class="pt13"> Tomomo Hata</li>
		<li class="pt13">Yuki Hatasako</li>
		<li class="pt13">Nobuko Hori</li>
		<!--<li class="pt13">Maya Masugi</li>-->
		<li class="pt13">Fumiko Yamaguchi</li>
		<li class="pt13">Yuriko Hayashi</li>
	</ul>
	</dd>
</dl>

<dl class="staffList">
	<dt class="part">Creative Director</dt>
	<dd class="member">
	<ul>
		<li class="pt13">Toru Kuboki</li>
	</ul>
	</dd>
</dl>

<dl class="staffList">
	<dt class="part">Producer</dt>
	<dd class="member">
	<ul>
		<li class="pt13">Keito Kohara</li>
	</ul>
	</dd>
</dl>

<dl class="staffList">
	<dt class="part">Planning and Production</dt>
	<dd class="member02">
	<ul>
		<!--<li><a href="http://www.artcomplex.net/" target="_blank" class="ani-uLine">ART COMPLEX </a></li>-->
		<li class="pt13">ART COMPLEX</li>
	</ul>
	</dd>
</dl>
		
<dl class="staffList">
	<dt class="part">Organizer</dt>
	<dd class="member02">
	<ul>
		<!--<li class="company02"><a href="http://www.artcomplex.net/ac1928/" target="_blank" class="ani-uLine">ART COMPLEX 1928</a></li>-->
		<li class="pt13">ART COMPLEX 1928</li>
	</ul>
	</dd>
</dl>
	
<dl class="staffList">
	<dt class="part">Co-organizer</dt>
	<dd class="member02">
	<ul>
		<!--<li class="company02"><a href="http://www.artcomplex.net/leo/" target="_blank" class="ani-uLine">NPO Live Entertainment Organization (LEO)</a></li>-->
		<li class="pt13">NPO Live Entertainment Organization (LEO)</li>
	</ul>
	</dd>
</dl>

<dl class="staffList">
	<dt class="part">Sponsored by</dt>
	<dd class="member02">
	<ul>
		<!--<li><a href="http://www.artcomplex.net/ridge/" target="_blank" class="ani-uLine">Ridge Creative Inc. </a></li>-->
		<li class="pt13">Ridge Creative Inc.</li>
		<li class="pt13">Wakabayashi Hiroyuki Architecture Institute</li>
	</ul>
	</dd>
</dl>

<!--<dl class="staffList">
	<dt class="part">協力</dt>
	<dd class="member02">
	<ul>
		<li><a href="http://fm-kyoto.jp/" target="_blank" class="ani-uLine">α-STATION </a></li>
		<li><a href="http://www.kadokawa.co.jp/" target="_blank" class="ani-uLine">株式会社KADOKAWA </a></li>
		<li><a href="http://www.jtbcorp.jp/jp/" target="_blank" class="ani-uLine">株式会社JTB西日本 </a></li>
		<li class="company02"><a href="http://www.dentsu.co.jp/" target="_blank" class="ani-uLine">株式会社電通 </a></li>
		<li class="company02"><a href="http://www.chishimatochi.com/" target="_blank" class="ani-uLine">千島土地株式会社 </a></li>
		<li class="company02"><a href="http://www.arpak.co.jp/" target="_blank" class="ani-uLine">株式会社地域計画建築研究所（アルパック） </a></li>
		<li><a href="http://funky802.com/" target="_blank" class="ani-uLine">株式会社ＦＭ８０２ </a></li>
		<li><a href="https://www.daiko.co.jp/" target="_blank" class="ani-uLine">株式会社大広 </a></li>
		<li><a href="http://tomoikougei.main.jp/" target="_blank" class="ani-uLine">友井工芸 </a></li>
		<li class="pt13">MOOI</li>
		<li class="pt13">T&amp;A（teenei and co.,) </li>
		<li><a href="http://cse.eedept.kobe-u.ac.jp/" target="_blank" class="ani-uLine">神戸大学塚本研究室 </a></li>
		<li><a href="http://www.naranja.co.jp/juggling" target="_blank" class="ani-uLine">ジャグリングショップ ナランハ </a></li>
		<li><a href="http://mime1166.com/" target="_blank" class="ani-uLine">いいむろなおきマイムカンパニー </a></li>
		<li><a href="http://1gk-music.com/" target="_blank" class="ani-uLine">1.G.K </a></li>
		<li><a href="http://ichigekiyaoffice.wixsite.com/ichigekiya" target="_blank" class="ani-uLine">劇団壱劇屋 </a></li>
		<li><a href="http://www.ricomotion.com/" target="_blank" class="ani-uLine">（株）リコモーション </a></li>
		<li class="pt13">reco</li>
		<li class="pt13">sunday</li>
		<li><a href="http://www.originaltempo.com/index.html" target="_blank" class="ani-uLine">オリジナルテンポ </a></li>
		<li><a href="http://www.condors.jp/" target="_blank" class="ani-uLine">コンドルズ </a></li>
		<li class="pt13">Top.gear</li>
		<li class="pt13">Chick'n'Heart</li>
		<li class="pt13">sandscape</li>
		<li class="pt13">kasane</li>
		<li class="pt13">kutowans studio</li>
		<li class="pt13">劇団_BIRTHDAYCAKE_</li>
		<li><a href="http://www.namura.cc/" target="_blank" target="_blank" class="ani-uLine">Creative Center Osaka </a></li>
		<li><a href="http://j-v.co.jp/" target="_blank" class="ani-uLine">株式会社ジャグラーズビジョン </a></li>
		<li><a href="http://fes.kyoto.jp/" target="_blank" class="ani-uLine">FES株式会社 </a></li>
	</ul>
	</dd>
</dl>-->

<dl class="staffList">
	<dt class="part">Supported by</dt>
	<dd class="member02">
	<ul>
		<!--<li><a href="http://www.pref.kyoto.jp/" target="_blank" class="ani-uLine">KYoto </a></li>
		<li><a href="http://www.city.kyoto.lg.jp/" target="_blank" class="ani-uLine">Kyoto City  </a></li>
		<li><a href="https://www.kyokanko.or.jp/" target="_blank" class="ani-uLine">Kyoto City Tourism Assosiation </a></li>
		<li class="company02"><a href="http://www.kyo.or.jp/kyoto/" target="_blank" class="ani-uLine">Kyoto Chamber of Commerce and Industry </a></li>
		<li class="company02"><a href="http://hellokcb.or.jp/" target="_blank" class="ani-uLine">Kyoto Convention & Visitors Bureau </a></li>
		<li class="company02 pt13">Kansai Creative Factory Management Council</li>-->

		<li class="pt13">KYoto</li>
		<li class="pt13">Kyoto City</li>
		<li class="pt13">Kyoto City Tourism Assosiation</li>
		<li class="pt13">Kyoto Chamber of Commerce and Industry</li>
		<li class="pt13">Kyoto Convention & Visitors Bureau</li>
		<li class="pt13">Kansai Creative Factory Management Council</li>
		
		<!--<li><a href="" class="ani-uLine">京都府 </a></li>
		<li><a href="" class="ani-uLine">京都市 </a></li>
		<li><a href="" class="ani-uLine">京都市教育委員会 </a></li>
		<li class="company02"><a href="" class="ani-uLine">公益社団法人 京都市観光協会 </a></li>
		<li class="company02"><a href="" class="ani-uLine">京都商工会議所 </a></li>
		<li class="company02"><a href="" class="ani-uLine">公益財団法人 京都文化交流コン<br>ベンションビューロー </a></li>
		<li class="company02"><a href="" class="ani-uLine">KANSAI Creative Factory推進<br>委員会 </a></li>-->
	</ul>
	</dd>
</dl>

</div>
</section>
</article>
</main>



<!--staff_contents-->
<div id="animatedModal" class="wrapModal move animated animatedModal-off">
	<div class="modal-content">
	<a id="btn-close-modal" class="close-animatedModal"><img src="<?php echo THEME_URI; ?>/about/img/staff/close.png"></a>
	<div class="staff_contents"></div>
	</div>
</div>

<?php get_template_part( 'en/footer_en' ); ?>