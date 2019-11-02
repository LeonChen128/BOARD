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
  $day = [
    '0' => '禮拜六',
    '1' => '禮拜日',
    '2' => '禮拜一',
    '3' => '禮拜二',
    '4' => '禮拜三',
    '5' => '禮拜四',
    '6' => '禮拜五',    
  ];
  return $day[date('I')];
}

function getDateTime() {
  date_default_timezone_set('Asia/Taipei');
  return date('Y年m月d日') . '  ' . getWeekDay() . '  ' . date('h:i:sa');
}
