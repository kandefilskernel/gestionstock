<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>example-aggregate-functions-and-grouping-sum-with-group-by- php mysql examples | w3resource</title>
<meta name="description" content="example-aggregate-functions-and-grouping-sum-with-group-by- php mysql examples | w3resource">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-12">
<h2>Category id and sum of total costs of purchases grouped by category id:</h2>
<table class='table table-bordered'>
<tr>
<th>Category id</th><th>Sum of total costs of purchases</th>
</tr>
<?php
$hostname="91.216.107.183";
$username="istam1531505";
$password="6xka7e0o6p";
$db = "istam1531505";
$dbh = new PDO("mysql:host=$hostname;dbname=$db", $username, $password);
foreach($dbh->query('SELECT idetudiant,SUM(montant$) 
FROM paiement
GROUP BY idetudiant') as $row) {
echo "<tr>"; 
echo "<td>" . $row['idetudiant'] . "</td>";
echo "<td>" . $row['SUM(montant$)'] . "</td>";
echo "</tr>"; 
}
?>
</tbody></table>
</div>
</div>
</div>
</body>
</html>
