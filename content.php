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

if (!isset($_SESSION['user'])) {
  echo '請先登入，將返回登入畫面...';
  header('Refresh:3 url=index.php');
  exit();
}

foreach (getContent($_REQUEST['id']) as $content) {

}


?>







<html>
  <head>
    <meta http-equiv="Content-Language" content="zh-tw">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <title>留言板-內文</title>
    <link rel="stylesheet" type="text/css" href="css/content.css">
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
    <div class="search">
      <form action="article.php" method="post">
        <p class="search_title">收尋文章：</p>
        <?php
        if (isset($_POST['keyword'])) {
          echo '<input type="text" name="keyword" value="' . inputData($_POST['keyword']) . '" class="input_text">';
        } else {
          echo '<input type="text" name="keyword" placeholder="請輸入關鍵字..." class="input_text">';
        }
        ?>
        <button type="submit" class="button">收尋</button>
      </form> 
    </div>
    <br>
    <div class="title">
      標題<br>
      作者<br>
      日期
    </div> 
    <div class="title_content">
        <?php echo $content['title'] . '<br>';?>
        <?php echo $content['author'] . '<br>';?>
        <?php echo $content['date'];?>    
    </div>
    <div class="content_table">
      <?php echo $content['content'];?><br><br>
    </div>  
  </body>  
</html>