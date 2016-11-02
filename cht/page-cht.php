<?php /*Template Name: 繁体字 - TOP */ ?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-tw" lang="zh-tw">

    <head>
<title>齒輪 -GEAR-</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="name" content="齒輪 -GEAR-" />
<meta name="description" content="齒輪 -GEAR-" />
<meta name="keyword" content="">

<meta name="robots" content="index,follow">


<!-- favorite icon -->
<link rel="shortcut icon" href="<?php echo THEME_URI; ?>/favicon.ico" />
<link rel="icon" href="<?php echo THEME_URI; ?>/favicon.ico" />

<!-- for tab--->
<style>
.tabNav {  
    width: 100%;  
      
}  
.tabNav li  {  
    float: left;  
    margin: 0 5px -1px;  
    font-weight: bold;  
    text-align: center;  
}  
.tabNav a   {  
    display: block;  
    width: 110px;  
    padding: 3px 1px;  
    border-top: 1px solid #CCC;  
    border-right: 1px solid #CCC;  
    border-left: 1px solid #CCC;  
    color: #333;  
}  
.tabNav a.active    {  
    border-bottom: 1px solid #FFF;  
}  
.tabContents    {  
    clear: both;  
    padding: 10px;  
    border: 1px solid #CCC;  
    margin-bottom: 30px;W  
}  
.tabContents dl {  
    margin-bottom: 15px;  
}  
.tabContents dt {  
    background: url(../images/q.gif) no-repeat 5px 8px;  
    padding: 8px 5px 8px 30px;  
    font-weight: bold;  
}  
.tabContents dd {  
    background: url(../images/a.gif) no-repeat 5px 8px;  
    padding: 8px 5px 8px 30px;  
    margin-bottom: 5px;  
    border-bottom: 1px dotted #CCC;  
} 
.img_f{
	float:left;
	margin-right:1em;
}
</style>

<!-- yuga -->
	<script type="text/javascript" src="<?php echo THEME_URI; ?>/language/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo THEME_URI; ?>/language/js/yuga.js"></script>
<!--fb-->
	<script src="<?php echo THEME_URI; ?>/language/js/jquery-1.6.1.min.js" type="text/javascript"></script>
	<script src="<?php echo THEME_URI; ?>/language/js/jquery.neosmart.fb.wall.js" type="text/javascript"></script>
<!--slide-->
        <link rel="stylesheet" type="text/css" href="<?php echo THEME_URI; ?>/language/css/style19.css" />
	<!--<script src="<?php echo HOME_URI; ?>/skins/default/js/cufon-yui.js" type="text/javascript"></script>
	<script src="<?php echo HOME_URI; ?>/skins/default/js/ChunkFive_400.font.js" type="text/javascript"></script>
	<script src="<?php echo HOME_URI; ?>/skins/default/js/jquery.js" type="text/javascript"></script>-->
<!--zoombox-->
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo THEME_URI; ?>/language/js/zoombox.js"></script>  
        <link rel="stylesheet" type="text/css" href="<?php echo THEME_URI; ?>/language/css/zoombox.css" />

<!-- thumbnail -->
<script type="text/javascript" src="<?php echo THEME_URI; ?>/language/js/imageSizeFix.js"></script>


<!--[if lt IE 7]>
	<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE7.js"></script>
<![endif]-->

<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->




<!--zoombox-->
<script type="text/javascript">
jQuery(function($){
	$('a.zoombox').zoombox();
        theme       : 'simple'
});
	$(document).ready(function () {	
		$('#nav li').hover(
			function () {
				//show its submenu
				$('ul', this).slideDown(100);

			}, 
			function () {
				//hide its submenu
				$('ul', this).slideUp(100);			
			}
		);	
	});
	
$(document).ready(function () {	
	
	$('#nav li').hover(
		function () {
			//show its submenu
			$('ul', this).slideDown(100);

		}, 
		function () {
			//hide its submenu
			$('ul', this).slideUp(100);			
		}
	);
	
});
//$.yuga.externalLink({
//  externalClass: ''
//});

</script>
<!--<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-3433736-12', 'auto');
  ga('send', 'pageview');


</script>-->
<style>
html {overflow-x: hidden;}
body{
width: 100%;
top:100%;
}
.bodywrapper{
margin: 0 auto;
}
#slide {
display: block;
position:relative;
min-width:960px;
background-size: cover;
min-height:400px;
  height: auto !important;/*ie*/
  height: 400px;/*ie*/
}
#logo{
display: block;
width: 960px;
height: 300px;
margin: 0 auto;
overflow: auto;
position: absolute;
top: 100px;
left: 50%;
margin-left: -480px;
text-align: center;
z-index:0;
}
#wrapper{
margin: 0 auto;
background:#000;
}
#copyrights{
width:950px;
margin: 0 auto;
}
#news{
width:960px;
margin: 0 auto;
overflow: auto;
}
.connect_top{
border-bottom:solid 1px #CCCCCC;
}
.bottom a{
font-weight:900;
color:#333333;
text-decolation:underline;
}
#topside dd{
padding:1em;
border-top:dashed gray 1px;
}
#topside dd:hover
{
	background: #E7E7E7;
}
#feed ul li img {
	float:right;
	width: 100px;
	height: 100px;
}
</style>
</head>
<body>

<?php while(have_posts()): the_post(); ?>
    <?php the_content(); ?>
<?php endwhile; ?>

</body>
</html>