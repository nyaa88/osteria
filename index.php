<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8" />
	<link rel="stylesheet" href="style.css" type="text/css"/>
	<link rel="stylesheet" href="nav.css" type="text/css"/>
	<link rel="stylesheet" href="index_layout.css" type="text/css"/>
	<link rel="stylesheet" href="side.css" type="text/css"/>
	
	<link rel="shortcut icon" href="img/favicon.png">
	<title>Osteria Grazie [イタリア料理の店]</title>
	
	   <!-- Insert to your webpage before the </head> -->
    <script src="sliderengine/jquery.js"></script>
    <script src="sliderengine/amazingslider.js"></script>
    <link rel="stylesheet" type="text/css" href="sliderengine/amazingslider-1.css">
    <script src="sliderengine/initslider-1.js"></script>
    <!-- End of head section HTML codes -->
    
    <script>
$(function(){
  $("#toggle").click(function(){
    $("#menu").slideToggle();
    return false;
  });
  $(window).resize(function(){
    var win = $(window).width();
    var p = 480;
    if(win > p){
      $("#menu").show();
    } else {
      $("#menu").hide();
    }
  });
});
</script>
	
</head>

<body>
<div id="container">

<div id="header">
	<h1>Osteria Grazie
		<!-- <img src="img/title_780.png" alt="Osteria Grazie" width="780" height="90"> --></h1>
</div>

<div id="menu-box">
  <div id="toggle"><a href="#">menu</a></div>
  <ul id="menu" class="" style="overflow: hidden; display: block;">
	  <li><a href="info.php">店舗紹介</a></li>
	  <li><a href="menu.php#select1">屋台の味</a></li>
	  <li><a href="menu.php#select2">郷土料理</a></li>
	  <li><a href="menu.php#select3">アラカルト</a></li>
	  <li><a href="recipe.php">豚の背肉グリル</a></li>
	  <li><a href="recipe2.php">ティラミス</a></li>
	  <li><a href="reserve.php">レストラン予約</a></li>
	  <li><a href="message.php">メール</a></li>
  </ul>
</div>

<?php include "nav.html"; ?>

<div id="contents">
	<!-- <img src="img/top1.png" alt="料理の写真" width="360" height="220"/> -->
	
	 <!-- Insert to your webpage where you want to display the slider -->
    <div id="amazingslider-wrapper-1">
        <div id="amazingslider-1">
            <ul class="amazingslider-slides" style="display:none;">
                <li><img src="images/fd401518.png" data-description="ご予約も受け付けております。" />
                </li>
                <li><img src="images/43538051.png" data-description="単品からのご注文も承ります。" />
                </li>
                <li><img src="images/s_007m.png" data-description="食いしん坊の国の人々に愛され、世代を超えて伝承されるイタリアの郷土料理。" />
                </li>
            </ul>
            <ul class="amazingslider-thumbnails" style="display:none;">
                <li><img src="images/fd401518-tn.png" /></li>
                <li><img src="images/43538051-tn.png" /></li>
                <li><img src="images/s_007m-tn.png" /></li>
            </ul>
        <div class="amazingslider-engine"><a href="http://amazingslider.com" title="Responsive JavaScript Image Slider">Responsive JavaScript Image Slider</a></div>
        </div>
    </div>
    <!-- End of body section HTML codes -->
		<div id="pi">
			<img src="img/top1.png" alt="top" />
		</div>
	
			<div id="box">
				<h2>Welcome to Osteria Grazie</h2>

		<p><span id="osteria">オステリア・グラッツェ</span>へようこそ!グラッツェとは<span class="italia">イタリア</span>語で「ありがとう」という意味です。
		本場<span class="italia">イタリア</span>で修行したシェフの味を、是非一度お試しください!</p>
</div></div>

<div id="side">
  <label for="Panel1"><h3>店長のblog</h3></label>
  <input type="checkbox" id="Panel1" class="on-off" />
	<ul>
		<li><a href="#">旬の素材 (18)</a></li>
		<li><a href="wine.php">ワイン (16)</a></li>
		<li><a href="#">我が家の猫 (5)</a></li>
		<li><a href="#">今日のスイーツ (4)</a></li>
		<li><a href="#">店長のぼやき (2)</a></li>
<br>
		<li><a href="#">August 2014</a></li>
		<li><a href="#">July 2014</a></li>
		<li><a href="#">July 2014</a></li>
		<li><a href="#">May 2014</a></li>
		<li><a href="#">April 2014</a></li>
		<li><a href="#">March 2014</a></li>
	</ul>
	
</div>


<div id="footer">	
	<p id="copyright"><small> Copyright(C) 2014 Osteria Grazie. All Rights Reserved.</small></p>
</div>
<!-- <a href="http://jp.freepik.com/free-photos-vectors/食べ物">食べ物 Freepikによるベクターデザイン</a> -->
</div>
</body>
</html>