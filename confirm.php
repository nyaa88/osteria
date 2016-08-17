<?php 
session_start(); 
require_once 'mojifilter.php';
?>
<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8" />
	<link rel="stylesheet" href="confirm.css" type="text/css"/>
	<link rel="stylesheet" href="nav2.css" type="text/css"/>
	<link rel="shortcut icon" href="img/favicon.png">

	<title>confirm</title>
</head>


<body>
	<div id="contents2">	
		 <h1>ご予約内容確認</h1>
	<table>
	
<?php 
	//ループで一気に空文字チェック
	if(empty($_POST)) exit("<a href='reserve.php'>ポストしてください</a>");	
	
	//キーの日本語配列作成
	$keyjp=array("yyk_dhms"=>"■ご希望日","kibou"=>"■ご予約内容",
	"lunch_time"=>"■ご希望時間","corse_lunch"=>"■ご希望コース",
	"dinner_time"=>"■ご希望時間","corse_dinner"=>"■ご希望コース",
	"num"=>"■ご希望人数","total_plice"=>"■料金",
	"zip1"=>"□郵便番号",
	"pref"=>"□都道府県","city"=>"□市町村区","addr"=>"□以降の住所",
	"tel"=>"■電話番号","eml"=>"■メールアドレス",
	"name1"=>"■お名前","kana"=>"■ふりがな","comment"=>"■コメント");
	
	
	//value の日本語配列
	$valuejp=array("美食の歓びコース &yen;4800","至福の午餐会コース &yen;6800","ムニュKAGURA ～神楽～ &yen;8500","シェフ大堀スペシャルディナー &yen;13500",//0~3まで
	"lunch"=>"ランチ","dinner"=>"ディナー"
	);
	
	
	//ランチかディナーを選択時に選んでいない方の時間とコースを空にする
	if($_POST['kibou']=="lunch"){
		$_POST['dinner_time']="" ; 
		$_POST['corse_dinner']="";}
	if($_POST['kibou']=="dinner"){
		$_POST['lunch_time']="" ; 
		$_POST['corse_lunch']="";}
	
	//郵便番号を連結したい
	if($_POST["zip2"]=="") exit("郵便番号が足りません");
	
	$_POST["zip1"] .= "-" ; //連結代入 $a = $a."-" の意味
	$_POST["zip1"] .= $_POST["zip2"] ;
	unset($_POST["zip2"]); //配列から特定の値を削除
	
	//今回は全部必須なので、ループで一気に空文字チェック → 一つでもカラならセッションに入れない

	foreach ($_POST as $key => $value) {//$key には nameが入る(例・kibo,corse_lunch)
		if($value !=""){//値があれば(カラじゃなければ)、キーと値をechoする
			if($key=="kibou" || $key=="corse_lunch"|| $key=="corse_dinner"){
				echo "<tr><td class='item1'>$keyjp[$key] </td><td class='item2'> $valuejp[$value] </td>"; //コースは配列から日本語呼び出し
			}else{
				echo "<tr><td class='item1'> $keyjp[$key] </td><td class='item2'> ". h($value)."</td>"; //入力文字をそのまま書き出す場合は文字列のサニタイズ(消毒)が必要。
			}
	//ランチがon、時間とコースが空なら
		}elseif($_POST['kibou']=="lunch" &&($_POST['lunch_time']=="" || $_POST['corse_lunch']=="")){
			exit("<h2>lunch 時間がカラ OR コースがカラ</h2>"); //中断
	//ディナーがon、時間とコースが空なら
		}elseif($_POST['kibou']=="dinner" &&($_POST['dinner_time']=="" || $_POST['corse_dinner']=="")){
			exit("<h4>dinner 時間がカラ OR コースがカラ</h4>"); //中断
	//ランチとディナーの時間かコースなら(コメントもスルー)
		}elseif($key=="lunch_time" || $key=="corse_lunch" || $key=="dinner_time" || $key=="corse_dinner" || $key=="comment"){ //やることはない
	//その他全部
		}else{ 
			exit("<h6>$key がカラです</h6>");
		}
	}

	

 ?>
 
 </table>
 <!-- 
 	<h1>ご予約内容確認</h1>
	<table>
			<tr>
				<td class="item1">■ご希望日</td>
				<td class="item2"><?php echo "$_POST[yyk_dhms]"; ?></td>
			</tr>
			<tr>
				<td class="item1">■ご希望時間</td>
				<td class="item2">
					<?php 
					echo "$_POST[lunch_time]";
					echo "$_POST[dinner_time]"."からの";
					foreach ($_POST as $key => $value) {
					if($key=="kibou" && $value!==""){
						echo "$valuejp[$value]";
					}}
					//echo "$_POST[kibou]"; ?>
			</tr>
			<tr>
				<td class="item1">■ご希望コース</td>
				<td class="item2">	
					<?php 
					foreach ($_POST as $key => $value) {
					if($key=="corse_lunch" && $value!==""){
						echo "$valuejp[$value]";
					}
					if($key=="corse_dinner" && $value!==""){
						echo "$valuejp[$value]";
					}}
//					echo "$_POST[corse_lunch]";
//					echo "$_POST[corse_dinner]"; ?>
			</tr>
			<tr>
				<td class="item1">■ご希望人数</td>
				<td class="item2">
					<?php echo "$_POST[num]"; ?>名様</td>
			</tr>
			<tr>
				<td class="item1">■料金</td>
				<td class="item2">(税込)
					<?php echo "$_POST[total_plice]"; ?>
					円</td>
			</tr>
			<tr>
				<td class="item1">■ご住所</td>
				<td class="item2">
					<label>郵便番号</label>
  				<?php echo "$_POST[zip1]"; ?><br>
					<label for="pref" class="control-label">都道府県</label>
					<?php echo "$_POST[pref]"; ?> <br>
<label for="city">市町村区</label>
  				<?php echo "$_POST[city]"; ?> <br>
<label for="addr">以降の住所</label>
  				<?php echo "$_POST[addr]"; ?>
				</td>
			</tr>
			<tr>
				<td class="item1">■電話番号</td>
				<td class="item2"><?php echo "$_POST[tel]"; ?></td>
			</tr>
			<tr>
				<td class="item1">■メールアドレス</td>
				<td class="item2"><?php echo "$_POST[eml]"; ?></td>
			</tr>	
			<tr>
				<td class="item1">■お名前</td>
				<td class="item2">
					<?php echo "$_POST[name1]"; ?></td>
			</tr>
			
			<tr>
				<td class="item1">■ふりがな</td>
				<td class="item2">
					<?php echo "$_POST[kana]"; ?></td>
			</tr>
			<tr>
				<td class="item1">■コメント</td>
				<td class="item2">
					<?php echo "$_POST[comment]"; ?>
				</td>
			</tr>
			

</table> -->
<?php 	
	$_SESSION['post'] = $_POST;
	//var_dump( $_SESSION['post']); ?>
<div class="aa">
<a href="regist.php" class="button">送信する</a>
</div>
</div>

</body>
</html>