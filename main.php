<?php

$DBH = new PDO('mysql:host=localhost;dbname=database_name', $_ENV['username'], $_ENV['password']);
$DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$myCol = $_GET['myCol'];
$allowedList = ['a','b'];

# not considered sanitized
# if (in_array($myCol, $allowedList)) {
#  $column = $myCol;
# }

$column = $allowedList[array_search($myCol, $allowedList)];


$STH = $DBH->prepare("SELECT $column FROM myTbl WHERE id = 55");
$STH->execute();

  
  
