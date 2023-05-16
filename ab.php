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
try
{
	$bdd = new PDO('mysql:host=91.216.107.183;dbname=istam1531505', 'istam1531505', '6xka7e0o6p');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$req = $bdd->prepare("SELECT datepaiement, sum(montant$) as totals FROM paiement WHERE datepaiement = ? AND etat='OK' ");
$req->execute(array($_GET['T1']));

echo '<ul>';
while ($donnees = $req->fetch())
{
	echo '<li>' . $donnees['totals'] . ' $ du.(' . $donnees['datepaiement'] . ')</li>';
}
echo '</ul>';


$req->closeCursor();

?>
<?php
   session_start();
   include("BD2.php");
 
   @$nom="JOEL K";
   @$K1=$_POST["N1"];
   @$K2=$_POST["N2"];
   @$K3=$_POST["N3"];
   @$K4=$_POST["N4"];
   @$K5=$_POST["N5"];
   @$K6=$_POST["N6"];
   //@$valider=$_POST["valider"];
  $erreur="";
         include("BD2.php");
         $sel=$pdo->prepare("select recu from paiement where recu=? limit 1");
         $sel->execute(array($K1));
         $tab=$sel->fetchAll();
         if(count($tab)>0)
            $erreur="Recu existe déjà!";
         else{
            $ins=$pdo->prepare("insert into paiement(recu,idetudiant,carnet,montant$,datepaiement,libelle,user) values(?,?,?,?,?,?,?)");
            if($ins->execute(array(@$K1,@$K2,@$K3,@$K4,@$K5,@$K6,@$nom)))
               header("location:paiefrais.php");
           }   
?>
<?php
  //require_once("connexionBD.php");
  require_once("cn.php");
  $sql="SELECT etudiants.idetudiant, etudiants.nom,etudiants.promotion,etudiants.filiere,paiement.montant$,paiement.libelle,paiement.recu,paiement.carnet,paiement.datepaiement,paiement.etat FROM etudiants  INNER JOIN paiement ON  etudiants.idetudiant= paiement.idetudiant ";
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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
  <script type="text/javascript" language="javascript" src="js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="resources/syntax/shCore.js"></script>
	<script type="text/javascript" language="javascript" src="resources/demo.js"></script>
  <style>
thead {color: green;}
tbody {color: blue;}
tfoot {color: red;}

table, th, td {
  border: 1px solid black;
  font-family: Arial, Helvetica, sans-serif; 
font-size: 11px;
  </style>
	<style>
	img {
           vertical-align:middle;
        }
    </style>
    <style>
        body {
             background-image:url(img1.jpg);
           }
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
								<a href="moncompte.php">Gerer mon compte(istam)</a>
                     </li>
            
                    
								<a href="rapportab.php">Liste definitive par DG(istam)</a>
                     </li>
                     </li>
            
                    
            <a href="listeuser.php">Créer user(istam)</a>
                 </li>
                 <li>
								<a href="kernelkane.php">Synthetique</a>
							</li>
                     <li>
							            	<a href="listeab.php">Liste validée par moi</a>
                     </li>
                     <li>
							            	<a href="session.php">Modification noms</a>
                     </li>
                     <li>
							            	<a href="Netudiantab.php">Ajouter un etudiant</a>
                     </li>
                     <li>
								<a href="index.php"><?php echo $bienvenue?></a>
							</li>
              <li>
								<a href="albertab.php">Modification paiement</a>
							</li>
						</ul>
					
           
        </div>
<?php include('fils.php');?>


<div class="col-md-12">
<fieldset  style="border-color:red">

<form  method="post"  action="kande.php">
     <input type="text" name="T" placeholder="Saisir la date validation"  size="30"/> <button type="submit">VALIDER</button><input type="text" name="T1" placeholder="Saisir la date pour désactiver"  size="30"/><button type="submit">DESACTIVER</button>....<?php
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

	echo  $donnees['total'] . '$..Le montant general<br />';

}
$reponse->closeCursor();
?>
</form>
<form   method="get">
<div align="right"><input type="text" name="T1" placeholder="SAISIR LA DATE"  value=""  align="right" /><input type="submit"  value="AFFICHER LE MONTANT" />
</div>
</form>
</fieldset>
<fieldset style="border-color:red"><center><section>
  <table id="example" class="display" style="width:100%">
		<thead>
			<tr><th>Nom</th><th>Promotion</th><th>Filiere</th><th>Montant</th><th>Libelle</th><th>N° recu</th><th>Date</th><th>USER</th><th>Carnet</th><th>Etat</th><th>OPTION</th><th>OPTION</th></tr>
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
						<tr><td><?=$d['nom']?></td><td><?=$d['promotion']?></td><td><?=$d['filiere']?></td><td><?=$d['montant$']?>$</td><td><?=$d['libelle']?></td><td><?=$d['recu']?></td><td><?=$d['datepaiement']?></td><td><?=$d['user']?></td><td><?=$d['carnet']?></td><td><?=$d['etat']?></td><td><a href="rm.php?recu1=<?php echo($d['recu']) ?>">Valider</a></td><td><a href="LISTEVALIDE.php?recu1=<?php echo($d['recu']) ?>">Desactiver</a></td></tr>
					<?php
					}
					$resultats->closeCursor();
				}
				else echo '<tr><td colspan=4>aucun résultat trouvé</td></tr>'.
				$connect=null;
			?>
		</tbody>
		<tfoot>
    
    <tr><th>Nom</th><th>Promotion</th><th>Filiere</th><th>Montant</th><th>Libelle</th><th>N° recu</th><th>Date</th><th>USER</th><th>Carnet</th><th>Etat</th><th>OPTION</th><th>OPTION</th></tr>
		</tfoot>
	</table>
	<script type="text/javascript">
      $("#example").dataTable({

      });
   </script>
		
    </section></center></fieldset>
	

  </div>
 

  <p class="inscription">LOGICIEL<span><a href="#">-PAIEMENT-</a></span>ISTAM <span>LUBUMBASHI</span></p>
</body>
</html>