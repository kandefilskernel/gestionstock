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

$req = $bdd->prepare('SELECT datepaiement, sum(montant$) as totals FROM paiement WHERE datepaiement = ? ');
$req->execute(array($_GET['T']));

echo '<ul>';
while ($donnees = $req->fetch())
{
	echo '<li>' . $donnees['totals'] . ' $ du.(' . $donnees['datepaiement'] . ')</li>';
}
echo '</ul>';


$req->closeCursor();

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
  <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
  <script type="text/javascript" language="javascript" src="js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="resources/syntax/shCore.js"></script>
	<script type="text/javascript" language="javascript" src="resources/demo.js"></script>
	<style>
	img {
           vertical-align:middle;
        }
		.ComboBoxStyle .ajax__combobox_buttoncontainer button 
{
    background-color: #C6DFF2;
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
font-size: 12px;
  </style>
    <title></title>
</head>

<body bgcolor="#000000">
<div class="col-md-12">

						<ul class="menu">
							<li>
								<a href="deconnexion.php">Deconnexion(istam)</a>
                           </li>
                          
							<li>
								<a href="ab.php">Menu</a>
							</li>
						</ul>
					
           
        </div>
<?php include('fils.php');?>

</br>

<div class="col-md-12">
<center><section>
<form   method="get">
<div align="justify"> <input type="text" name="T" placeholder="SAISIR LA DATE"  size="30"/> <input type="submit"  value="CALCULER" />

<?php
try
{

       $bdd = new PDO('mysql:host=91.216.107.183;dbname=istam1531505', 'istam1531505', '6xka7e0o6p');

}
catch(Exception $e)
{

       die('Erreur : '.$e->getMessage());

}
$reponse = $bdd->query('SELECT sum(montant$) as total  FROM paiement');
while ($donnees = $reponse->fetch())

{

	echo  $donnees['total'] . '$<br/>';

}
$reponse->closeCursor();
?>
 </div>
</form>
</div>
</div>
</div>

<div class="col-md-12">
  <table id="example" class="display" style="width:100%">
		<thead>
			<tr><th>Nom De L'Etudiant</th><th>Promotion</th><th>Filiere</th><th>Montant</th><th>Libelle</th><th>N° recu</th><th>Date</th><th>Modification</th><th>Supprimer</th></tr>
		</thead>
		<tbody>
			<?php
				$sql='select * from etudiants  INNER JOIN paiement ON  etudiants.idetudiant= paiement.idetudiant';
				$params=[];
				if(isset($_POST['recherche_valeur'])){
					$sql.=' where nom like :nom' or  ' where datepaiement like :datepaiement';
					$params[':nom']="%".addcslashes($_POST['recherche_valeur'],'_')."%";
				}
				$resultats=$connect->prepare($sql);
				$resultats->execute($params);
				if($resultats->rowCount()>0){
					while($d=$resultats->fetch(PDO::FETCH_ASSOC)){
					?>
						<tr><td><?=$d['nom']?><td><?=$d['promotion']?><td><?=$d['filiere']?></td><td><?=$d['montant$']?>$</td><td><?=$d['libelle']?></td><td><?=$d['recu']?></td><td><?=$d['datepaiement']?></td><td><a href="modifierrecu.php?recu=<?php echo($d['recu']) ?>">MODIFIER</a></td><td><a onclick="return confirm('Voulez-vous supprimer..?');" href="supprimerrecu.php?recu=<?php echo($d['recu']) ?>">SUPPRIMER</a></td></tr>
					<?php
					}
					$resultats->closeCursor();
				}
				else echo '<tr><td colspan=4>aucun résultat trouvé</td></tr>'.
				$connect=null;
			?>
		</tbody>
		<tfoot>
		<tr><th>Nom</th><th>Promotion</th><th>Filiere</th><th>Montant</th><th>Libelle</th><th>N° recu</th><th>Date</th><th>Modification</th><th>Supprimer</th></tr>
		</tfoot>
	</table>
	</div>

	<script type="text/javascript">
      $("#example").dataTable({

      });
   </script>
		
    </section></center>
	
	</div></center>
  <p class="inscription">LOGICIEL<span><a href="#">-PAIEMENT-</a></span>ISTAM <span>LUBUMBASHI</span></p></fieldset>
  </body>
</html>