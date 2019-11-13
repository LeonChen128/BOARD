<html>
  <head>
    <meta http-equiv="Content-Language" content="zh-tw">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <title>留言板-登出</title>
    <link rel="stylesheet" type="text/css" href="css/article.css">
  </head>
  <body class="background">
    <script src="js/logout.js"></script>
    <div class="header">
      <a class="header_word"><?php include 'lib/funcs.php'; echo $_SESSION['user']['name']; ?></a>
      <a href="article.php" class="header_word" id="_home" onmouseover="over('_home');" onmouseout="out('_home');">首頁</a>
      <a href="wright.php" class="header_word" id="_wright" onmouseover="over('_wright');" onmouseout="out('_wright');">發文</a>
      <a href="logout.php" class="header_word" id="_logout" onmouseover="over('_logout');" onmouseout="out('_logout');">登出</a>   
    </div> 
    <p style="margin-left: 10px">確定要登出？</p>
    <a href="logout2.php" style="margin-left: 10px;text-decoration: none;">登出</a>
  </body>  
</html>