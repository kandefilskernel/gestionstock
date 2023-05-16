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
<!doctype html>
<html lang="en">
<head>
<style>
img {
  border-radius: 50%;
}
</style>
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
</head>
<body>
<div>
						<ul class="menu">
							<li>
								<a href="deconnexion.php">Deconnexion(istam)</a>
                            </li>
                            <li>
								<a href="ab.php">ACCUEIL ISTAM</a>
                            </li>
                            <li>
								<a href="index.php"><?php echo $bienvenue?></a>
							</li>
             
						</ul>
					
           
        </div>
<div class="container">
<div class="row">
<div class="col-md-12">
<center><h1 style="font-size: 18px;">Institut Superieur Technique  des Arts et Metiers/Lubumbashi</h1>
<img src="fils.png"  alt="Avatar" style="width:40px"/>
<h1 style="font-size: 12px;">Synthese</h1></center>
<center><h1 style="font-size: 10px;">Service de comptabilité istam</h1></center><hr>

<section>
<center><button onclick="myFunction()">Imprimer le tableau synthetique</button></center>
 
<script>
function myFunction() {
    window.print();
}
</script></br>
<table  id="example" class='table table-bordered'  style="width:100%">
<thead>
<tr>
<th>LIBELLE</th><th>DATE PAIEMENT</th><th>MONTANT</th>
</tr>
</thead>
<tbody>
<?php
$hostname="91.216.107.183";
$username="istam1531505";
$password="6xka7e0o6p";
$db = "istam1531505";
$date_titre=date('Y-m-d');

$dbh = new PDO("mysql:host=$hostname;dbname=$db", $username, $password);
foreach($dbh->query("SELECT paiement.datepaiement,paiement.libelle,paiement.etat,SUM(montant$) 
FROM paiement  where etat='OK' AND libelle='Reinscription' AND datepaiement='$date_titre'
GROUP BY libelle") as $row) {
echo "<tr>"; 
echo "<td>" . $row['libelle'] . "</td>";
echo "<td>" . $row['datepaiement'] . "</td>";
echo "<td>" . $row['SUM(montant$)'] . "$</td>";
echo "</tr>"; 
}
foreach($dbh->query("SELECT paiement.datepaiement,paiement.libelle,paiement.etat,SUM(montant$) 
FROM paiement  where etat='OK' AND libelle='Speciale' AND datepaiement='$date_titre'
GROUP BY libelle") as $row) {
echo "<tr>"; 
echo "<td>" . $row['libelle'] . "</td>";
echo "<td>" . $row['datepaiement'] . "</td>";
echo "<td>" . $row['SUM(montant$)'] . "$</td>";
echo "</tr>"; 
}
foreach($dbh->query("SELECT paiement.datepaiement,paiement.libelle,paiement.etat,SUM(montant$) 
FROM paiement  where etat='OK' AND libelle='Inscription' AND datepaiement='$date_titre'
GROUP BY libelle") as $row) {
echo "<tr>"; 
echo "<td>" . $row['libelle'] . "</td>";
echo "<td>" . $row['datepaiement'] . "</td>";
echo "<td>" . $row['SUM(montant$)'] . "$</td>";
echo "</tr>"; 
}
foreach($dbh->query("SELECT paiement.datepaiement,paiement.libelle,paiement.etat,SUM(montant$) 
FROM paiement  where etat='OK' AND libelle='Frais de stage' AND datepaiement='$date_titre'
GROUP BY libelle") as $row) {
echo "<tr>"; 
echo "<td>" . $row['libelle'] . "</td>";
echo "<td>" . $row['datepaiement'] . "</td>";
echo "<td>" . $row['SUM(montant$)'] . "$</td>";
echo "</tr>"; 
}
foreach($dbh->query("SELECT paiement.datepaiement,paiement.libelle,paiement.etat,SUM(montant$) 
FROM paiement  where etat='OK' AND libelle='Frais de direction TFC/TFE' AND datepaiement='$date_titre'
GROUP BY libelle") as $row) {
echo "<tr>"; 
echo "<td>" . $row['libelle'] . "</td>";
echo "<td>" . $row['datepaiement'] . "</td>";
echo "<td>" . $row['SUM(montant$)'] . "$</td>";
echo "</tr>"; 
}
foreach($dbh->query("SELECT paiement.datepaiement,paiement.libelle,paiement.etat,SUM(montant$) 
FROM paiement  where etat='OK' AND libelle='Minerval' AND datepaiement='$date_titre'
GROUP BY libelle") as $row) {
echo "<tr>"; 
echo "<td>" . $row['libelle'] . "</td>";
echo "<td>" . $row['datepaiement'] . "</td>";
echo "<td>" . $row['SUM(montant$)'] . "$</td>";
echo "</tr>"; 
}
foreach($dbh->query("SELECT paiement.datepaiement,paiement.libelle,paiement.etat,SUM(montant$) 
FROM paiement  where etat='OK' AND libelle='Fiche d avancement & proposition' AND datepaiement='$date_titre'
GROUP BY libelle") as $row) {
echo "<tr>"; 
echo "<td>" . $row['libelle'] . "</td>";
echo "<td>" . $row['datepaiement'] . "</td>";
echo "<td>" . $row['SUM(montant$)'] . "$</td>";
echo "</tr>"; 
}


try
{
	$bdd = new PDO('mysql:host=91.216.107.183;dbname=istam1531505', 'istam1531505', '6xka7e0o6p');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$req = $bdd->prepare("SELECT datepaiement, sum(montant$) as totals FROM paiement WHERE datepaiement = ? AND etat='OK'");
$req->execute(array($date_titre));

echo '<ul>';
while ($donnees = $req->fetch())
{
	echo '<li>' . $donnees['totals'] . ' $ du.(' . $donnees['datepaiement'] . ')</li>';
}
echo '</ul>';


$req->closeCursor();

?>
</tbody>
</table>

   </section>
</div>
</div>
</div>
<footer>
                            
   <center> <p> <p><em>AB albert MUDILA<img  /></em></p></center>
                            
 
   </footer>
</body>
</html>