<?php
//ファイル読み込み
ini_set('default_charset', 'UTF-8');
require_once("Function.php");
//SheduleRecordPade.phpから送られてくる
//セッション情報を確認
checkScheduleSession(); //checkScheduleSession関数呼び出し
//データベースへの登録
/*$resDb = mysql_open("Schedule.php", 0666, $strError);*/
//クリックジャッキング対策
header('X-FRAME-OPTIONS: SAMEORIGIN');
$dsn = 'mysql:dbname=データベース名;host=ホスト名';
$user = 'ユーザー名';
$password = 'パスワード';
$pdo = new PDO($dsn,$user,$password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$strScheduleDate = $_POST['cmbYear'].'年'.
                    $_POST['cmbMonth'].'月'.
                    $_POST['cmbDay'].'日'; //日付を作成
$strStartTime = $_POST['cmbStartHour']."時".
                $_POST['cmbStartMinute']."分";//開始時間を作成
$strEndTime = $_POST['cmbEndHour']."時".
              $_POST['cmbEndMinute']."分";//終了時間を作成
//$resResult = $pdo -> query($strSqlSchedueInsert);//SQL文を発行
$title = $_POST['txtTitle'];
$message = $_POST['txtMessage'];
$user_pass = crypt($_SESSION['txtPw'] ,crypt($_SESSION['txtPw'], $salt));
$sql = $pdo -> prepare("INSERT INTO M6UserDBtest2_Sche2( title, scheduleDate, startTime, endTime, message , user_pass) VALUES(:title, :scheduleDate, :startTime, :endTime, :message, :user_pass)");
$sql-> bindParam(':title', $title, PDO::PARAM_STR);
$sql-> bindParam(':user_pass', $user_pass, PDO::PARAM_STR);
$sql-> bindParam(':scheduleDate', $strScheduleDate, PDO::PARAM_STR);
$sql-> bindParam(':startTime', $strStartTime, PDO::PARAM_STR);
$sql-> bindParam(':endTime', $strEndTime, PDO::PARAM_STR);
$sql-> bindParam(':message', $message, PDO::PARAM_STR);
$sql-> execute();
?>
<html>
<head>
<title>登録完了画面</title>
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
      <li><a href="#contact">お問い合わせ</a></li>
    </ul>
  </nav>
</header>
<p>登録完了</p>
<p>
<font size = "5"><?php echo $_SESSION['id'].",".$title.",".$strScheduleDate.",".$strStartTime.",".$strEndTime.",".$message ?>で登録しました</font>
</p>
<hr>
<table align = "center">
<tr>
<td><a href="ScheduleTopPage.php">TOP画面へ</a></td>
</tr>
<tr>
<td><a href = "ScheduleRecordPage.php" >スケジュール画面へ</a></td>
</tr>
</table>
</body>
</html>
