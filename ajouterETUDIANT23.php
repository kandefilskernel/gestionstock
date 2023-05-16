<?php
   @$A1=$_POST['TT1'];
   @$A2=$_POST['TT2'];
   @$A3=$_POST['TT3'];
   @$A4=$_POST['TT4'];
   @$A5=$_POST['TT5'];
   @$A6=$_POST['TT6'];
  include("BD2.php");
 // $ps=$pdo->prepare("insert into  etudiant(nomcomplet,promotion,departement,tel,Genre,AnneeAc) values (?,?,?,?,?,?)");
  $ins=$pdo->prepare("insert into etudiant(nomcomplet,promotion,departement,tel,Genre,AnneeAc) values(?,?,?,?,?,?)");
  if($ins->execute(array($A1,$A2,$A3,$A4,$A5,$A6)))
     {
         echo("ok");
     }
  //header("location:ajouteretudiant.php");
?>