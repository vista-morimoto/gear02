<?php /*Template Name: プレス窓口 - ニュース（アーカイブ） */ ?>

<?php 
$url = $_SERVER['REQUEST_URI'];
if(strstr($url,'?lang=en')){
	get_template_part( 'en/page-press_news');
} else {
	get_template_part( 'press/page-press_news');
};
?>


<?php //get_template_part( 'press/page-press_news'); ?>
