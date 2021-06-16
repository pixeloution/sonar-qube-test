<?php

$DBH = new PDO('mysql:host=localhost;dbname=database_name', $_ENV['username'], $_ENV['password']);
$DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$myCol = $_GET['myCol'];

function isValidColumn($col) {
        $STH = $DBH->prepare("SELECT column_name
                FROM information_schema.columns
                WHERE
                    table_schema = '3862_amrjst'
                    AND column_name = ?");
        $STH->execute([$col]);
        $results = $STH->fetchAll(PDO::FETCH_COL); 

        return in_array($col, $results);
}


# not considered sanitized by itself, must still do sprintf
if ( ! isValidColumn($col)) {
  throw new Exception("BAD");
}

$cleanCol = sprintf('%s', $myCol);

$SQL = sprintf("SELECT %s FROM myTbl WHERE someColumn = ?", $myCol);

$STH = $DBH->prepare($SQL, [$myCol]);
$STH->execute();

  
  
