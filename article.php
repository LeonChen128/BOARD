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
    <title>留言板-首頁</title>
    <link rel="stylesheet" type="text/css" href="css/article.css">
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
    <?php
    echo '<div class="box">';
    if (isset($_POST['keyword'])) {
      $keyword = inputData($_POST['keyword']);
    }
    if (isset($keyword)) {
      foreach (searchArticle($keyword) as $articles) {
        echo '<div class="article_table">';
        echo '<b class="title_table">' . '<a href="content.php?id=' . $articles['id'] . '" class="link">' . $articles['title'] . '</a></b>';
        echo '<p class="content_table">' . '<a href="content.php?id=' . $articles['id'] . '" class="link2">' . $articles['content'] . '</a></p>';
        echo '<p class="author_text">' . $articles['author'] . '</p>';
        echo '<p class="date_text">' . $articles['date'] . '</p>';
        echo '</div>';
      }      
    } else {
      foreach (getArticle() as $articles) {  
        echo '<div class="article_table">';
        echo '<b class="title_table">' . '<a href="content.php?id=' . $articles['id'] . '" class="link">' . $articles['title'] . '</a></b>';
        echo '<p class="content_table">' . '<a href="content.php?id=' . $articles['id'] . '" class="link2">' . $articles['content'] . '</a></p>';
        echo '<p class="author_text">' . $articles['author'] . '</p>';
        echo '<p class="date_text">' . $articles['date'] . '</p>';
        echo '</div>';      
      }      
    }   
    echo '</div>';  
    ?>  
  </body>  
</html>