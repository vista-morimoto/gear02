<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Gear
 */

global $cssLink;
global $breadcrumbs;
$blogtitle = get_the_title();

$cssLink = '<link rel="stylesheet" href="'.THEME_CSS.'/press.css">';
$breadcrumbs = '
<li><a property="item" href="/" class="ani-uLine"><span property="name">HOME</span></a><meta property="position" content="1"></li>
<li><a property="item" href="/en/" class="ani-uLine"><span property="name">GEAR &#8211; non-verbal performance &#8211;</span></a><meta property="position" content="2"></li>
<li><a property="item" href="/en/press/" class="ani-uLine"><span property="name">PRESS CONTACT</span></a><meta property="position" content="3"></li>
<li><a property="item" href="/press/news/?lang=en" class="ani-uLine"><span property="name">NEWS</span></a><meta property="position" content="4"></li>
<li><span property="name">'.$blogtitle.'</span><meta property="position" content="5"></li>
';

get_template_part( 'en/header_en' );
 ?>
<div class="sectionInner news">

<!-- post -->
<div class="post_single_wrap clearfix">
<?php
if (have_posts()) :
while (have_posts()) : the_post();
	$org_post	 = get_post();
?>
<?php
$str = '';
if ($terms = get_the_terms($post->ID, 'news_category')) {
	foreach ( $terms as $term ) {
	$str .= $term->name . ', ';
}
}
?>

<div id="clearfix post-<?php the_ID(); ?>" <?php post_class(); ?>>

<p class="block_date"><time><?php the_time('Y.m.d'); ?></time> update</p>
<p class="block_category"><?php echo rtrim($str, ", "); ?></p>


<?php if ( has_post_thumbnail()) : ?>
<div class="post_single_img"><?php the_post_thumbnail('large'); ?></div>
<?php endif; ?>

<div class="post_single_data clearfix">
<?php the_content(); ?>
</div>

</div>

<?php endwhile; ?>
		
<?php else : ?>
<div class="post">
<p>記事はありません</p>
<p class="marB20">お探しの記事は見つかりませんでした。</p>
<p><a href="/">TOPページへ戻る</a></p>
</div>
<?php endif; ?>
<?php wp_reset_query();?>

</div>
<!-- /post -->

<a href="/press/news/?lang=en" class="back_home"><i class="fa fa-undo" aria-hidden="true"></i> Back to NEWS Top</a>

</div>

<?php get_template_part( 'en/footer_en' ); ?>
