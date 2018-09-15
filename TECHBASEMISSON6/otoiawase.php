<?php
session_start();
//クリックジャッキング対策
header('X-FRAME-OPTIONS: SAMEORIGIN');
$to = "～@gmail.com";
$fromname = $_POST['name'];
$frommail = $_POST['email'];
require_once ( 'PHPMailerAutoload.php' );
echo "認証メールを送りました。メール内にあるURLを踏んで登録を完了させてください。";
$subject = "Pregners　お問い合わせメール";
$body = $fromname.",".$frommail."よりお問い合わせがありました。<br>".$_POST['message'];
$from = "～@gmail.com";//送信側のgamilのメアドを入れる
$smtp_user = "～@gmail.com";//送信側のgamilのアカウント（gamilのメアドを入れる）
$smtp_password = 'Exciting!';//<-gmailのパスワード
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 2; // debugging: 1 = errors and messages, 2 = messages only
//$mail->Debugoutput = function($str, $level) { sub_logwrite("PHP Mailer:" . $str); };
$mail->SMTPAuth = true;
//$mail -> AuthType = 'LOGIN';
$mail->CharSet = 'utf-8';
$mail->SMTPSecure = 'tls';
$mail->Host = "smtp.gmail.com";//"smtp.mail.yahoo.co.jp";//"smtp.gmail.com";
$mail->Port = 587;//465;
$mail->IsHTML(false);
$mail->Username = $smtp_user;
$mail->Password = $smtp_password;
$mail->setFrom($smtp_user);
$mail->From = $from;
$mail->Subject = $subject;
$mail->Body = $body;
$mail->addAddress($to);
if(!empty($_SESSION['MailAdd'])){
if( !$mail -> send() ){
    $message  = "Message was not sent<br/ >";
    $message .= "Mailer Error: " . $mailer->ErrorInfo;
} else {
    $message  = "Message has been sent";
}
}else{
  echo "メールアドレスが入力されていません";
}
  header("location: otiawaseOK.php");
//echo $message;
?>
<html>
	<head>
		<title>Pregners</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Header -->
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
