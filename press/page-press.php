<?php /*Template Name: プレス窓口 - TOP */ ?>
<?php 
$description = '大人も、子どもも、外国人にも人気！『ギア-GEAR-』の最新プレスリリース。日本発！日本初！京都で出逢える感動エンターテイメント『ギア-GEAR-』は、絶賛ロングラン公演中！';

$cssLink = '<link rel="stylesheet" href="'.THEME_CSS.'/press.css">';
$jsLink_top = '';
$jsLink_btm = '<script src="'.THEME_JS.'/press.js"></script>';
get_header();
?>

<main class="mainContents">
<article>
<section id="press" class="press section">
<div class="sectionInner">

<div class="press_contact">
<h3 class="contentsTitle">プレスのお問合せ<span></span></h3>
<div class="col2Box">
<div class="col2Box_item">
<div class="btn"><a href="mailto:info@gear.ac" class="linkBtn"><i class="fa fa-envelope"></i>info@gear.ac</a></div>
</div>
<div class="col2Box_item">
<p class="press_contact_address">
本公演に関する取材･撮影やご質問などございましたら、<br>
左記に記載のメールアドレス宛に詳細をご記入の上、<br>
お問合せください。後ほど広報担当よりご連絡いたします。<br>
※内容および都合により、お問合せ内容にお答えできない場合<br>
がございますのでご了承ください。
</p>
</div>
</div>
</div>

</div>

<section class="contents">

<div class="press_release">
<h3 class="contentsTitle">プレスリリース<span></span></h3>
<div class="col2Box">

<?php
$args = array(/* 配列に複数の引数を追加 */
	'post_type' => 'press',
	'posts_per_page' => -1,
	'post_status' => 'publish',
	'paged' => $paged
	);
?>

<?php $the_query = new WP_Query( $args ); ?>
<?php if ( $the_query->have_posts() ) :?>
<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

<div class="col2Box_item">
<div class="btn">
<a href="<?php echo wp_get_attachment_url(post_custom('press_file')); ?>" target="_blank" class="linkBtn">
<time><?php the_time('Y.m.d'); ?></time>
<h4 class="releaseTitle"><?php the_title(); ?></h4>
</a>
</div>
</div>

<?php endwhile;?>
<?php else: ?>
<p style="text-align:center; margin-left:60px; width:100%; box-sizing:border-box;">
記事がありません。
</p>
<?php endif; ?>

</div>
</div>
</section>

</section>
</article>
</main>

<?php get_footer(); ?>