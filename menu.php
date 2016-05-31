<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8" />
	<link rel="stylesheet" href="menu.css" type="text/css" />
	<link rel="stylesheet" href="nav2.css" type="text/css"/>
	<link rel="stylesheet" href="sub_layout.css" type="text/css"/>
	<link rel="shortcut icon" href="img/favicon.png">
	<title>menu</title>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript">
	$(function(){
	    $('a[href^=#]').click(function(){
	        var speed = 1000;
	        var href= $(this).attr("href");
	        var target = $(href == "#" || href == "" ? 'html' : href);
	        var position = target.offset().top;
	        $("html, body").animate({scrollTop:position}, speed, "swing");
	        return false;
	    });
	});
	</script>	
</head>
<body>

<div id="container">
	
	<?php include "nav2.html"; ?>

<div id="contents">
	<div class="menu-box">
		<h1>Menu</h1>
		<div id="select">
			<a href="#select1">屋台のコース</a> : 
			<a href="#select2">郷土料理のコース : </a>
			<a href="#select3">アラカルト</a>
		</div>
		<img src="img/menu_top.jpg" alt="" style="width: 100%">
		<h2 id="select1">屋台のコース　Cucina Volante</h2>
		<p id="yatai0"><img src="img/photo1.png" width="150" height="170" alt="屋台のコースの写真" class="photo"/>
			前菜の盛り合わせ<br>
			パスタ料理　手長海老のリングィーネ　他18種類<br>
			メイン料理　本日のお魚　メッシーナ風<br>
			または 無菌豚ヒレ肉とパンチェッタ<br>
			デザートとお飲物　赤オレンジのゼリー　他<br>
			￥3,800	<br></p>
			
				<p id="yatai"> </p>
				<script>
				var ptxt= "<br>夕方、ひと仕事を終えた漁師たちが集まる所と言えば屋台！どいつもこいつもうまそうに食べている。イタリアのどこの街にもある、そんな海辺の屋台で食べた料理は格別においしかった。シンプルでダイナミックな料理をここで再現したいと思います。";
				
				document.getElementById("yatai").innerHTML = ptxt;
				</script>
	</div>
		
	<div class="menu-box">
		<h2 id="select2">郷土料理のコース Cucina Locale</h2>
		<p><img src="img/photo2.png" width="150" height="170" alt="郷土料理のコースの写真" class="photo"/>
			前菜の盛り合わせ<br>
			本日の前菜<br>
			本日のお魚 蛤のスープ仕立て<br>
			パスタ料理 カラスミのスパゲッティーニ 他18種類<br>
			肉料理 猪肉のグリル 季節の野菜添え 他2種類<br>
			デザートとお飲物 さとう錦のカラメレーゼ<br>
			￥5,800<br>
			<span class="menu">食いしん坊の国の人々に愛され、世代を超えて伝承されるイタリアの郷土料理。それぞれの土地に代表的な、季節の味を堪能する料理をご紹介いたします。お喋りとワインをお供に、夕食にたっぷり時間をかけるイタリア人のように、たくさんの皿数のお料理をどうぞゆっくり楽しんでください。</span></p>
	</div>	
	<div class="menu-box">
		<h2 id="select3">アラカルト Alla Carta</h2>
		<p><img src="img/photo3.png" width="150" height="170" alt="アラカルトの写真" class="photo"/>
			リグーリア風カポナータ　￥800<br>
			バーニャ・カウダ ￥1,100<br>
			サンダニエーレ産生ハムのサラダ ￥1,100<br>
			緑野菜とフルーツトマトのサラダ ￥700<br>
			手長海老のリングイーネ ￥1,900<br>
			イカスミのスパゲッティーニ ￥1,500<br>
			ポモドーロ(トマトソース) ￥1,100<br>
			<span class="menu">単品からのご注文も承ります。「きょうはパスタをたくさん食べたい！」「思いっきりワインを飲みたいから、料理は軽く」「おいしいお肉(魚)が食べたいな～」など、ご気分に合わせた組合せでどうぞ。</span></p>
	</div>	


</div>

</div>
</body>
</html>