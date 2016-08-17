
<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8" />
	<link rel="stylesheet" href="reserve.css" type="text/css"/>
	<link rel="stylesheet" href="nav2.css" type="text/css"/>
	<link rel="stylesheet" href="sub_layout.css" type="text/css"/>
	<link rel="shortcut icon" href="img/favicon.png">
	<link rel="stylesheet" type="text/css" href="datetimepicker/jquery.datetimepicker.css"/>
	<script type="text/javascript" src="script/ajaxzip3-https.js"></script>
	<!-- ↑と同じ 郵便番号から住所自動入力 <script src="http://ajaxzip3.github.io/ajaxzip3.js"></script> -->

	<title>reserve</title>
</head>


<body>
<div id="container">		
	
	<?php include "nav2.html"; ?>

	
	<div id="contents">
		<div id=midasi>
		
		<?php 
	if(!empty($_POST["yyk_dhms"]) && !empty($_POST["total_plice"])){ 
	include 'confirm.php';//送信ボタンを押していたら	
	exit();
	}
	?>
	
		<h1>Reserve</h1></div>
		<h2>レストランご予約フォーム</h2>
		<form name="frm" action="" method="post">
					
		<p>日頃より Osteria Grazie をご利用いただきまして誠にありがとうございます。<br>
どうぞお気軽にご予約下さいませ。皆様のご来店心よりお待ち申し上げております。
		</p>	
			
		<table>
			<tr>
				<td>■メールアドレスを入力してください
				</td>
				<td><input type="text" name="eml" size="30" id="eml" onchange="submit()" value="<?= isset($_POST['eml']) ? $_POST['eml']:""  ?>"/></td>
			</tr>			
		</table>
	
	<?php
if(!isset($_POST['eml']) || empty($_POST['eml']))
//フォームは一度開くと空文字がセットされるので、issetはFalseになる。emptyも必要
 exit(""); //ここで中断 メールアドレスを入力してください

//DB接続部分
require_once 'condb.php';
	$yykdb = new Yykdb();
			
		$strsql="SELECT zip,pref,city,addr,eml,name,kana FROM yoyak WHERE eml='".$_POST['eml']."'";//

		$assoc = $yykdb->select($strsql); //メアドがあれば一件返ってくる
		
		$zip =explode("-", $assoc['zip']); //assoc は配列
		
?>


		

		<table>
			<tr>
				<td class="item1">■ご希望日程
					<p class="hiss">必須</p></td>
				<td class="item2"><input type="text" name="yyk_dhms" id="yyk_dhms" placeholder="ご希望の日時を入力してください。" size="25" autocomplete="off" onchange="checkForm();"></td>
			</tr>
			
			<tr>
				<td class="item1">■ご希望時間
					<p class="hiss">必須</p></td>
				<td class="item2">
					<input type="radio" name="kibou" id="lunch" value="lunch">
					<label for="lunch">ランチ</label><!-- ランチラジオボタン -->
					<input type="radio" name="kibou" id="dinner" value="dinner">
					<label for="dinner">ディナー</label></td><!-- ディナーラジオボタン -->
			</tr>
			<tr>
				<td class="item1">■ご希望コース
					<p class="hiss">必須</p></td>
				<td class="item2">
					<p id="lndn">ご希望時間を選んでください</p>
				<div class="none" id="jkn_lunch"><!--未選択時に消える-->
					  <select name="lunch_time">
					    <option value="">ご希望のお時間</option>
					    <option value="11:30">11:30(ランチ)</option>
					    <option value="12:00">12:00(ランチ)</option>
					  </select>
					  <select name="corse_lunch">
					    <option value="">ご希望のコース</option>
					    <option value="0">美食の歓びコース &yen;4800</option>
					    <option value="1">至福の午餐会コース &yen;6800</option>
					  </select>
					</div>
					<div class="none" id="jkn_dinner">
				   <select name="dinner_time">
				     <option value="">ご希望のお時間</option>
				     <option value="17:30">17:30(ディナー)</option>
				     <option value="18:00">18:00(ディナー)</option>
				   </select>
				   <select name="corse_dinner">
				     <option value="">ご希望のコース</option>
				     <option value="2">ムニュKAGURA ～神楽～ &yen;8500</option>
				     <option value="3">シェフ大堀スペシャルディナー &yen;13500</option>
				   </select>
				 	</div></td><!--ここまで-->
			</tr>
			
			<tr>
				<td class="item1">■ご希望人数
					<p class="hiss">必須</p></td>
				<td class="item2"><input type="num" name="num" id="num" size="4" min="1" max="12" placeholder="1~12まで">名様</td>
			</tr>
			
			<tr>
				<td class="item1">■料金</td>
				<td class="item2">
					<input type="button" id="total_chk" value="計算">
					<div class="none" id="plice_none">
						(税込)<input type="num" name="total_plice" id="total_plice" size="3">円</div></td>
			</tr>

			<tr>
				<td class="item1">■ご住所
					<p class="hiss">必須</p></td>
				<td class="item2">
					<label>郵便番号</label>
  				<input type="text" name="zip1" maxlength="3" size="2" value="<?= isset($zip[0]) ? $zip[0]:"" ?>"> -
    			<input type="text" name="zip2" maxlength="4" size="3" onchange="AjaxZip3.zip2addr('zip1','zip2','pref','city','addr');" value="<?= isset($zip[1]) ? $zip[1]:"" ?>"> <br>
					<label for="pref" class="control-label">都道府県</label>
					<input type="text" name="pref" maxlength="4" value="<?= isset($assoc['pref']) ? $assoc['pref']:""  ?>"> <br>
