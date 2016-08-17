<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8" />
	<link rel="stylesheet" href="confirm.css" type="text/css"/>
	<link rel="stylesheet" href="nav2.css" type="text/css"/>
		<link rel="stylesheet" href="sub_layout.css" type="text/css"/>
	<link rel="shortcut icon" href="img/favicon.png">

	<title>regist</title>
</head>
<body>
<?php //値を受け取ってDBに登録しメールを送信するプログラム regist.php
session_start();

//DB接続部
require_once 'condb.php'; //新規で作ったDBクラス

$sql = "INSERT INTO `yoyak`(`eml`, `yyk_dhms`, `kibou`, `jkn`, `corse`, `num`, `total_plice`, `zip`, `pref`, `city`, `addr`, `tel`, `name`, `kana`, `comment`) 
VALUES ("; //この並びでDBに入るので順番注意

//セッション配列を回して、値をこの順番でカンマで区切ってつなげる
$strsql = ""; //空文字で初期化してから
foreach($_SESSION['post'] as $value){
	//ディナーかランチの空のデータは排除
	$value = str_replace(',', '', $value); //total_pliceの桁区切り消し
		if($value !=="")
	$strsql .= "'$value'" .',';	//カンマと一緒に連結代入
}
foreach($_SESSION['post'] as $key => $value){ //コメントが未入力の時に空挿入
if($key=="comment" && $value=="" )
$strsql .= '""' ; 
}


$strsql = rtrim($strsql, ","); //最後のカンマを除去

$strsql .= ');' ; // );の閉じをつける 
$sql .= $strsql; //SQL文として正しくなるように

//var_dump($sql); //ここに出てくる文字が SQL文として正しくなるように、
	
	
//クラスを使うための構文
	$yykdb = new Yykdb();
	if($yykdb->incert($sql)){
		//incrude 左ナビゲーション
	
?>


<div id="contents3">	
	<h1>ご予約ありがとうございます</h1>
<img src='img/heart_thank_you.png' alt='thank_you' />
<p>ご予約内容を送信しました。<br>
	ご予約は担当者からの返信をもって確定させて頂きます。
</p>
<?php
//var_dump($success);

//メール送信部分

		mb_language("ja");
		mb_internal_encoding("utf-8");
		//内部文字エンコードを指定します。ShiftJISで書いている人はSJISに
		
		$header = "From" .mb_encode_mimeheader("管理者")."<tamaki.nara97@gmail.com>";
		$header .= "\n";
		$header .= "Bcc: tamaki.nara97@gmail.com" ;
		//名前の部分が日本語の場合、mb_encode_mimeheaderでエンコードする必要がある
		$mailto = $_SESSION['post']['eml'];//メールの宛先."tamaki.nara97@gmail.com"
		$subject = "ご予約確認";//メールの件名
		$message = $_SESSION['post']['name1']."\n";//メール本文。
		$message .= $_SESSION['post']['pref'];
		$message .= $_SESSION['post']['city']."\n";
		
//		if(mb_send_mail($mailto, $subject, $message, $header)){
//			print "<h1>ご予約ありがとうございました</h1><img src='img/heart_thank_you.png' alt='thank_you' />";
//		}else{
//			print "送信できませんでした";		}
}
 ?>

</div>
</body>
</html>