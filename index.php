<html lang="zh-hant">
  <head>
    <meta http-equiv="Content-Language" content="zh-tw">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <title>留言板-登入</title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
  </head>
  <body class="background">
    <script src="js/login.js"></script>
    <div class="header">
      <a href="index.php" class="header_word">登入</a>
      <a href="register.php" class="header_word">註冊</a>
    </div>  
    <form action="login.php" method="post" class="form_card">
      <p>登入：</p>
      <div>
        <input type="text" name="account" id="_account" placeholder="請輸入帳號..." class="input_text">
      </div>
      <div>  
        <input type="password" name="password" id="_password" placeholder="請輸入密碼..." class="input_password">
      </div>
      <div>
        <button type="submit" class="button" onclick="return checkLogin();">登入</button>
      </div>  
      <p>還不是會員</p>
      <p><a href="register.php" class="member">加入會員</a> 
    </form>   
  </body>  
</html>