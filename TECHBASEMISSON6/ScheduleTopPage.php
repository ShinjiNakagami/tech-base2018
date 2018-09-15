<?php
//データベースとの照合
//ファイルの読み込み
ini_set('default_charset', 'UTF-8');
require_once("Function.php");
//セッションを開始
session_start();
$salt ="tennis";
if(!empty($_POST['txtId'])){
$_SESSION['input_mail'] = $_POST['txtId'];
$_SESSION['input_pw'] = $_POST['txtPw'];
}
$inputmail = crypt($_SESSION['input_mail'], crypt($_SESSION['input_mail'], $salt));
//ログイン処理
if(!empty($_SESSION['input_pw']) and !empty($_SESSION['input_mail']) ){
  //echo "dd";
  //データベースとの照合
  $dsn = 'mysql:dbname=データベース名;host=ホスト名';
  $user = 'ユーザー名';
  $password = 'パスワード';
  $pdo = new PDO($dsn,$user,$password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $strSqlUserSelect = "select * from M6UserDBtest2 where emailadress='$inputmail'";
  /*
  $sql= "CREATE TABLE M6UserDBtest2"
  ." ("
  . "id int AUTO_INCREMENT PRIMARY KEY,"
  . "name char(32),"
  . "PregDay TEXT,"
  . "PicAdd TEXT,"
  . "user_pass TEXT,"
  . "emailadress TEXT"
  .");";
  */
  $resResult = $pdo -> query($strSqlUserSelect);//SQL文を発行
  //var_dump($resResult);
  foreach ($resResult as $arrayRow){
    //var_dump($arrayRow['user_pass']);
    //var_dump(crypt($_SESSION['input_pw'] ,crypt($_SESSION['input_pw'], $salt)));
    //echo $arrayRow['id'].",".$arrayRow['pw']."<br>";//.":".$arrayRow['pw']);
    if($arrayRow['user_pass'] == crypt($_SESSION['input_pw'] ,crypt($_SESSION['input_pw'], $salt)) ){ //一致する組み合わせが存在しない場合
      $_SESSION['temp_user'] = $arrayRow['name'];
      $_SESSION['temp_pic'] = $arrayRow['PicAdd'];
      $_SESSION['temp_PD'] = $arrayRow['PregDay'];
      $_SESSION['temp_pass'] = $arrayRow['user_pass'];
      //var_dump($arrayRow['user_pass']);
      //var_dump(crypt($_SESSION['input_pw'] ,crypt($_SESSION['input_pw'], $salt)));
      $pdo = null;
      //echo "aa";
    //$pdo = null;//データベースから切断
    //エラー処理
    //エラーメッセージを表示
    //exit;//以降の処理を実行せずに終了
  }else{ //ユーザー名とパスワードの組み合わせが一致した場合
    echo "パスワードまたはメールアドレスが一致しません";
    //exit;
    //$check = "a";//データベースから切断
    //セッション情報を作製
    /*if( !empty($_POST['txtId']) ){
      $_SESSION['id'] = $_POST['txtId'];//入力したユーザー名をセッション変数に設定
    }*/
  }
  }
}else{
  echo "入力欄両方に入力してから送信してください。";
  exit;
}
//カレンダーに表示する月を設定
if(!empty($_POST['cmbNum']) ){ //月を指定しない場合
  //$intYodayYear = date("Y");//当年を取得
  //$intTodayMonth = date("n");//当月を取得
}else{//月を指定した場合
  $intTimeStamp = mktime(0, 0, 0,
  date("n") + $_POST['cmbNum'], 1, date("Y")
); //$_POST['num']ヵ月後のタイムスタンプ値を作製
$intTodayYear = date("Y", $intTimeStamp);//$_POST['num']ヵ月後の年を取得
$intTodayMonth = date("n", $intTimeStamp);//$_POST['num']ヵ月後の月を取得
}

//カレンダーの表示するための値を取得
$intCurrent = mktime(0, 0, 0,$intTodayMonth, 1, $intTodayYear); //カレンダーを表示するためのタイムスタンプ値を作成
$intFirstDay = date("w", $intCurrent);//カレンダーに表示する月の初日の曜日を取得
$intLastDay = date("t", $intCurrent);//カレンダーに表示する月の最終日を取得
/*var_dump($intCurrent);
var_dump($intFirstDay);
var_dump($intLastDay);*/
?>
<html>
<head>
  <title>TOP画面</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
  <link rel="stylesheet" href="assets/css/main.css" />
  <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
</head>
<style>
  body {
    background: #eeeeee;
    text-align: center;
  }
  img{
  background-color: gray;
  width: 150px; height: 150px;
  object-fit: contain;
  margin:auto;
}
</style>
<body>
  <header id="header">
  <h1>Pregners</h1>
  <nav>
    <ul>
      <li><a href="http://tt-80.99sv-coco.com/mission6/RegAcountPage.php"style="color:#000000;text-decoration"  target="_blank">マイアカウント登録</a></li>
      <li><a href="http://tt-80.99sv-coco.com/mission6/index1.html"style="color:#000000;text-decoration"  target="_blank">Pregnersとは？</a></li>
      <li><a href="http://tt-80.99sv-coco.com/mission6/index2.html"style="color:#000000;text-decoration"  target="_blank">妊活とは？</a></li>
      <li><a href="http://tt-80.99sv-coco.com/mission6/index3.html"style="color:#000000;text-decoration"  target="_blank">掲示板</a></li>
    <li><a href="http://tt-80.99sv-coco.com/mission6/ScheduleLoginPage.php"style="color:#000000;text-decoration"  target="_blank">マイページログイン</a></li>
      <li><a href="http://tt-80.99sv-coco.com/mission6/index.html">ホーム</a></li>
    </ul>
  </nav>
</header>
  <h1 align="center">TOP画面</h1>
  <p align="center">
    <font size="5"><?php echo "ようこそ".$_SESSION['temp_user']."さん"; ?></font>
  </p>
  <hr>
  <h2 align = "center"><?php echo $intTodayYear."年".$intTodayMonth."月"; ?></h2>
  <table border="2" cellspacing ="10" cellpadding="10" align="center">
    <tr>
      <th>日</th><th>月</th><th>火</th><th>水</th><th>木</th><th>金</th><th>土</th>
    </tr>
    <?php
    //カレンダー表示
  /*  $resDb = sqlite_open("Schedule.", 0666, $strError); //SQLに接続*/
  $dsn = 'mysql:dbname=tt_80_99sv_coco_com;host=localhost';
  $user = 'tt-80.99sv-coco.';
  $password = 'M8dbV2Fi';
  $pdo = new PDO($dsn,$user,$password);//mysqlに接続
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //var_dump($pdo);
    for($i=1; $i<=($intFirstDay + $intLastDay); $i++){
      //var_dump($intLastDay);
      //var_dump($intFirstDay);
      $scheduleDate = $intTodayYear."年".$intTodayMonth."月".($i - $intFirstDay)."日";
      if($i % 7 ==1){//7で割った余りが1である場合
        echo "<tr>";//行開始タグを出力
      }
      if($i > $intFirstDay){//初日の曜日より後の曜日である場合
        $strSqlScheduleSelect = "select * from M6UserDBtest2_Sche2";
        $resResult = $pdo -> query($strSqlScheduleSelect);//SQL文を発行
        //var_dump($resResult);
        foreach($resResult as $arrayRow){
          $arrayRow = $arrayRow['title'];
        }
        if(empty($arrayRow['title'])) {//スケジュールが登録されていない日付の場合
          echo "<td>".($i - $intFirstDay)."</td>";//日付を表示
        }else{//スケジュールが登録されている日の日付の場合
          echo "<td bgcolor=\"white\" align = \"center\">
          <a href =
          \"ScheduleCheckPage.php?year=". $intTodayYear.
          "&month=" . $intTodayMonth .
          "&day=".($i - $intFirstDay).
          "\">" . ($i - $intFirstDay).
          "</a></td>";//セルの色を変えてリンクを張り付け
        }

      }else{//7で割った余りが1でないとき
        echo "<td>&nbsp;</td>";//空のセルを表示
      }
      if($i % 7 == 0){//7で割り切れる場合
        echo "</tr>"; //行終了タグ
      }
    }
  //mysql_close($resDb); //データベースから切断
  $pdo = null;
  ?>
</table>
<form method = "POST" action = "ScheduleTopPage.php">
<table align = "center">
  <tr>
      <?php
        echo "<td bgcolor=\"white\">";
        outputComboBox("cmbNum", 0, 12);
        echo "</td>" ?>
        <td>
      <input type = "submit" value = "ヵ月後を表示">
    </td>
  </tr>
</table>
</form>
<form method = "POST" action = "ScheduleLoginPage.php">
  <table align="center">
    <tr>
      <td>
        <input type = "hidden" name = "hidLogoutFlag" value = "on">
        <input type = "submit" value = "ログアウト">
      </td>
    </tr>
  </table>
</form>
<hr>
<br>
<table align = "center">
  <tr>
    <td><a href = "ScheduleRecordPage.php">スケジュール登録画面へ</a></td>
  </tr>
</table>
</body>
</html>
