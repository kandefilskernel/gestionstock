<?php
   try{
      $pdo=new PDO("mysql:host=91.216.107.183;dbname=istam1531505","istam1531505","6xka7e0o6p");
   }
   catch(PDOException $e){
      echo $e->getMessage();
   }
?>