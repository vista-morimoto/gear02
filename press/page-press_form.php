<?php /*Template Name: プレス窓口 - プレス様向け お問合せフォーム */ ?>
<?php 
$description = '大人も、子どもも、外国人にも人気！『ギア-GEAR-』の最新プレスリリース。日本発！日本初！京都で出逢える感動エンターテイメント『ギア-GEAR-』は、絶賛ロングラン公演中！';

$cssLink = '
<link rel="stylesheet" href="'.THEME_CSS.'/press.css">
<link rel="stylesheet" href="'.THEME_CSS.'/form.css">
';
$jsLink_top = '';
$jsLink_btm = '<script src="'.THEME_JS.'/press.js"></script>';
get_header();
?>

<script>
//フォーム
jQuery( function( $ ) {
	$( 'select option[value=""]' )
	.html( '選択してください。' );
} );
jQuery(function($) {
	//inputtype変更
	$('#tel').attr('type','tel');
	$('#doc_code').attr('type','tel');
	$('#mail').attr('type','email');
	$('#mail_confirm').attr('type','email');
});

//フォーム確認画面・サンクス画面
$(function(){
	if($('#mw_wp_form_mw-wp-form-3204664').hasClass('mw_wp_form_confirm')){
		$('body').addClass('form_confirm');
	}
	if($('#mw_wp_form_mw-wp-form-3204664').hasClass('mw_wp_form_complete')){
		$('body').addClass('form_confirm');
	}
});

// checkbox, radio にチェックがあったら label に class を付ける

$(function() {
	
	$('#info1_check').attr('disabled', 'disabled');
	$('#info2_check').attr('disabled', 'disabled');
	
	if (!$('.info1_check #info1-1').prop('checked') == false) {
		$('#info1_check').removeAttr('disabled');
	} 
	if ($('input[name=info1_check]').val() == "") {
		$('.info1_input').addClass('form_confirm_none');
	}
	if (!$('.info2_check #info2-1').prop('checked') == false) {
		$('#info2_check').removeAttr('disabled');
	} 
	if ($('input[name=info2_check]').val() == "") {
		$('.info2_input').addClass('form_confirm_none');
	}
	
		var checkboxList = $(".formArea dd");
		checkboxList.each(function() {
			var label = $(this).find("label");
			// 最初の処理
			$(this).find(":checked").closest("label").addClass("input_checked");
			// ラベルクリック
			label.click(function() {
			label.filter(".input_checked").removeClass("input_checked");
			label.find(":checked").closest(label).addClass("input_checked");
			
			if (!$('.info1_check #info1-1').prop('checked') == false) {
				$('#info1_check').removeAttr('disabled');
			} else {
				$('#info1_check').attr('disabled', 'disabled');
				$('#info1_check').val('');
			}
			
			if (!$('.info2_check #info2-1').prop('checked') == false) {
				$('#info2_check').removeAttr('disabled');
			} else {
				$('#info2_check').attr('disabled', 'disabled');
				$('#info2_check').val('');
			}
			
			});
		
		
		
		
	});
});




</script>


<main class="mainContents">
<article>
<section id="press" class="press press_form section">

<!--問合せフォーム-->
<div class="sectionInner">

<div class="Inquiry">
<!--<h3 class="contentsTitle">お問合せフォーム<span></span></h3>-->
<!--<p class="small">
下記WEBフォームよりお問合せください。<br>
2営業日以内に返信のない場合は、一度ギアインフォメーション（0120-937-882/受付時間10:00-19:00）までお問合せください。<br>
尚、お申し込み内容を確認させていただいたのち、こちらからの返信を持って【予約確定】となります。<br>
予めご了承ください。
</p>-->

<!--formBox-->
<div class="formBox">

<?php echo do_shortcode( '[mwform_formkey key="3204664"]' ); ?>

</div>
<!--/formBox-->

</div>
</div>
</section>
</article>
</main>

<?php get_footer(); ?>