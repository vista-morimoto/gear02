<?php /*Template Name: アクセス - TOP */ ?>
<?php 
$description = '阪急電車 河原町駅、京阪電車 三条駅、地下鉄東西線 烏丸線 烏丸御池駅、市バス 4・5・17・205 系統 河原町三条下車からのアクセスマップ。京都の感動エンターテイメント、ノンバーバル（＝言葉に頼らない）パフォーマンス『ギア-GEAR-』は、絶賛ロングラン公演中！';

$cssLink = '<link rel="stylesheet" href="'.THEME_CSS.'/access.css">';
$jsLink_top = '';
$jsLink_btm = '';
get_header();
?>

<main class="mainContents">
<article>
<section id="maps" class="section">
<div class="sectionInner">
<h3 class="contentsTitle pc_none">ギア専用劇場<br>（ART COMPLEX 1928）<span></span></h3>
<div class="leftBox">
<img src="<?php echo THEME_URI; ?>/access/img/map/img_01.jpg" alt="ギア専用劇場">
</div>

<div class="rightBox">
<h3 class="contentsTitle sp_none">ギア専用劇場<br>（ART COMPLEX 1928）<span></span></h3>
<p>〒604-8082<br>
京都市中京区三条御幸町角 1928ビル3階<br>
（カーナビなどに入力される場合：「京都市中京区弁慶石町56」とご入力ください）<br>
※当劇場には駐車場・駐輪場がございません。近隣の施設をご利用ください。</p>
<p class="mt50">電話　075-254-6520（営業時間 平日10:00-19:00　土日祝9:00-19:00）<br>
FAX　075-254-6521<br>
MAIL　<a href="mailto:info@gear.ac">info@gear.ac</a></p>
</div>

<div class="map">
<img src="<?php echo THEME_URI; ?>/access/img/map/img_02.jpg" alt="地図">
<p class="mt25">
阪急電車 河原町駅 <span>9</span> 番出口　北へ徒歩8分<br>
京阪電車 三条駅 <span>6</span> 番出口　西へ徒歩8分<br>
地下鉄東西線 烏丸線 烏丸御池駅 <span>5</span> 番出口　東へ徒歩10分<br>
市バス 4・5・17・205 系統 河原町三条下車　西へ徒歩3分
</p>
</div>

<div class="gMap">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3267.928976685041!2d135.76433746524057!3d35.00848298035662!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60010892296800d1%3A0x833920b059ebecf!2z44Ku44Ki5bCC55So5YqH5aC0KEFSVCBDT01QTEVYIDE5Mjgp!5e0!3m2!1sja!2sjp!4v1464076114360" width="400" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>

</div>
</section>
</article>
</main>

<?php get_footer(); ?>