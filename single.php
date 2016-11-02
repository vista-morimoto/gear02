<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Gear
 */

get_header(); ?>

<div class="sectionInner">

<!-- post -->
<div class="post_single_wrap clearfix">
<?php
if (have_posts()) :
while (have_posts()) : the_post();
	$org_post	 = get_post();
?>

<div id="clearfix post-<?php the_ID(); ?>" <?php post_class(); ?>>

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

<a href="/" class="back_home"><i class="fa fa-undo" aria-hidden="true"></i> トップページに戻る</a>

</div>

<?php 
get_footer();
