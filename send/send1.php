<?php //変数のスコープを確認してみる 
	session_start(); //セッションを使うための宣言が先頭に必要
	$a = 5; $c = 2; //変数 処理の途中で値が変わっていい
	const D = "文字列の定数";//次は定数 処理の途中で値が変わらない 通常大文字$不要
 
 	function test_scope(){
 		global $a; //関数の"中"でglobal宣言するとOK
 		echo ++$a; //前インクリメント  後ろインクリメントの違い
 		echo $a++;
		echo $a;
		echo "なにもうつらない";
 	}
	echo $a;
	test_scope();
	echo $a;
	
 	function test_scope2(){
	global $a; //関数の"中"でglobal宣言するとOK
  echo $GLOBALS['c'];//$GLOBALS配列変数もおなじ
  echo D; //定数はもともとグローバル
  return $a++;
}
	$_SESSION['e']=array($a=>'あ',$c=>'し~');
	$aa = test_scope2(); //戻り値を$aaが受け取る
	echo $aa;
 ?>
 <br><a href="send2.php">send2へ渡したい</a>