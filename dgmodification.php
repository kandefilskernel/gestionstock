<?php
   session_start();
   if($_SESSION["autoriser"]!="oui"){
      header("location:index.php");
      exit();
   }
?>
<?php
    $code=$_POST['T'];
    $A2="OK";
    include("BD2.php");
    $sql=$pdo->prepare("UPDATE  paiement SET etatdg=?  WHERE datepaiement=?");
    $params=array($A2,$code);
    $sql->execute($params);
    header("location:dg.php");
     
 ?> 