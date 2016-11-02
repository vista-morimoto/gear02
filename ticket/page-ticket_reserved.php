<?php /*Template Name: チケット予約 - 団体鑑賞・貸切公演 */ ?>
<?php 
$description = '団体鑑賞・貸切公演のご案内。京都で出逢える感動エンターテイメント、ノンバーバル（＝言葉に頼らない）パフォーマンス『ギア-GEAR-』は、絶賛ロングラン公演中！';

$cssLink = '<link rel="stylesheet" href="'.THEME_CSS.'/ticket.css">';
$jsLink_top = '';
$jsLink_btm = '<script src="'.THEME_JS.'/ticket.js"></script>';
get_header();
?>

<main class="mainContents">
<article>
<section id="reserved" class="reserved section">

<!--団体鑑賞・貸切公演について-->
<div class="sectionInner about hidden">

<h3 class="contentsTitle">団体鑑賞・貸切公演について<span></span></h3>
<p class="mb">『ギア-GEAR-』では、グループ鑑賞・貸切公演を承っております。<br>
11名様以上のグループでのご鑑賞につきましては団体鑑賞として承ります。<br>
<br>
・職場・組合・団体などの福利・厚生活動のレクリエーションとして<br>
・ご友人・サークルなど、お仲間同士でのお楽しみとして<br>
・PTA行事などの企画行事として<br>
<br>
さまざまな団体様にご利用いただいております。<br>
<br>
<span class="fz14">＊当団体鑑賞・グループ鑑賞料金につきましては、個人様に適用しております学生、シニア割引の対象外となり、<br>
すべて<span class="bold">一般料金</span>でご入場いただくことになります。予めご了承ください。</span></p>

<!--<div class="case">
<h4>過去の事例</h4>
<ul>
<li>インターナショナルスクール様の<br>貸切公演</li>
<li>アミューズメント施設様の<br>団体鑑賞</li>
<li>バトントワリング教室様の<br>団体鑑賞</li>
</ul>
</div>-->

</div>


<!--よくある質問-->
<section class="contents hidden">
<div class="faq">
<h3 class="contentsTitle">よくあるご質問<span></span></h3>

<dl class="qaBox_list clearfix">
	<dt class="qaBox_list_q">最大何名まで鑑賞できますか？ </dt>
	<dd class="qaBox_list_a">最大98名様までご入場いただけます（一部シーンの見えない席／立ち見エリアの計13席分含む）</dd>
	<dt class="qaBox_list_q">バスでの来場は可能ですか？</dt>
	<dd class="qaBox_list_a">劇場前に駐停車いたけるスペースはございません。事前にお問合せください。</dd>
	<dt class="qaBox_list_q">劇場内で食事はできますか？</dt>
	<dd class="qaBox_list_a">劇場内のロビースペースはご利用いただけますが、限られたスペースの為、大勢での飲食はできません。また、劇場内で食事の提供はございません。蓋つきのペットボトルのみお持ち込みが可能です。劇場内に自動販売機もございますので、どうぞご利用ください。</dd>
</dl>	

<a href="/ticket/reserved/form/" class="link_form">団体鑑賞・貸切公演お申込みフォーム</a>

</div>
</section>

<!--問合せフォーム-->
<!--<section class="contents">
<div class="Inquiry">
</div>
</section>-->

</section>
</article>
</main>

<?php get_footer(); ?>