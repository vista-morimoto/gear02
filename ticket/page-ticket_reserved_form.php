<?php /*Template Name: チケット予約 - 団体鑑賞・貸切公演（フォーム） */ ?>
<?php 
$description = '団体鑑賞・貸切公演のご案内。京都で出逢える感動エンターテイメント、ノンバーバル（＝言葉に頼らない）パフォーマンス『ギア-GEAR-』は、絶賛ロングラン公演中！';

$cssLink = '<link rel="stylesheet" href="'.THEME_CSS.'/ticket.css">';
$jsLink_top = '';
$jsLink_btm = '<script src="'.THEME_JS.'/ticket.js"></script>';
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
	if($('#mw_wp_form_mw-wp-form-3202069').hasClass('mw_wp_form_confirm')){
		$('body').addClass('form_confirm');
	}
	if($('#mw_wp_form_mw-wp-form-3202069').hasClass('mw_wp_form_complete')){
		$('body').addClass('form_confirm');
	}
});

// checkbox, radio にチェックがあったら label に class を付ける
(function($) {
// 読み込んだら開始
	$(function() {

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
})(jQuery);

//お子様・海外のお客さま部分の確認画面の非表示設定
$(function(){
	if(!($("input[name='group_detail_check1[data]']").length)){
		$('.check_box1').addClass('form_confirm_none');	}

	if(!($("input[name='group_detail_check2[data]']").length)){
		$('.check_box2').addClass('form_confirm_none');
	}

});

$(function() {
	if ($('.check_box1 .check').prop('checked') == false) {
		$('#group_detail_check1_num').attr('disabled', 'disabled');
	}
	$('.check_box1 .check').click(function() {
		if ($(this).prop('checked') == false) {
			$('#group_detail_check1_num').attr('disabled', 'disabled');
			$('#group_detail_check1_num').val('');
		} else {
			$('#group_detail_check1_num').removeAttr('disabled');
		}
	});
});

$(function() {
	if ($('.check_box2 .check').prop('checked') == false) {
		$('#group_detail_check2_num').attr('disabled', 'disabled');
	}
	
	$('.check_box2 .check').click(function() {
		if ($(this).prop('checked') == false) {
			$('#group_detail_check2_num').attr('disabled', 'disabled');
			$('#group_detail_check2_num').val('');
		} else {
			$('#group_detail_check2_num').removeAttr('disabled');
		}
	});
});

</script>

<main class="mainContents">
<article>
<section id="reserved" class="reserved reserved_form section">

<!--問合せフォーム-->
<div class="sectionInner">

<div class="Inquiry">
<!--<h3 class="contentsTitle">お問合せフォーム<span></span></h3>-->
<p class="small">
下記WEBフォームよりお問合せください。<br>
2営業日以内に返信のない場合は、一度ギアインフォメーション（0120-937-882/受付時間10:00-19:00）までお問合せください。<br>
尚、お申し込み内容を確認させていただいたのち、こちらからの返信を持って【予約確定】となります。<br>
予めご了承ください。
</p>

<!--formBox-->
<div class="formBox">

<?php echo do_shortcode( '[mwform_formkey key="3202069"]' ); ?>

</div>
<!--/formBox-->

</div>
</div>
</section>
</article>
</main>

<?php get_footer(); ?>