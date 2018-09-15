<?php
session_start();
//ファイル読み込み
ini_set('default_charset', 'UTF-8');
require_once("Function.php");

//セッション情報を確認
checkScheduleSession(); //checkScheduleSession関数呼び出し
//クリックジャッキング対策
header('X-FRAME-OPTIONS: SAMEORIGIN');
 ?>
 <html>
 <head>
   <title>スケジュール登録画面</title>
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
   <h1 align = "center">スケジュール登録画面</h1>
   <hr>
   <form method = "POST" action = "ScheduleRecord.php">
     <table border = "2" align = "center">
       <p>
       <tr>
         <th align = "center">タイトル</th>
         <td><input type = 'text' name = "txtTitle" size = "50" maxlength = "255"></td>
       </tr>
     </p>
       <p>
       <tr>
         <th align = "center">日付</th>
         <td>
           <?php outputComboBox("cmbYear", 2018, 2022); ?>年
           <?php outputComboBox("cmbMonth", 1, 12); ?>月
           <?php outputComboBox("cmbDay", 1, 31); ?>日
         </td>
       </tr>
     </p>
       <p>
       <tr>
         <th align = "center">開始時間</th>
         <td>
           <?php outputComboBox("cmbStartHour", 0, 23); ?>時
           <?php outputComboBox("cmbStartMinute", 0, 59); ?>分
         </td>
       </tr>
     </p>
       <p>
       <tr>
         <th align = "center">終了時間</th>
           <td>
             <?php outputComboBox("cmbEndHour", 0, 23); ?>時
             <?php outputComboBox("cmbEndMinute", 0, 59); ?>分
           </td>
         </tr>
       </p>
       <p>
       </tr>
       <tr>
           <th align = "center">メッセージ</th>
           <td><input type = "text" name = "txtMessage" size = "100" maxlength = "255"></td>
         </tr>
       </p>
         <p>
         <tr>
           <td colspan = "2" align = "center">
             <input type = "submit" value = "登録">
             <input type = "reset" value = "クリア">
           </td>
         </tr>
       </p>
       </table>
     </form>
     </body>
     </html>
