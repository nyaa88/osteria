//jQuery未使用

//人数 半角数字チェック
function numCheck(){
	nStr=document.frm.num.value;

if(!nStr.match(/^[0-9]+$/) || 1 > nStr || nStr > 10){alert("半角数字1~10の間で入れてください");}
}

	//時間・メニューの選択表示　←これはbody以下で読み込まないとダメだった
var Jkn_lunch = document.getElementById('jkn_lunch');
var Jkn_dinner = document.getElementById('jkn_dinner');

function dp_lunch() {//ラジオボタンでランチを選んだ時
	Jkn_lunch.className = "block";
	Jkn_dinner.className = "none";
  }

function dp_dinner() {//ラジオボタンでディナーを選んだ時
	Jkn_dinner.className = "block";
	Jkn_lunch.className = "none";
  }


//料金合計
function total_chk() {
	var total_plice = 
  document.getElementById('total_plice');
  var rl = document.frm.corse_lunch;//ラジオボタンのid
  var rd = document.frm.corse_dinner;
  
  //セレクトメニューで選んだ値を取得するための文  
  if(document.frm.lunch.checked){
  	//ランチにチェックが入っていたら.checkedの戻り値は true か false
  	var menu = rl.options[rl.selectedIndex].value;
  	} else if(document.frm.dinner.checked){
  	//ディナーにチェックが入っていたら
  	var menu = rd.options[rd.selectedIndex].value;
  	} else {
  	//どっちにも入っていなかったら
  	alert("ランチかディナーを選んでください");
  	}


	var tax = 1.08; //消費税　実行の過程で値が変わらないものは　const(定数)として宣言しておく。
	var rykn_array = [4800,6800,8500,13500];  
//選んだメニュー*人数*消費税

	total_plice.value = (rykn_array[menu] * nStr * tax).toLocaleString(); //BOXの値がセレクトで選んだ値になる。toLocaleString()で桁区切り  
  
} 



//住所
function addrCheck(){
var addr=document.frm.addr.value;
	//半角と全角の0-9が入っていなければalert
	if(!addr.match(/[0-9０-９]/)){
	return false;
	}else{
	return true;
	}}
	//関数内のreturn は呼び出し元に戻り値を返して終了する。
	
//電話番号チェック
function telCheck(){
	var tel=document.frm.tel.value;
	if(!tel.match(/^[0-9]{2,4}-[0-9]{2,4}-[0-9]{3,4}$/)){
		alert("半角数字・ハイフンで入力してください");
	}}

//メールアドレスチェック
function mailCheck(){
	var email=document.frm.email.value;
	if(!email.match(/^[a-zA-Z0-9_.+-]+[@][a-zA-Z0-9.-]+$/)){
		alert("メールアドレスを確認してください");
		}}

//カタカナチェック
function kanacheck(){
var kana=document.frm.kana.value;
if(!kana.match(/^[ァ-ン]+$/)){
alert("フリガナは全角カタカナで入れてください");
}}

//同意にチェックしないと送信できない
$('#doi').on('change',function(){if($(this).is(':checked')){
	$('#doick').prop('disabled',false);
}else{
	$('#doick').prop('disabled',true);
}});
