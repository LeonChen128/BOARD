<?php

include 'lib/define.php';
include 'lib/funcs.php';

if (!isset($_POST['title'], $_POST['content'], $_POST['id'])) {
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
$date    = insertDate();
$id      = $_POST['id'];

if (mb_strlen($title) > 30) {
  echo '標題字數超過30字，請重新修正。將返回上一頁...';
  header('Refresh:3 url=edit.php?id=' . $id);
  exit();
}

if ($title == "" || $content == "") {
  echo '欄位不得為空。將返回上一頁...';
  header('Refresh:3 url=edit.php?id=' . $id);
  exit();
}

if (updateArticle($title, $content, $date, $id)) {
  echo '修改成功！將返回頁面...';
  header('Refresh:3 url=content.php?id=' . $id);
  exit();
} else {
  echo '修改失敗！將返回上一頁...';
  header('Refresh:3 url=edit.php?id=' . $id);
  exit();
}

