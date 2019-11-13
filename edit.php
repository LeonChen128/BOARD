<?php

include 'lib/define.php';
include 'lib/funcs.php';

if (!isset($_REQUEST['id'])) {
  if (isset($_SESSION['user'])) {
    echo 'error';
    header('Refresh:3 url=article.php');
    exit();
  } else {
    echo 'error';
    header('Refresh:3 url=index.php');
    exit();
  }
}

foreach (getArticle($_REQUEST['id']) as $article){ 
}
?>






<html>
  <head>
    <meta http-equiv="Content-Language" content="zh-tw">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <title>留言板-內文編輯</title>
    <link rel="stylesheet" type="text/css" href="css/edit.css">
  </head>
  <body class="background">
    <script src="js/update.js"></script>
    <div class="header">
      <a class="header_word"><?php echo $_SESSION['user']['name']; ?></a>
      <a href="article.php" class="header_word" id="_home" onmouseover="over('_home');" onmouseout="out('_home');">首頁</a>
      <a href="wright.php" class="header_word" id="_wright" onmouseover="over('_wright');" onmouseout="out('_wright');">發文</a>
      <a href="logout.php" class="header_word" id="_logout" onmouseover="over('_logout');" onmouseout="out('_logout');">登出</a>    
    </div> 
    <p class="time_table">
      <?php echo getDateTime() ?>
    </p>  
    <form action="update.php" method="post">
      <div class="title">
        <?php
        echo '<input type="text" name="title" id="_title" class="text_title" value="' . $article['title'] . '">';
        ?>
      </div>
      <div class="content">
        <?php
        echo '<textarea name="content" id="_content" class="text_content">' . $article['content'] . '</textarea>';
        ?>
      </div>
      <?php
      echo '<input type="hidden" name="id" value="' . $_REQUEST['id'] . '">';
      ?>
      <button type="submit" class="button" onclick="return checkUpdate();">修改</button>
    </form>  
    <form action="delete.php" method="post">
      <?php
      echo '<input type="hidden" name="id" value="' . $_REQUEST['id'] . '">';
      ?>
      <button type="submit" class="button_del">刪除文章</button>
    </form> 
  </body>  
</html>