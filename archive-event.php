<?php /*Template Name: FOR FANS - イベント（アーカイブ） */ ?>

<?php 
$url = $_SERVER['REQUEST_URI'];
if(strstr($url,'?lang=en')){
	get_template_part( 'en/page-forfans');
} else {
	get_template_part( 'forfans/page-forfans');
};
?>


<?php //get_template_part( 'forfans/page-forfans'); ?>

