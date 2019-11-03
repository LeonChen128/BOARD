<?php
include 'lib/define.php';
include 'lib/funcs.php';
?>





<html>
  <head>
    <meta http-equiv="Content-Language" content="zh-tw">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <title>留言板-首頁</title>
    <link rel="stylesheet" type="text/css" href="css/article.css">
  </head>
  <body class="background">
    <div class="header">
      <a href="article.php" class="header_word">首頁</a>
      <a href="logout.php" class="header_word">登出</a>
      <a class="header_word"><?php echo $_SESSION['user']['name']; ?></a>
      <a href="wright.php" class="header_word">發文</a>    
    </div> 
    <p class="time_table">
      <?php echo getDateTime() ?>
    </p>
    <?php
    echo '<div class="box">';
    foreach (getArticle() as $articles) {  
      echo '<div class="article_table">';
      echo '<b class="title_table">' . '<a href="content.php?id=' . $articles['id'] . '" class="link">' . $articles['title'] . '</a></b>';
      echo '<p class="content_table">' . '<a href="content.php?id=' . $articles['id'] . '" class="link2">' . $articles['content'] . '</a></p>';
      echo '<p class="author_text">' . $articles['author'] . '</p>';
      echo '<p class="date_text">' . $articles['date'] . '</p>';
      echo '</div>';      
    }
    echo '</div>';  

    ?>  
  </body>  
</html>