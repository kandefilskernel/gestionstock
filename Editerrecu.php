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
    $A1=$_POST["id1"];
    $A2=$_POST['id2'];
    $A3=$_POST['id3'];
    $A4=$_POST['id4'];
    $A5=$_POST['id5'];
    include("BD2.php");
    
    $sql=$pdo->prepare("SELECT * FROM paiement WHERE recu=?");
    $params=array($code);
    $sql->execute($params);
    $etudiants=$sql->fetch();
    $K5=$etudiants['datepaiement'];
    @$fils="OK";
    $sels=$pdo->prepare("select datepaiement,etatdg from paiement where datepaiement=?  AND etatdg=?  limit 1");
    $sels->execute(array($A4,$fils));
    $tab1=$sels->fetchAll();
    if(count($tab1)>0)
    {
          $erreur="SVP TENTATIVE DE FRAUDE Toutes les informations de cette DATE ont été validées PAR LE DG!";
          header("location:albertab.php");
    }  
    else {
    $sql=$pdo->prepare("UPDATE  paiement SET montant$=?, carnet=?, datepaiement=?,libelle=?  WHERE recu=?");
    $params=array($A2,$A3,$A4,$A5,$A1);
    $sql->execute($params);
    header("location:albertab.php");
   } 
 ?> 