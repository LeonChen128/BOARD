<?php

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