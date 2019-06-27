<?php
session_start();
//※htdocsと同じ階層に「includes」を作成してfuncs.phpを入れましょう！
//include "../../includes/funcs.php";
include "funcs.php";

//1. Session Check
// sessChk();

// ここにキーワードがAJAXで飛んで来る予定
$s =$_POST["s"];

//２．データ登録SQL作成
$pdo = db_con();
$stmt = $pdo->prepare("SELECT * FROM gs_an_table WHERE  CONCAT(city,block,name,pref,age,mail) LIKE :s");
$stmt->bindvalue(":s", '%'.$s.'%' ); //％を前後に着けることで、あいまい検索になる。LIKEの場合は必須。
$status = $stmt->execute();

//３．データ表示
$view ='';
$view .= '<tr><th>No.</th><td>郵便番号</td><td>都道府県</td><td>市区町村</td>';
    if($_SESSION["kanri_flg"]=="1"){
        $view .= '<td>番地</td><td>氏名</td><td>年齢</td><td>電話番号</td><td>mail</td>';
    };
    $view .= '<td>職場駅</td><td>乗車時間</td><td>予算</td><td>広さ</td><td>間取り</td><td>その他</td>';

    if($_SESSION["kanri_flg"]=="1"){
        $view .= '<td>削除ボタン</td></tr>';
    };

if ($status == false) {
    sqlError($stmt);
} else {
    //Selectデータの数だけ自動でループしてくれる
    //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  

    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {

        $view .= '<tr><th>';
        $view .='<a href="detail.php?id=' . $result["id"] . '">';
        $view .=$result["id"].'</th><td>'.$result["postcode"].'</td><td>'.$result["pref"].'</td><td>'.$result["city"].'</td>';
        if($_SESSION["kanri_flg"]=="1"){
          $view .='<td>'.$result["block"].'</td><td>'.$result["name"].'</td><td>'.$result["age"].'</td><td>'.$result["phone"].'</td><td>'.$result["mail"].'</td>';
        }
        $view .='<td>'.$result["close"].'</td><td>'.$result["distance"].'</td><td>'.$result["budjet"].'</td><td>'.$result["width"].'</td><td>'.$result["madori"].'</td><td>'.$result["comment"].'</td>';
        $view .='</a><td>';
        $view .='<a href="delete.php?id=' . $result["id"] . '">';
        if($_SESSION["kanri_flg"]=="1"){
           $view .='[削除]'.'</td></tr>';
        $view .='</a>';
        }
    }
    echo $view;
}
?>

