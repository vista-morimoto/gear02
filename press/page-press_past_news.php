<?php /*Template Name: プレス窓口 - 過去ニュース */ ?>
<?php 
global $editTitle;
global $description;
global $breadcrumbs;

$editTitle ='過去ニュース（～2016年9月以前）';
$description = '京都で出逢える感動エンターテイメント『ギア-GEAR-』過去ニュース情報';
$breadcrumbs = '
<li><a property="item" typeof="WebPage" title="HOMEへ移動" href="/" class="ani-uLine"><span property="name">HOME</span></a><meta property="position" content="1"></li>
<li><a property="item" typeof="WebPage" title="プレス窓口へ移動" href="/press/" class="ani-uLine"><span property="name">プレス窓口</span></a><meta property="position" content="2"></li>
<li><span property="name">過去ニュース</span><meta property="position" content="3"></li>
';

global $cssLink;
global $jsLink_top;
global $jsLink_btm;
$cssLink = '<link rel="stylesheet" href="'.THEME_CSS.'/press.css">';
$jsLink_top = '';
$jsLink_btm = '
<script src="'.THEME_JS.'/press.js"></script>
<script>
$(function(){
	$(".tit").on("click", function() {
		$(this).siblings(".block_body").slideToggle();
		$(this).toggleClass("open");
	});
});
</script>
';
get_header();
?>

<?php
//年月セレクト
$year = get_query_var('year');
$month = get_query_var('monthnum');

if (!$year && !$month) {
	$monthtitle = 'ALL';
} elseif($year && !$month) {
	$monthtitle = $year.'年';
} else {
	$monthtitle = $year.'年'.sprintf("%02d",$month).'月';
}
?>

<script>
//select month
$(function () {
	$(".select_month_btn").click(function() {
	$(this).next("ul.select_month_list").slideToggle("fast");
	});
	$(".select_month_btn,ul.select_month_list").hover(function(){
	over_flg = true;
	}, function(){
	over_flg = false;
	});	
	$("body").click(function() {
	if (over_flg == false) {
	$("ul.select_month_list").slideUp("fast");
	} 
	}); 
});
</script>

<?php 
if (!is_archive()) {
	$args = array(/* 配列に複数の引数を追加 */
	'post_type' => 'past_news',
	'posts_per_page' => 5,
	'post_status' => 'publish',
	'paged' => $paged
	);
}
?>

<main class="mainContents">
<article>
<section id="news" class="news section">
<div class="sectionInner sp_none">
<div class="select_box clearfix">
<div class="select_block clearfix">
アーカイブ
<ul class="navi">
<li class="select">

<div class="select_month">
<div class="select_month_btn"><?php echo $monthtitle;?></div>
<ul class="select_month_list">
<li><a href="/press/past_news/">ALL</a></li>
<?php wp_get_archives('post_type=past_news&type=monthly'); ?>
</ul>
</div>

</li>
</ul>
</div>

</div>
</div>


<!--フロントページ-->
<?php if ( !is_archive() ) :?>

<?php $the_query = new WP_Query( $args ); ?>
<?php if ( $the_query->have_posts() ) :?>

<!--news_post_list -->  
<div class="news_post_list">

<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>


<?php
$str = '';
if ($terms = get_the_terms($post->ID, 'news_category')) {
	foreach ( $terms as $term ) {
		$str .= $term->name . ', ';
	}
}
?>

<section class="contents">
<div class="mainSubBox_block">
<div class="tit">
<h3 class="block_title"><?php the_title(); ?></h3>
<p class="block_date"><time><?php the_time('Y.m.d'); ?></time> 更新</p>
<p class="block_category"><?php echo rtrim($str, ", "); ?></p>
</div>
<div class="block_body">
<?php the_content(); ?>
</div>
</div>
</section>

<?php endwhile;?>

</div>
<!--news_post_list -->  

<div class="mainSubBox_pager pager">
<?php if(function_exists('wp_pagenavi')){ wp_pagenavi(array('query'=>$the_query)); } ?>

<!--<div class="pager_prev sp_none"><a href="#" class="ani-reverseBtn"><i class="fa fa-chevron-left" aria-hidden="true"></i> 前へ</a></div>
<ul class="pagenation">
<li class="pagenation_item active"><span>1</span></li>
<li class="pagenation_item"><a href="#" class="ani-reverseBtn">2</a></li>
<li class="pagenation_item"><a href="#" class="ani-reverseBtn">3</a></li>
</ul>
<div class="pager_prev sp_none"><a href="#" class="ani-reverseBtn">次へ <i class="fa fa-chevron-right" aria-hidden="true"></i></a></div>-->

</div>

<?php else: ?>
<p style="text-align:center;">
記事がありません。
</p>
<?php endif; ?>
<!--/フロントページ-->

<!--アーカイブ/カテゴリページ-->
<?php else: ?>
<?php if (have_posts()) :?>

<!--news_post_list -->  
<div class="news_post_list">

<?php while ( have_posts() ) : the_post(); ?>

<?php
$str = '';
if ($terms = get_the_terms($post->ID, 'news_category')) {
	foreach ( $terms as $term ) {
		$str .= $term->name . ', ';
	}
}
?>

<section class="contents">
<div class="mainSubBox_block">
<div class="tit">
<h3 class="block_title"><?php the_title(); ?></h3>
<p class="block_date"><time><?php the_time('Y.m.d'); ?></time> 更新</p>
<!--<p class="block_category"><?php echo rtrim($str, ", "); ?></p>-->
</div>
<div class="block_body">
<?php the_content(); ?>
</div>
</div>
</section>

<?php endwhile;?>

</div>
<!--news_post_list --> 

<div class="mainSubBox_pager pager">
<?php if(function_exists('wp_pagenavi')){ wp_pagenavi(); } ?>
</div>

<?php else: ?>
<p style="text-align:center;">
記事がありません。
</p>

<?php endif; ?>
<!--/アーカイブページ-->

<?php endif; ?>

<?php wp_reset_postdata(); ?>


<div class="sectionInner pc_none">
<div class="select_box clearfix">
<div class="select_block clearfix">
アーカイブ
<ul class="navi">
<li class="select">

<div class="select_month">
<div class="select_month_btn"><?php echo $monthtitle;?></div>
<ul class="select_month_list">
<li><a href="/press/past_news/">ALL</a></li>
<?php wp_get_archives('post_type=past_news&type=monthly'); ?>
</ul>
</div>

</li>
</ul>
</div>

</div>
</div>

<!--<div class="mainSubBox_pager pager">
<div class="pager_prev"><a href="#" class="ani-reverseBtn"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> 前へ</a></div>
<ul class="pagenation">
	<li class="pagenation_item active"><span>1</span></li>
	<li class="pagenation_item"><a href="#" class="ani-reverseBtn">2</a></li>
	<li class="pagenation_item"><a href="#" class="ani-reverseBtn">3</a></li>
</ul>
<div class="pager_prev"><a href="#" class="ani-reverseBtn">次へ <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a></div>
</div>-->

</section>
</article>
</main>

<?php get_footer(); ?>