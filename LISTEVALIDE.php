<?php
   session_start();
   if($_SESSION["autoriser"]!="oui"){
      header("location:index.php");
      exit();
   }
?>
<?php
    $code=$_GET['recu'];
    if($code=="")
    {
      $code1=$_GET['recu1'];
      include("BD2.php");
      $A2="NON OK";
      $sql=$pdo->prepare("UPDATE  paiement SET etat=?  WHERE recu=?");
      $params=array($A2,$code1);
      $sql->execute($params);
      header("location:ab.php");
   }
    else {
             
             include("BD2.php");
             
             $A2="OK";
             $sql=$pdo->prepare("UPDATE  paiement SET etat=?  WHERE recu=?");
             $params=array($A2,$code);
             $sql->execute($params);
             header("location:ab.php");
    }
     
 ?> 