<html lang="zh-hant">
  <head>
    <meta http-equiv="Content-Language" content="zh-tw">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <title>留言板-註冊</title>
    <link rel="stylesheet" type="text/css" href="css/register.css">
  </head>
  <body class="background">
    <script src="js/register.js"></script>
    <div class="header">
      <a href="index.php" class="header_word" id="_login" onmouseover="over('_login');" onmouseout="out('_login');">登入</a>
      <a href="register.php" class="header_word" id="_register" onmouseover="over('_register');" onmouseout="out('_register');">註冊</a>
    </div>  
    <form action="register2.php" method="post" class="form_card">
      <p>會員註冊：</p>
      <div>
        <input type="text" name="name" id="_name" placeholder="請輸入名稱...(限於10字內)" class="input_text">
      </div>
      <div>  
        <input type="text" name="account" id="_account" placeholder="請輸入帳號...(限於12字內)" class="input_password">
      </div>
      <div>  
        <input type="password" name="password" id="_password" placeholder="請輸入密碼...(限於12字內)" class="input_password">
      </div>
      <div>  
        <input type="password" name="repassword" id="_repassword" placeholder="再一次輸入密碼..." class="input_password">
      </div>
      <div>
        <button type="submit" class="button" onclick="return checkRegister();">註冊</button>
      </div>   
    </form>   
  </body>  
</html>