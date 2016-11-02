<?php /*Template Name: 作品紹介 - スタッフ */ ?>
<?php 
$description = 'スタッフ紹介。スチームパンクファンをうならせるリアルな舞台セット。話題のプロジェクションマッピングやLEDドレスとパフォーマンスの連動も必見。京都で出逢える感動エンターテイメント『ギア-GEAR-』は、絶賛ロングラン公演中！';

$cssLink = '<link rel="stylesheet" href="'.THEME_CSS.'/about.css">';
$jsLink_top = '';
$jsLink_btm = '<script src="'.THEME_JS.'/about.js"></script>';
get_header();
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
<dt class="part">演出</dt>
<dd class="member">
<ul>
	<li class="pt13">オン・キャクヨウ</li>
</ul>
</dd>
</dl>

<dl class="staffList">
<dt class="part">演出部</dt>
<dd class="member clearfix">
<ul>
	<li><a id="modalOpen_1" href="#animatedModal" class="ani-uLine modalOpen">小林顕作 </a></li>
	<li class="pt13">ウォーリー木下</li>
	<li class="pt13">窪木亨</li>
	<li class="pt13">いいむろなおき</li>
	<li class="pt13">大熊隆太郎</li>
</ul>
</dd>
</dl>

<dl class="staffList">
<dt class="part">舞台監督</dt>
<dd class="member">
<ul>
	<li class="pt13">小原悠路</li>
</ul>
</dd>
</dl>

<dl class="staffList">
<dt class="part">舞台美術</dt>
<dd class="member">
<ul>
	<li class="pt13">柴田隆弘</li>
</ul>
</dd>
</dl>

<dl class="staffList">
<dt class="part">舞台美術助手</dt>
<dd class="member">
<ul>
	<li class="pt13">池田紗也加</li>
	<li class="pt13">青野守浩</li>
</ul>
</dd>
</dl>

<dl class="staffList">
<dt class="part">大道具</dt>
<dd class="member">
<ul>
	<li class="pt13">柏木準人</li>
</ul>
</dd>
</dl>

<dl class="staffList">
<dt class="part">舞台進行</dt>
<dd class="member">
<ul>
	<li class="pt13">河原岳史</li>
	<li class="pt13">三木彩夏</li>
	<li class="pt13">渡邊雄太郎</li>
	<li class="pt13">植田光浩</li>
	<li class="pt13">多賀慧</li>
	<li class="pt13">菅井愛琴</li>
	<li class="pt13">冨田聖夫</li>
	<li class="pt13">内海大樹</li>
	<li class="pt13">中島章博</li>
	<li class="pt13">渡辺洸己</li>
	<li class="pt13">山下拓朗</li>
</ul>
</dd>
</dl>

<dl class="staffList">
<dt class="part">映像製作</dt>
<dd class="member">
<ul>
	<li class="pt13">窪木亨</li>
	<li class="pt13">吉光清隆</li>
</ul>
</dd>
</dl>

<dl class="staffList">
<dt class="part">3DCG制作</dt>
<dd class="member">
<ul>
	<li class="pt13">石橋和広</li>
</ul>
</dd>
</dl>

<dl class="staffList">
<dt class="part">照明効果</dt>
<dd class="member">
<ul>
	<li class="pt13">松谷將弘</li>
	<li class="pt13">公文名創</li>
</ul>
</dd>
</dl>

<dl class="staffList">
<dt class="part">照明オペレーター</dt>
<dd class="member">
<ul>
	<li class="pt13">根来直義</li>
	<li class="pt13">木内ひとみ</li>
	<li class="pt13">三木彩夏</li>
	<li class="pt13">Abel Coelho</li>
	<li class="pt13">須崎志緒里</li>
</ul>
</dd>
</dl>

<dl class="staffList">
<dt class="part">音響効果</dt>
<dd class="member">
<ul>
	<li class="pt13">髙畠里乃</a></li>
</ul>
</dd>
</dl>

<dl class="staffList">
<dt class="part">音響オペレーター</dt>
<dd class="member">
<ul>
	<li class="pt13">森永キョロ</a></li>
	<li class="pt13">道野友希菜</a></li>
	<li class="pt13">林実菜</a></li>
</ul>
</dd>
</dl>

<dl class="staffList">
<dt class="part">音楽</dt>
<dd class="member">
<ul>
	<li class="pt13">豊田奈千甫</li>
	<li class="pt13">西村淳</li>
	<li class="pt13">KATSU</li>
	<li class="pt13">三村真吾</li>
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
<dt class="part">振付</dt>
<dd class="member">
<ul>
	<li><a id="modalOpen_2" href="#animatedModal" class="ani-uLine modalOpen">近藤良平</a></li>
	<li class="pt13">槇直子</li>
</ul>
</dd>
</dl>

<dl class="staffList">
<dt class="part">特殊送風機製作</dt>
<dd class="member">
<ul>
	<li class="pt13">友井隆之</li>
</ul>
</dd>
</dl>

