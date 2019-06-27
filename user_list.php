<?php
session_start();

//1.外部ファイル読み込み＆DB接続
//※htdocsと同じ階層に「includes」を作成してfuncs.phpを入れましょう！
//include "../../includes/funcs.php";
include "funcs.php";
sessChk();
$pdo = db_con();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table");
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
    sqlError($stmt);
} else {
    //Selectデータの数だけ自動でループしてくれる
    //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= '<tr><th>';
        $view .= '<a href="user_detail.php?id='.$result["id"].'">';
        $view .= $result["id"] . '</th><td>' . $result["name"] .'</td><td>' . $result["lid"] .'</td><td>' . $result["kanri_flg"] .'</td><td>' . $result["life_flg"].'</td>';
        $view .= '</a>';
        $view .= '  ';
        $view .= '<td><a href="user_delete.php?id='.$result["id"].'">';
        $view .= '[ 削除 ]';
        $view .= '</a></td>';
    }

}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>USER表示</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/style.css">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
    <?php echo $_SESSION["name"]; ?>さん　
    <?php include("menu.php"); ?>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->

    <h1>ユーザー一覧</h1>

<table id="list">
            <!-- ここに追加データが挿入される -->
            <tr><th>No.</th><td>名前</td><td>ユーザーID</td>
            <?php if($_SESSION["kanri_flg"]=="1"){ ?>
                <td>管理者フラグ</td><td>稼働フラグ</td><td>削除ボタン</td>
            <?php } ?>
            </tr>
            <div><?=$view?></div>


</table>

<!-- Main[End] -->

</body>
</html>
