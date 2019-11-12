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

foreach (getArticle($_REQUEST['id']) as $content) {
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
    <script src="js/content.js"></script>
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
        <?php
        echo $content['title'];
        if ($_SESSION['user']['name'] == $content['author']) {
          echo '<a href="edit.php?id=' . $content['id'] . '" class="edit">編輯</a><br>';
        } else {
          echo '<br>';
        }
        echo $content['author'] . '<br>';
        echo $content['date'];
        ?>    
    </div>
    <div class="content_table">
      <?php echo $content['content'];?><br><br><br>
    </div>
    <?php
    foreach (getMessage($_REQUEST['id']) as $messages) {
      echo '<div class="message_display">';
      echo '<div class="message1">' . $messages['author'] . '：</div>';
      echo '<div class="message2">' . $messages['content'] . '</div>';
      echo '<div class="message3">' . $messages['date'] . '</div>';
      echo '</div>';
    }
    ?>  
    <div class="message_table">
      <form action="message.php" method="post">
        <input type="text" name="message" id="_message" placeholder="留言...(限於20字內)" class="input_message">
        <?php echo '<input type="hidden" name="id" value="' . $_REQUEST['id'] . '">';?>
        <button type="submit" class="button_message" onclick="return checkMessage();">留言</button>
      </form>
    </div>      
  </body>  
</html>