<?php
global $editTitle;
global $description;
global $bodyClass;
$toppage = ($bodyClass == 'top')? TRUE: '';

//site_name
$site_name ='GEAR - non-verbal performance -';

//title
$title = get_the_title();
if($editTitle){	$title = $editTitle.'｜'.$site_name;} elseif(isset($title) && !$toppage) {	$title = $title.'｜'.$site_name;} else { $title = $site_name;}

//type
if($toppage){ $type = 'website';} else { $type = 'article';}

//url
$url = (empty($_SERVER["HTTPS"]) ? "http://" : "https://") . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];

//description
if(!$description){ $description = 'Not a play,not a musial,not a circus!Give you miracle moments!GEAR is world-top-non-verbal-performance produced in Kyoto! If you go to Kyoto, it is recommended! Never miss it!!';}

//image
if(strstr($url,'/about/voice/')){
	$image_og = THEME_IMAGES.'/ogp/ogp_voice.jpg';
	$image_tw = THEME_IMAGES.'/ogp/twitter_voice.jpg';
} elseif (strstr($url,'/about/')) {
	$image_og = THEME_IMAGES.'/ogp/ogp_about.jpg';
	$image_tw = THEME_IMAGES.'/ogp/twitter_about.jpg';
} elseif (strstr($url,'/ticket/')) {
	$image_og = THEME_IMAGES.'/ogp/ogp_ticket.jpg';
	$image_tw = THEME_IMAGES.'/ogp/twitter_ticket.jpg';
} elseif (strstr($url,'/access/')) {
	$image_og = THEME_IMAGES.'/ogp/ogp_access-faq.jpg';
	$image_tw = THEME_IMAGES.'/ogp/twitter_access-faq.jpg';	
} elseif (strstr($url,'/info/')) {
	$image_og = THEME_IMAGES.'/ogp/ogp_access-faq.jpg';
	$image_tw = THEME_IMAGES.'/ogp/twitter_access-faq.jpg';	
} elseif (strstr($url,'/forfans/')) {
	$image_og = THEME_IMAGES.'/ogp/ogp_forfan.jpg';
	$image_tw = THEME_IMAGES.'/ogp/twitter_forfan.jpg';	
} elseif (strstr($url,'/recruit/')) {
	$image_og = THEME_IMAGES.'/ogp/ogp_recruit.jpg';
	$image_tw = THEME_IMAGES.'/ogp/twitter_recruit.jpg';
} elseif (strstr($url,'/press/')) {
	$image_og = THEME_IMAGES.'/ogp/ogp_info.jpg';
	$image_tw = THEME_IMAGES.'/ogp/twitter_info.jpg';
} else {
	$image_og = THEME_IMAGES.'/ogp/ogp_index-press.jpg';
	$image_tw = THEME_IMAGES.'/ogp/twitter_index-press.jpg';
}

//locale
$locale = 'en_US';

//fb:app_id (<meta property="fb:app_id" content="">)
$app_id = '';

//twitter:site
$site = '@nvpgear';

?>
<meta property="og:title" content="<?php echo $title;?>">
<meta property="og:type" content="<?php echo $type;?>">
<meta property="og:site_name" content="<?php echo $site_name;?>">
<meta property="og:url" content="<?php echo $url;?>">
<meta property="og:description" content="<?php echo $description;?>">
<meta property="og:image" content="<?php echo $image_og;?>">
<meta property="og:locale" content="<?php echo $locale;?>">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="<?php echo $site;?>">
<meta name="twitter:title" content="<?php echo $title;?>">
<meta name="twitter:description" content="<?php echo $description;?>">
<meta name="twitter:image:src" content="<?php echo $image_tw;?>">