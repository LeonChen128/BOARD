<?php
include 'lib/define.php';
include 'lib/funcs.php';

if (!isset($_SESSION['user']['name'])) {
  echo 'error';
  header('Refresh:3 url=index.php');
  exit();
}
?>





<html>
  <head>
    <meta http-equiv="Content-Language" content="zh-tw">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <title>留言板-發文</title>
    <link rel="stylesheet" type="text/css" href="css/wright.css">
  </head>
  <body class="background">
    <script src="js/wright.js"></script>
    <div class="header">
      <a class="header_word"><?php echo $_SESSION['user']['name']; ?></a>
      <a href="article.php" class="header_word">首頁</a>
      <a href="wright.php" class="header_word">發文</a>
      <a href="logout.php" class="header_word">登出</a>  
    </div> 
    <p class="time_table">
      <?php echo getDateTime() ?>
    </p>
    <form action="wright2.php" method="post">
      <div class="title">
        <input type="text" name='title' id="_title" placeholder="請填寫標題...(限於30字內)" class="text_title">
      </div>
      <div class="content">
        <textarea name="content" id="_content" placeholder="請填寫內容..." class="text_content"></textarea>
      </div>
      <button type="submit" class="button" onclick="return checkWright();">送出</button>
    </form> 
  </body>  
</html>