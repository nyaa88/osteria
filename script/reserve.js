//jQuery使用
var checkFlag = 0 ;//どこかにエラーがあれば1を代入


//人数 半角数字チェック
$('#num').change(function(){
	nStr = $('#num').val();
		if(!nStr.match(/^[0-9]+$/) || 1 > nStr || nStr > 12){
			alert("半角数字1~12の間で入れてください");
			$(this).css('background-color','#ecc'),focus();
			$checkFlag=1;
		}else{
			$(this).css('background-color','#fff');
			$checkFlag=0;
	}
});


//時間・メニューのラジオボタン選択切り替え
$('#lunch').click(function(){//ラジオボタンでランチを選んだ時
	$('#jkn_lunch').show(800);
  $('#jkn_dinner').hide(300);
  $('#lndn').hide(100);
});
$('#dinner').click(function(){//ラジオボタンでディナーを選んだ時
	$('#jkn_dinner').show(800);
	$('#jkn_lunch').hide(300);
  $('#lndn').hide(100);
});


//料金合計
	var rykn_array = [4800,6800,8500,13500];  

$('#total_chk').click(function(){
	$('#plice_none').toggle(0);
	$('#plice_none').show(500);
});//計算を押すとすぐに出てくる。もう一度押すとすぐに消え再計算してゆっくり出てくる

$('#total_chk').click(function(){
	const tax=1.08;//消費税
if($('#lunch').prop('checked')){
  	//prop→チェックされていたらtrueを返す。ランチの合計を計算
  var menu =		//選択されたセレクトメニューの値を取得
	$('select[name="corse_lunch"] option:selected').val();
	}else if($('#dinner').prop('checked')){//ディナーが選ばれていたら
  var menu =
  $('select[name="corse_dinner"] option:selected').val();
  }else{//どちらも選んでいない場合
  alert("ランチかディナーを選んでください");
  $checkFlag=1;
  }
  
//合計してtextBoxに値を表示
  $("#total_plice").val((rykn_array[menu] * nStr * tax).toLocaleString() //BOXの値がセレクトで選んだ値になる。toLocaleString()で桁区切り //選んだメニュー*人数*消費税
  );
});


	
//電話番号チェック
$('#tel').change(function(){
	var Tel = $('#tel').val();
	if(!Tel.match(/^[0-9]{2,4}-[0-9]{2,4}-[0-9]{3,4}$/)){
		alert("半角数字・ハイフンを入れて入力してください");
		$(this).select();
		$(this).css('background-color','#ecc');
		$checkFlag=1;
		}else{
		$(this).css('background-color','#fff');
		$checkFlag=0;
		}
	});

//メールアドレスチェック
$('#eml').change(function(){
	var eMl = $('#eml').val();
	if(!eMl.match(/^[a-zA-Z0-9_.+-]+[@][a-zA-Z0-9.-]+$/)){
		alert("メールアドレスを確認してください");
		$('#eml').select();
		$(this).css('background-color','#ecc');
		$checkFlag=1;
		}else{
		$(this).css('background-color','#fff');
		$checkFlag=0;
		}
	});


//ふりがなチェック
$('#kana').change(function(){
	var kStr = $('#kana').val();
	if(!kStr.match(/^[ぁ-ん]+$/)){
		alert("ふりがなは\"ひらがな\"で入れてください");
		$('#kana').select();
		$(this).css('background-color','#ecc');
		$checkFlag=1;
		}else{
		$(this).css('background-color','#fff');
		$checkFlag=0;
		}
		});

//同意にチェックしないと送信できない
$('#doi').on('change',function(){if($(this).is(':checked')){
	$('#doick').prop('disabled',false);
}else{
	$('#doick').prop('disabled',true);}
	});


//住所の番地と最終チェック
function addrCheck(){
var aStr = $('#addr').val();
	//半角と全角の0-9が入っていなければalert
	if(!aStr.match(/[0-9０-９]/) || $checkFlag==1 ){
		$('#addr').css('background-color','#ecc');
		return false;//送信しない
	}else{
		$('#addr').css('background-color','#fff');
		return true;}//送信する
	};
	//関数内のreturn は呼び出し元に戻り値を返して終了する。


document.onkeypress = enter;
function enter() {
	if (window.event.keyCode == 13) {
		return false;
	}
}