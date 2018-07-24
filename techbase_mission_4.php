<?php #mission3-1Mysqlへの接続を行う
$dsn = 'mysql:dbname=DataBaseName;host=host';
$user = 'USER';
$password = 'Password';
$pdo = new PDO($dsn,$user,$password);
#$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
#変数の受け渡し、定義
ini_set('default_charset', 'UTF-8');
$show_name = "";
$show_comment = "";
$show_e_num = "";
$show_password1 = "";
$time = date("Y/m/d H:i:s");
#insertでデータ入力.発言ボタン押されたら
if ( !empty($_POST['name']) and !empty($_POST['comment'])){
if (empty($_POST['e_num'])){
$name = $_POST['name'];
$comment = $_POST['comment'];
$password1 = $_POST['password1'];
$show_name = "";
$show_comment = "";
$show_e_num = "";
$show_password1 = "";
$sql = $pdo -> prepare("INSERT INTO mission4test4( name, comment, time, password1, d_num, d_pass, e_num, e_mode) VALUES( :name, :comment, :time, :password1, :d_num, :d_pass, :e_num, '0')");
$sql-> bindParam(':name', $name, PDO::PARAM_STR);
$sql-> bindParam(':comment', $comment, PDO::PARAM_STR);
$sql-> bindParam(':time', $time, PDO::PARAM_STR);
$sql-> bindParam(':password1', $password1, PDO::PARAM_STR);
$sql-> bindParam(':d_num', $d_num, PDO::PARAM_INT);
$sql-> bindParam(':d_pass', $d_pass, PDO::PARAM_STR);
$sql-> bindParam(':e_num', $e_num, PDO::PARAM_INT);
$sql-> execute();
}elseif ( !empty($_POST['e_num']) ){
$name = $_POST['name'];
$comment = $_POST['comment'];
$password1 = $_POST['password1'];
$e_num = $_POST['e_num'];
$sql = "update mission4test4 set id = $e_num, name = '$name', comment = '$comment', password1 = '$password1' where id = $e_num ";
$result = $pdo -> query($sql);
$show_name = "";
$show_comment = "";
$show_password1 = "";
$show_e_num = "";
}else{
echo "想定外の入力操作です管理人に報告お願いします。";
}
}
#削除機能。削除番号入力されて送信されたら。
if ( !empty($_POST['d_num']) ){
 $d_num = $_POST['d_num'];
 $d_pass = $_POST['d_pass'];
#idが$e_numのところからpassword1を取り出す
 $d_sql = "select password1 from mission4test4 where id = $d_num";
 $true_pass =  $pdo -> query($d_sql);
 foreach ($true_pass as $row){
  if ( $d_pass = $row['password1'] ) {
   $sql = "delete from mission4test4 where id = $d_num";
   $result = $pdo -> query($sql);
  }else {
   echo "パスワードが一致しません。";
  }
 }
}
#編集機能編集モード1に入る。画面の入力フォームにDBの内容を記入する
if ( (!empty($_POST['e_num'])) and (!empty($_POST['password1'])) and empty($_POST['name']) and empty($_POST['comment']) ) {
 $e_num = $_POST['e_num'];
 $e_sql = "select * from mission4test4 where id = $e_num";
 $e_result =  $pdo -> query($e_sql);
 $password1 = $_POST['password1'];
 $password = $password1;
 foreach ($e_result as $row){
  if ( $password = $row['password1']) {
   $mode = 2;
   $mode_sql = "update missiontest4 set e_mode = $mode where id = $e_num ";
   $mode_result = $pdo -> query($mode_sql);
   $show_name = $row['name'];
   $show_comment = $row['comment'];
   $show_password1 = $row['password1'];
   $show_e_num = $row['id'];
  }else{
   echo "パスワードが一致しません。";
   var_dump($password);
   var_dump($row['password1']);
   var_dump(0);
  }
 }
}
?>
<!DOCTYPE HTML>
<html>

<head>
<meta charset="UTF-8">
<title>簡易掲示板</title>
</head>

<body>
<h1>簡易掲示板</h1>
<form action="mission_4.php" method="POST">
投稿者名<input type="text" name="name" size="20" value = "<?php echo $show_name; ?>"><br>
コメント<input type="text" name="comment" size="50" value = "<?php echo $show_comment; ?>"><br>
パスワード<input type="text" name="password1" size="50" value = "<?php echo $show_password1; ?>"><br>
編集対象番号<input type="text" name="e_num" size="5" value = "<?php echo $show_e_num; ?>"><br>
<input type="submit" value="発言">
</form>
<br>
<form action="mission_4.php" method="POST">
削除対象番号<input type="text" name="d_num" size="5"><br>
パスワード<input type="text" name="d_pass" size="50"><br>
<input type="submit" value="削除実行">
</form>
<br>
<br>
<br>
<br>

<?php #mission3-6入力データをselectによって表示する
$sql = 'select * from mission4test4';
$results = $pdo -> query($sql);
foreach ($results as $row){
  echo "投稿番号:".$row['id'].'　投稿者名:'.$row['name']."　投稿時刻:".$row['time'].'<br>';
  echo "コメント:".$row['comment'].'<br><br>';
}
?>
