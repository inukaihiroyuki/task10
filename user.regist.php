<?php
session_start();
//※htdocsと同じ階層に「includes」を作成してfuncs.phpを入れましょう！
//include "../../includes/funcs.php";
include "funcs.php";
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>USERデータ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>

</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="user_insert.1.php">
  <div class="jumbotron">
   <fieldset>
    <legend>ユーザー登録</legend>
     <label>名前：<input type="text" name="name"></label><br>
     <label>Login ID：<input type="text" name="lid"></label><br>
     <label>Login PW<input type="text" name="lpw"></label><br>
     <br>
     <!-- <label>退会FLG：<input type="text" name="life_flg"></label><br> -->
     <input type="submit" value="送信">
     <a class="navbar-brand" href="login.php">ログイン画面に戻る</a>
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
