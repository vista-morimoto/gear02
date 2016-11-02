<?php /*Template Name: 英語 - プレス窓口 - メディア掲載情報 */ ?>
<?php 
$cssLink = '<link rel="stylesheet" href="'.THEME_CSS.'/press.css">';
$jsLink_top = '';
$jsLink_btm = '<script src="'.THEME_JS.'/press.js"></script>';
get_template_part( 'en/header_en' );
?>

<main class="mainContents">
<article>
<section id="published" class="published section">
<div class="sectionInner">

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

</div>
</section>
</article>
</main>

<?php get_template_part( 'en/footer_en' ); ?>