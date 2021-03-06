<?php /*Template Name: 作品紹介 - お客さまの声 */ ?>
<?php 
global $editTitle;
global $description;
global $breadcrumbs;

$editTitle ='お客さまの声';
$description = '来場のお客さまから寄せられた感想を一挙公開。年齢、性別、国籍を超えて楽しめると口コミで話題に。2016年7月、100席限定の劇場で観客動員数10万人を突破！『ギア-GEAR-』ロングラン記録更新中！！';
$breadcrumbs = '
<li><a property="item" typeof="WebPage" title="HOMEへ移動" href="/" class="ani-uLine"><span property="name">HOME</span></a><meta property="position" content="1"></li>
<li><a property="item" typeof="WebPage" title="『ギア』とはへ移動" href="/about/" class="ani-uLine"><span property="name">『ギア』とは</span></a><meta property="position" content="2"></li>
<li><span property="name">お客さまの声</span><meta property="position" content="3"></li>
';

global $cssLink;
global $jsLink_top;
global $jsLink_btm;

$cssLink = '<link rel="stylesheet" href="'.THEME_CSS.'/about.css">';
$jsLink_top = '
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
';
$jsLink_btm = '<script src="'.THEME_JS.'/about.js"></script>';
get_header();
?>

<?php
//年月セレクト
$set_date = get_the_title();
$date = array();
preg_match("/([0-9]{4,})年([0-9]{1,2})月/",$set_date,$date);
$monthtitle =  $date[1]."年".sprintf("%02d",$date[2])."月";

//年月送り
$link_prevt_month_text =' 前の月へ';
$link_next_month_text ='次の月へ ';

$link_prev_month = '';
$link_next_month = '';

global $wpdb;

$thisyear = intval( get_the_time( 'Y' ) );
$thismonth = intval( get_the_time( 'm' ) );

$previous = $wpdb->get_row(
"SELECT DISTINCT MONTH(post_date) AS month, YEAR(post_date) AS year
FROM $wpdb->posts
WHERE post_date < '$thisyear-$thismonth-01'
AND post_type = 'voice'
AND post_status = 'publish'
ORDER BY post_date DESC
LIMIT 1");

$next = $wpdb->get_row(
"SELECT DISTINCT MONTH(post_date) AS month, YEAR(post_date) AS year
FROM $wpdb->posts
WHERE post_date > '$thisyear-$thismonth-01'
AND MONTH( post_date ) != MONTH( '$thisyear-$thismonth-01' )
AND post_type = 'voice'
AND post_status = 'publish'
ORDER BY post_date ASC
LIMIT 1");

/* if( $previous ) $link_prev_month = get_month_link( $previous->year, $previous->month );
if( $next ) $link_next_month = get_month_link( $next->year, $next->month ); */

$voice_archive_link = get_post_type_archive_link( get_post_type() );
/* if( $previous ) echo $voice_archive_link.sprintf('%04d', ($previous->year))."/".sprintf('%02d', ($previous->month));
if( $next ) echo $voice_archive_link.sprintf('%04d', ($next->year))."/".sprintf('%02d', ($next->month)); */

$previous_link = $voice_archive_link.sprintf('%04d', ($previous->year))."/".sprintf('%02d', ($previous->month));
$next_link = $voice_archive_link.sprintf('%04d', ($next->year))."/".sprintf('%02d', ($next->month))

?>

<main class="mainContents">
<article>
<section id="voices" class="section">
<div class="sectionInner">

<ul class="navi">
<li class="select">

<div class="select_month">
<div class="select_month_btn"><?php echo $monthtitle;?></div>
<ul class="select_month_list">  
<?php wp_get_archives('post_type=voice&type=monthly'); ?>
</ul>
</div>

</li>

<?php if( $previous )
echo "<li class='prev'><a href=".$previous_link." class='ani-reverseBtn'><i class='fa fa-chevron-left' aria-hidden='true'></i>".$link_prevt_month_text."</a></li>"
?>

<?php if( $next )
echo "<li class='next'><a href=".$next_link." class='ani-reverseBtn'>".$link_next_month_text."<i class='fa fa-chevron-right' aria-hidden='true'></i></a></li>"
?>
</ul>

<div class="voiceWrapper">

<?php $posts = get_posts('post_type=voice&posts_per_page=1&post_status=publish');
if ( !empty($posts) ): ?>

<?php
$voice_img_group = SCF::get( 'voice_img_group' );
foreach ( $voice_img_group as $field_name => $field_value ) {
$img_array[] = $field_value['voice_img'];
}
//shuffle($img_array);
?>

<?php
$voice_group = SCF::get( 'voice_group' );
$count = 0;
foreach ( $voice_group as $field_name => $field_value ) {
?>

<div class="voiceBoxOut">
<div class="voiceBox">
<p class="voiceBody"><?php echo esc_html( $field_value['voice_text'] ); ?></p>
<div class="separater">-</div>
<p class="name"><?php echo esc_html( $field_value['voice_text_age'] ); ?><?php if(( $field_value['voice_text_job'] )) echo esc_html( "・".$field_value['voice_text_job'] ); ?><?php if(( $field_value['voice_text_address'] )) echo esc_html( "・".$field_value['voice_text_address'] ); ?></p>
</div>
</div>

<?php if( wp_get_attachment_image($img_array[$count])) { ?>

<div class="voiceBoxOut">
<figure>
<span><?php echo wp_get_attachment_image($img_array[$count], 'large'); ?></span>
</figure>
</div>

<?php $count ++; ?>

<?php } ?>
<?php } ?>		
<?php endif; ?>

</div>

<ul class="navi">
<li class="select">
<div class="select_month">
<div class="select_month_btn"><?php echo $monthtitle;?></div>
<ul class="select_month_list">  
<?php wp_get_archives('post_type=voice&type=monthly'); ?>
</ul>
</div>
</li>
                    
<?php if( $previous )
echo "<li class='prev'><a href=".$previous_link." class='ani-reverseBtn'><i class='fa fa-chevron-left' aria-hidden='true'></i>".$link_prevt_month_text."</a></li>"
?>

<?php if( $next )
echo "<li class='next'><a href=".$next_link." class='ani-reverseBtn'>".$link_next_month_text."<i class='fa fa-chevron-right' aria-hidden='true'></i></a></li>"
?>

</ul>

<a href="https://www.tripadvisor.jp/Attraction_Review-g298564-d2616330-Reviews-Gear_Art_Complex_1928-Kyoto_Kyoto_Prefecture_Kinki.html" class="tripadviser" target="_blank">
<div>
<img src="<?php echo THEME_URI; ?>/about/img/voice/icon_more.png" alt="トリップアドバイザー"><p>口コミをもっと読む<br><span>トリップアドバイザーのサイトへ</span></p>
</div>
</a>
			
</div>
</section>
</article>
</main>

<?php get_footer(); ?>