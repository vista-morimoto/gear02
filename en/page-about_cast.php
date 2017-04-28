<?php /*Template Name: 英語 - 作品紹介 - キャスト */ ?>
<?php 
$cssLink = '
<link rel="stylesheet" href="'.THEME_CSS.'/about.css">
<link rel="stylesheet" href="'.THEME_CSS.'/lib/flickity.css">
';
$jsLink_top = '<script src="'.THEME_JS.'/lib/flickity.pkgd.min.js"></script>';
$jsLink_btm = '<script src="'.THEME_JS.'/about.js"></script>';
get_template_part( 'en/header_en' );
?>

<script>
(function($){
	
$(function() {	
	$('.tab>li').click(function() {
	var num = $(this).parent().children('li').index(this);
	$('.tab').each(function(){
	$('>li',this).removeClass('current').eq(num).addClass('current');
	});
	$('.tabSection .cast_contents .cast_content').hide().eq(num).show();
	}).first().click();
	
	$('.tab.bottom>li').click(function() {
	var href= $(this).attr('data-url');
	var target = $(href == "#" || href == "" ? 'html' : href);
	$("html,body").animate(500 ,"easeOutQuint");
	return false;
	}); 

	/* $(function(){
	$("a.btn_act").click(function(){
	$('a.btn_act').removeClass('active');
	$(this).addClass('active');
	});
	$('.active').click();
	});*/

	$(".cast_mime").click(function(){
		//$("#box1").fadeIn("slow");
		$(".content_wrap").addClass('disnon');
		$(".content_wrap").eq(0).removeClass('disnon');	
	});
	$(".cast_breakdance").click(function(){
		//$("#box2").fadeIn("slow");
		$(".content_wrap").addClass('disnon');
		$(".content_wrap").eq(1).removeClass('disnon');
	});
	$(".cast_doru").click(function(){
		//$("#box3").fadeIn("slow");
		$(".content_wrap").addClass('disnon');
		$(".content_wrap").eq(2).removeClass('disnon');
	});
	$(".cast_magic").click(function(){
		//$("#box4").fadeIn("slow");
		$(".content_wrap").addClass('disnon');
		$(".content_wrap").eq(3).removeClass('disnon');
	});
	$(".cast_juggling").click(function(){
		//$("#box5").fadeIn("slow");
		$(".content_wrap").addClass('disnon');
		$(".content_wrap").eq(4).removeClass('disnon');
	});	
	
	// 特定のタブを開いて遷移
	$(window).load(function(){		
	var hash = location.hash;
	hash = (hash.match(/^#tab\d+$/) || [])[0];	
	
	if(!hash){
		$('.carousel-main').flickity({
		initialIndex:0
		});
		$('.carousel-nav').flickity({
		asNavFor: '.carousel-main',
		contain: true,
		pageDots: false
		});
	
	}else {	
		var tabname = hash.slice(4);
		var tabname = tabname - 1;
		var tabbar = tabname;
		$(".content_wrap").addClass('disnon');
		$(".content_wrap").eq(tabname).removeClass('disnon');
		$(".tab_list").removeClass('current');
		$(".tab_list").eq(tabbar).addClass('current');
		$(".tab_list_btm").removeClass('current');
		$(".tab_list_btm").eq(tabbar).addClass('current');
	
		$('.carousel-main').flickity({
			initialIndex: (tabbar)
		});
		$('.carousel-nav').flickity({
			asNavFor: '.carousel-main',
			contain: true,
			pageDots: false
		});
	}
	});

// タブメニュー
/*  $("#tab li").click(function() {
var num = $("#tab li").index(this);
	$(".content_wrap").addClass('disnon');
		$(".content_wrap").eq(num).removeClass('disnon');
		$(".tab li").removeClass('current');
		$(this).addClass('current');
	}); */

	/* $('.carousel-main').flickity();
	$('.carousel-nav').flickity({
	asNavFor: '.carousel-main',
	contain: true,
	pageDots: false
	}); */

	});
})(jQuery);
</script>

<main class="mainContents">


<!--cast_area-->
<article id="cast_area">

<!--tabSection-->
<div class="tabSection">

<ul class="tab top carousel carousel-main carousel--full-width pc_none clearfix">
	<li class="carousel-cell"><a class="cast_mime btn_act"><img src="<?php echo THEME_URI; ?>/about/img/cast/1_sp_en.jpg" width="100%" alt="MIME"></a></li>
	<li class="carousel-cell"><a class="cast_breakdance btn_act" ><img src="<?php echo THEME_URI; ?>/about/img/cast/2_sp_en.jpg" width="100%" alt="BREAKIN’"></a></li>
	<li class="carousel-cell"><a class="cast_doru btn_act" ><img src="<?php echo THEME_URI; ?>/about/img/cast/5_sp_en.jpg" width="100%" alt="DOLL"></a></li>
	<li class="carousel-cell"><a class="cast_magic btn_act" ><img src="<?php echo THEME_URI; ?>/about/img/cast/3_sp_en.jpg" width="100%" alt="MAGIC"></a></li>
	<li class="carousel-cell"><a class="cast_juggling btn_act" ><img src="<?php echo THEME_URI; ?>/about/img/cast/4_sp_en.jpg" width="100%" alt="JUGGLING"></a></li>
</ul>

<ul class="tab top sp_none  clearfix">
	<li class="tab_list"><a class="cast_mime" href="#cast_area"><img src="<?php echo THEME_URI; ?>/about/img/cast/1_en.jpg" width="100%" alt="MIME"></a></li>
	<li class="tab_list"><a class="cast_breakdance" href="#cast_area"><img src="<?php echo THEME_URI; ?>/about/img/cast/2_en.jpg" width="100%" alt="BREAKIN’"></a></li>
	<li class="tab_list"><a class="cast_doru" href="#cast_area"><img src="<?php echo THEME_URI; ?>/about/img/cast/5_en.jpg" width="100%" alt="DOLL"></a></li>
	<li class="tab_list"><a class="cast_magic" href="#cast_area"><img src="<?php echo THEME_URI; ?>/about/img/cast/3_en.jpg" width="100%" alt="MAGIC"></a></li>
	<li class="tab_list"><a class="cast_juggling" href="#cast_area"><img src="<?php echo THEME_URI; ?>/about/img/cast/4_en.jpg" width="100%" alt="JUGGLING"></a></li>
</ul>


<!--cast_contents-->
<div class="cast_contents">

<!--**********************mime**********************-->
<div class="content_wrap">
<div id="box1 tab1" class="cast_content">

<div class="mime_category_title pc_none">
MIME
</div>

<!--いいむろなおき-->
<div class="mime_area cast_box clearfix">
<div class="profile_box pc_right_sp_none">
<h3 class="cast_name">Naoki Iimuro</h3>
<p class="cast_category">Mime actor</p>
<div class="bar sp_none"></div>
<p class="cast_profile">
Graduate of the Marcel Marceau Paris International School of Mimodrama (Ecole Internationale de Mimodrame de Paris Marcel Marceau). Also graduated top of the class of Contemporary Dance from Ecole de Musique Classique et Religieuse. Using the Kansai region as his base, Naoki is active both in Japan and abroad. He took part in the Agency of Cultural Affairs Overseas Study Programme for Up-and-coming Artists in 2005. Naoki won a Gold medal in the mime improvisation section at the 3rd World Delphic Games in 2009 and received the Hyogo Prefecture Arts Award of Excellence in 2012.

</p>
<div class="go_site_btn"><a href="http://mime1166.com/" target="_blank">Related Sites</a></div>
<div class="cast_schedule_btn"><a href="/ticket/cast_schedule/"><span class="icon-schedule mr10"></span><span class="text">View schedule</span></a></div>
</div>
<div class="pic_box pc_left_sp_none"><img src="<?php echo THEME_URI; ?>/about/img/cast/photo/iimuro.jpg" ><p>Photo by Yoshikazu Inoue</p></div>
</div>

<!--岡村渉-->
<div class="mime_area cast_box clearfix">
<div class="profile_box fleft">
<h3 class="cast_name">Wataru Okamura</h3>
<p class="cast_category">Mime actor</p>
<div class="bar sp_none"></div>
<p class="cast_profile">
After graduating from Osaka University of Arts, Wataru came across street mime while overseas on an extended trip to learn art.  So in 2008, he started learning pantomime from famed mime actor Naoki Iimuro. Currently, he performs at various places such as theatres, music houses, or on the sidewalks.
</p>
<!--<div class="go_site_btn"><a href="#">Related Sites</a></div>-->
<div class="cast_schedule_btn"><a href="/ticket/cast_schedule/"><span class="icon-schedule mr10"></span><span class="text">View schedule</span></a></div>
</div>
<div class="pic_box fright"><img src="<?php echo THEME_URI; ?>/about/img/cast/photo/okamura.jpg" ><p>Photo by Yoshikazu Inoue</p></div>
</div>

<!--谷啓吾-->
<div class="mime_area cast_box clearfix">
<div class="profile_box pc_right_sp_none">
<h3 class="cast_name">Keigo Tani</h3>
<p class="cast_category">Mime actor</p>
<div class="bar sp_none"></div>
<p class="cast_profile">
Keigo performs mainly at small theatres in Kansai or at cultural events. He is also active in scriptwriting, directing, and production of plays. His interest in mime was piqued after co-starring in a mime performance, and he started tutelage under mime actor Naoki Iimuro. Besides plays, Keigo is expanding his scope of activity by taking part in collaborations in other genres as well.
</p>
<!--<div class="go_site_btn"><a href="#">Related Sites</a></div>-->
<div class="cast_schedule_btn"><a href="/ticket/cast_schedule/"><span class="icon-schedule mr10"></span><span class="text">View schedule</span></a></div>
</div>
<div class="pic_box pc_left_sp_none"><img src="<?php echo THEME_URI; ?>/about/img/cast/photo/tani.jpg" ><p>Photo by Yoshikazu Inoue</p></div>
</div>

<!--大熊隆太郎-->
<div class="mime_area cast_box clearfix">
<div class="profile_box fleft">
<h3 class="cast_name">Ryutaro Okuma</h3>
<p class="cast_category">Mime actor</p>
<div class="bar sp_none"></div>
<p class="cast_profile">
Besides being a stage actor, Ryutaro uses his expressive talents in a wide range of fields, taking part in overseas mime shows, Naoki Iimuro's company Mime Lab Second, dance events and so on.  Also, he is in charge of scriptwriting and directing for the theatrical company Ichigekiya, of which he is the representative, where he creates plays that incorporate mime technique.
</p>
<!--<div class="go_site_btn"><a href="#">Related Sites</a></div>-->
<div class="cast_schedule_btn"><a href="/ticket/cast_schedule/"><span class="icon-schedule mr10"></span><span class="text">View schedule</span></a></div>
</div>
<div class="pic_box fright"><img src="<?php echo THEME_URI; ?>/about/img/cast/photo/ohkuma.jpg" ><p>Photo by Yoshikazu Inoue</p></div>
</div>

<!--松永和也-->
<div class="mime_area cast_box clearfix">
<div class="profile_box pc_right_sp_none">
<h3 class="cast_name">Kazuya Matsunaga</h3>
<p class="cast_category">Mime actor</p>
<div class="bar sp_none"></div>
<p class="cast_profile">
Kazuya Matsunaga is a performer in the Kansai area; his work transverses a variety of fields, from theatre, dance works, and film and TV acting.<br>
In high school, he met Naoki Iimuro, came to know the fascination of pantomime, and is now active in the Naoki Iimuro company Lab Second.  He performs in such shows as The Mime Hour, and is daily exploring the possibilities of mime expression.<br>
Armed with the technique of exploiting the gap between the mime’s noble facial expression and his comic movements, Kazuya is commanding attention as rapidly growing young star.
</p>
<!--<div class="go_site_btn"><a href="#">Related Sites</a></div>-->
<div class="cast_schedule_btn"><a href="/ticket/cast_schedule/"><span class="icon-schedule mr10"></span><span class="text">View schedule</span></a></div>
</div>
<div class="pic_box pc_left_sp_none"><img src="<?php echo THEME_URI; ?>/about/img/cast/photo/matsunaga.jpg" ><!--<p>Photo by Yoshikazu Inoue</p>--></div>
</div>


</div>
</div>
<!--**********************/mime**********************-->



<!--**********************breakdance**********************-->
<div class="content_wrap disnon">
<div id="box2 tab2" class="cast_content">

<div class="breakdance_category_title pc_none">
BREAKIN’
</div>


<!--HIDE-->
<div class="breakdance_area cast_box clearfix">
<div class="profile_box pc_right_sp_none">
<h3 class="cast_name">HIDE</h3>
<p class="cast_category">Dancer</p>
<div class="bar sp_none"></div>
<p class="cast_profile">
In 2007, Hide was the winner in the Showcase category at the Breakdance competition with the longest history: the BATTLE OF THE YEAR INTERNATIONAL, held in Germany.  He has also won many other dance competitions both in Japan and abroad. In addition, for two consecutive years he was chosen to perform the opening act for one of the world's largest street dance contests, JAPAN DANCE DELIGHT (vol. 15 & 16). Besides performing on TV, guest-performing, or being a judge at dance events, he also teaches at dance schools. Together with Toshi-Rock, he holds street performances at various places around the country with Osaka as his base. Hide is one of the few Japanese dancers registered with Cirque du Soleil.
</p>
<!--<div class="go_site_btn"><a href="#">Related Sites</a></div>-->
<div class="cast_schedule_btn"><a href="/ticket/cast_schedule/"><span class="icon-schedule mr10"></span><span class="text">View schedule</span></a></div>
</div>
<div class="pic_box pc_left_sp_none"><img src="<?php echo THEME_URI; ?>/about/img/cast/photo/hide.jpg" ><p>Photo by Yoshikazu Inoue</p></div>
</div>

<!--KATSU-->
<div class="breakdance_area cast_box clearfix">
<div class="profile_box fleft">
<h3 class="cast_name">KATSU</h3>
<p class="cast_category">Dancer</p>
<div class="bar sp_none"></div>
<p class="cast_profile">
As main member of Ichigeki (a world class martial arts organization in Japan), Katsu took part in the breakdancing world championships BATTLE OF THE YEAR in 2002 and 2005 and won 1st place for the Show category and 2nd place in the Battle category in 2005, proving himself to be of world-class level. He has also won many other awards in Japan and abroad. Currently, he is active as a genre-less Body Artist, using breakdancing as a starting point.  He is also actively engaged in activities outside the street scene, such as stage performances and the like.  At the same time, along with other contemporary dancers and ballet-dancers, he is a member of ALPHACT, an experimental artist group. He is active too in the role as vocalist, programmer and producer of DIGITAL GROOVE ROCK BAND 1.G.K. In “The Catalyst” LINKIN PARK remix contest, Katsu got into the top 10-- the first for a Japanese. Striving for a new fusion of dance and rock, he is well-acclaimed domestically and abroad, and has much experience working with famous artists songs for TV commercials.
</p>
<!--<div class="go_site_btn"><a href="#">Related Sites</a></div>-->
<div class="cast_schedule_btn"><a href="/ticket/cast_schedule/"><span class="icon-schedule mr10"></span><span class="text">View schedule</span></a></div>
</div>
<div class="pic_box fright"><img src="<?php echo THEME_URI; ?>/about/img/cast/photo/katsu.jpg" ><p>Photo by Yoshikazu Inoue</p></div>
</div>

<!--達矢-->
<div class="breakdance_area cast_box clearfix">
<div class="profile_box pc_right_sp_none">
<h3 class="cast_name">TATSUYA</h3>
<p class="cast_category">Dancer</p>
<div class="bar sp_none"></div>
<p class="cast_profile">
As an all-round dancer, Tatsuya's moves are both dynamic and stylish. He has obtained the first runner-up prizes in the world class breakdance competition BATTLE OF THE YEAR JAPAN in 2008 and 2010. In 2009 and 2010, Tatsuya was also among the finalists of JAPAN DANCE DELIGHT which is the most well-known and world's biggest street dance contest. He has also won numerous prizes in other events, and works as an instructor in dance schools.
</p>
<!--<div class="go_site_btn"><a href="#">Related Sites</a></div>-->
<div class="cast_schedule_btn"><a href="/ticket/cast_schedule/"><span class="icon-schedule mr10"></span><span class="text">View schedule</span></a></div>
</div>
<div class="pic_box pc_left_sp_none"><img src="<?php echo THEME_URI; ?>/about/img/cast/photo/tatsuya.jpg" ><p>Photo by Yoshikazu Inoue</p></div>
</div>

<!--YOPPY-->
<div class="breakdance_area cast_box clearfix">
<div class="profile_box fleft">
<h3 class="cast_name">YOPPY</h3>
<p class="cast_category">Dancer</p>
<div class="bar sp_none"></div>
<p class="cast_profile">
Yoppy is a member of the world-class martial arts group Ichigeki.  After finishing in the top four of the biggest international breakdance competition, BATTLE OF THE YEAR JAPAN, Yoppy won the Grand Prize in the Bronx Night 3on3 competition, and has since won many awards for his dance, such as finishing in the best 16 of the United Kingdom B-Boy Championships.  With his dynamic and powerful movements and detailed footwork, he is master of a variety of techniques.  Currently he is active in many fields, such as judging breakdance battles, and MCing dance events.
</p>
<!--<div class="go_site_btn"><a href="#">Related Sites</a></div>-->
<div class="cast_schedule_btn"><a href="/ticket/cast_schedule/"><span class="icon-schedule mr10"></span><span class="text">View schedule</span></a></div>
</div>
<div class="pic_box fright"><img src="<?php echo THEME_URI; ?>/about/img/cast/photo/yoppy.jpg" ><p>Photo by Yoshikazu Inoue</p></div>
</div>

<!--たっちん-->
<div class="breakdance_area cast_box clearfix">
<div class="profile_box pc_right_sp_none">
<h3 class="cast_name">Tatchyn</h3>
<p class="cast_category">Dancer</p>
<div class="bar sp_none"></div>
<p class="cast_profile">
Armed with explosive force and speed by using his top physical abilities, Tachyn beguiles audiences with his ingenious moves that incorporate supreme skill.  Representing Japan in the world’s biggest breakdance competition, BATTLE OF THE YEAR 2014, he shone among the top four.  In addition, he won the R-16 Japan preliminary contest two years in a row (2013, 2014), and went on to the World Final to take first place in the Show category and second place in the Battle category; he is also the winner of the IBE Team Battle contest in 2010.  He has won many such awards both in Japan and internationally.<br>     
He is thriving in multiple roles, performing in many venues, judging dance events, and being invited as guest dancer for many events. 
</p>
<!--<div class="go_site_btn"><a href="#">Related Sites</a></div>-->
<div class="cast_schedule_btn"><a href="/ticket/cast_schedule/"><span class="icon-schedule mr10"></span><span class="text">View schedule</span></a></div>
</div>
<div class="pic_box pc_left_sp_none"><img src="<?php echo THEME_URI; ?>/about/img/cast/photo/tacchin.jpg" ><p>Photo by Saori Kawanishi</p></div>
</div>

<!--ワンヤン-->
<div class="breakdance_area cast_box clearfix">
<div class="profile_box fleft">
<h3 class="cast_name">Wang Yang</h3>
<p class="cast_category">Dance Acrobat Artist</p>
<div class="bar sp_none"></div>
<p class="cast_profile">
Wang Yang joined the National Chinese Acrobatic Troupe at age 14. He majored in a broad range of fields such as Chinese pole, Acrobatics and Seesaw technique.<br />
At age 18, Wang Yang was promoted to instructor for the College of Circus Codarts Rotterdam. Thereafter, he has participated many events and shows in Europe.<br />
Wang Yang came to Japan in 2014. He has been performing for Ninja shows and theme parks. He also works as an instructor for Acrobatics and Kung Fu. Moreover, his talents draw a great deal of media attention.
</p>
<!--<div class="go_site_btn"><a href="#">関連サイト</a></div>-->
<div class="cast_schedule_btn"><a href="/ticket/cast_schedule/"><span class="icon-schedule mr10"></span><span class="text">View schedule</span></a></div>
</div>
<div class="pic_box fright"><img src="<?php echo THEME_URI; ?>/about/img/cast/photo/wangyang.jpg" ><p>Photo by Yusuke Otsuki</p></div>
</div>


</div>
</div>
<!--**********************/breakdance**********************-->



<!--**********************doru**********************-->
<div class="content_wrap disnon">
<div id="box3 tab3" class="cast_content">

<div class="doru_category_title pc_none">
DOLL
</div>


<!--兵頭祐香-->
<div class="doru_area cast_box clearfix">
<div class="profile_box pc_right_sp_none">
<h3 class="cast_name">Yuka Hyodo</h3>
<p class="cast_category">Actress</p>
<div class="bar sp_none"></div>
<p class="cast_profile">
Yuka debuted as the lead actress in the film Shara Soju, which was directed by Naomi Kawase and was entered in the Competition section of the Cannes International Film Festival in 2003. In 2004, she won the Best Newcomer of the Year award at the 18th Takasaki Film Festival for the same film. In recent years, she has been performing in and outside of Japan as a member of Original Tempo, a non-verbal performing group. In 2009, Shut up, Play!! attained the highest 5-star rating at the Edinburgh Fringe Festival. Since then, she has been performing in many places like Singapore, Taiwan, London, Croatia and so on. In 2012, she took part in Audition for Life, an international collaboration project with Slovenia.
</p>
<!--<div class="go_site_btn"><a href="#">Related Sites</a></div>-->
<div class="cast_schedule_btn"><a href="/ticket/cast_schedule/"><span class="icon-schedule mr10"></span><span class="text">View schedule</span></a></div>
</div>
<div class="pic_box pc_left_sp_none"><img src="<?php echo THEME_URI; ?>/about/img/cast/photo/hyodo.jpg" ><p>Photo by Yoshikazu Inoue</p></div>
</div>

<!--平本茜子-->
<div class="doru_area cast_box clearfix">
<div class="profile_box fleft">
<h3 class="cast_name">Akane Hiramoto</h3>
<p class="cast_category">Actress</p>
<div class="bar sp_none"></div>
<p class="cast_profile">
Akane is a member of the Yoshimoto Creative Agency.   Since her childhood, Akane has been dancing and acting, going as far as New York for her studies.  Expressing with her whole body an angelic poise, her performances charm audiences.  As a Yoshimoto member, she appears in plays and musicals, and is now expanding her activities to include acting on TV for NHK Morning Dramas.<br>
Not just that, but in joining her talents for scriptwriting and choreography, she self-produces theatre work, and so is thriving in multiple ways. 
</p>
<!--<div class="go_site_btn"><a href="#">Related Sites</a></div>-->
<div class="cast_schedule_btn"><a href="/ticket/cast_schedule/"><span class="icon-schedule mr10"></span><span class="text">View schedule</span></a></div>
</div>
<div class="pic_box fright"><img src="<?php echo THEME_URI; ?>/about/img/cast/photo/hiramoto.jpg" ><p>Photo by Yoshikazu Inoue</p></div>
</div>

<!--和田ちさと-->
<!--<div class="doru_area cast_box clearfix">
<div class="profile_box pc_right_sp_none">
<h3 class="cast_name">Chisato Wada</h3>
<p class="cast_category">Actress</p>
<div class="bar sp_none"></div>
<p class="cast_profile">
Chisato started her career as an actress after graduating from the Osaka Kyoiku University Music Department. She has acted in the musical West Side Story and the play Miss Julie. She has also performed in contemporary dance works as a member of Alti Artist Project at the Kyoto Prefecture Alti Hall. After various activities in Japan, she headed to New York on a scholarship to study theatre and graduated from Michael Howard Studios.  In New York, Chisato played Karen in Boys Life as Karen, also appeared at the famous  comedy club COMIX as a member of EtchaSketch; at the Thinkers and Feelers Fest, she performed in the premier of So It Is, If You Think So.<br>
On her return to Japan, she produces and creates Zombie flashmob for the Shinseikai Tutankhamun, yearly since 2013.  Since then she is responsible for many Zombie flash mobs in public spaces all over Osaka.  In 2015 she began a project to revitalize the defunct cabaret club Universe in the Misono blg., putting on night cabaret shows.
</p>
<div class="cast_schedule_btn"><a href="/ticket/cast_schedule/"><span class="icon-schedule mr10"></span><span class="text">View schedule</span></a></div>
</div>
<div class="pic_box pc_left_sp_none"><img src="<?php echo THEME_URI; ?>/about/img/cast/photo/wada.jpg" ><p>Photo by Yoshikazu Inoue</p></div>
</div>-->

<!--游礼奈-->
<div class="doru_area cast_box clearfix">
<div class="profile_box pc_right_sp_none">
<h3 class="cast_name">Reina Yu</h3>
<p class="cast_category">Actress</p>
<div class="bar sp_none"></div>
<p class="cast_profile">
Reina majored in Performance  at the Osaka University of Arts, and stayed on to receive her Master’s degree there.  Her area of expertise is dance, focusing on Ballet and Contemporary work.<br>
Including high critical acclaim for her choreography at the Shanghai World fair, as a member of the group KAORI alive, she took part in the 18th Annual VIBE Dance Competition in Los Angeles and won third place.<br>
In Japan, she is recipient of many awards for her choreographies and performance, and got first place in the 14 International Nakano Dance Competition as well.
</p>
<!--<div class="go_site_btn"><a href="#">Related Sites</a></div>-->
<div class="cast_schedule_btn"><a href="/ticket/cast_schedule/"><span class="icon-schedule mr10"></span><span class="text">View schedule</span></a></div>
</div>
<div class="pic_box pc_left_sp_none"><img src="<?php echo THEME_URI; ?>/about/img/cast/photo/yu.jpg" ><p>Photo by Yoshikazu Inoue</p></div>
</div>

<!--佐々木ヤス子-->
<div class="doru_area cast_box clearfix">
<div class="profile_box fleft">
<h3 class="cast_name">Yasuko Sasaki</h3>
<p class="cast_category">Actress</p>
<div class="bar sp_none"></div>
<p class="cast_profile">
Yasuko graduated from Kobe University in the prestigious Institute for Human Development, and studied in the Faculty of Human Expression.  During her time there, she started performing.  From comedy to more serious roles, her acting flexibility and adaptability have ensured that she is in great demand on stages throughout the Kansai area.  She is also a sophisticated ballet and contemporary dancer, appearing in the Kobe Biennale in Seki Noriko’s site specific works Gate and Kira.  Yasuko is active in a wide range of styles of performance.
</p>
<!--<div class="go_site_btn"><a href="#">Related Sites</a></div>-->
<div class="cast_schedule_btn"><a href="/ticket/cast_schedule/"><span class="icon-schedule mr10"></span><span class="text">View schedule</span></a></div>
</div>
<div class="pic_box fright"><img src="<?php echo THEME_URI; ?>/about/img/cast/photo/sasaki.jpg" ><p>Photo by Yusuke Otsuki</p></div>
</div>

<!--中村るみ-->
<div class="doru_area cast_box clearfix">
<div class="profile_box pc_right_sp_none">
<h3 class="cast_name">Rumi Nakamura</h3>
<p class="cast_category">Actress</p>
<div class="bar sp_none"></div>
<p class="cast_profile">
Rumi has been Baton Twirling at the age of two, and has since won the championship in Dance Twirling and Twin Baton Twirling at the prestigious All Japan Baton Twirling Competition for a consecutive three years.  She also boasts of having won awards in solo baton twirling nationally, as well as many other awards.<br />
As captain of the dance team of her high school, she lead them to the Kobe All Japan Dance Festival event for 2010 and 2011, and 2013 took them to them advance in the All Japan High School Dance Competition to garner the CBC prize.<br />
At Kobe University, Rumi began studying theatrical performance as well, and is active in her own work, as well as performing and choreographing in other pieces.  Additionally appearing on many stages throughout Kansai, her career is off to an energetic start.<br />
With her vigor and physical ability cultivated by Baton Twirling, Rumi is an up and coming young actress who is attracting much attention in the theatrical community.
</p>
<!--<div class="go_site_btn"><a href="#">Related Sites</a></div>-->
<div class="cast_schedule_btn"><a href="/ticket/cast_schedule/"><span class="icon-schedule mr10"></span><span class="text">View schedule</span></a></div>
</div>
<div class="pic_box pc_left_sp_none"><img src="<?php echo THEME_URI; ?>/about/img/cast/photo/nakamura.jpg" ><p>Photo by Yusuke Otsuki</p></div>
</div>


</div>
</div>
<!--**********************/doru**********************-->

<!--**********************magic**********************-->
<div class="content_wrap disnon">
<div id="box4 tab4" class="cast_content">


<div class="magic_category_title pc_none">
MAGIC
</div>

<!--新子景視-->
<div class="magic_area cast_box clearfix">
<div class="profile_box pc_right_sp_none">
<h3 class="cast_name">Keishi Atarashi</h3>
<p class="cast_category">Magician</p>
<div class="bar sp_none"></div>
<p class="cast_profile">
After watching magic while he was still an elementary school student, Keishi started studying and learning techniques on his own and debuted as a professional magician at the age of 17. From sleight-of-hand done right in front of the audience’s eyes to stage magic and illusions, Keishi is skilled in many genres of magic. After graduating from Kansai University in 2009, he started performing on TV and at shows in and outside Japan at a full professional level. Having also won at many contests, Keishi also teaches magic to a wide variety of people, from amateur magicians to professional magicians.
</p>
<!--<div class="go_site_btn"><a href="#">Related Sites</a></div>-->
<div class="cast_schedule_btn"><a href="/ticket/cast_schedule/"><span class="icon-schedule mr10"></span><span class="text">View schedule</span></a></div>
</div>
<div class="pic_box pc_left_sp_none"><img src="<?php echo THEME_URI; ?>/about/img/cast/photo/atarashi.jpg" ><!--<p>Photo by Yoshikazu Inoue</p>--></div>
</div>

<!--山下翔吾-->
<div class="magic_area cast_box clearfix">
<div class="profile_box fleft">
<h3 class="cast_name">Shohgo Yamashita</h3>
<p class="cast_category">Magician</p>
<div class="bar sp_none"></div>
<p class="cast_profile">
A graduate of Kyoto University of Art and Design, Shohgo came across magic while he was still a university student. He spent his time training hard while wandering through restaurants and stages as a magician. He is now an up-and-coming young magician who is trying his hand at a new genre of magic—magic that has a story and combines both film production (which he majored in at university) and magic together. Besides appearing on TV shows with NHK and ABC and so on, he also plays a magician in the movie Miroku.
</p>
<!--<div class="go_site_btn"><a href="#">Related Sites</a></div>-->
<div class="cast_schedule_btn"><a href="/ticket/cast_schedule/"><span class="icon-schedule mr10"></span><span class="text">View schedule</span></a></div>
</div>
<div class="pic_box fright"><img src="<?php echo THEME_URI; ?>/about/img/cast/photo/yamashita.jpg" ><p>Photo by Yoshikazu Inoue</p></div>
</div>

<!--橋本昌也-->
<div class="magic_area cast_box clearfix">
<div class="profile_box pc_right_sp_none">
<h3 class="cast_name">Masaya Hashimoto</h3>
<p class="cast_category">Magician</p>
<div class="bar sp_none"></div>
<p class="cast_profile">
A Kyoto boy, at 6 years of age Masaya started studying magic because he was fascinated by magic toys.  He presented his original tricks to the illusionist world at the age of 17, which lead him to start a career performing and creating magic.  He is strong at “close-up magic” which is performed right in front of the face of a candidate, and also at “stage magic” which is performed to a large audience.<br>
What he pursues  is “ an entertainment which remains in every heart,”  making his own field as wide on the table as on the stage.<br>
He has been on the TBS TV programme “One Step,” and was awarded the Kyoto Special Prize winner in the 26th National Cultural Festival by the Agency for Cultural Affairs.<br>
Masaya has performed in numerous showrooms, parties, bars, pubs, restaurant, local charity events, community revitalization events, educational events, and more.
</p>
<!--<div class="go_site_btn"><a href="#">Related Sites</a></div>-->
<div class="cast_schedule_btn"><a href="/ticket/cast_schedule/"><span class="icon-schedule mr10"></span><span class="text">View schedule</span></a></div>
</div>
<div class="pic_box pc_left_sp_none"><img src="<?php echo THEME_URI; ?>/about/img/cast/photo/hashimoto.jpg" ><p>Photo by Yoshikazu Inoue</p></div>
</div>

<!--松田有生-->
<div class="magic_area cast_box clearfix">
<div class="profile_box fleft">
<h3 class="cast_name">Yuki Matsuda</h3>
<p class="cast_category">Magician</p>
<div class="bar sp_none"></div>
<p class="cast_profile">
As a mere middle-schooler, Yuki was so impressed with a magic show that he saw on television that he started to learn magic techniques all by himself.  As a college student, he apprenticed with world-class magicians Hiromasa Fukai and Kimika, and debuted as a pro after graduation.  Prioritizing “lively and fun” magic, he is good at a wide field from tabletop magic to stage magic.  In 2016, he won the six minute contest at the Fukuyama Magic Festival, and in 2015 was the victor in the two minute contest at the same festival.  He has ranked high in many such events, such as taking 2nd place in the ICM Magic Contest (2016), and 2nd place in the Chiba Magic Festival(2015).
He is certainly a vital and promising young talent!</p>
<!--<div class="go_site_btn"><a href="#">関連サイト</a></div>-->
<div class="cast_schedule_btn"><a href="/ticket/cast_schedule/"><span class="icon-schedule mr10"></span><span class="text">View schedule</span></a></div>
</div>
<div class="pic_box fright"><img src="<?php echo THEME_URI; ?>/about/img/cast/photo/matsuda.jpg" ><p>Photo by Yusuke Otsuki</p></div>
</div>

</div>
</div>
<!--**********************/magic**********************-->


<!--**********************juggling**********************-->
<div class="content_wrap disnon">
<div id="box5 tab5" class="cast_content">

<div class="juggling_category_title pc_none">
JUGGLING
</div>

<!--酒田しんご-->
<div class="juggling_area cast_box clearfix">
<div class="profile_box pc_right_sp_none">
<h3 class="cast_name">Shingo Sakata</h3>
<p class="cast_category">Juggler</p>
<div class="bar sp_none"></div>
<p class="cast_profile">
As a kid, Shingo first got interested in juggling when he saw some street performers on the corner.  From the age of 10, he took up juggling all on his own.  At 17, when he was still a high school student, he set a new record in Japan for juggling 7 balls for the longest time.
</p>
<div class="go_site_btn"><a href="http://www.shingosakata.com/" target="_blank">Related Sites</a></div>
<div class="cast_schedule_btn"><a href="/ticket/cast_schedule/"><span class="icon-schedule mr10"></span><span class="text">View schedule</span></a></div>
</div>
<div class="pic_box pc_left_sp_none"><img src="<?php echo THEME_URI; ?>/about/img/cast/photo/sakata.jpg" ><p>Photo by Yoshikazu Inoue</p></div>
</div>

<!--Ren-->
<div class="juggling_area cast_box clearfix">
<div class="profile_box fleft">
<h3 class="cast_name">Ren</h3>
<p class="cast_category">Juggler</p>
<div class="bar sp_none"></div>
<p class="cast_profile">
Ren started juggling all on his own when he was fourteen years old.  In 2010, he made his debut as a professional.  With his androgynous looks and pliant body, his use of special props, his performance is a must-see.  Ren’s special talent is to insert jazz dance steps into his performance, giving a gorgeous performance.  His captivating show enchants you with a bewitching atmosphere into a unique world; his scope of activity is widening beyond Japan to include countries all over the world.
</p>
<div class="go_site_btn"><a href="http://www.juggler-ren.net" target="_blank">Related Sites</a></div>
<div class="cast_schedule_btn"><a href="/ticket/cast_schedule/"><span class="icon-schedule mr10"></span><span class="text">View schedule</span></a></div>
</div>
<div class="pic_box fright"><img src="<?php echo THEME_URI; ?>/about/img/cast/photo/ren.jpg" ><p>Photo by Yoshikazu Inoue</p></div>
</div>

<!--渡辺あきら-->
<div class="juggling_area cast_box clearfix">
<div class="profile_box pc_right_sp_none">
<h3 class="cast_name">Akira Watanabe</h3>
<p class="cast_category">Juggler</p>
<div class="bar sp_none"></div>
<p class="cast_profile">
Akira graduated from the Faculty of Engineering at Kyoto University.  Armed with his stylish technique and lively features, Akira has traveled all over Japan teaching Juggling performing, doing everything from stage performances to street performance.<br>
From 2002 to 2004, he was also a regular performer in the "Hollywood Premium Parade" at Universal Studio Japan.<br>
Among many awards and media performances, Akira has also performed in the Street Performance World Cup in Shizuoka, and won the first prize in Tenpozan World Performance Festival in 2006.
</p>
<div class="go_site_btn"><a href="http://www.w-akira.com" target="_blank">Related Sites</a></div>
<div class="cast_schedule_btn"><a href="/ticket/cast_schedule/"><span class="icon-schedule mr10"></span><span class="text">View schedule</span></a></div>
</div>
<div class="pic_box pc_left_sp_none"><img src="<?php echo THEME_URI; ?>/about/img/cast/photo/watanabe.jpg" ><p>Photo by Yoshikazu Inoue</p></div>
</div>

<!--深河晃-->
<div class="juggling_area cast_box clearfix">
<div class="profile_box fleft">
<h3 class="cast_name">Akira Fukagawa</h3>
<p class="cast_category">Juggler</p>
<div class="bar sp_none"></div>
<p class="cast_profile">
Akira’s strength is in incorporating his acrobatic body expression with Diabolo technique.  In addition to being a finalist at the International Juggling Association championship 2012 in the US, he has performed all over the world, from Taiwan to Turkey.  He is a registered performer with the Cirque du Soleil.  Further, he is the holder of the Japan Record for the High Toss with four Diabolos. 
</p>
<div class="go_site_btn"><a href="http://j-v.co.jp/" target="_blank">Related Sites</a></div>
<div class="cast_schedule_btn"><a href="/ticket/cast_schedule/"><span class="icon-schedule mr10"></span><span class="text">View schedule</span></a></div>
</div>
<div class="pic_box fright"><img src="<?php echo THEME_URI; ?>/about/img/cast/photo/fukagawa.jpg" ><p>Photo by Yoshikazu Inoue</p></div>
</div>

<!--リスボン上田-->
<div class="juggling_area cast_box clearfix">
<div class="profile_box pc_right_sp_none">
<h3 class="cast_name">Lisbon Ueda</h3>
<p class="cast_category">Juggler</p>
<div class="bar sp_none"></div>
<p class="cast_profile">
Lisbon has a singular history: although he started studying magic tricks as a gag for passing job interviews, he found he’d become the Japan juggling champion.   With the acquisition of this title, he became a professional juggler,  and among other activities, advanced to the finals in the International Juggling Association championships, is regular performer in the "Hollywood Premium Parade" at Universal Studio Japan, and is beguiling audiences in many venues.<br>
In recent years, he was technique supervisor on the musical of Ocean’s 11 with the mega girl group Takarazuka, and on the international opera production of Pierrot, and is now expanding his activities into many arenas.<br>
His use of two batons called “devil sticks” is one of his unique original techniques. 
</p>
<div class="go_site_btn"><a href="http://www.eonet.ne.jp/~juggling/" target="_blank">Related Sites</a></div>
<div class="cast_schedule_btn"><a href="/ticket/cast_schedule/"><span class="icon-schedule mr10"></span><span class="text">View schedule</span></a></div>
</div>
<div class="pic_box pc_left_sp_none"><img src="<?php echo THEME_URI; ?>/about/img/cast/photo/risbon.jpg" ><p>Photo by Yusuke Otsuki</p></div>
</div>

<!--宮田直人-->
<div class="juggling_area cast_box clearfix">
<div class="profile_box fleft">
<h3 class="cast_name">Naoto Miyata</h3>
<p class="cast_category">Juggler</p>
<div class="bar sp_none"></div>
<p class="cast_profile">
Naoto started Juggling after studying theatre in college.<br>
In the Baton Juggling competition, “FantaStick” he has been awarded the Grand Prize, and also been awarded Runner’s Up Prize on a separate occasion.  He was a finalist in the Japan Juggling Festival's All-Japan 2012 competition.  As the representative of the “Juggling Unit Fratres,”, Naoto is the playwright and performance director of this group, which uses Juggling as stage art, creating a new genre of performance works.
</p>
<div class="go_site_btn"><a href="http://fratres.wp.xdomain.jp" target="_blank">Related Sites</a></div>
<div class="cast_schedule_btn"><a href="/ticket/cast_schedule/"><span class="icon-schedule mr10"></span><span class="text">View schedule</span></a></div>
</div>
<div class="pic_box fright"><img src="<?php echo THEME_URI; ?>/about/img/cast/photo/miyata.jpg" ><p>Photo by Yusuke Otsuki</p></div>
</div>


</div>
</div>
<!--**********************/juggling**********************-->



</div>
<!--/cast_contents--> 

<ul class="tab bottom sp_none  clearfix"  >
	<li class="tab_list_btm"><a class="cast_mime" href="#cast_area"><img src="<?php echo THEME_URI; ?>/about/img/cast/1_en.jpg" width="100%" alt="MIME"></a></li>
	<li class="tab_list_btm"><a class="cast_breakdance" href="#cast_area"><img src="<?php echo THEME_URI; ?>/about/img/cast/2_en.jpg" width="100%" alt="BREAKIN’"></a></li>
	<li class="tab_list_btm"><a class="cast_doru" href="#cast_area"><img src="<?php echo THEME_URI; ?>/about/img/cast/5_en.jpg" width="100%" alt="DOLL"></a></li>
	<li class="tab_list_btm"><a class="cast_magic" href="#cast_area"><img src="<?php echo THEME_URI; ?>/about/img/cast/3_en.jpg" width="100%" alt="MAGIC"></a></li>
	<li class="tab_list_btm"><a class="cast_juggling" href="#cast_area"><img src="<?php echo THEME_URI; ?>/about/img/cast/4_en.jpg" width="100%" alt="JUGGLING"></a></li>
</ul>

<ul class="tab bottom carousel carousel-nav carousel--nav  carousel--full-width pc_none  clearfix">
	<li class="carousel-cell"><a class="cast_mime btn_act" href="#cast_area"><img src="<?php echo THEME_URI; ?>/about/img/cast/1_sp_en.jpg" width="100%" alt="MIME"></a></li>
	<li class="carousel-cell"><a class="cast_breakdance btn_act" href="#cast_area"><img src="<?php echo THEME_URI; ?>/about/img/cast/2_sp_en.jpg" width="100%" alt="BREAKIN’"></a></li>
	<li class="carousel-cell"><a class="cast_doru btn_act" href="#cast_area"><img src="<?php echo THEME_URI; ?>/about/img/cast/5_sp_en.jpg" width="100%" alt="DOLL"></a></li>
	<li class="carousel-cell"><a class="cast_magic btn_act" href="#cast_area"><img src="<?php echo THEME_URI; ?>/about/img/cast/3_sp_en.jpg" width="100%" alt="MAGIC"></a></li>
	<li class="carousel-cell"><a class="cast_juggling btn_act" href="#cast_area"><img src="<?php echo THEME_URI; ?>/about/img/cast/4_sp_en.jpg" width="100%" alt="JUGGLING"></a></li>
</ul>

</div>
<!--/tabSection-->
</article>
<!--/cast_area-->

</main>

<?php get_template_part( 'en/footer_en' ); ?>