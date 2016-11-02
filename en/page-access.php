<?php /*Template Name: 英語 - アクセス - TOP */ ?>
<?php 
$cssLink = '<link rel="stylesheet" href="'.THEME_CSS.'/access.css">';
$jsLink_top = '';
$jsLink_btm = '';
get_template_part( 'en/header_en' );
?>

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&language=en"></script>
<script type="text/javascript"> 
google.maps.event.addDomListener(window, "load", function() { 
		
	var lat = 35.008487; //座標
	var lng = 135.766522; //座標
	var contentString = 

		'<p style="font-weight:bold">GEAR Theater (Art Complex 1928)</p>'+
		'<p style="line-height:1.4;">ZIP 604-8082<br>56 Benkeiishicho, Nakagyo-ku, Kyoto City 1928 build. 3F</p>'; 
 
	var latlng = new google.maps.LatLng(lat, lng); 
	var mapOptions = { 
			zoom: 17, 
			center: latlng, 
			mapTypeId: google.maps.MapTypeId.ROADMAP, 
			mapTypeControl: false,
			scaleControl: true 
	}; 
	var mapObj = new google.maps.Map(document.getElementById("gmap"), mapOptions); 
	var marker = new google.maps.Marker({ 
			position: latlng, 
			map: mapObj 
	});	
			
	var infowindow = new google.maps.InfoWindow({
			content: contentString
	});
	infowindow.open(mapObj, marker);
			
	google.maps.event.addListener(infowindow, "closeclick", function() {
		google.maps.event.addListenerOnce(marker, "click", function(event) {
			infowindow.open(mapObj, marker);
		});
	});
 }); 		 
</script> 

<main class="mainContents">
<article>
<section id="maps" class="section">
<div class="sectionInner">
<h3 class="contentsTitle pc_none">GEAR Theater<br>(Art Complex 1928)<span></span></h3>
<div class="leftBox">
<img src="<?php echo THEME_URI; ?>/access/img/map/img_01.jpg" alt="GEAR Theater">
</div>
<div class="rightBox">
<h3 class="contentsTitle sp_none">GEAR Theater<br>(Art Complex 1928)<span></span></h3>
<p>ZIP 604-8082<br>
56 Benkeiishicho, Nakagyo-ku, Kyoto City 1928 build. 3F<!--<br>
（カーナビなどに入力される場合：「京都市中京区弁慶石町56」とご入力ください）<br>
※当劇場には駐車場・駐輪場がございません。近隣の施設をご利用ください。--></p>
<p class="mt50">TEL 075-254-6520 (Operating hours 10:00-19:00)<br>
FAX　075-254-6521<br>
MAIL　<a href="mailto:hi@gear.ac">hi@gear.ac</a> (English)</p>
</div>

<div class="map">
<img src="<?php echo THEME_URI; ?>/access/img/map/img_02_en.jpg" alt="MAP">
<p class="mt25">
8 minute walk from Hankyu Railway Kawaramachi Station<br>
5 minute walk from Keihan Railway Sanjo Station<br>
10 minute walk from Subway Karasuma Line Karasumaoike Station<br>
3 minute walk from Kawaramachi-Sanjo Bus Stop of Kyoto City Bus (route No. 4, 5, 17, 205)
</p>
</div>

<!--<div id="gmap" style="width: 100%;"></div>-->

<div class="gMap">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3267.928976685041!2d135.76433746524057!3d35.00848298035662!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60010892296800d1%3A0x833920b059ebecf!2z44Ku44Ki5bCC55So5YqH5aC0KEFSVCBDT01QTEVYIDE5Mjgp!5e0!3m2!1sja!2sjp!4v1464076114360" width="400" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
<div class="pc_none gmap_link"><a href="https://www.google.co.jp/maps?q=ART+COMPLEX+1928&hl=ja&sll=35.008768,135.766532&sspn=0.010949,0.021136&brcurrent=3,0x6001062b6f570db9:0x408c4afef6d460fd,0&hq=ART+COMPLEX+1928&t=m&z=16" target="_blank"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> Google Maps</a></div>

</div>
</section>
</article>
</main>

<?php get_template_part( 'en/footer_en' ); ?>