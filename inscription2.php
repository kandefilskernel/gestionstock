<?php
   session_start();
   if($_SESSION["autoriser"]!="oui"){
      header("location:index.php");
      exit();
   }
?>
<?php
   session_start();
   @$nom=$_POST["nom"];
   @$prenom=$_POST["prenom"];
   @$login=$_POST["login"];
   @$pass=$_POST["pass"];
   @$repass=$_POST["repass"];
   @$valider=$_POST["valider"];
   $erreur="";
   if(isset($valider)){
      if(empty($nom)) $erreur="Nom laissé vide!";
      elseif(empty($prenom)) $erreur="Prénom laissé vide!";
      elseif(empty($prenom)) $erreur="Prénom laissé vide!";
      elseif(empty($login)) $erreur="Login laissé vide!";
      elseif(empty($pass)) $erreur="Mot de passe laissé vide!";
      elseif($pass!=$repass) $erreur="Mots de passe non identiques!";
      else{
         include("BD2.php");
         $sel=$pdo->prepare("select id from utilisateurs where login=? limit 1");
         $sel->execute(array($login));
         $tab=$sel->fetchAll();
         if(count($tab)>0)
            $erreur="Login existe déjà!";
         else{
            $ins=$pdo->prepare("insert into utilisateurs(nom,prenom,login,pass) values(?,?,?,?)");
            if($ins->execute(array($nom,$prenom,$login,md5($pass))))
               header("location:session2.php");
         }   
      }
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
      </style>
      <link rel="stylesheet"  href="style2.css" />
   </head>
   <body>
   <ul class="menu">
              <li>
               <a href="deconnexion.php">Se déconnecter</a> 
              </li>
              <li>
                     <a href="inscription2.php">Créer un compte</a>
              </li>
              <li>
                <a href="#">Inserer Etudiant</a>
              </li>
              <li>
                <a href="#">Ajouter paiement</a>
              </li>
              <li>
                <a href="#">Liste de paiement/rapport</a>
              </li>
        </ul>
   
      <h1>USER</h1>
      <div class="erreur"><?php echo $erreur ?></div>
      <ul class="menu1">
      <form name="fo" method="post" action="">
         <input type="text" name="nom" placeholder="Nom" value="<?php echo $nom?>" /><br />
         <input type="text" name="prenom" placeholder="Prénom" value="<?php echo $prenom?>" /><br />
         <input type="text" name="login" placeholder="Login" value="<?php echo $login?>" /><br />
         <input type="password" name="pass" placeholder="Mot de passe" /><br />
         <input type="password" name="repass" placeholder="Confirmer Mot de passe" /><br />
         <input type="submit" name="valider" value="S'authentifier" />
      </form>
      </ul>
   </body>
</html>