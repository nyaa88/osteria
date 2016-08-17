<?php 

class Yykdb {

private $uid = "root"; // $uid = "obr_nya" ;
private $pwd = "wert3333"; // $pwd = "fin58ega";	
private $host= "mysql:host=localhost;dbname=test;charset=utf8"; //"mysql:host=mysql1.php.xdomain.ne.jp;dbname=obr_dtbs;charset=utf8"
private $pdo;


function __construct(){
	$this->pdo = new PDO($this->host, $this->uid, $this->pwd);
	//データベースへの接続方法には決まったパターンが有ります。
		$this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 
			//連想配列だけで取得
		
		$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//何かあった時、詳しいエラーが出る
	
}

function incert($sql){
	$stmt = $this->pdo->prepare( $sql ); //SQL文の実行準備、構文チェック
	$result = $stmt->execute();
	return $result ; //成功してればtrue
}

function select($sql){
	$stmt = $this->pdo->prepare( $sql ) ;
	$stmt -> execute();
	$assoc = $stmt->fetch(PDO::FETCH_ASSOC);
	return $assoc; //SELECT文の抽出結果を配列にして返す
}

//ここまで
}

 ?>