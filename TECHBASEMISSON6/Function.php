<?php
//コンボックスを出力するための関数
ini_set('default_charset', 'UTF-8');
function outputComboBox($arg_strName, $arg_intMin, $arg_intMax){
   echo "<select name=\"" .$arg_strName . "\">";//開始タグを出力
   for ($i = $arg_intMin; $i <= $arg_intMax; $i++){
     echo "<option value = \"". $i ."\">".$i."</option>"; //optionタグを出力
   }
   echo "</select>"; //終了タグを出力
 }

 //セッション情報の有無を確認するための関数
 function checkScheduleSession(){
   session_start(); //セッション開始
   //セッション変数に値が入っているかどうかを判定
   if(!isset($_SESSION['temp_user'])){//セッション変数に値が入っていない場合もともとは'id'
     echo "スケジュールTOP画面からログインを行ってください。";//エラーメッセージを表示
     exit;//プログラムを終了.以降の処理を実行せずに終了
   }
 }
 ?>
