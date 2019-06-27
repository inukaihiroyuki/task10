<html>

<?php

include("funcs.php");
session_start();

$postcode = $_SESSION["postcode"];
$pref = $_SESSION["pref"];
$city = $_SESSION["city"];
$block = $_SESSION["block"];
$name = $_SESSION["name"];
$age = $_SESSION["age"];
$phone = $_SESSION["phone"];
$mail = $_SESSION["mail"];
$close = $_SESSION["close"];
$distance = $_SESSION["distance"];
$budjet = $_SESSION["budjet"];
$width = $_SESSION["width"];
$madori = $_SESSION["madori"];
$comment = $_SESSION["comment"];

?>

<head>
<meta charset="utf-8">
<title>File書き込み</title>
</head>
<body>
ご登録ありがとうございます。<br>

<?php

//2. DB接続します
try {
    $pdo = new PDO('mysql:dbname=gs_re;charset=utf8;host=localhost','root','');
  } catch (PDOException $e) {
    exit('データベースに接続できませんでした。'.$e->getMessage());
  }
  

//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_an_table(id, postcode, pref, city, block, name, age, phone, mail, close, distance, budjet, width, madori, comment )
VALUES(NULL, :postcode, :pref, :city, :block, :name, :age, :phone, :mail, :close, :distance, :budjet, :width, :madori, :comment)");
$stmt->bindValue(':postcode', $postcode, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT) :は格納場所、＄は変数名
$stmt->bindValue(':pref', $pref, PDO::PARAM_STR);  
$stmt->bindValue(':city', $city, PDO::PARAM_STR); 
$stmt->bindValue(':block', $block, PDO::PARAM_STR);
$stmt->bindValue(':name', $name, PDO::PARAM_STR); 
$stmt->bindValue(':age', $age, PDO::PARAM_INT);
$stmt->bindValue(':phone', $phone, PDO::PARAM_STR);
$stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
$stmt->bindValue(':close', $close, PDO::PARAM_STR);
$stmt->bindValue(':distance', $distance, PDO::PARAM_INT); 
$stmt->bindValue(':budjet', $budjet, PDO::PARAM_INT); 
$stmt->bindValue(':width', $width, PDO::PARAM_INT); 
$stmt->bindValue(':madori', $madori, PDO::PARAM_STR); 
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);  
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //５．index.phpへリダイレクト　この処理がないと画面が切り替わらない
  header("Location: list.php");
  exit;
}
// セッションを破棄
session_destroy();
?>



<ul>
<li><a href="post.php">戻る</a></li>
</ul>
</body>
</html>