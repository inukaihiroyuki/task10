<?php
$id = $_GET["id"];

include "funcs.php";
// データベースを取得。
$pdo = db_con();

//２．データ削除のSQL作成  :idはバインド変数と呼ばれている。
$stmt = $pdo->prepare("DELETE FROM gs_an_table WHERE id=:id"); //指定したidの人のデータだけ引っ張ることができる。
$stmt -> bindvalue(":id", $id, PDO::PARAM_INT); //第三変数を指定することで型を制限でき、セキュリティ向上
$status = $stmt->execute();

if ($status == false) {
    sqlError($stmt);
}else {
    redirect("list.php");
}

?>