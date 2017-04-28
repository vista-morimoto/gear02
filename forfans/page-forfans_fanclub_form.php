<?php /*Template Name: FOR FANS - ファンクラブフォーム */ ?>
<?php 
$description = '『ギア-GEAR-』公式ファンクラブ「ギア部」。入会方法、ファンクラブ特典のご案内。京都で出逢える感動エンターテイメント『ギア-GEAR-』は、絶賛ロングラン公演中！';

$cssLink = '
<link rel="stylesheet" href="'.THEME_CSS.'/forfans.css">
<link rel="stylesheet" href="'.THEME_CSS.'/form.css">
';
$jsLink_top = '';
$jsLink_btm = '';
get_header();
?>

<script>
//フォーム
$( function() {
	$( 'select option[value=""]' )
	.html( '選択してください。' );
} );
$(function() {
	//inputtype変更
	$('#tel').attr('type','tel');
	$('#code').attr('type','tel');
	$('#mail').attr('type','email');
	$('#mail_confirm').attr('type','email');
});

//フォーム確認画面・サンクス画面
$(function(){
	if($('#mw_wp_form_mw-wp-form-3204665').hasClass('mw_wp_form_confirm')){
		$('body').addClass('form_confirm');
	}
	if($('#mw_wp_form_mw-wp-form-3204665').hasClass('mw_wp_form_complete')){
		$('body').addClass('form_confirm');
	}
});

//チェック判定
$(function(){
		var checkboxList = $(".formArea dd");
		checkboxList.each(function() {
			var label = $(this).find("label");
			// 最初の処理
			$(this).find(":checked").closest("label").addClass("input_checked");
			// ラベルクリック
			label.click(function() {
			label.filter(".input_checked").removeClass("input_checked");
		label.find(":checked").closest(label).addClass("input_checked");
		});
	});
});

</script>

<main class="mainContents">
<article>
<section id="fanclubs" class="fanclubs fanclubs_form section">

<!--フォーム-->
<div class="sectionInner">

<p class="small mt20 form_confirm_none">ノンバーバルパフォーマンス『ギア-GEAR-』オフィシャルファンクラブ、「ギア部」への入部届フォームです。<br>
下記必要事項にご記入ください。
</p>

<!--formBox-->
<div class="formBox">

<?php echo do_shortcode( '[mwform_formkey key="3204665"]' ); ?>

</div>
<!--/formBox-->

</div>
</section>
</article>
</main>


<?php get_footer(); ?>