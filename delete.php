<?php

include 'lib/define.php';
include 'lib/funcs.php';

if (!isset($_POST['id'])) {
  echo 'error';
  header('Refresh:3 url=article.php');
  exit();
}

if (deleteArticle($_POST['id'])) {
  echo '刪除失敗，請重新確認。將返回上一頁';
  header('Refresh:3 url=edit.php?=' . $_POST['id']);
  exit();
} else {
  echo '刪除成功！將返回頁面...';
  header('Refresh:3 url=article.php');
  exit();
}