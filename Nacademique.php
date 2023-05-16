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
         $sel=$pdo->prepare("select id from academique where login=? limit 1");
         $sel->execute(array($login));
         $tab=$sel->fetchAll();
         if(count($tab)>0)
                   $erreur="Login existe déjà!";
         else{
               $ins=$pdo->prepare("insert into academique (nom,prenom,login,pass) values(?,?,?,?)");
              if($ins->execute(array($nom,$prenom,$login,md5($pass))))
               header("location:Ndif.php");
         }   
      }
   }
?>
<!DOCTYPE html>
<html>
<head>
   <link rel="icon" type="image/png" href="fils.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, user-scalable=no">

   <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="resources/syntax/shCore.css">
	<link rel="stylesheet" type="text/css" href="resources/demo.css">
   <link rel="stylesheet" type="text/css" href="datatables.min.css">
   <link rel="stylesheet"  href="style2.css" />
	<style type="text/css"  type="text/css" class="init"></style>
   <link rel="stylesheet" media="screen and (max-width: 1280px)" href="petite_resolution.css" /> <!-- Pour ceux qui ont une résolution inférieure à 1280px -->
   <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
   <script type="text/javascript" language="javascript" src="js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="resources/syntax/shCore.js"></script>
   <script type="text/javascript" language="javascript" src="resources/demo.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  
	<style>
thead {color: green;}
tbody {color: blue;}
tfoot {color: red;}

table, th, td {
  border: 1px solid black;
  font-family: Arial, Helvetica, sans-serif; 
font-size: 12px;

  </style>
  <style>
img {
  border-radius: 50%;
}
</style>
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
   </head>
   <body>
   <div class="container">
						<ul  class="menu">
							<li>
								<a href="deconnexion.php">Deconnexion(istam)</a>
                     </li>
                     <li>
								<a href="ab.php"><?php echo $bienvenue?></a>
							</li>
							<li>
								<a href="ab.php">Menu</a>
							</li>
						</ul>
					
           
        </div>
        <center><h1 style="font-size: 24px;">Institut Superier d'Arts et Metiers/Lubumbashi</h1></center><hr>
   <center> <div>
      <h1>Inscription</h1>
      <div class="erreur"><?php echo $erreur ?></div>
      <div class="container">
<div class="row">
<div class="col-md-12">
      <form name="fo" method="post" action="">
         <input type="text" name="nom" placeholder="Nom" value="<?php echo $nom?>" /><br />
         <input type="text" name="prenom" placeholder="Prénom" value="<?php echo $prenom?>" /><br />
         <input type="text" name="login" placeholder="Login" value="<?php echo $login?>" /><br />
         <input type="password" name="pass" placeholder="Mot de passe" /><br />
         <input type="password" name="repass" placeholder="Confirmer Mot de passe" /><br />
         <input type="submit" name="valider" value="CREER" />
      </form>
      </div>
</div>
</div>
   </div></center>
   <footer>
                            
   <center> <p> <p><em>Fils Kernel KANDE DEVELOPPEUR INFORMATIQUE, fistonkande24@gmail.com, +243815515896 <img src="kernel.jpg"  alt="Avatar" style="width:40px"/></em></p></center>
                            
 
   </footer>
      </body>
</html>