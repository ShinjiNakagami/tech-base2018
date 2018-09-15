<html>
<head>
  <title>ログイン</title>
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
  <h1 align = "center">ログイン画面</h1>
  <?php
  //クリックジャッキング対策
  header('X-FRAME-OPTIONS: SAMEORIGIN');
//ログアウト処理をはじめに行う
if($_POST['hidLogoutFlag'] == "on") { //ログアウト状態である場合
  session_start(); //セッション開始
  session_destroy();  //セッションを破棄
  echo "<p align=\"center \">
  <font size = \"5\">ログアウトしました。</font></p>"; //確認メッセージを表示
}
   ?>
   <hr>
   <form method = "POST" action = "ScheduleTopPage.php">
     <table border = "2" align = "center">
       <tr>
         <th>メールアドレス</th>
         <td>
           <input type = "text" name = "txtId" size = "66" maxlength = "64">
         </td>
       </tr>
       <tr>
         <th>パスワード</th>
         <td><input type = "password" name = "txtPw" size = "66" maxlenth = "64"></td>
       </tr>
       <tr>
       <td colspan="2" align = "center"><input type = "submit" value = "ログイン">
       </td>
     </tr>
   </table>
 </form>
 <br>
 <hr>
</body>
</html>
