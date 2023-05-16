<?php
   session_start();
   if($_SESSION["autoriser"]!="oui"){
      header("location:index.php");
      exit();
   }
?>
<?php
        $A1=$_POST["id1"];
        @$A2=$_POST['id2'];
        include("BD2.php");
        $sql=$pdo->prepare("UPDATE  utilisateurs SET  pass=?   WHERE id=?");
        $params=array(md5($A2),$A1);
        $sql->execute($params);
        header("location:listeuser.php");
 ?> 