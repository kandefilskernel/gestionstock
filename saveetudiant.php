<?php
   session_start();
  
   @$F1=$_POST['T'];
   @$F2=$_POST['T1'];
   @$F3=$_POST['T2'];
   @$F4=$_POST['T3'];
   @$F5=$_POST['T4'];
   @$F6=$_POST['T5'];
   @$nomPhoto=$_FILES['photo']['name'];
   @$fichierTempon=$_FILES['photo']['tmp_name'];
   move_uploaded_file($fichierTempon,'./images/'.$nomPhoto);
   require_once("cn.php");
         $ins=$pdo->prepare("insert into etudiants(nom,promotion,filiere,genre,tel,anneaca,photo) values(?,?,?,?,?,?,?)");
            if($ins->execute(array($F1,$F2,$F3,$F4,$F5,$F6,$nomPhoto)))
               header("location:Netudiant.php");
?>