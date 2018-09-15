<?php #テーブル作成Mysqlへの接続を行う
$dsn = 'mysql:dbname=データベース名;host=ホスト名';
$user = 'ユーザー名';
$password = 'パスワード';
$pdo = new PDO($dsn,$user,$password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
/*$sql= "CREATE TABLE schedule"
." ("
. "scheduleNum INTEGER PRIMARY KEY,"
. "name char(32),"
. "title char(32),"
. "scheduleDate datetime,"
. "startTime datetime,"
. "endTime datetime,"
. "message char(32)"
.");";
$stmt = $pdo->query($sql);*/
$sql1= "CREATE TABLE schedule2"
." ("
. "scheduleNum INT AUTO_INCREMENT PRIMARY KEY,"
. "name char(32),"
. "title char(32),"
. "scheduleDate TEXT,"
. "startTime TEXT,"
. "endTime TEXT,"
. "message char(32)"
.");";
$stmt1 = $pdo->query($sql1);
$sql11 ='SHOW CREATE TABLE schedule2';
$result = $pdo -> query($sql11);
foreach ($result as $row){
print_r($row);
}
echo "<hr>";
$sql2 = "CREATE TABLE user2"
. "("
. "id TEXT,"
. "pw TEXT"
.");";
$stmt2 = $pdo->query($sql2);
/*$sql2 ='SHOW CREATE TABLE user2';
$result = $pdo -> query($sql2);
foreach ($result as $row){
print_r($row);
}
echo "<hr>";*/

?>
