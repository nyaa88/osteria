<?php 
function h($p){//引数で値を一つ$pで受け取る
	$p = str_replace("'", '’', $p); 
	$p = str_replace("--", '－－', $p); 
	$p = str_replace("&", '＆', $p);
	$p = str_replace("\\", '￥', $p); //\に続く記号は文字にエスケープされる
	$p = htmlspecialchars($p);
	$p = nl2br($p); 
	return $p ; //引数を呼び出し元に返す
}
 ?>