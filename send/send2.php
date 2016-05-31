<?php 
	session_start();
	echo $_SESSION['e']['7']."<br>";//配列は表示できない
	//ファイル間をまたいで値を保持するスーパーグローバルな変数
	//ブラウザを終了するまで値を保持する
	var_dump($_SESSION['e']);
 ?>