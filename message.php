<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8" />
	<link rel="stylesheet" href="message.css" type="text/css"/>
	<link rel="stylesheet" href="nav.css" type="text/css"/>
	<link rel="stylesheet" href="sub_layout.css" type="text/css"/>
	<link rel="shortcut icon" href="img/favicon.png">
	<title>message</title>
</head>
<body>
<div id="container">	
	
	<?php include "nav.html"; ?>
	
	<div id="contents">
		<h1>Message</h1>
		<h2>ご意見ご感想をお書きください</h2>
		
		<form action="mailto:tamaki.nara97@gmail.com" method="post" enctype="text/plain">
			■名前<br>
			<input type="text" name="name1" size="30"/><br>
			■メールアドレス<br>
			<input type="text" name="email" size="30"/><br>
			■メッセージをお願いします<br>
			<textarea name="massage" rows="6" cols="50"> </textarea><br>
			<input type="submit" value="送信"/>
			<input type="reset" value="リセット"/>
		</form>
		
	</div>
</div>
</body>
</html>