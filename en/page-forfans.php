<?php /*Template Name: 英語 - FOR FANS - TOP */ ?>
<?php 
global $editTitle;
global $lang;
global $breadcrumbs;

$editTitle ='EVENT';
$lang = "?lang=en";
$breadcrumbs = '
<li><a property="item" typeof="WebPage" title="HOMEへ移動" href="/" class="ani-uLine"><span property="name">HOME</span></a><meta property="position" content="1"></li>
<li><a property="item" typeof="WebPage" title="GEAR &#8211; non-verbal performance &#8211;へ移動" href="/en/" class="ani-uLine"><span property="name">GEAR &#8211; non-verbal performance &#8211;</span></a><meta property="position" content="2"></li>
<li><span property="name">FOR FANS</span><meta property="position" content="3"></li>
';

global $cssLink;
global $jsLink_top;
global $jsLink_btm;
global $post;

$cssLink = '<link rel="stylesheet" href="'.THEME_CSS.'/forfans.css">';
$jsLink_top = '';
$jsLink_btm = '';
 
$url = $_SERVER['REQUEST_URI'];
if(strstr($url,'/en/forfans/')){
	header('Location: /forfans/?lang=en');
}

get_template_part( 'en/header_en' );
?>

<?php
//年月セレクト
$year = get_query_var('year');
$month = get_query_var('monthnum');

if (!$year && !$month) {
	$monthtitle = 'ALL';
} elseif($year && !$month) {
	$monthtitle = $year;
} else {
	$monthtitle = $year.'.'.$month;
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

$(document).ready(function() {
	$(".btn_more_contents .btn_more").hover(function(){
		$(this).css("cursor","pointer"); 
	},function(){
		$(this).css("cursor","default"); 
		});
	$(".btn_more_contents .btn_more_contents_detail").css("display","none");
	
	$(".btn_more_contents .btn_more").click(function(){
		$(this).next().slideToggle("fast,");
		$(this).toggleClass("open");
		});
});
</script>

<?php 
if (!is_archive()) {
	$args = array(/* 配列に複数の引数を追加 */
	'post_type' => 'event',
	'posts_per_page' => 5,
	'post_status' => 'publish',
	'paged' => $paged
	);
}
?>

<main class="mainContents">
<article>
<section id="events" class="events section forfans">
<div class="sectionInner">

<ul class="navi sp_none">
<li class="naviTitle">ARCHIVE</li>
<li class="select">

<div class="select_month">
<div class="select_month_btn"><?php echo $monthtitle;?></div>
<ul class="select_month_list">
<li><a href="/forfans/<?php echo $lang; ?>">ALL</a></li>
<?php wp_get_archives2('post_type=event&type=yearly'); ?>
</ul>
</div>

</li>
</ul>
</div>
		
<div class="mainSubBox">
<!-- メインカラム -->
<div class="mainSubBox_main">

<!--フロントページ-->
<?php if ( !is_archive() ) :?>

<?php $the_query = new WP_Query( $args ); ?>
<?php if ( $the_query->have_posts() ) :?>

<!--event_post_list -->  
<div class="event_post_list">

<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
<?php $event_link = SCF::get( 'event_link' );?>

<section class="contents">
<div class="mainSubBox_block">
<div class="clearfix">
<div class="tit">
<h3 class="contentsTitle"><?php the_title(); ?><span></span></h3>
<p class="block_date"><time><?php the_time('Y.m.d'); ?></time> update</p>
</div>
<div class="block_img"><?php the_post_thumbnail('large'); ?></div>
<div class="block_text">
<?php //the_content(); ?>

<?php
global $more;
$more = 0;
the_content('');
?>
</div>
</div>

<!--btn_more_contents-->
<div class="btn_more_contents">

<?php if ($pos=strpos($post->post_content, '<!--more-->')): ?>
<div class="btn_more">More</div>

<div class="btn_more_contents_detail">
<?php 
$more = 1;
the_content('', true );
?>
</div>
</div>
<?php endif; ?>
<!--/btn_more_contents-->

<?php if($event_link):?>
<div class="block_btn"><a href="<?php echo $event_link; ?>" class="ani-reverseBtn" target="_blank"><span>Details link</span></a></div>
<?php endif; ?>
</div>
</section>

<?php endwhile;?>

</div>
<!--/event_post_list --> 

<div class="mainSubBox_pager pager">
<?php if(function_exists('wp_pagenavi')){ wp_pagenavi(array('query'=>$the_query)); } ?>

</div>

<?php else: ?>
<p style="text-align:center;">
No Post
</p>
<?php endif; ?>
<!--/フロントページ-->


<!--アーカイブページ-->
<?php else: ?>

<?php if (have_posts()) :?>

<!--event_post_list -->  
<div class="event_post_list">

<?php while ( have_posts() ) : the_post(); ?>
<?php $event_link = SCF::get( 'event_link' );?>

<section class="contents">
<div class="mainSubBox_block">
<div class="clearfix">
<div class="tit">
<h3 class="contentsTitle"><?php the_title(); ?><span></span></h3>
<p class="block_date"><time><?php the_time('Y.m.d'); ?></time> update</p>
</div>
<div class="block_img"><?php the_post_thumbnail('large'); ?></div>
<div class="block_text">
<?php //the_content(); ?>

<?php
global $more;
$more = 0;
the_content('');
?>
</div>
</div>

<!--btn_more_contents-->
<div class="btn_more_contents">

<?php if ($pos=strpos($post->post_content, '<!--more-->')): ?>
<div class="btn_more">More</div>

<div class="btn_more_contents_detail">
<?php 
$more = 1;
the_content('', true );
?>
</div>
</div>
<?php endif; ?>
<!--/btn_more_contents-->

<?php if($event_link):?>
<div class="block_btn"><a href="<?php echo $event_link; ?>" class="ani-reverseBtn" target="_blank"><span>Details link</span></a></div>
<?php endif; ?>
</div>
</section>

<?php endwhile;?>

</div>
<!--/event_post_list -->

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

<ul class="navi pc_none">
<li class="naviTitle">ARCHIVE</li>
<li class="select">

<div class="select_month">
<div class="select_month_btn"><?php echo $monthtitle;?></div>
<ul class="select_month_list">
<li><a href="/forfans/<?php echo $lang; ?>">ALL</a></li>
<?php wp_get_archives2('post_type=event&type=yearly'); ?>
</ul>
</div>


</li>
</ul>
</div>

</div>
</section>
</article>
</main>

<?php get_template_part( 'en/footer_en' ); ?>