<?php /*Template Name: 英語 - チケット購入 - 座席表 */ ?>
<?php 
$cssLink = '<link rel="stylesheet" href="'.THEME_CSS.'/ticket.css">';
$jsLink_top = '';
$jsLink_btm = '<script src="'.THEME_JS.'/ticket.js"></script>';
get_template_part( 'en/header_en' );
?>


<main class="mainContents">
<article>
<section id="seat" class="seat section">
<div class="sectionInner">

<img src="<?php echo THEME_URI; ?>/ticket/img/seat/img_01_en.png" alt="SEATING CHART">
<img src="<?php echo THEME_URI; ?>/ticket/img/seat/img_02_en.png" alt="SEATING CHART">

</div>
</section>
</article>
</main>

<?php get_template_part( 'en/footer_en' ); ?>