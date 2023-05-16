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
<style>
thead {color: green;}
tbody {color: blue;}
tfoot {color: red;}

table, th, td {
  border: 1px solid black;
  font-family: Arial, Helvetica, sans-serif; 
font-size: 12px;

  </style>
</head>
<body>
<div>
						<ul class="menu">
							<li>
								<a href="deconnexion.php">Deconnexion(istam)</a>
                            </li>
                            <li>
								<a href="dg.php">MENU</a>
                            </li>
                            <li>
								<a href="index.php"><?php echo $bienvenue?></a>
							</li>
             
						</ul>
					
           
        </div>
<div class="container">
<div class="row">
<div class="col-md-12">
<center><h1 style="font-size: 24px;">Institut Superier d'Arts et Metiers/Lubumbashi</h1></center><hr>

<section>
<button onclick="myFunction()">Imprimer la liste</button>
 
<script>
function myFunction() {
    window.print();
}
</script></br>
<table  id="example" class='table table-bordered'  style="width:100%">
<thead>
<tr>
<th>ID</th><th>NOM COMPLET </th><th>GENRE</th><th>PROMOTION</th><th>FILIERE</th><th>DATE DE PAIEMENT</th><th>TOTAL PAYE</th>
</tr>
</thead>
<tbody>
<?php
$hostname="91.216.107.183";
$username="istam1531505";
$password="6xka7e0o6p";
$db = "istam1531505";
$dbh = new PDO("mysql:host=$hostname;dbname=$db", $username, $password);
foreach($dbh->query("SELECT paiement.idetudiant,nom,etudiants.genre,promotion,paiement.datepaiement,paiement.etatdg, filiere,SUM(montant$) 
FROM etudiants  INNER JOIN paiement ON  etudiants.idetudiant= paiement.idetudiant   where etatdg='OK'
GROUP BY nom") as $row) {
echo "<tr>"; 
echo "<td>" . $row['idetudiant'] . "</td>";
echo "<td>" . $row['nom'] . "</td>";
echo "<td>" . $row['genre'] . "</td>";
echo "<td>" . $row['promotion'] . "</td>";
echo "<td>" . $row['filiere'] . "</td>";
echo "<td>" . $row['datepaiement'] . "</td>";
echo "<td>" . $row['SUM(montant$)'] . "$</td>";
echo "</tr>"; 
}
?>
</tbody>
<tfoot>
<tr>
<th>ID</th><th>NOM COMPLET </th><th>GENRE</th><th>PROMOTION</th><th>FILIERE</th><th>DATE DE PAIEMENT</th><th>TOTAL PAYE</th>
</tr>
</tfoot></table>
<script type="text/javascript">
      $("#example").dataTable({

      });
   </script>
		
   </section>
</div>
</div>
</div>
</body>
</html>