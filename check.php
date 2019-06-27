<html>

<?php
include("funcs.php");
session_start();


$_SESSION['postcode'] = $_POST["postcode"];
$_SESSION["pref"] = $_POST["pref"];
$_SESSION["city"] = $_POST["city"];
$_SESSION["block"] = $_POST["block"];
$_SESSION["name"] = $_POST["name"];
$_SESSION["age"] = $_POST["age"];
$_SESSION["phone"] = $_POST["phone"];
$_SESSION["mail"] = $_POST["mail"];
$_SESSION["close"] = $_POST["close"];
$_SESSION["distance"] = $_POST["distance"];
$_SESSION["budjet"] = $_POST["budjet"];
$_SESSION["width"] = $_POST["width"];
$_SESSION["madori"] = $_POST["madori"];
$_SESSION["comment"] = $_POST["comment"];

// $name = $_SESSION['name'];
// echo $name;

$postcode = $_SESSION["postcode"];
$pref = $_SESSION["pref"];
$city = $_SESSION["city"];
$block = $_SESSION["block"];
$name = $_SESSION["name"];
$age = $_SESSION["age"];
$phone = $_SESSION["phone"];
$mail = $_SESSION["mail"];
$close = $_SESSION["close"]
$distance = $_SESSION["distance"];
$budjet = $_SESSION["budjet"];
$width = $_SESSION["width"];
$madori = $_SESSION["madori"];
$comment = $_SESSION["comment"];

?>

<head>
<meta charset="utf-8">
<title>入力内容確認</title>
</head>

<header>
    <?php echo $_SESSION["name"]; ?>さん　
    <?php include("menu.php"); ?>
</header>

<body>
入力内容を確認してください。<br>
<?=
"郵便番号：".h("$postcode")."<br>".
"都道府県：".h("$pref")."<br>".
"市区町村：".h("$city")."<br>".
"番地：".h("$block")."<br>".
"氏名：".h("$name")."<br>".
"年齢：".h("$age")."<br>".
"電話番号：".h("$phone")."<br>".
"メールアドレス：".h("$mail")."<br><br>".
"ご希望の条件<br>".
"職場最寄り駅：".h("$close")."<br>".
"職場最寄り駅までの乗車時間：".h("$distance")."<br>".
"予算：".h("$budjet")."<br>".
"広さ：".h("$width")."<br>".
"間取り：".h("$madori")."<br>".
"その他：".h("$comment")."<sbr>";
?>

<ul>
<li><a href="write.php">登録</a></li>
<li><a href="post.php">戻る</a></li>
</ul>
</body>
</html>