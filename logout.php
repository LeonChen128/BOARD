<html>
  <head>
    <meta http-equiv="Content-Language" content="zh-tw">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <title>留言板-首頁</title>
    <link rel="stylesheet" type="text/css" href="css/article.css">
  </head>
  <body class="background">
    <div class="header">
      <a class="header_word"><?php include 'lib/funcs.php'; echo $_SESSION['user']['name']; ?></a>
      <a href="article.php" class="header_word">首頁</a>
      <a href="wright.php" class="header_word">發文</a> 
      <a href="logout.php" class="header_word">登出</a>   
    </div> 
    <p style="margin-left: 10px">確定要登出？</p>
    <a href="logout2.php" style="margin-left: 10px;text-decoration: none;">登出</a>
  </body>  
</html>