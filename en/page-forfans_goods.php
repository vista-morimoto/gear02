<?php /*Template Name: 英語 - FOR FANS - グッズ */ ?>
<?php 
global $cssLink;
global $jsLink_top;
global $jsLink_btm;
global $post;
$cssLink = '<link rel="stylesheet" href="'.THEME_CSS.'/forfans.css">';
$jsLink_top = '';
$jsLink_btm = '';
get_template_part( 'en/header_en' );
?>

<main class="mainContents">
<article>
<section id="goods" class="goods section">
<div class="sectionInner">
<p class="overview">山田章博氏デザインのキャラクターを使用したTシャツをはじめ、オリジナルグッズを販売中です。<br>
ぜひご来場の際にお買い求めください。</p>
</div>

<section class="contents">
<h3 class="contentsTitle">商品一覧<span></span></h3>

<!-- list -->
<ul class="goodsList">


<?php
$args = array(/* 配列に複数の引数を追加 */
	'post_type' => 'goods',
	'posts_per_page' => -1,
	'post_status' => 'publish',
	'paged' => $paged
	);
?>

<?php $the_query = new WP_Query( $args ); ?>
<?php if ( $the_query->have_posts() ) :?>
<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

<?php 
$goods_img = get_post_meta($post->ID, 'goods_img', true);
$goods_price = SCF::get( 'goods_price' );
$goods_price_discount = SCF::get( 'goods_price_discount' );
$goods_link = SCF::get( 'goods_link' );
$goods_new = SCF::get( 'goods_new' );
?>

<li>
<div class="goods_img_wrap">
<?php if($goods_img) : ?>
<?php echo wp_get_attachment_image($goods_img, 'resize_goods_img'); ?>
<?php else : ?>
<img src="<?php echo THEME_URI; ?>/forfans/img/goods/img_noimage.jpg">
<?php endif; ?>
</div>
<h4>
<?php if($goods_new) echo '<span class="new">NEW!</span>' ;?><?php the_title(); ?>
<?php if($goods_price_discount) : ?>
<span class="price">¥<?php echo $goods_price_discount; ?><span class="goods_price_correction">¥<?php echo $goods_price; ?></span></span>
<?php else : ?>
<span class="price">¥<?php echo $goods_price; ?></span>
<?php endif; ?>
</h4>
<p><?php the_content(); ?></p>
<?php if($goods_link) echo '<a href="'.$goods_link.'" target="_blank"><span>購入はこちら</span></a>' ;?>
</li>

<?php endwhile;?>

<?php else: ?>
<p style="text-align:center;">
商品がありません。
</p>
<?php endif; ?>
<?php wp_reset_postdata(); ?>

</ul>
	
	
<!-- others -->
<div class="others clearfix">
<img src="<?php echo THEME_URI; ?>/forfans/img/goods/img_line_en.jpg" alt="LINEスタンプ">
<div class="othersBox">
<h4><img src="<?php echo THEME_URI; ?>/forfans/img/goods/tit_line_en.png" alt="LINEスタンプ販売中！"></h4>
<p>『ギア』のマスコットキャラクター、ピニオンくんの公式LINEスタンプ好評発売中！</p>
<a href="https://store.line.me/stickershop/product/1154630/ja" target="_blank">LINEスタンプ ダウンロードはこちら</a>
</div>
</div>

</section>

</section>
</article>
</main>

<script>
(function(){
	function image_class(){
		var img = new Image();
		var images = document.querySelectorAll('.goodsList img');

		for(var i=0;i<images.length;i++){
			img.src = images[i].src;

			if(img.width < img.height){
				images[i].className += ' vertically_long';
				images[i].parentNode.className += ' vertically_long_outer';
			}else if(img.width > img.height){
				images[i].className += ' horizontally_long';
				images[i].parentNode.className += ' horizontally_long_outer';
			}else{
				images[i].className += ' square';
				images[i].parentNode.className += ' square_outer';
			}
		}
	}

	if(window.addEventListener){
		window.addEventListener('load', image_class, false);
	}else if(window.attachEvent){
		window.attachEvent('onload', image_class);
	}
})();
</script>

<?php get_template_part( 'en/footer_en' ); ?>