<dl class="staffList">
<dt class="part">ウェアラブルLED＋<br>光ファイバー<br>システム開発</dt>
<dd class="member02">
<ul>
	<li><a href="http://www.komaden.co.jp/" target="_blank" class="ani-uLine">株式会社コマデン</a></li>
	<li><a href="http://philknot.com/" target="_blank" class="ani-uLine">株式会社フィルノット</a></li>
</ul>
</dd>
</dl>

<div class="clear"></div>

<dl class="staffList">
<dt class="part">レーザー演出<br>システムデザイン</dt>
	<dd class="member">
<ul>
	<li class="pt13">藤本実</li>
	<li class="pt13">土田修平</li>
</ul>
</dd>
</dl>

<div class="clear"></div>

<dl class="staffList">
<dt class="part">レーザー制御装置<br>開発</dt>
<dd class="member">
<ul>
	<li class="pt13">菊地秀人</li>
</ul>
</dd>
</dl>

<div class="clear"></div>

<dl class="staffList">
<dt class="part">小道具</dt>
<dd class="member">
<ul>
	<li class="pt13">坂井真央</li>
	<li class="pt13">多賀慧</li>
	<li class="pt13">竹内亜希子</li>
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
<dt class="part">衣装原案</dt>
<dd class="member">
<ul>
	<li class="pt13">山田章博</li>
</ul>
</dd>
</dl>

<dl class="staffList">
<dt class="part">衣装制作</dt>
<dd class="member">
<ul>
	<li class="pt13">辻野孝明</li>
	<li class="pt13">向沙知子</li>
	<li class="pt13">林百合子</li>
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
<dt class="part">衣装製作協力</dt>
<dd class="member">
<ul>
	<li class="pt13">中嶋佑一</li>
	<li class="pt13">水野摩利枝</li>
</ul>
</dd>
</dl>

<dl class="staffList">
<dt class="part">メイク指導・管理</dt>
<dd class="member">
<ul>
	<li class="pt13">KOMAKI</li>
	<li class="pt13">中嶋麻衣</li>
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
<dt class="part">イメージイラスト</dt>
<dd class="member">
<ul>
	<li class="pt13">山田章博</li>
</ul>
</dd>
</dl>

<dl class="staffList">
<dt class="part">宣伝美術</dt>
<dd class="member">
<ul>
	<li class="pt13">重松よしこ</li>
	<li class="pt13">黒田武志</li>
	<li class="pt13">田代貞雄</li>
	<li class="pt13">細川夏樹</li>
</ul>
</dd>
</dl>

<dl class="staffList">
<dt class="part">WEBデザイン・制作</dt>
<dd class="member02">
<ul>
	<li><a href="http://slowcamp.info" target="_blank" class="ani-uLine">山口良太</a></li>
	<li><a href="http://www.vista.co.jp/" target="_blank" class="ani-uLine">VISTA ARTS </a></li>
</ul>
</dd>
</dl>

<dl class="staffList">
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
</dl>

<dl class="staffList">
<dt class="part">制作</dt>
<dd class="member">
<ul>
	<li class="pt13">高畠里乃</li>
	<li class="pt13">小原悠路</li>
	<li class="pt13">三木彩夏</li>
	<li class="pt13">重田龍佑</li>
	<li class="pt13">下川大史</li>
	<li class="pt13">端野真佐子</li>
	<li class="pt13">花巻麻由子</li>
	<li class="pt13">細貝由衣</li>
	<li class="pt13">前田和紀</li>
	<li class="pt13">若林康人</li>
	<li class="pt13">和田純一</li>
</ul>
</dd>
</dl>

<dl class="staffList">
<dt class="part">制作補助</dt>
<dd class="member">
<ul>
	<li class="pt13">市村香代子</li>
	<li class="pt13">井上萌</li>
	<li class="pt13">大西成実</li>
	<li class="pt13">小澤香菜</li>
	<li class="pt13">小野藍子</li>
	<li class="pt13">栗田まこ</li>
	<li class="pt13">佐竹真美</li>
	<li class="pt13">清水祐哉</li>
	<li class="pt13">白井杏奈</li>
	<li class="pt13">白鳥真奈</li>
	<li class="pt13">菅井愛琴</li>
	<li class="pt13">瀧川聡子</li>
	<li class="pt13">多田梓</li>
	<li class="pt13">筑紫由果梨</li>
	<li class="pt13">辻陽子</li>
	<li class="pt13">道祖彩有希</li>
	<li class="pt13">中嶋麻衣</li>
	<li class="pt13">西村瑞季</li>
	<li class="pt13">羽田兎桃</li>
	<li class="pt13">畑迫有紀</li>
	<li class="pt13">堀乃布子</li>
	<li class="pt13">山口文子</li>
	<li class="pt13">林百合子</li>
</ul>
</dd>
</dl>

<dl class="staffList">
<dt class="part">クリエイティブディレクター</dt>
<dd class="member">
<ul>
	<li class="pt13">窪木亨</li>
</ul>
</dd>
</dl>

<dl class="staffList">
<dt class="part">プロデューサー</dt>
<dd class="member">
<ul>
	<li class="pt13">小原啓渡</li>
