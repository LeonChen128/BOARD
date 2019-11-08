<?php

include 'lib/funcs.php';
include 'lib/define.php';

if (!isset($_POST['title'], $_POST['content'])) {
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

$title   = inputData($_POST['title']);
$content = inputData($_POST['content']);
$author  = $_SESSION['user']['name'];
$date    = insertDate();

if ($title && $content) {
  if (insertArticle($title, $content, $author, $date)) {
    echo '發文成功，即將返回首頁...';
    header('Refresh:3 url=article.php');
  } else {
    echo '發文失敗，即將返回首頁...';
    header('Refresh:3 url=article.php');
  }
} else {
  echo '標題＆內文不得為空，即將返回上一頁...';
  header('Refresh:3 url=wright.php');
}



