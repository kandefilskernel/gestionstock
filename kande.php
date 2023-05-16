<?php
   session_start();
   if($_SESSION["autoriser"]!="oui"){
      header("location:index.php");
      exit();
   }
?>
<?php
    $code=$_POST['T'];
    include("BD2.php");
    if($code==""){
         $code1=$_POST['T1'];
         $A2="NON OK";
         include("BD2.php");
         $sql=$pdo->prepare("UPDATE  paiement SET etat=?  WHERE datepaiement=?");
         $params=array($A2,$code1);
         $sql->execute($params);
         header("location:ab.php");
   }
   else 
   {
      $A2="OK";
      $sql=$pdo->prepare("UPDATE  paiement SET etat=?  WHERE datepaiement=?");
      $params=array($A2,$code);
      $sql->execute($params);
       header("location:ab.php");
   }
     
 ?>