</ul>
</dd>
</dl>

<dl class="staffList">
<dt class="part">企画製作</dt>
<dd class="member02">
<ul>
	<li><a href="http://www.artcomplex.net/" target="_blank" class="ani-uLine">ART COMPLEX </a></li>
</ul>
</dd>
</dl>

<dl class="staffList">
<dt class="part">主催</dt>
<dd class="member02">
<ul>
	<li class="company02"><a href="http://www.artcomplex.net/ac1928/" target="_blank" class="ani-uLine">有限会社一九二八（ARTCOMPLEX1928） </a></li>
</ul>
</dd>
</dl>

<dl class="staffList">
<dt class="part">共催</dt>
<dd class="member02">
<ul>
	<li class="company02"><a href="http://www.artcomplex.net/leo/" target="_blank" class="ani-uLine">NPO法人ライブエンターテイメント推進協議会（LEO） </a></li>
</ul>
</dd>
</dl>

<dl class="staffList">
<dt class="part">協賛</dt>
<dd class="member02">
<ul>
	<li><a href="http://www.artcomplex.net/ridge/" target="_blank" class="ani-uLine">リッジクリエイティブ株式会社 </a></li>
	<li class="pt13">若林広幸建築研究所</li>
</ul>
</dd>
</dl>

<dl class="staffList">
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
	
		<!--<li><a href="" class="ani-uLine">α-STATION </a></li>
	<li><a href="" class="ani-uLine">株式会社KADOKAWA </a></li>
	<li><a href="" class="ani-uLine">株式会社JTB西日本 </a></li>
	<li class="company02"><a href="" class="ani-uLine">株式会社電通 </a></li>
	<li class="company02"><a href="" class="ani-uLine">千島土地株式会社 </a></li>
	<li class="company02"><a href="" class="ani-uLine">株式会社地域計画建築研究所 <br>（アルパック） </a></li>
	<li><a href="" class="ani-uLine">株式会社FM802 </a></li>
	<li><a href="" class="ani-uLine">株式会社大広 </a></li>
	<li><a href="" class="ani-uLine">友井工芸 </a></li>
	<li><a href="" class="ani-uLine">MOOI </a></li>
	<li><a href="" class="ani-uLine">T＆A（teenei and co.,) </a></li>
	<li><a href="" class="ani-uLine">神戸大学塚本研究室 </a></li>
	<li><a href="" class="ani-uLine">ジャグリングショップ ナランハ </a></li>
	<li><a href="" class="ani-uLine">いいむろなおきマイムカンパニー </a></li>
	<li><a href="" class="ani-uLine">1.G.K </a></li>
	<li><a href="" class="ani-uLine">劇団壱劇屋 </a></li>
	<li><a href="" class="ani-uLine">（株）リコモーション </a></li>
	<li><a href="" class="ani-uLine">reco </a></li>
	<li class="company02"><a href="" class="ani-uLine">株式会社よしもとクリエイティブ <br>・エージェンシー </a></li>
	<li class="company02"><a href="" class="ani-uLine">sunday </a></li>
	<li class="company02"><a href="" class="ani-uLine">オリジナルテンポ </a></li>
	<li><a href="" class="ani-uLine">コンドルズ </a></li>
	<li><a href="" class="ani-uLine">Top.gear </a></li>
	<li><a href="" class="ani-uLine">Chick'n'Heart </a></li>
	<li><a href="" class="ani-uLine">sandscape </a></li>
	<li><a href="" class="ani-uLine">kasane </a></li>
	<li><a href="" class="ani-uLine">kutowans studio </a></li>
	<li><a href="" class="ani-uLine">劇団_BIRTHDAYCAKE_ </a></li>
	<li><a href="" class="ani-uLine">Creative Center Osaka </a></li>
	<li><a href="" class="ani-uLine">クラブコング株式会社 </a></li>
	<li><a href="" class="ani-uLine">株式会社ジャグラーズビジョン </a></li>
	<li><a href="" class="ani-uLine">FES株式会社 </a></li>-->
</ul>
</dd>
</dl>
                
<dl class="staffList">
<dt class="part">後援</dt>
<dd class="member02">
<ul>
	<li><a href="http://www.pref.kyoto.jp/" target="_blank" class="ani-uLine">京都府 </a></li>
	<li><a href="http://www.city.kyoto.lg.jp/" target="_blank" class="ani-uLine">京都市  </a></li>
	<li><a href="https://www.kyokanko.or.jp/" target="_blank" class="ani-uLine">公益社団法人 京都市観光協会 </a></li>
	<li class="company02"><a href="http://www.kyo.or.jp/kyoto/" target="_blank" class="ani-uLine">京都商工会議所 </a></li>
	<li class="company02"><a href="http://hellokcb.or.jp/" target="_blank" class="ani-uLine">公益財団法人 京都文化交流コンベンションビューロー </a></li>
	<li class="company02 pt13">KANSAI Creative Factory推進委員会</li>

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

<?php get_footer(); ?>