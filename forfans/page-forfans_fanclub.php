<?php /*Template Name: FOR FANS - ファンクラブ */ ?>
<?php 
$description = '『ギア-GEAR-』公式ファンクラブ「ギア部」。入会方法、ファンクラブ特典のご案内。京都で出逢える感動エンターテイメント『ギア-GEAR-』は、絶賛ロングラン公演中！';

$cssLink = '<link rel="stylesheet" href="'.THEME_CSS.'/forfans.css">';
$jsLink_top = '';
$jsLink_btm = '';
get_header();
?>

<main class="mainContents">
<article>
<section id="fanclubs" class="fanclubs section">
<div class="sectionInner">
<!--<div class="fanclubs_mainvisual">
<iframe width="560" height="315" src="https://www.youtube.com/embed/QHDfiL9m3YA" frameborder="0" allowfullscreen></iframe>
</div>-->
<div class="fanclubs_about about">
<h3 class="contentsTitle">「ギア部」とは<span></span></h3>
<p class="about_body">
公式ファンクラブ「ギア部」は、『ギア-GEAR-』を応援してくださるお客様に<br>
何か感謝を伝えたい、<br />
もっと『ギア-GEAR-』を好きになってもらいたい、そういった想いから発足しました。<br>
<br>
『ギア-GEAR-』は、ノンバーバルパフォーマンスのオリジナル作品を「日本で初めて」ロングラン上演しています。<br>
挑戦し続ける『ギア-GEAR-』の大きな歯車を、皆で一緒に回していきましょう！
</p>
</div>
</div>

<!--部員特典-->
<section class="contents">
<div class="privilege">
<h3 class="contentsTitle">部員特典<span></span></h3>
<ul class="privilegeList">
<li><img src="<?php echo THEME_URI; ?>/forfans/img/fanclub/img_01.png" alt="部員証を発行">
<h4>部員証を発行</h4>
<p>
ギア部の一員である証として、部員証を発行します。ご来場時に、部員証をご提示いただければ、500円引きでご観劇いただけます。<br>
<br>
<span>※前売券ご購入の場合、当日受付にてキャッシュバックいたします。<br>
※他の割引サービス・キャンペーンとの併用は不可。<br />
※サイドエリアも割引の対象にはなりません。</span>
</p></li>

<li><img src="<?php echo THEME_URI; ?>/forfans/img/fanclub/img_02.png" alt="ご紹介チケットをプレゼント！">
<h4>ご紹介チケットをプレゼント！</h4>
<p>
皆様のご紹介でご来場のお客様や、お連れ様もお得になる「ご紹介チケット」を発送いたします。（不定期）
</p></li>

<li><img src="<?php echo THEME_URI; ?>/forfans/img/fanclub/img_03.png" alt="会報や限定動画をお届け！">
<h4>会報や限定動画をお届け！</h4>
<p>
普段は知ることのできないキャストの意外な素顔などが分かる会報「ギア部つうしん」や、限定のメッセージ動画が届きます。（不定期）
</p></li>
</ul>
</div>
</section>


<!--入部方法-->
<section class="contents">
<div class="join">
<h3 class="contentsTitle">入部方法について<span></span></h3>
<p class="tc">部費（年間）：1,000円</p>
<div class="leftBox">
<h4><img src="<?php echo THEME_URI; ?>/forfans/img/fanclub/icon_web.png" alt="Webからのお申込"><br>Webからのお申込</h4>
<ul class="joinList">
<li class="list_01"><p>下記入部フォームからお申込ください。</p></li>
<li class="link"><a href="/forfans/fanclub/form/">入部フォーム</a></li>
<li class="list_02"><p>部費の振込先情報があなたの登録メールアド<br>
レスに届きます。メールの到着後、一週間以内に<br>
お振込ください。
</p></li>
<li class="list_03"><p>お振込後一週間以内に、部員証をご登録の<br>
ご住所に発送します。
</p></li>
</ul>
</div>

<div class="rightBox">
<h4><img src="<?php echo THEME_URI; ?>/forfans/img/fanclub/icon_venue.png" alt="会場でのお申込み"><br>会場でのお申込</h4>
<ul class="joinList">
<li class="list_01"><p>会場備え付けの入部届に必要事項を<br>
ご記入ください。
</p></li>
<li class="list_02"><p>終演後、会場グッズコーナーにて<br>
入部届をご提出の上、部費をお支払いください。
</p></li>
<li class="list_03"><p>その場で部員証をお渡しします。</p></li>
</ul>
</div>
</div>
</section>

</section>
</article>
</main>

<?php get_footer(); ?>