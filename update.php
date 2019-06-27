<?php
session_start();
$postcode = $_POST["postcode"];
$pref = $_POST["pref"];
$city = $_POST["city"];
$block = $_POST["block"];
$name = $_POST["name"];
$age = $_POST["age"];
$phone = $_POST["phone"];
$mail = $_POST["mail"];
$close = $_POST["close"];
$distance = $_POST["distance"];
$budjet = $_POST["budjet"];
$width = $_POST["width"];
$madori = $_POST["madori"];
$comment = $_POST["comment"];
$id = $_POST["id"];
$kanri_flg = $_SESSION["kanri_flg"];

//2. DB接続します
include "funcs.php";
$pdo = db_con();

//３．データ登録SQL作成
// UPDATE分
$sql = "UPDATE gs_an_table SET postcode=:postcode, pref=:pref, city=:city, block=:block, name=:name, age=:age, phone=:phone, mail=:mail, close=:close, distance=:distance, budjet=:budjet, width=:width, madori=:madori, comment=:comment WHERE id=:id;";
$stmt = $pdo->prepare($sql);
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
$stmt->bindValue(':id', $id, PDO::PARAM_INT); 
$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
    sqlError($stmt);
} elseif($kanri_flg == '2') {
    redirect("list_user.php");
} else{
    redirect("list.php");
}

?>
