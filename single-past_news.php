<?php 
$url = $_SERVER['REQUEST_URI'];
if(strstr($url,'?lang=en')){
	get_template_part( 'en/single-press_past_news');
} else {
	get_template_part( 'press/single-press_past_news');
};
?>