<?php

include 'lib/define.php';
include 'lib/funcs.php';

if (!isset($_POST['name'], $_POST['account'], $_POST['password'], $_POST['repassword'])) {
  echo '資料錯誤!將返回登入頁面...';
  header('Refresh:3 url=index.php');
  exit();
}

$name       = inputData($_POST['name']);
$account    = inputData($_POST['account']);
$password   = inputData($_POST['password']);
$repassword = inputData($_POST['repassword']);

if (empty($name && $account && $password && $repassword)) {
  echo '註冊欄位不可空白！請重新輸入。將返回註冊畫面...';
  header('Refresh:3 url=register.php');
  exit();
}

if ($password !== $repassword) {
  echo '密碼不一致！請重新確認。將返回註冊畫面...';
  header('Refresh:3 url=register.php');
  exit ();
}

if (checkName($name)) {
  echo '名稱已重複！請更換另一個。將返回註冊畫面...';
  header('Refresh:3 url=register.php');
  exit();
}
if (checkAccount($account)) {
  echo '帳號已重複！請更換另一個。將返回註冊畫面...';
  header('Refresh:3 url=register.php');
  exit();
}

if (insertAccount($name, $account, $password)) {
  echo '註冊成功！即將返回登入畫面...';
  header('Refresh:3 url=index.php');
} else {
  echo '連線錯誤，註冊失敗，請再重新註冊。即將返回註冊畫面...';
  header('Refresh:3 url=register.php');
}


