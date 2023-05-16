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
  //require_once("connexionBD.php");
  require_once("cn.php");
  $sql="SELECT * FROM etudiants  ORDER BY nom ASC";
  $stmt =$pdo->prepare($sql);
  $stmt->execute();
  //return $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
   <head>
   <link rel="icon" type="image/png" href="fils.png" />
   <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
 <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="fils.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, user-scalable=no">

    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="resources/syntax/shCore.css">
	<link rel="stylesheet" type="text/css" href="resources/demo.css">
    <link rel="stylesheet" type="text/css" href="datatables.min.css">
    <link rel="stylesheet"  href="style2.css" />
	<style type="text/css"  type="text/css" class="init"></style>

    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
    <script type="text/javascript" language="javascript" src="js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="resources/syntax/shCore.js"></script>
	<script type="text/javascript" language="javascript" src="resources/demo.js"></script>

<meta name="description" content="example-aggregate-functions-and-grouping-sum-with-group-by- php mysql examples | w3resource">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script type="text/javascript" src="date_heure.js"></script>
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
<style>
        body {
             background-image:url(img1.jpg);
           }
        </style>
</head>

   <body class="dt-example">
   <div class="col-md-12">
						<ul  class="menu">
							<li>
								<a href="deconnexion.php">Deconnexion(istam)</a>
                     </li>
                     <li>
								<a href="session2.php"><?php echo $bienvenue?></a>
							</li>
                     <li>
								<a href="session2.php">Accueil(istam)</a>
							</li>
							<li>
								<a href="Netudiant.php">Créer nouvel étudiant</a>
							</li>
							<li>
								<a href="paiefrais.php">Paiement</a>
							</li>
                     <li>
								<a href="audrey.php">ADMIN</a>
							</li>
                    
							<li>
								<a href="listedepaie.php">Verification</a>
							</li>
						</ul>
                  </div>
           
        <br>
        <center><h1 style="font-size: 18px;">Institut Superieur Technique  des Arts et Metiers/Lubumbashi</h1>
<img src="fils.png"  alt="Avatar" style="width:30px"/>
</center>
                
   <div>
   
</br>
<span id="date_heure"></span>
            <script type="text/javascript">window.onload = date_heure('date_heure');</script>
<div class="col-md-12">
<div id="div_horloge"></div>
 
<script type="text/javascript">
window.onload=function() {
  horloge('div_horloge');
};
 
function horloge(el) {
  if(typeof el=="string") { el = document.getElementById(el); }
  function actualiser() {
    var date = new Date();
    var str = date.getHours();
    str += ':'+(date.getMinutes()<10?'0':'')+date.getMinutes();
    str += ':'+(date.getSeconds()<10?'0':'')+date.getSeconds();
    el.innerHTML = str;
  }
  actualiser();
  setInterval(actualiser,1000);
}
</script>
<SCRIPT LANGUAGE="JavaScript">
var maintenant=new Date();
var jour=maintenant.getDate();
var mois=maintenant.getMonth()+1;
var an=maintenant.getFullYear();
document.write("Nous sommes le ",an,"-",mois,"-",jour,".");
</SCRIPT>
<fieldset>
	<section>
      <table id="example" class="table table-bordered" style="width:100%">
				<thead>
					<tr color="red">
                  <th>ID </th>
						<th>NOM ETUDIANT</th>
						<th>GENRE</th>
						<th>PROMOTION</th>
						<th>FILIERE</th>
						<th>TEL</th>
                  <th>DATE ENREGISTREMENT</th>
                  <th>PHOTO</th>
     
                  <th>MODIFICATION</th>
                  <th>SUPPRIMER</th>
					</tr>
         </thead>
         <tbody>
         <?php while($et=$stmt->fetch()){  ?>
                <tr  bgcolor="Silver">
                   <td bgcolor="#F0FFFF"> <?php echo($et['idetudiant']) ?></td>
                   <td><?php echo($et['nom']) ?></td>
                   <td bgcolor="#F0FFFF"><?php echo($et['genre']) ?></td>
                   <td><?php echo($et['promotion']) ?></td>
                   <td bgcolor="#FFFFFF"><?php echo($et['filiere']) ?></td>
                   <td bgcolor="#777777"><?php echo($et['tel']) ?></td>
                   <td bgcolor="#F0FFFF"><?php echo($et['date']) ?></td>
                   <center><td bgcolor="#F0FFFF"><img src="images/<?php echo($et['photo']) ?>"  alt="Avatar" style="width:40px"/></td></center>
                   <td><a href="modifieretudiant.php?code=<?php echo($et['idetudiant']) ?>">Modifier</a>
                   <td><a onclick="return confirm('Voulez-vous supprimer..?');" href="supprimeretudiant.php?code=<?php echo($et['idetudiant']) ?>">Supprimer</a>  
                </tr>
              <?php  } ?>
          </tbody>
          <tfoot>
          <tr color="red">
                  <th>ID </th>
						<th>NOM ETUDIANT</th>
						<th>GENRE</th>
						<th>PROMOTION</th>
						<th>FILIERE</th>
						<th>TEL</th>
                  <th>DATE ENREGISTREMENT</th>
                  <th>PHOTO</th>
     
                  <th>MODIFICATION</th>
                  <th>SUPPRIMER</th>
					</tr>
				</tfoot>
   </table>	
   <script type="text/javascript">
      $("#example").dataTable({

      });
   </script>
		
   </section></fieldset>
	</div>

<center> <p class="inscription">LOGICIEL<span><a href="#">-PAIEMENT-</a></span>ISTAM <span>LUBUMBASHI</span></p> </center> 
   <footer>
                            
   <center> <p> <p><em>Fils Kernel KANDE DEVELOPPEUR INFORMATIQUE, fistonkande24@gmail.com, +243815515896 <img src="kernel.jpg"  alt="Avatar" style="width:40px"/></em></p></center>
                            
 
   </footer>
   </body>
</html>