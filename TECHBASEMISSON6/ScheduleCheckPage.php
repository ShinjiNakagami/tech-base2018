<?php
//ファイルを読み込み
ini_set('default_charset', 'UTF-8');
require_once("Function.php");

//セッション情報を確認
checkScheduleSession(); //checkScheduleSession関数呼び出し

//指定した日付のスケジュールを取得
/*$resDb = mysql_open("Schedule.php", 0666, $strError);*/
$dsn = 'mysql:dbname=データベース名;host=ホスト名';
$user = 'ユーザー名';
$password = 'パスワード';
$pdo = new PDO($dsn,$user,$password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$strScheduleDate = $_GET['year']."年".
                   $_GET['month']."月".
                   $_GET['day']."日"; /*日付を作成*/
$strSqlScheduleSelect = "select * from schedule2 where scheduleDate = '$strScheduleDate'";
$resResult = $pdo -> query($strSqlScheduleSelect);
?>
<html>
<head>
  <title>スケジュール確認場面</title>
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
  <h1 align = "center">スケジュール確認画面</h1>
  <hr>
  <h2 align = "center"><?php echo $_GET['year']."年".
                                  $_GET['month']."月".
                                  $_GET['day']."日の予定"; ?></h2> 日付を作成
  <table border = "2" align = "center">
    <tr>
      <th>タイトル</th><th>開始時刻</th>
      <th>終了時刻</th><th>メッセージ</th><!--<th>取り消し</th>-->
    </tr>
    <?php
    $pdo = new PDO($dsn,$user,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $strScheduleDate = $_GET['year']."年".
                       $_GET['month']."月".
                       $_GET['day']."日";
    //var_dump($strScheduleDate);
    $strSqlScheduleSelect = "select * from M6UserDBtest2_Sche2 where scheduleDate = '$strScheduleDate'";
    //$strSqlScheduleSelect = "select * from schedule2 where scheduleDate = $strScheduleDate";
    $resResult = $pdo -> query($strSqlScheduleSelect);//SQL文を発行
    //var_dump($resResult);
    foreach($resResult as $arrayRow) {
        ?>
      <tr>
        <!--<td><?php// echo $arrayRow['name']; ?></td>-->
        <td><?php echo "　　　　　　".$arrayRow['title']; ?></td>
        <td><?php echo "　　　　　　".$arrayRow['startTime']; ?></td>
        <td><?php echo "　　　　　　".$arrayRow['endTime']; ?></td>
        <td><?php echo "　　　　　　".$arrayRow['message']; ?></td>
        <!--<td><input type="button" value = "取消"
              onclick = "location.href = 'ScheduleSelete.php?DeleteNum = <?php// echo $arrayRow['scheduleNum']; ?>'"></td>-->
     </tr>
   <?php
 }
   //データベースから切断
   $pdo= null;
   ?>
 </table>
 <hr>
 <br>
 <table align = "center">
   <tr>
     <td><a href = "ScheduleTopPage.php">TOP画面へ</a></td>
   </tr>
   <tr>
     <td><a href = "ScheduleRecordPage.php">スケジュール登録画面へ</a></td>
   </tr>
 </table>
</body>
</html>
