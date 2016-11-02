<?php /*Template Name: チケット予約 - 座席表 */ ?>
<?php 
$description = 'ギア専用劇場座席表。至近距離で繰り広げられる圧巻のパフォーマンス。京都で出逢える感動エンターテイメント『ギア-GEAR-』は、絶賛ロングラン公演中！';

$cssLink = '<link rel="stylesheet" href="'.THEME_CSS.'/ticket.css">';
$jsLink_top = '';
$jsLink_btm = '<script src="'.THEME_JS.'/ticket.js"></script>';
get_header();
?>


<main class="mainContents">
<article>
<section id="seat" class="seat section">
<div class="sectionInner">

<img src="<?php echo THEME_URI; ?>/ticket/img/seat/img_01.png" alt="座席表">
<img src="<?php echo THEME_URI; ?>/ticket/img/seat/img_02.png" alt="座席表">

</div>
</section>
</article>
</main>

<?php get_footer(); ?>