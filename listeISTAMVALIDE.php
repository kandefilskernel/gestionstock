<?php
   session_start();
   if($_SESSION["autoriser"]!="oui"){
      header("location:index.php");
      exit();
   }
?>
<?php
   try
   {
	  $bdd = new PDO('mysql:host=91.216.107.183;dbname=istam1531505', 'istam1531505', '6xka7e0o6p');
   }
   catch(Exception $e)
   {  
        die('Erreur : '.$e->getMessage());
    }

    $req = $bdd->prepare('SELECT datepaiement, sum(montant$) as totals FROM paiement WHERE datepaiement = ?');
    $req->execute(array($_GET['T']));

    echo '<ul>';
    while ($donnees = $req->fetch())
    {
	   echo '<li>' . $donnees['totals'] . ' $.le montant percu en date de..(' . $donnees['datepaiement'] . ')</li>';
    }
    echo '</ul>';
    $req->closeCursor();
?>
<?php
  //require_once("connexionBD.php");
  require_once("cn.php");
  $sql="SELECT etudiants.idetudiant, etudiants.nom,etudiants.promotion,etudiants.filiere,paiement.montant$,paiement.libelle,paiement.recu,paiement.carnet,paiement.datepaiement,paiement.etat FROM etudiants  INNER JOIN paiement ON  etudiants.idetudiant= paiement.idetudiant where etat='OK'";
  $stmt =$pdo->prepare($sql);
  $stmt->execute();
  //return $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
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
	<style>
	img {
           vertical-align:middle;
        }
    </style>
    <title></title>
</head>

<body bgcolor="#000000">
<ul class="menu  navbar-fixed-top">
							<li>
								<a href="deconnexion.php">Deconnexion(istam)</a>
                            </li>
                       
							<li>
								<a href="">LISTE VALIDEE PAR AB</a>
							</li>
                     <li>
								<a href="ab.php">ACCUEIL</a>
							</li>
						</ul>
<?php include('fils.php');?>
<center><div>
        
<center><h2>VALIDATION</h2></center><hr>
</div>
<div>

<fieldset  style="border-color:red">
<form  name="fo" method="post" action="">
     <input type="text" name="T" placeholder="SAISIR LA DATE"  size="60"/> <input type="submit"  value="CALCULER" />
</form>

<?php
   try
   {

       $bdd = new PDO('mysql:host=91.216.107.183;dbname=istam1531505', 'istam1531505', '6xka7e0o6p');

   }
   catch(Exception $e)
   {

       die('Erreur : '.$e->getMessage());

   }
   $reponse = $bdd->query("SELECT sum(montant$) as total  FROM paiement where etat='OK' ");
   while ($donnees = $reponse->fetch())
   {

	echo  $donnees['total'] . '$..Le montant general<br />';

   }
   $reponse->closeCursor();
?>
</fieldset>
<fieldset>
	<section>
      <table id="example" class="display" style="width:100%">
				<thead>
					<tr>
                  <th>ID </th>
						<th>NOM ETUDIANT</th>
						<th>GENRE</th>
						<th>PROMOTION</th>
						<th>FILIERE</th>
						<th>LIBELLE</th>
                  <th>DATE ENREGISTREMENT</th>
                  <th>$</th>
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
                   <td bgcolor="#777777"><?php echo($et['libelle']) ?></td>
                   <td bgcolor="#F0FFFF"><?php echo($et['datepaiement']) ?></td>
                   <td bgcolor="#F0FFFF"><?php echo($et['montant$']) ?></td>
                </tr>
              <?php  } ?>
          </tbody>
          <tfoot><tr>
                  <th>ID </th>
						<th>NOM ETUDIANT</th>
						<th>GENRE</th>
						<th>PROMOTION</th>
						<th>FILIERE</th>
						<th>LIBELLE</th>
                  <th>DATE ENREGISTREMENT</th>
                  <th>$</th>
					</tr>
				</tfoot>
   </table>	
   <script type="text/javascript">
      $("#example").dataTable({

      });
   </script>
		
   </section></fieldset>
	
	</div></center>
  <p class="inscription">LOGICIEL<span><a href="#">-PAIEMENT-</a></span>ISTAM <span>LUBUMBASHI</span></p>
  </body>
</html>