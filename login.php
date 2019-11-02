<?php

include 'lib/define.php';
include 'lib/funcs.php';

$account  = inputData($_POST['account']);
$password = inputData($_POST['password']);  

if (checkLogin($account, $password)) {
  echo '歡迎回來，親愛的' . $_SESSION['user']['name'] . '。即將返回首頁...';
  header('Refresh:3 url=article.php');
} else {
  echo '登入失敗，請重新確認帳號密碼是否輸入錯誤。即將返回登入畫面...';
  header('Refresh:3 url=index.php');
}

