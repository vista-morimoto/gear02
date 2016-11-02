<?php /*Template Name: 作品紹介 - キャラクター */ ?>
<?php 
$description = '棄てられたおもちゃ工場で働く人間型ロボット「ロボロイド」と、かつてここで作られたおもちゃの人形「ドール」。国内外で人気の漫画家山田章博氏がイメージイラストを手がけた各キャラクター紹介。京都で出逢える『ギア-GEAR-』は、絶賛ロングラン公演中！';

$cssLink = '<link rel="stylesheet" href="'.THEME_CSS.'/about.css">';
$jsLink_top = '';
$jsLink_btm = '<script src="'.THEME_JS.'/about.js"></script>';
get_header();
?>

<main class="mainContents">
<article>
<section id="characters" class="section">
<div class="sectionInner">

<div class="imgTxtBox clearfix mime">
<div class="imgBox sp_none"><img src="<?php echo THEME_URI; ?>/about/img/character/img_mime.png" alt="マイム"></div>
<div class="txtBox">
<h3 class="txtBox_title">マイム<span></span></h3>
<div class="imgBox pc_none"><img src="<?php echo THEME_URI; ?>/about/img/character/img_mime.png" alt="マイム"></div>
<p class="txtBox_body">真面目で頑固なロボロイド達のリーダー、<br>
だけどひょうきんな一面もある。<br>
一番古いロボロイド。</p>
<div class="btn"><a href="/about/cast/#tab1" class="ani-reverseBtn">マイム キャストを見る</a></div>
</div>
</div>

<div class="txtImgBox clearfix breakin">
<div class="imgBox sp_none"><img src="<?php echo THEME_URI; ?>/about/img/character/img_break_dance.png" alt="ブレイクダンス"></div>
<div class="txtBox">
<h3 class="txtBox_title">ブレイクダンス<span></span></h3>
<div class="imgBox pc_none"><img src="<?php echo THEME_URI; ?>/about/img/character/img_break_dance.png" alt="ブレイクダンス"></div>
<p class="txtBox_body">好奇心が旺盛なロボロイド。<br>
元気一杯で、<br>
常にあっちへ行ったりこっちへ行ったり、<br>
落ち着きがない。</p>
<div class="btn"><a href="/about/cast/#tab2" class="ani-reverseBtn">ブレイクダンス キャストを見る</a></div>
</div>
</div>

<div class="imgTxtBox clearfix magic">
<div class="imgBox sp_none"><img src="<?php echo THEME_URI; ?>/about/img/character/img_magic.png" alt="マジック"></div>
<div class="txtBox">
<h3 class="txtBox_title">マジック<span></span></h3>
<div class="imgBox pc_none"><img src="<?php echo THEME_URI; ?>/about/img/character/img_magic.png" alt="マジック"></div>
<p class="txtBox_body">キザでクールな一匹狼のロボロイド。<br>
みんなとは違う行動をすることが多い。<br>
安定感のある設計が自慢。</p>
<div class="btn"><a href="/about/cast/#tab3" class="ani-reverseBtn">マジック キャストを見る</a></div>
</div>
</div>

<div class="txtImgBox clearfix jaggling">
<div class="imgBox sp_none"><img src="<?php echo THEME_URI; ?>/about/img/character/img_juggle.png" alt="ジャグリング"></div>
<div class="txtBox">
<h3 class="txtBox_title">ジャグリング<span></span></h3>
<div class="imgBox pc_none"><img src="<?php echo THEME_URI; ?>/about/img/character/img_juggle.png" alt="ジャグリング"></div>
<p class="txtBox_body">真面目だけれど要領が悪くて、<br>
ちょっぴりドジなロボロイド。<br>
ちょこちょこ動いては、<br>
あちこちで機械を壊したりする。</p>
<div class="btn"><a href="/about/cast/#tab4" class="ani-reverseBtn">ジャグリング キャストを見る</a></div>
</div>
</div>

<div class="imgTxtBox clearfix doll">
<div class="imgBox sp_none"><img src="<?php echo THEME_URI; ?>/about/img/character/img_doll.png" alt="ドール"></div>
<div class="txtBox">
<h3 class="txtBox_title">ドール<span></span></h3>
<div class="imgBox pc_none"><img src="<?php echo THEME_URI; ?>/about/img/character/img_doll.png" alt="ドール"></div>
<p class="txtBox_body">かつてのこの工場で作られていた<br>
「人形（ドール）」。<br>
ある日、ひょんなことから工場に落ちてきて、<br>
「好奇心」からロボロイド達と遊ぶうちに<br>
少しずつ「人間」に近づいていく。</p>
<div class="btn"><a href="/about/cast/#tab5" class="ani-reverseBtn">ドール キャストを見る</a></div>
</div>
</div>

<section id="msgFromProducer">
<div class="producerProf">
<div class="img"><img src="<?php echo THEME_URI; ?>/about/img/character/yamada.jpg" alt="山田章博"></div>
<h3>山田章博<br><span>Yamada Akihiro</span></h3>
<p>
マンガ家、イラストレーター。1957年高知県生まれ、京都府在住。1981年デビュー。美しく繊細な筆致が特徴で、読者を陶酔させるような世界観のある作品を得意とし、国内外を問わず多くのファンを持つ人気作家。<br>
代表作にマンガ「BEAST of EAST」、「ロードス島戦記 ファリスの聖女」、小説挿絵「十二国記」、アニメのキャラクターデザイン「ラーゼフォン」、実写映画「SHINOBI」コンセプトデザイン等、その活動は幅広い。京都精華大学マンガ学部で客員教授も務める。
</p>
</div>
</section>

</div>
</section>
</article>
</main>


<?php get_footer(); ?>