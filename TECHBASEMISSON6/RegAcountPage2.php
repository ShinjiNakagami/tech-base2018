<?php
session_start();
ini_set('default_charset', 'UTF-8');
//メールに送られてきた登録用パスワードを入力フォームに入れて送信して登録完成
$_SESSION['name'] = $_POST['txtId'];
$_SESSION['txtPw'] = $_POST['txtPw'];
$_SESSION['MailAdd'] = $_POST['eMailAdd'];
//cryptでメアドをもとに認証パスワードを作成。セッションに入れるものは後に比較するので$saltを定義しておくhttp://en.yummy.stripper.jp/?eid=1151327
$salt = "tennis";
$_SESSION['crypt'] =crypt($_SESSION['MailAdd'] ,crypt($_SESSION['MailAdd'],$salt)) ;
$_SESSION['PregDay'] = $_POST['cmbYear'].'年'.$_POST['cmbMonth'].'月'.$_POST['cmbDay'].'日';
$_SESSION['pic'] = $_FILES['icon_pic'];
$filename= $_FILES['icon_pic']['name'];
$tempfile = $_FILES['icon_pic']['tmp_name'];
$directory_path = 'image/';//コードで作成
$filesave = 'img/' .$filename;//img主導で作成
//クリックジャッキング対策
header('X-FRAME-OPTIONS: SAMEORIGIN');
if(!file_exists($directory_path)){
  //mkdir($directory_path,0777);
  //chmod("$directory_path",0666);
  if(mkdir($directory_path,0777)){
    //echo "ファイル保存用ディレクトリ作製に成功しました。";
  }else{
    echo "ファイル保存用ディレクトリ作製に失敗しました。";
  }
}

if(is_uploaded_file($tempfile)){
  if(move_uploaded_file($tempfile, $filesave)){
    //下二行はチェック用
    //echo $filename."をアップロードしました。";
    //echo '<p><img src="'.$filesave.'"/>';*/
  }else{
    echo "ファイルアップロードができていません";
  }
}else {
  $warning = "ファイルが選択されていません。下のデフォルト画像に設定します。";
  $filesave = "img/069971.jpg";
}
$_SESSION['picAdd'] = $filesave;
?>

<html>
<head>
  <title>マイアカウント登録ページ</title>
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
        <!--<li><a href="#intro">Pregnersとは？</a></li>
        <li><a href="#one">妊活とは？</a></li>
        <li><a href="#two">掲示板</a></li>
        <li><a href="#work">マイページ</a></li>
        <li><a href="#contact">お問い合わせ</a></li>-->
        <li><a href="http://tt-80.99sv-coco.com/mission6/RegAcountPage.php"style="color:#000000;text-decoration"  target="_blank">マイアカウント登録</a></li>
        <li><a href="http://tt-80.99sv-coco.com/mission6/index1.html"style="color:#000000;text-decoration"  target="_blank">Pregnersとは？</a></li>
        <li><a href="http://tt-80.99sv-coco.com/mission6/index2.html"style="color:#000000;text-decoration"  target="_blank">妊活とは？</a></li>
        <li><a href="http://tt-80.99sv-coco.com/mission6/index3.html"style="color:#000000;text-decoration"  target="_blank">掲示板</a></li>
        <li><a href="http://tt-80.99sv-coco.com/mission6/ScheduleLoginPage.php"style="color:#000000;text-decoration"  target="_blank">マイページログイン</a></li>
        <li><a href="http://tt-80.99sv-coco.com/mission6/index.html">ホーム</a></li>
      </ul>
    </nav>
  </header>

  <h1 align = "center">登録情報確認・メール認証ページ</h1>
<p>ユーザー名:<?php echo $_SESSION['name']; ?>
<p>パスワード:<?php echo $_SESSION['txtPw']; ?>
<p>妊娠0週0日:<?php echo $_SESSION['PregDay'];?>
<p>アイコン画像
<p><?php echo $warning;?>
<p><img src="<?php echo $_SESSION['picAdd'];?>"/>
<p>メールアドレス:<?php echo $_SESSION['MailAdd']; ?>
<p><p>
以上の内容で登録しますか？
<form method = "POST" action = "mailtest.php">
<td colspan="2" align = "center"><input type = "submit" name = "button" value = "登録">
</form>
</body>
</html>
