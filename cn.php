<?php
    $host = '91.216.107.183';
    $dbname = 'istam1531505';
    $username = 'istam1531505';
    $password = '6xka7e0o6p';
 
  try {
  
         $conn ='mysql:host=91.216.107.183;dbname=istam1531505';
         $pdo= new PDO ($conn,'istam1531505','6xka7e0o6p');
        
    
      } catch (PDOException $e) {
  
         die("Impossible de se connecter à la base de données $dbname :" . $e->getMessage());
    
  }
?>