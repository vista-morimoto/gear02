<?php /*Template Name: プレス窓口 - メディア掲載情報 */ ?>
<?php 
$description = '新聞、テレビ、雑誌等メディア掲載情報。日本発！日本初！京都で出逢える感動エンターテイメント『ギア-GEAR-』は、絶賛ロングラン公演中！';

$cssLink = '<link rel="stylesheet" href="'.THEME_CSS.'/press.css">';
$jsLink_top = '';
$jsLink_btm = '<script src="'.THEME_JS.'/press.js"></script>';
get_header();
?>

<main class="mainContents">
<article>
<section id="published" class="published section">
<div class="sectionInner">

<!--<div class="selectBox">
	<select name="" id="">
		<option>カテゴリ</option>
		<option value="book">Book</option>
		<option value="magazine">Magazine</option>
	</select>
</div>-->

<div id="press_wrap">

<?php
//メディア記事の読込
$url = "http://www.artcomplex.net/press/index.php?special=Gear";
$html = file_get_contents($url);

//文字コード変換
$html = file_get_contents($url);
foreach(array('UTF-8','SJIS','EUC-JP','ASCII','JIS') as $charcode){
	if(strcmp(mb_convert_encoding($html, $charcode, $charcode),$html)==0){
		$from_encoding = $charcode;
		break;
	}
}
$html = mb_convert_encoding($html, "utf8", $from_encoding);
echo $html;
?>

</div>

<!--<div class="pager">
<div class="pager_prev"><a href="#" class="ani-reverseBtn"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> 前へ</a></div>
<ul class="pagenation">
	<li class="pagenation_item active"><span>1</span></li>
	<li class="pagenation_item"><a href="#" class="ani-reverseBtn">2</a></li>
	<li class="pagenation_item"><a href="#" class="ani-reverseBtn">3</a></li>
</ul>
<div class="pager_prev"><a href="#" class="ani-reverseBtn">次へ <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a></div>
</div>-->

</div>
</section>
</article>
</main>

<?php get_footer(); ?>