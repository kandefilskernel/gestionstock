<?php
   session_start();
   if($_SESSION["autoriser"]!="oui"){
      header("location:index.php");
      exit();
   }
   if(date("H")<18)
      $bienvenue="Bonjour ".
      $_SESSION["prenomNom"].
      " dans votre espace personnel";
   else
      $bienvenue="Bonsoir".
      $_SESSION["prenomNom"].
      " dans votre espace";
?>
<?php
    $code=$_GET['code'];
    require_once("cn.php");
    $sql=$pdo->prepare("DELETE FROM admin WHERE id=?");
    $params=array($code);
    $sql->execute($params);
    header("location:moncompte.php");
?>