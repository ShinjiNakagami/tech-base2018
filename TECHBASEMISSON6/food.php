<!DOCTYPE HTML>
<html>
  <head>
    <title>foods</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- , shrink-to-fit=no, user-scalable=no-->
    <!--<meta http-equiv="x-ua-compatible" content="ie=edge">--><!--
    <link rel="stylesheet" href="lib/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/popup.css" type="text/css">
    <script src="lib/js/jquery.min.js"></script>
    <script src="lib/js/bootstrap.min.js"></script>
    <script src="popup.js"></script>-->
		<link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="/m6test1-1.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
  </head>
<style>
#header {
  position: fixed;
  z-index: 10000;
  left: 0;
  top: 0;
  width: 100%;
  background: rgba(255, 255, 255, 0.95);
  height: 15em;/*3em;*/
  line-height: 3em;
  box-shadow: 0 0 0.15em 0 rgba(0, 0, 0, 0.1);
}
img{
  background-color: gray;
  object-fit: contain;
  width: 100px; height: 100px;
}
img.left-imageshow{
  margin-right: 10px;
  width: 400px; height: 400px;
  object-fit: contain;
}
img.right-imageshow{
  margin-right: 10px;
  width: 400px; height: 400px;
  object-fit: contain;
}
  </style>
  <body>
  <header id="header">
      <h1>foods</h1>
      <nav>
        <ul>
        <li><a href="http://tt-80.99sv-coco.com/mission6/RegAcountPage.php"style="color:#000000;text-decoration"  target="_blank">マイアカウント登録</a></li>
        <li><a href="http://tt-80.99sv-coco.com/mission6/index1.html"style="color:#000000;text-decoration"  target="_blank">Pregnersとは？</a></li>
        <li><a href="http://tt-80.99sv-coco.com/mission6/index2.html"style="color:#000000;text-decoration"  target="_blank">妊活とは？</a></li>
        <li><a href="http://tt-80.99sv-coco.com/mission6/index3.html"style="color:#000000;text-decoration"  target="_blank">掲示板</a></li>
        <li><a href="http://tt-80.99sv-coco.com/mission6/ScheduleLoginPage.php"style="color:#000000;text-decoration"  target="_blank">マイページログイン</a></li>
        </ul>
      </nav>
      <br>
      <form action="food.php" method="POST" enctype="multipart/form-data">
        画像を添付<input type="file" name="up_image" />
        <td align = "center"><input type = "submit" value = "送信"></td>
        <form action="food.php" method="POST" enctype="multipart/form-data">
        動画を添付<input type="file" name="up_video" accept="video/*" />
        <td align = "center"><input type = "submit" value = "送信"></form>
      </form>
    </td>
      <table>
        <tbody>
          <form action="food.php" method="POST">
      <tr>
      <td>
      <input type="text" style="width:1200px;" name="comment">
    </td>
    <td>
      <input type="submit" value="発言">
    </td>
  </tr>
</form>
</tbody>
</table>
    </header>
  <br><br><br><br><br><br><br><br><br>
