<?php /*Template Name: 作品紹介 - お客さまの声(アーカイブ) */ ?>

<?php 
$url = $_SERVER['REQUEST_URI'];
if(strstr($url,'?lang=en')){
	get_template_part( 'en/page-about_voice');
} else {
	get_template_part( 'about/page-about_voice');
};
?>

<?php //get_template_part( 'about/page-about_voice'); ?>