<label for="city">市町村区</label>
  				<input type="text" name="city" value="<?= isset($assoc['city']) ? $assoc['city']:""  ?>"> <br>
<label for="addr">以降の住所</label>
  				<input type="text" name="addr" id="addr" value="<?= isset($assoc['addr']) ? $assoc['addr']:""  ?>">
				</td>
			</tr>
			
			<tr>
				<td class="item1">■電話番号
					<p class="hiss">必須</p></td>
				<td class="item2">
					<input type="text" name="tel" id="tel" placeholder="&nbsp&nbsp&nbsp&nbsp - &nbsp&nbsp&nbsp&nbsp - "/></td>
			</tr>

			<!-- <tr>
				<td class="item1">■メールアドレス
					<p class="hiss">必須</p></td>
				<td class="item2"><input type="text" name="eml" size="30" id="eml" value="<?= isset($_POST['eml']) ? $_POST['eml']:""  ?>";/></td>
			</tr>	 -->		
			
			<tr>
				<td class="item1">■お名前
					<p class="hiss">必須</p></td>
				<td class="item2">
					<input type="text" name="name1" id="name1"/></td>
			</tr>
			
			<tr>
				<td class="item1">■ふりがな
					<p class="hiss">必須</p></td>
				<td class="item2">
					<input name="kana" placeholder="ふりがな" id="kana"></td>
			</tr>
						
			<tr>
				<td class="item1">■コメント</td>
				<td class="item2">
					その他ご質問、アレルギー食材などございましたらご記入下さいませ。
					<textarea name="comment" id="txa"></textarea>
				</td>
			</tr>
			

			

</table>


<div id="kknn">
	<p>― ご予約に関しての諸注意 ―<br>
必ずお読み頂きまして「同意する」にチェックをお入れください。</p>
	<div id="tyui">
		<p>
			・当オンライン予約フォームによるお問い合わせにつきましては「3営業日」以内に電子メールにてご連絡させていただいております。もし、「3営業日」を過ぎてもお返事が届かなかった場合は、ラリアンスの電子メール機器の不備、お客様の電子メール機器の環境設定の問題が考えられますので、お手数ではございますが、お電話にてお問い合わせいただきますようお願い申し上げます。<br>
			・ご予約状況等により、お申込日時にご予約できない場合もございます。あらかじめご了承くださいませ。<br>
必須と書かれました項目に関しましては、ご入力いただけない場合、ご予約は成立いたしませんのでご了承くださいませ。<br>
・お申込いただいた後の予約内容の変更・キャンセル等は、 お手数ですがお電話にてご連絡下さいませ。<br>
			</p>
	</div>
	<p>ご予約に関しての諸注意に<br>
		<input id="doi" type="checkbox">
		<label for="doi">同意する</label>
	</p>
	
<input type="button" onclick="addrCheck()?submit():alert('入力を確認してください。');" id="sub" name="sub" value="入力した内容を確認する" disabled>


<!-- 三項演算子=if文を一行で書ける。
(条件)?真の時:偽の時
if(条件){真の時}else{偽の時} と同じ -->
<!-- disabledは無効化→同意をチェックすると押せるようにしている -->


	</form>
	</div>		
		
	</div>
</div>
</body>







<script src="datetimepicker/jquery.js"></script>
<script type="text/javascript" src="script/reserve.js"></script><!-- 新規作成外部JavaScript読み込み -->
<script src="datetimepicker/jquery.datetimepicker.js"></script>

<script>//日付
	$('#yyk_dhms').datetimepicker({

		lang:'ja',
		format:'Y/m/d',
		minDate : '-1970/01/01',
		maxDate : '+1970/01/31',
		timepicker:false,
		allowTimes : ['12:00','12:30','13:00','13:30','14:00','14:30','15:00','15:30','16:00','16:30','17:00','17:30','18:00','18:30','19:00','19:30','20:00','20:30','21:00','21:30','22:00','22:30','23:00','23:30','24:00','24:30'],
		//step : 30
	}); 

</script>





</html>