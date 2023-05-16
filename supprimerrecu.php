<?php
  session_start();
  if($_SESSION["autoriser"]!="oui"){
     header("location:index.php");
     exit();
  }
  if(date("H")<18)
     $bienvenue="J".
     $_SESSION["prenomNom"].
     "";
  else
     $bienvenue="S".
     $_SESSION["prenomNom"].
     "";
?>
<?php
$erreur="";
$code=$_GET['recu'];
include("BD2.php");
require_once("cn.php");

$sql=$pdo->prepare("SELECT * FROM paiement WHERE recu=?");
$params=array($code);
$sql->execute($params);
$etudiants=$sql->fetch();
$K5=$etudiants['datepaiement'];
@$fils="OK";
$sels=$pdo->prepare("select datepaiement,etatdg from paiement where datepaiement=?  AND etatdg=?  limit 1");
$sels->execute(array($K5,$fils));
$tab1=$sels->fetchAll();
if(count($tab1)>0)
{
  $erreur="SVP TENTATIVE DE FRAUDE Toutes les informations de cette DATE ont été validées PAR LE DG!";
  header("location:listedepaie.php");
}  
else {

    $code=$_GET['recu'];
    require_once("cn.php");
    $sql=$pdo->prepare("DELETE FROM paiement WHERE recu=?");
    $params=array($code);
    $sql->execute($params);
    header("location:listedepaie.php");
}
   
?>