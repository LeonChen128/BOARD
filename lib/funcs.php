<?php

session_start();

function newPDO() {
  try {
    return new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PSWD);
  } catch (PDOException $e) {
    return null;
  }
}

function inputData($text) {
  return htmlspecialchars(trim($text));
}

function checkAccount ($account) {
  $pdo = newPDO();
  if (!$pdo) {
    return null;
  }

  try {
    $sql = $pdo->prepare('SELECT * FROM User');
    $sql->execute();
    $result = [];
    foreach ($sql->fetchAll() as $row) {
    $result[] = $row['account'];
    }
    return in_array($account, $result);
  } catch (PDOException $e) {
      return [];
  }
}

function checkName ($name) {
  $pdo = newPDO();
  if (!$pdo) {
    return null;
  }

  try {
    $sql = $pdo->prepare('SELECT * FROM User');
    $sql->execute();
    $result = [];
    foreach ($sql->fetchAll() as $row) {
    $result[] = $row['name'];
    }
    return in_array($name, $result);
  } catch (PDOException $e) {
      return [];
  }
}



function insertAccount($name, $account, $password) {
  $pdo = newPDO();
  if (!$pdo) {
    return [];
  }
  try {
    $sql = $pdo->prepare('INSERT INTO User VALUES(null, ?, ?, ?)');
    $sql->execute([$name, $account, $password]);
    $sql = $pdo->prepare('SELECT * FROM User WHERE name = ?');
    $sql->execute([$name]);
    return $sql->fetchAll();
  } catch (PDOException $e) {
    return [];
  }
}

function checkLogin ($account, $password) {
  $pdo = newPDO();
  if (!$pdo) {
    return [];
  }
  try {
    $sql = $pdo->prepare('SELECT * FROM User WHERE account = ? AND password = ?');
    $sql->execute([$account, $password]);
    unset($_SESSION['user']);
    $_SESSION['user'] = [];
    foreach ($sql->fetchAll() as $row) {
      $_SESSION['user'] = [
        'id'       => $row['id'],
        'name'     => $row['name'],
        'account'  => $row['account'],
        'password' => $row['password']
      ];
    }
    return $_SESSION['user'];
  } catch (PDOException $e) {
    return [];
  }
}

function getWeekDay() {
  date_default_timezone_set('Asia/Taipei');  
  $day = [
    'Saturday'  => '禮拜六',
    'Sunday'    => '禮拜日',
    'Monday'    => '禮拜一',
    'Tuesday'   => '禮拜二',
    'Wednesday' => '禮拜三',
    'Thursday'  => '禮拜四',
    'Friday'    => '禮拜五',    
  ];
  return $day[date('l')];
}

function getDateTime() {
  date_default_timezone_set('Asia/Taipei');
  return date('Y年m月d日') . '  ' . getWeekDay() . '  ' . date('h:i:sa');
}

function insertDate() {
  date_default_timezone_set('Asia/Taipei');
  return date('Y/m/d h:i a');
}

function getAllArticle() {
  $pdo = newPDO();
  if (!$pdo) {
    return [];
  }
  try {
    $sql = $pdo->prepare('SELECT * FROM Article');
    $sql->execute();
    return $sql->fetchAll();
  } catch (PDOException $e) {
    return [];
  }
}

function searchArticle($keyword) {
  $pdo = newPDO();
  if (!$pdo) {
    return [];
  }
  try {
    $sql = $pdo->prepare('SELECT * FROM Article WHERE title like ?');
    $sql->execute(['%' . $keyword . '%']);
    return $sql->fetchAll();
  } catch (PDOException $e) {
    return [];
  }
}

function insertArticle($title, $content, $author, $date) {
  $pdo = newPDO();
  if (!$pdo) {
    return []; 
  }
  try {
    $sql = $pdo->prepare('INSERT INTO Article VALUES(null, ?, ?, ?, ?)');
    $sql->execute([$title, $content, $author, $date]);
    $sql = $pdo->prepare('SELECT * FROM Article WHERE title = ? AND content = ? AND author = ? AND date = ?');
    $sql->execute([$title, $content, $author, $date]);
    return $sql->fetchAll();
  } catch (PDOException $e) {
    return [];
  }
}

function getArticle($id) {
  $pdo = newPDO();
  if (!$pdo) {
    return [];
  }
  try {
    $sql = $pdo->prepare('SELECT * FROM Article WHERE id = ?');
    $sql->execute([$id]);
    return $sql->fetchAll();
  } catch (PDOException $e) {
    return [];
  }
}

function insertMessage($author, $content, $date, $article_id) {
  $pdo = newPDO();
  if (!$pdo) {
    return [];
  }
  try {
    $sql = $pdo->prepare('INSERT INTO Message VALUES(null, ?, ?, ?, ?)');
    $sql->execute([$author, $content, $date, $article_id]);
    $sql = $pdo->prepare('SELECT * FROM Message WHERE author = ? AND content = ? AND date = ? AND article_id = ? ');
    $sql->execute([$author, $content, $date, $article_id]);
    return $sql->fetchAll();    
  } catch (PDOException $e) {
    return [];
  } 
}

function getMessage($article_id) {
  $pdo = newPDO();
  if (!$pdo) {
    return [];
  }
  try {
    $sql = $pdo->prepare('SELECT * FROM Message WHERE article_id = ?');
    $sql->execute([$article_id]);
    return $sql->fetchAll();
  } catch (PDOException $e) {
    return [];
  } 
}

function updateArticle($title, $content, $date, $id) {
  $pdo = newPDO();
  if(!$pdo) {
    return [];
  }
  try {
    $sql = $pdo->prepare('UPDATE Article SET title=?, content=?, date=? WHERE id=?');
    $sql->execute([$title, $content, $date, $id]);
    $sql = $pdo->prepare('SELECT * FROM Article WHERE title=? AND content=? AND date=? AND id=?');
    $sql->execute([$title, $content, $date, $id]);
    return $sql->fetchAll();
  } catch (PDOException $e) {
    return [];
  }
}
