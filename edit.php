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
    <div class="header">
      <a class="header_word"><?php echo $_SESSION['user']['name']; ?></a>
      <a href="article.php" class="header_word">首頁</a>
      <a href="wright.php" class="header_word">發文</a>
      <a href="logout.php" class="header_word">登出</a>  
    </div> 
    <p class="time_table">
      <?php echo getDateTime() ?>
    </p>
    <form action="update.php" method="post">
      <div class="title">
        <?php
        echo '<input type="text" name="title" class="text_title" value="' . $article['title'] . '">';
        ?>
      </div>
      <div class="content">
        <?php
        echo '<textarea name="content" class="text_content">' . $article['content'] . '</textarea>';
        ?>
      </div>
      <?php
      echo '<input type="hidden" name="id" value="' . $_REQUEST['id'] . '">';
      ?>
      <button type="submit" class="button">修改</button>
    </form>   
  </body>  
</html>