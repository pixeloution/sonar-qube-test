<?php

$DBH = new PDO('mysql:host=localhost;dbname=database_name', $_ENV['username'], $_ENV['password']);
$DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$myCol = $_GET['myCol'];
$allowedList = ['a','b'];

# not considered sanitized
# if (in_array($myCol, $allowedList)) {
#  $column = $myCol;
# }

# also not considered untainted, and very obviously wrong
# $column = $allowedList[array_search($myCol, $allowedList)];


$SQL = sprintf("SELECT %s FROM myTbl", $_GET['myCol']);

$STH = $DBH->prepare($SQL);
$STH->execute();

  
  
