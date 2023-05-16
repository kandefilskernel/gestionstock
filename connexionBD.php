<?php
    $host = '91.216.107.183';
    $dbname = 'istam1531505';
    $username = 'istam1531505';
    $password = '6xka7e0o6p';
 
  try {
  
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    echo "Connecté à $dbname sur $host avec succès.";
    
  } catch (PDOException $e) {
  
    die("Impossible de se connecter à la base de données $dbname :" . $e->getMessage());
    
  }
?>
