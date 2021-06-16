<?php

$DBH = new PDO('mysql:host=localhost;dbname=database_name', $_ENV['username'], $_ENV['password']);
$DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$myCol = $_GET['myCol'];
$allowedList = ['a','b'];

# not considered sanitized by itself, must still do sprintf
if (in_array($myCol, $allowedList)) {
  $column = $myCol;
}

$SQL = sprintf("SELECT %s FROM myTbl", $column);

$STH = $DBH->prepare($SQL);
$STH->execute();

  
  
