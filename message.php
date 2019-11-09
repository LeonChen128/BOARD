<?php

include 'lib/define.php';
include 'lib/funcs.php';

if (!isset($_POST['message'])) {
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

foreach (getArticle($_POST['id']) as $content ){
}

$author     = $_SESSION['user']['name'];
$content    = inputData($_POST['message']);
$date       = insertDate();
$article_id = $_POST['id'];

if (mb_strlen($content) > 20) {
  echo '字數有誤，請重新確認。將返回上一頁...';
  header('Refresh:3 url=content.php?id=' . $_POST['id']);
  exit();
}

if (insertMessage($author, $content, $date, $article_id)) {
  echo '留言成功！即將返回頁面...';
  header('Refresh:3 url=content.php?id=' . $_POST['id']);
  exit();
} else {
  echo '留言失敗！即將返回頁面...';
  header('Refresh:3 url=content.php?id=' . $_POST['id']);
  exit();  
}






