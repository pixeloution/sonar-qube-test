<?php

$DBH = new PDO('mysql:host=localhost;dbname=database_name', $_ENV['username'], $_ENV['password']);
$DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$STH = $DBH->prepare("SELECT $myCol FROM myTbl WHERE id = 55");
$STH->execute();

  
  
