<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Gear
 */
?>

<?php 
global $editTitle;
global $breadcrumbs;

$url = $_SERVER['REQUEST_URI'];
$editTitle ='404 Page Not Found';
if(strstr($url,'/en/')){
$breadcrumbs = '
<li><a property="item" typeof="WebPage" title="HOMEへ移動" href="/en/" class="ani-uLine"><span property="name">HOME</span></a><meta property="position" content="1"></li><li><span property="name">404 Page Not Found</span><meta property="position" content="2"></li>
';	
}

if(strstr($url,'/en/')){
	get_template_part( 'en/header_en');
} else {
	get_header();
};

if(strstr($url,'/en/')){
	$title = "Thank you for your interest in our website.";
	$detail = "You have requested a resource that is being modified or has been removed.";
	$back_text = "Back to the TOP Page";
	$back_url = "/en/";
	
} else {
	$title = "お探しのページが見つかりませんでした。";
	$detail = "ページが存在しないか、URLが違う可能性があるのでご確認ください。";
	$back_text = "トップページに戻る";
	$back_url = "/";
};




?>


<main class="mainContents">
	<article>
		<section id="seat " class="seat section" style="text-align: center;">
			<div class="sectionInner">
				<!--<h2 class="sectionTitle"><?php esc_html_e( '404 NOT FOUND', 'gear' ); ?></h2>-->
				<p style="margin: 64px 0 0;"><?php echo $title;?></p>
				<p><?php echo $detail;?></p>
			</div>
			<div class="sectionInner">
				<a href="<?php echo $back_url;?>" class="back_home"><i class="fa fa-undo" aria-hidden="true"></i> <?php echo $back_text;?></a>
			</div>
		</section>
	</article>
</main>

<?php
if(strstr($url,'/en/')){
	get_template_part( 'en/footer_en');
} else {
	get_footer();
};