<?php
session_start();
/*ログイン時セッション内容
$_SESSION['temp_user'] = $arrayRow['name'];
$_SESSION['temp_pic'] = $arrayRow['PicAdd'];
$_SESSION['temp_PD'] = $arrayRow['PregDay'];
$_SESSION['temp_pass'] = $arrayRow['user_pass'];
*/
ini_set('default_charset', 'UTF-8');
require_once("Function.php");
//セッション情報を確認
checkScheduleSession();
//クリックジャッキング対策
header('X-FRAME-OPTIONS: SAMEORIGIN');
$dsn = 'mysql:dbname=tt_80_99sv_coco_com;host=localhost';
$user = 'tt-80.99sv-coco.';
$password = 'M8dbV2Fi';
$pdo = new PDO($dsn,$user,$password);
//$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql= "CREATE TABLE keijibann_food7"
." ("
. "id int AUTO_INCREMENT PRIMARY KEY,"
. "name char(32),"
. "comment TEXT,"
. "icon_add TEXT,"
. "im_add TEXT,"
. "video_add TEXT,"
. "now datetime"
.");";
$stmt = $pdo->query($sql);
if(!empty($_POST['comment']) or !empty($_FILES['up_image']) or !empty($_FILES['up_video']) ){
  $now = date("Y/m/d H:i:s");
  $name = $_SESSION['temp_user'];
  $icon = $_SESSION['temp_pic'];
  $comment = $_POST['comment'];
  $im_name = $_FILES['up_image']['name'];
  $im_tmpname = $_FILES['up_image']['tmp_name'];
  $imsave_food = 'imagefood/'.$im_name;
  $video_name = $_FILES['up_video']['name'];
  $video_tmpname = $_FILES['up_video']['tmp_name'];
  $videosave_food = 'videofood/'.$video_name;
  $sql = $pdo -> prepare("INSERT INTO keijibann_food7( name, comment, icon_add, im_add, video_add, now) VALUES( :name, :comment, :icon_add, :im_add, :video_add,  :now)");
  $sql-> bindParam(':name', $name, PDO::PARAM_STR);
  $sql-> bindParam(':comment', $comment, PDO::PARAM_STR);
  $sql-> bindParam(':icon_add', $icon, PDO::PARAM_STR);
  $sql-> bindParam(':im_add', $imsave_food, PDO::PARAM_STR);
  $sql-> bindParam(':video_add', $videosave_food, PDO::PARAM_STR);
  $sql-> bindParam(':now', $now, PDO::PARAM_STR);
  $sql-> execute();
  if(is_uploaded_file($im_tmpname)){
    if(move_uploaded_file($im_tmpname, $imsave_food)){
      //下二行はチェック用
      //echo $filename."をアップロードしました。";
      //echo '<p><img src="'.$filesave.'"/>';*/
    }
  }
  if(is_uploaded_file($video_tmpname)){
    if(move_uploaded_file($video_tmpname, $videosave_food)){
      //下二行はチェック用
      //echo $filename."をアップロードしました。";
      //echo '<p><img src="'.$filesave.'"/>';*/
    }
  }
  header('Location: food.php');
  exit();
}
$sql = 'select * from keijibann_food7 order by id desc';
$results = $pdo -> query($sql);
?>
<div id="wrapper">
<?php
foreach($results as $row){
  if ($row['name'] == $_SESSION['temp_user']){
    ?>
  <!--<div id="wrapper">-->
    <br><br><br>
  <div class="question_box">
    <p>
      <p class="name"><?php echo $row['name']; ?></p>
        <img src="<?php echo $row['icon_add']; ?>"  alt="<?php echo $row['name']; ?>" class="right-image"/>
  <?php
    if( basename($row['im_add']) != 'imagefood' ){
    ?>
    <p><img src="<?php echo $row['im_add'];?>" class="left-imageshow"/></p>
      <?php
    }
    if( basename($row['video_add']) != 'videofood' ){
      ?>
    <p><video controls><source src="<?php echo $row['video_add']; ?>"></video></p>
        <?php
      }
      if(!empty($row['comment'])){
       ?>
      <div id="arrow_question">
        <?php
        echo $row['comment'];
      }
        ?>
        </div>
      </p>
</div>
<?php
}else{
  ?>
  <div class="answer_box">
  <p>
    <p class="name" style="float:right;"><?php echo $row['name']; ?></p>
      <img src="<?php echo $row['icon_add']; ?>"  alt="<?php echo $row['name']; ?>" style="float:right;"/>
  <?php
    if(basename($row['im_add']) != 'imagefood'){ ?>
      <p><img src="<?php echo $row['im_add'];?>" class="right-imageshow" style="float:right;"/></p>
        <?php
      }
      if(basename($row['video_add']) != 'videofood'){
        ?>
        <p><video controls><source src="<?php echo $row['video_add']; ?>" style="float:right;"></video></p>
        <?php
      }elseif( !empty($row['comment']) ){
       ?>
       <div id="arrow_answer">
        <?php
        echo $row['comment'];
        ?>
        </div>
        <?php
      }
    ?>
  </p>
</div>
    <?php
  }
}
?>
</div>
</body>
</html>
