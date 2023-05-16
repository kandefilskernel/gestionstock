<?php
   session_start();
   if($_SESSION["autoriser"]!="oui"){
      header("location:index.php");
      exit();
   }
?>

<?php
  //require_once("connexionBD.php");
  require_once("cn.php");
  $sql="SELECT etudiants.idetudiant, etudiants.nom,etudiants.promotion,etudiants.filiere,paiement.montant$,paiement.libelle,paiement.recu,paiement.carnet,paiement.datepaiement FROM etudiants  INNER JOIN paiement ON  etudiants.idetudiant= paiement.idetudiant ";
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
	<meta name="description" content="example-aggregate-functions-and-grouping-sum-with-group-by- php mysql examples | w3resource">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<style>
	img {
           vertical-align:middle;
        }
		.ComboBoxStyle .ajax__combobox_buttoncontainer button 
{
    background-color:;
    border: solid 1px #3a4f63;
}

.ComboBoxStyle .ajax__combobox_itemlist
{
    overflow:scroll;
    padding-right: 10px; 
    position: absolute !important;
    left: 0px !important;
    top: 18px !important;
}

.ComboBoxStyle
{
    position: relative;
}
    </style>
	<style>
thead {color: green;}
tbody {color: blue;}
tfoot {color: red;}

table, th, td {
  border: 1px solid black;
  font-family: Arial, Helvetica, sans-serif; 
font-size: 12px;
  </style>
    <title></title>
</head>

<body >
<div class="col-md-12">
<ul class="menu">
							<li>
								<a href="deconnexion.php">Deconnexion(istam)</a>
              </li>
							<li>
								<a href="ab.php">Menu</a>
							</li>
						</ul></div>
<?php include('fils.php');?>
<div class="col-md-12">
<div>
<fieldset style="border-color:red; background-color:pink">


</br>
<center><section>

<div class="container">
<div class="row">
<div class="col-md-12">
<center><h1 style="font-size: 18px;">Institut Superieur d'Arts et Metiers/Lubumbashi</h1>
<img src="fils.png"  alt="Avatar" style="width:40px"/>
<h1 style="font-size: 12px;">Liste des étudiants en ordre</h1></center>
<center><h1 style="font-size: 10px;">Service de comptabilité istam</h1></center><hr>

<section>
<button onclick="myFunction()">Tableau synthetique</button>
 
<script>
function myFunction() {
    window.print();
}
</script></br>

<table  id="example" class='table table-bordered'  style="width:100%">
<thead>
<tr>
<th>LIBELLE</th><th>TOTAL<th/>
</tr>
</thead>
<tbody>
<?php
  $hostname="91.216.107.183";
  $username="istam1531505";
  $password="6xka7e0o6p";
  $db = "istam1531505";
  $dbh = new PDO("mysql:host=$hostname;dbname=$db", $username, $password);
  $date_titre=date('Y-m-d');

lkfunction DateFr($date_titre){
  $datea1=substr($date_titre,0,4);
  $datem1=substr($date_titre,5,2);
  $datej1=substr($date_titre,8,10);
  return $datej1."/".$datem1."/".$datea1;
}

 
 
  foreach($dbh->query("SELECT paiement.libelle,paiement.datepaiement,SUM(montant$) 
  FROM etudiants  INNER JOIN paiement ON  etudiants.idetudiant= paiement.idetudiant   where etat='OK' AND libelle='Inscription' and datepaiement=$date_titre
  GROUP BY  libelle") as $row) {
   echo "<tr>"; 
   echo "<td>" . $row['libelle'] . "</td>";
   echo "<td>" . $row['SUM(montant$)'] . "$</td>";
   echo "</tr>"; 
   }
  foreach($dbh->query("SELECT paiement.libelle,paiement.datepaiement,SUM(montant$) 
  FROM etudiants  INNER JOIN paiement ON  etudiants.idetudiant= paiement.idetudiant   where etat='OK' AND libelle='Reinscription' AND datepaiement= $date_titre
  GROUP BY  libelle") as $row) {
   echo "<tr>"; 
   echo "<td>" . $row['libelle'] . "</td>";
   echo "<td>" . $row['SUM(montant$)'] . "$</td>";
   echo "</tr>"; 
}
   foreach($dbh->query("SELECT paiement.libelle,paiement.datepaiement,SUM(montant$) 
   FROM etudiants  INNER JOIN paiement ON  etudiants.idetudiant= paiement.idetudiant   where etat='OK' AND libelle='Mi-session' AND datepaiement= $date_titre
   GROUP BY  libelle") as $row) {
   echo "<tr>"; 
   echo "<td>" . $row['libelle'] . "</td>";
   echo "<td>" . $row['SUM(montant$)'] . "$</td>";
   echo "</tr>"; 
}
   foreach($dbh->query("SELECT paiement.libelle,paiement.datepaiement,SUM(montant$) 
   FROM etudiants  INNER JOIN paiement ON  etudiants.idetudiant= paiement.idetudiant   where etat='OK' AND libelle='Session' AND datepaiement= $date_titre
   GROUP BY  libelle") as $row) {
   echo "<tr>"; 
   echo "<td>" . $row['libelle'] . "</td>";
   echo "<td>" . $row['SUM(montant$)'] . "$</td>";
   echo "</tr>"; 
}
  foreach($dbh->query("SELECT paiement.libelle,paiement.datepaiement,SUM(montant$) 
  FROM etudiants  INNER JOIN paiement ON  etudiants.idetudiant= paiement.idetudiant   where etat='OK' AND libelle='Session' AND datepaiement= $date_titre
  GROUP BY  libelle") as $row) {
  echo "<tr>"; 
  echo "<td>" . $row['libelle'] . "</td>";
  echo "<td>" . $row['SUM(montant$)'] . "$</td>";
  echo "</tr>"; 
}
  foreach($dbh->query("SELECT paiement.libelle,paiement.datepaiement,SUM(montant$) 
  FROM etudiants  INNER JOIN paiement ON  etudiants.idetudiant= paiement.idetudiant   where etat='OK' AND libelle='Minerval' AND datepaiement= $date_titre
  GROUP BY nom and libelle") as $row) {
  echo "<tr>"; 
  echo "<td>" . $row['libelle'] . "</td>";
  echo "<td>" . $row['SUM(montant$)'] . "$</td>";
  echo "</tr>"; 
}
foreach($dbh->query("SELECT paiement.libelle,paiement.datepaiement,SUM(montant$) 
FROM etudiants  INNER JOIN paiement ON  etudiants.idetudiant= paiement.idetudiant   where etat='OK' AND libelle='Frais de stage' AND datepaiement= $date_titre
GROUP BY  libelle") as $row) {
echo "<tr>"; 
echo "<td>" . $row['libelle'] . "</td>";
echo "<td>" . $row['SUM(montant$)'] . "$</td>";
echo "</tr>"; 
}
foreach($dbh->query("SELECT paiement.libelle,paiement.datepaiement,SUM(montant$) 
FROM etudiants  INNER JOIN paiement ON  etudiants.idetudiant= paiement.idetudiant   where etat='OK' AND libelle='Frais de direction TFC/TFE' AND datepaiement= $date_titre
GROUP BY  libelle") as $row) {
echo "<tr>"; 
echo "<td>" . $row['libelle'] . "</td>";
echo "<td>" . $row['SUM(montant$)'] . "$</td>";
echo "</tr>"; 
}
foreach($dbh->query("SELECT paiement.libelle,paiement.datepaiement,SUM(montant$) 
FROM etudiants  INNER JOIN paiement ON  etudiants.idetudiant= paiement.idetudiant   where etat='OK' AND libelle='Speciale' AND datepaiement= $date_titre
GROUP BY  libelle") as $row) {
echo "<tr>"; 
echo "<td>" . $row['libelle'] . "</td>";
echo "<td>" . $row['SUM(montant$)'] . "$</td>";
echo "</tr>"; 
}
foreach($dbh->query("SELECT paiement.libelle,paiement.datepaiement,SUM(montant$) 
FROM etudiants  INNER JOIN paiement ON  etudiants.idetudiant= paiement.idetudiant   where etat='OK' AND libelle='Fiche d avancement & proposition' AND datepaiement= $date_titre
GROUP BY  libelle") as $row) {
echo "<tr>"; 
echo "<td>" . $row['libelle'] . "</td>";
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

$req = $bdd->prepare('SELECT datepaiement, sum(montant$) as totals FROM paiement WHERE datepaiement =? ');
$req->execute(array($date_titre));

echo '<ul>';
while ($donnees = $req->fetch())
{
	echo '<li>' . $donnees['totals'] . ' $ Total percu.(' . $donnees['datepaiement'] . ')</li>';
}
echo '</ul>';


$req->closeCursor();
?>
</tbody>
<tfoot>
<tr>
<th>LIBELLE</th><th>TOTAL<th/>
</tr>
</tfoot></table>

		
   </section>
</div>
</div>
</div>
</div>
  <p class="inscription">LOGICIEL<span><a href="#">-PAIEMENT-</a></span>ISTAM <span>LUBUMBASHI</span></p></fieldset>
  </body>
</html>