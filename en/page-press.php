<?php /*Template Name: 英語 - プレス窓口 - TOP */ ?>
<?php 
$cssLink = '<link rel="stylesheet" href="'.THEME_CSS.'/press.css">';
$jsLink_top = '';
$jsLink_btm = '<script src="'.THEME_JS.'/press.js"></script>';
get_template_part( 'en/header_en' );
?>

<main class="mainContents">
<article>
<section id="press" class="press section">
<div class="sectionInner">

<div class="press_contact">
<h3 class="contentsTitle">Press Relations<!--CONTACT--><span></span></h3>
<div class="col2Box">
<div class="col2Box_item">
<div class="btn"><a href="mailto:info@gear.ac" class="linkBtn"><i class="fa fa-envelope"></i>info@gear.ac</a></div>
</div>
<div class="col2Box_item">
<p class="press_contact_address">If you have any press related questions about GEAR, or wish to arrange media coverage such as interviewing or videoing, please email us details at <a href="mailto:info@gear.ac">info@gear.ac</a>.<br />A PR representative will get back to you. <br />
*Please understand that we may be unable to accommodate all requests.
</p>
</div>
</div>
</div>

</div>

<section class="contents">

<div class="press_release">
<h3 class="contentsTitle">PRESS RELEASE<span></span></h3>
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
No Post
</p>
<?php endif; ?>


</div>
</div>
</section>

</section>
</article>
</main>

<?php get_template_part( 'en/footer_en' ); ?>