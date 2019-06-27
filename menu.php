<nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">

      <?php if($_SESSION["kanri_flg"]=="2"){ ?>
      <a class="navbar-brand" href="list_user.php">登録内容</a>　
      <?php }else{ ?>
      <a class="navbar-brand" href="list.php">登録物件一覧</a>　
      <?php } ?>
      <?php if($_SESSION["kanri_flg"]=="1"){ ?>
          <a class="navbar-brand" href="user.php">ユーザー登録</a>　
          <a class="navbar-brand" href="user_list.php">ユーザー一覧</a>　
      <?php } ?>

      <a class="navbar-brand" href="logout.php">ログアウト</a>
      </div>
    </div>
  </nav>