<?php
   session_start();
   @$login=$_POST["login"];
   @$pass=(md5($_POST["pass"]));
   @$valider=$_POST["valider"];
   $erreur="";
   
   if(isset($valider)){
      include("BD2.php");
      $sel=$pdo->prepare("select * from admin where login=? and pass=? limit 1");
      $sel->execute(array($login,$pass));
      $tab=$sel->fetchAll();
      if(count($tab)>0){
         $_SESSION["prenomNom"]=ucfirst(strtolower($tab[0]["prenom"])).
         " ".strtoupper($tab[0]["nom"]);
         $_SESSION["autoriser"]="oui";
         header("location:ab.php");
         exit();
      }
      else
         $erreur="Mauvais login ou mot de passe!";
   }
?>
<?php
   session_start();
   @$login=$_POST["login"];
   @$pass=md5($_POST["pass"]);
   @$valider=$_POST["valider"];
   $erreur="";
   
   if(isset($valider)){
      include("BD2.php");
      $sel=$pdo->prepare("select * from dif where login=? and pass=? limit 1");
      $sel->execute(array($login,$pass));
      $tab=$sel->fetchAll();
      if(count($tab)>0){
         $_SESSION["prenomNom"]=ucfirst(strtolower($tab[0]["prenom"])).
         " ".strtoupper($tab[0]["nom"]);
         $_SESSION["autoriser"]="oui";
         header("location:dif.php");
         exit();
      }
      else
         $erreur="Mauvais login ou mot de passe!";
   }
?>
<?php
   session_start();
   @$login=$_POST["login"];
   @$pass=md5($_POST["pass"]);
   @$valider=$_POST["valider"];
   $erreur="";
   
   if(isset($valider)){
      include("BD2.php");
      $sel=$pdo->prepare("select * from academique where login=? and pass=? limit 1");
      $sel->execute(array($login,$pass));
      $tab=$sel->fetchAll();
      if(count($tab)>0){
         $_SESSION["prenomNom"]=ucfirst(strtolower($tab[0]["prenom"])).
         " ".strtoupper($tab[0]["nom"]);
         $_SESSION["autoriser"]="oui";
         header("location:dossieracademique.php");
         exit();
      }
      else
         $erreur="Mauvais login ou mot de passe!";
   }
?>
<?php
   session_start();
   @$login=$_POST["login"];
   @$pass=md5($_POST["pass"]);
   @$valider=$_POST["valider"];
   $erreur="";
   
   if(isset($valider)){
      include("BD2.php");
      $sel=$pdo->prepare("select * from dg where login=? and pass=? limit 1");
      $sel->execute(array($login,$pass));
      $tab=$sel->fetchAll();
      if(count($tab)>0){
         $_SESSION["prenomNom"]=ucfirst(strtolower($tab[0]["prenom"])).
         " ".strtoupper($tab[0]["nom"]);
         $_SESSION["autoriser"]="oui";
         header("location:dg.php");
         exit();
      }
      else
         $erreur="Mauvais login ou mot de passe!";
   }
?>
<?php
   session_start();
   @$login=$_POST["login"];
   @$pass=md5($_POST["pass"]);
   @$valider=$_POST["valider"];
   $erreur="";
   
   if(isset($valider)){
      include("BD2.php");
      $sel=$pdo->prepare("select * from utilisateurs where login=? and pass=? limit 1");
      $sel->execute(array($login,$pass));
      $tab=$sel->fetchAll();
      if(count($tab)>0){
         $_SESSION["prenomNom"]=ucfirst(strtolower($tab[0]["prenom"])).
         " ".strtoupper($tab[0]["nom"]);
         $_SESSION["autoriser"]="oui";
         header("location:session2.php");
      }
      else
         $erreur="Mauvais login ou mot de passe!";
   }
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <style>
         *{
            font-family:arial;
         }
         body{
            margin:20px;
         }
         input{
            border:solid 1px #2222AA;
            margin-bottom:10px;
            padding:16px;
            outline:none;
            border-radius:6px;
         }
         .erreur{
            color:#CC0000;
            margin-bottom:10px;
         }
         a{
            font-size:12pt;
            color:#EE6600;
            text-decoration:none;
            font-weight:normal;
         }
         a:hover{
            text-decoration:underline;
         }
         .flotte {
           float:right;
          }
      </style>
      <link rel="icon" type="image/png" href="fils.png" />
      <link  rel="stylesheet" href="http://use.fontawesome.com/releases/v5.13.0/css/all.css">
      <link  rel="stylesheet" href="style.css">
      <link rel="stylesheet"  href="style2.css" />
      <style>
        body {
             background-image:url(img1.jpg);
           }
        </style>
        <style>
thead {color: green;}
tbody {color: blue;}
tfoot {color: red;}

table, th, td {
  border: 1px solid black;
  font-family: Arial, Helvetica, sans-serif; 
font-size: 14px;
  </style>
	<style>
	img {
           vertical-align:middle;
        }
    </style>
   </head>
   <body onLoad="document.fo.login.focus()"  >
 
      <form name="fo" method="post" action="">
     
      <h1>ISTAM-LUBUMBASHI</h1>
       <div class="social-media">
          <p><i class="fab fa-google"></i></p>
          <p><i class="fab fa-youtube"></i></p>
          <p><i class="fab fa-facebook-f"></i></p>
          <p><i class="fab fa-twitter"></i></p>
       </div>
       <p  class="choose-email">IDENTITES:</p>
       <div class="inputs">
         <input type="text" name="login" placeholder="Login" /><br />
         <input type="password" name="pass" placeholder="Mot de passe" /><br />
         <input type="submit" name="valider" value="S'authentifier" />
         <div class="erreur"><?php echo $erreur ?></div>
      </div>
         <p class="inscription">LOGICIEL<span><a href="Ndif.php">-PAIEMENT-</a></span>ISTAM <span>LUBUMBASHI</span></p>
      </form>
      
   </body>
   
</html>
