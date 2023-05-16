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
   @$F1=$_POST["T"];
   @$F2=$_POST["T1"];
   @$F3=$_POST["T2"];
   @$F4=$_POST["T3"];
   @$F5=$_POST["T4"];
   @$F6=$_POST["T5"];
   @$fils="";
   @$nomPhoto=$_FILES["photo"]["name"];
   @$fichierTempon=$_FILES['photo']['tmp_name'];
   move_uploaded_file($fichierTempon,'./images/'.$nomPhoto);
   /// @$valider=$_POST["valider"];
   $erreur="";
   include("BD2.php");
   $sel=$pdo->prepare("select nom from etudiants where nom=? limit 1");
   $sel->execute(array($F1));
   $tab=$sel->fetchAll();
   if(count($tab)>0){
      $erreur="Le nom de l'étudiant existe déjà!";
   }
   else
   {
         $ins=$pdo->prepare("insert into etudiants(nom,promotion,filiere,genre,tel,anneaca,photo,dossier) values(?,?,?,?,?,?,?,?)");
            if($ins->execute(array($F1,$F2,$F3,$F4,$F5,$F6,$nomPhoto,$fils)))
               header("location:paiefrais.php");
   }
?>
<!DOCTYPE html>
<html>
   <head>
   <style>
img {
  border-radius: 50%;
}
</style>
      <meta charset="utf-8" />
      <link rel="icon" type="image/png" href="fils.png" />
      <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, user-scalable=no">
     
      <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
	   <link rel="stylesheet" type="text/css" href="resources/syntax/shCore.css">
	   <link rel="stylesheet" type="text/css" href="resources/demo.css">
      <link rel="stylesheet" type="text/css" href="datatables.min.css">
      <link rel="stylesheet"  href="style2.css" />
	   <style type="text/css"  type="text/css" class="init"></style>
      
     <link rel="stylesheet"  href="stylefils.css" />
     <style type="text/css">
     fieldset {
                 position:relative;
                 margin-top:10px;
                 height:100px;
                 background:white;
                 padding-top:10px;
             }
            
</style>

<style>
thead {color: green;}
tbody {color: blue;}
tfoot {color: red;}

table, th, td {
  border: 1px solid black;
  font-family: Arial, Helvetica, sans-serif; 
font-size: 10px;
  </style>
   </head>
   <body  class="dt-example" bgcolor="yellow">
   
					
   <div class="container">
   <ul class="menu">
							<li>
								<a href="deconnexion.php">Deconnexion(istam)</a>
                     </li>
                     <li>
								<a href="session2.php">Accueil(istam)</a>
							</li>
							
							<li>
								<a href="paiefrais.php">Ajouter paiement (istam)</a>
							</li>
							
							
						</ul>
                  </div>
                  <center><img src="fils.png"  alt="Avatar" style="width:30px"/><h1 style="font-size: 24px;">Institut Superier d'Arts et Metiers/Lubumbashi</h1></center><hr>
                  <center><div class="erreur"><?php echo $erreur ?></div><center>
                  <div class="container">
<div class="row">
<div class="col-md-12">
<center>
     
      <legend style="color:red; background:black;">Informations personnelles</legend></br>
      <form  name="fo" method="post" action="" enctype="multipart/form-data">
        
         <input type="text" name="T"   size="40" placeholder="Saisir le nom complet"/>..<input type="text" name="T4"  size="40" placeholder="Saisir le Tél"/>..<input type="text" name="T5"  value="2020-2021"  size="10" class="form-control"/>....<input type="file" name="photo"  class="form-control"/></br></br>
         
         <legend  style="color:red; background:black;">Promotion</legend></br>
         <input  type="radio" name="T1" value="G1"/>G1
         <input type="radio" name="T1" value="G2"/>G2
         <input type="radio" name="T1" value="G3"/>G3
         <input  type="radio" name="T1" value="L1"/>L1
         <input  type="radio" name="T1" value="L2"/>L2</br></br>
         <legend style="color:red;background:black;">Options</legend></br>
         <input type="radio" name="T2"   value="Informatique"/>Informatique
         <input  type="radio" name="T2" value="Scofi"/>Scofi
         <input  type="radio" name="T2" value="Douane">Douane
         <input  type="radio" name="T2" value="Genie">Genie
         <input  type="radio" name="T2" value="Esthetique">Esthetique
         <input  type="radio" name="T2" value="Modelisme">Modelisme
         <input  type="radio" name="T2" value="TH">TH
         <input  type="radio" name="T2" value="GRHT">GRHT
         <input  type="radio" name="T2" value="RT">RT
         <input  type="radio" name="T2" value="IG">IG
         <input  type="radio" name="T2" value="Construction">Construction
         <input  type="radio" name="T2" value="Electro-mecanique">Electro-mecanique
         <input  type="radio" name="T2" value="Electricite">Electricite
         <input  type="radio" name="T2" value="Conception">Conception
         <input type="radio"  name="T2" value="Comptabilite">Comptabilité
         <input type="radio"  name="T2" value="Mark">Mark
         <input type="radio"  name="T2" value="Chimie">Chimie
         <input   type="radio" name="T2" value="Geomine">Géomine</br></br>
         
         <legend style="color:red;background:black;">Genre</legend></br>
         <input type="radio"  name="T3" value="F">FEMME
         <input type="radio"  name="T3" value="M">HOMME</br></br>
         <legend style="color:red;background:black;">Operation</legend></br>  
         <input type="submit"  value="Enregistrer nouvel étudiant" style="font-size: 18px;"/><br/><br/>
      
         
         
      </form>
      </div>
</div>
</div>
      <footer>
                            
                            <center> <p> <p><em>Fils Kernel KANDE DEVELOPPEUR INFORMATIQUE, fistonkande24@gmail.com, +243815515896 <img src="kernel.jpg"  alt="Avatar" style="width:40px"/></em></p></center>
                                                     
                          
      </footer>
   </body>
</html>