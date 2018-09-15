<html>
<head>
  <title>マイアカウント設定ページ</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
  <link rel="stylesheet" href="assets/css/main.css" />
  <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
</head>
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
  <h1 align = "center">アカウント設定</h1>
  <?php
  //クリックジャッキング対策
  header('X-FRAME-OPTIONS: SAMEORIGIN');
//ログアウト処理をはじめに行う
require_once("Function.php");
if($_POST['hidLogoutFlag'] == "on") { //ログアウト状態である場合
  session_start(); //セッション開始
  session_destroy();  //セッションを破棄
  echo "<p align=\"center \">
  <font size = \"5\">ログアウトしました。</font></p>"; //確認メッセージを表示
}
   ?>
   <hr>
   <form method = "POST" action = "RegAcountPage2.php" enctype="multipart/form-data">
     <table border = "2" align = "center">
       <tr>
         <th>ユーザー名</th>
         <td>
           <input type = "text" name = "txtId" size = "66" maxlength = "64">
         </td>
       </tr>
       <tr>
         <th>パスワード</th>
         <td><input type = "password" name = "txtPw" size = "66" maxlenth = "64"></td>
       </tr>
       <tr>
         <th>妊娠0週0日目</th>
         <td>
           <?php outputComboBox("cmbYear", 2018, 2022); ?>年
           <?php outputComboBox("cmbMonth", 1, 12); ?>月
           <?php outputComboBox("cmbDay", 1, 31); ?>日
         </td>
       </tr>
         <th>アイコン画像</th>
         <td><input type="file" name="icon_pic" id="icon_pic" /></td>
  <!--       <td><input type="file" name="icon_pic" id="upfile_image" accept="image/*" /></td>-->
       </tr>
       <tr>
         <th>メールアドレス登録</th>
         <td><input type = "text" name = "eMailAdd" size = "66" maxlenth = "64"></td>
       </tr>
       <tr>
       <td colspan="2" align = "center"><input type = "submit" value = "送信">
       </td>
     </tr>
   </table>
 </form>
 <br>
 <hr>
</body>
</html>
