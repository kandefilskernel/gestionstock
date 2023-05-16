<?php
 
//connection_database.php
 
$connect = new PDO('mysql:host=91.216.107.183;dbname=istam1531505', 'istam1531505', '6xka7e0o6p',[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
  ]);
 
?>