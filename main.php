<?php

$DBH = new PDO('mysql:host=localhost;dbname=database_name', $_ENV['username'], $_ENV['password']);
$DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$myCol = $_GET['myCol'];

$STH = $DBH->prepare("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA='myDB' AND TABLE_NAME='myTbl'");
$allowedList = $STH->fetchAll(PDO::FETCH_COLUMN);

# not considered sanitized by itself, must still do sprintf
if ( ! in_array($myCol, $allowedList)) {
  throw new Exception("BAD");
}

$SQL = sprintf("SELECT %s FROM myTbl", $myCol);

$STH = $DBH->prepare($SQL);
$STH->execute();

  
  
