<?php

function newPDO() {
  try {
    return new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PSWD);
  } catch (PDOException $e) {
    return null;
  }
}

function inputData($text) {
  return htmlspecialchars(trim($text));
}


function checkName ($name) {
  $pdo = newPDO();
  if (!$pdo) {
    return null;
  }

  try {
    $sql = $pdo->prepare('SELECT * FROM User');
    $sql->execute();
    foreach ($sql->fetchAll() as $row) {
    }
    return in_array($name, $row['name']);
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
  } catch (PDOException $e) {
    return [];
  }
}