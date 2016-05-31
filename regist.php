<?php //値を受け取ってDBに登録しメールを送信するプログラム regist.php
session_start();
//DB接続部分を 伝票のファイルからコピペ
// $uid = "root";
// $pwd = "wert3333";
// $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", $uid, $pwd);

		$uid = "obr_nya" ;
		$pwd = "fin58ega";		
		$pdo = new PDO("mysql:host=mysql1.php.xdomain.ne.jp;dbname=obr_dtbs;charset=utf8", $uid, $pwd);
			//データベースへの接続方法には決まったパターンが有ります。
		$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 
			//連想配列だけで取得
		
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//何かあった時、詳しいエラーが出る
//ここまで

$sql = "INSERT INTO `yoyak`(`yyk_dhms`, `kibou`, `jkn`, `corse`, `num`, `total_plice`, `zip`, `pref`, `city`, `addr`, `tel`, `eml`, `name`, `kana`, `comment`) 
VALUES (";

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


$stmt = $pdo->prepare( $sql ); //SQL文の実行準備、構文チェック

$stmt->execute(); //SQL実行 。成功するとtrueが、失敗するとfalseがかえる


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
		
		if(mb_send_mail($mailto, $subject, $message, $header)){
			print "<h1>ご予約ありがとうございました</h1><img src='img/heart_thank_you.png' alt='thank_you' />
			";
		}else{
			print "送信できませんでした";
		}

 ?>

