<html>
<head>
  <title>お問い合わせメール送信</title>
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
  <!-- Header -->
    <header id="header">
      <h1>Pregners</h1>
      <nav>
        <ul>
          <li><a href="http://tt-80.99sv-coco.com/mission6/RegAcountPage.php"style="color:#000000;text-decoration"  target="_blank">マイアカウント登録</a></li>
          <li><a href="http://tt-80.99sv-coco.com/mission6/index1.html"style="color:#000000;text-decoration"  target="_blank">Pregnersとは？</a></li>
          <li><a href="http://tt-80.99sv-coco.com/mission6/index2.html"style="color:#000000;text-decoration"  target="_blank">妊活とは？</a></li>
          <li><a href="http://tt-80.99sv-coco.com/mission6/index3.html"style="color:#000000;text-decoration"  target="_blank">掲示板</a></li>
          <li><a href="http://tt-80.99sv-coco.com/mission6/index4.html"style="color:#000000;text-decoration"  target="_blank">マイページ</a></li>
        </ul>
      </nav>
    </header>
</body>
</html>
  <?php
  session_start();
  //クリックジャッキング対策
  header('X-FRAME-OPTIONS: SAMEORIGIN');
  if (!empty($_SESSION['MailAdd']) ){
  echo "お問い合わせメールを送信しました。ご意見ありがとうございます。";
}else{
  echo "送信に失敗しました。お手数ですが、メールアドレスまでメールをお願いします。";
}
  ?>
