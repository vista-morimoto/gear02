<?php /*Template Name: TOP */ ?>
<?php 

if(is_mobile()){
	get_template_part( 'contents_home_sp');
} else {
	get_template_part( 'contents_home_pc');
};
?>