<?php
  session_start();
  if($_SESSION["autoriser"]!="oui"){
     header("location:index.php");
     exit();
  }
  if(date("H")<18)
     $bienvenue="J".
     $_SESSION["prenomNom"].
     "";
  else
     $bienvenue="S".
     $_SESSION["prenomNom"].
     "";
?>
<?php
   session_start();
   include("BD2.php");
 
   @$nom=$bienvenue;
   @$etatdg="Non OK";
   @$etat="Non valide";
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
            $ins=$pdo->prepare("insert into paiement(recu,idetudiant,carnet,montant$,datepaiement,libelle,user,etat,etatdg) values(?,?,?,?,?,?,?,?,?)");
            if($ins->execute(array(@$K1,@$K2,@$K3,@$K4,@$K5,@$K6,@$nom,@$etat,@$etatdg)))
               header("location:frais.php");
           }   
?>

<?php
  //require_once("connexionBD.php");
  require_once("cn.php");
  $sql="SELECT etudiants.idetudiant, etudiants.nom,etudiants.promotion,etudiants.filiere,paiement.montant$,paiement.libelle,paiement.recu,paiement.carnet,paiement.datepaiement FROM etudiants  INNER JOIN paiement ON  etudiants.idetudiant= paiement.idetudiant where libelle='Inscription' OR libelle='Reinscription' OR libelle='Speciale' ";
  $stmt =$pdo->prepare($sql);
  $stmt->execute();
  //return $stmt->fetchAll();
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
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, user-scalable=no">
<style type="text/css">
     fieldset {
                 position:relative;
                 margin-top:10px;
                 height:100px;
                 background:#ffffcc;
                 padding-top:10px;
             }
            
</style>

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
    </style>
    <style>
	img {
           vertical-align:middle;
        }
    </style>
	<style>
  <style>
        body {
             background-image:url(img1.jpg);
           }
        </style>
thead {color: green;}
tbody {color: blue;}
tfoot {color: red;}

table, th, td {
  border: 1px solid black;
  font-family: Arial, Helvetica, sans-serif; 
font-size: 10px;
  </style>
</head>
<body class="dt-example"   bgcolor="#000000">
<div class="col-md-12">
						<ul class="menu">
							<li>
								<a href="deconnexion.php">Deconnexion(istam)</a>
                             </li>
                            <li>
								<a href="ab.php">Accueil(istam)</a>
							</li>
						
						</ul>
            <?php include('fils.php');?>
           
        </div>
        <div class="erreur"><?php echo $erreur ?></div> 

<div class="col-md-12">
 <form name="fo" method="post" action="">
  <fieldset bgcolor="#f77777">
    <legend  >MINERVAL ET AUTRES</legend>
    <strong><input  type="radio" name="N6" value="Minerval"/>Minerval....<input type="radio" name="N6" value="Frais de stage"/>Frais de stage....<input type="radio" name="N6" value="Frais de direction TFC/TFE"/>Frais de direction TFC/TFE....<input type="radio" name="N6" value="Frais Connexe"/>Frais Connexe....<input type="radio" name="N6" value="Fiche d avancement & proposition"/>Fiche d'avancement & proposition....</strong></br>

    <center><input type="text" name="N1" placeholder="Saisir le recu"/>.<input type="text" name="N3" placeholder="Saisir le n° carnet" >.<input type="text" name="N2" placeholder="Saisir le ID" >.<input type="text" name="N4" placeholder="Saisir le montant" >Date:<input type="date" name="N5"/>..<input type="submit"  value="AJOUTER PAIEMENT"  style="font-size: 14px; /></center>
    <hr>
    <center></center>
   </fieldset>
   </form> 
 
   <fieldset>
		<section>
    <div align="right"><p>
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

	echo  $donnees['total'] . '$..Le montant general<br/>';

}
$reponse->closeCursor();
?>
</p> </div>


<div class="col-md-12">
  <table id="example" class="display" style="width:100%">
		<thead>
			<tr><th>Nom De L'Etudiant</th><th>Promotion</th><th>Filiere</th><th>Montant</th><th>Libelle</th><th>N° recu</th><th>Date</th><th>Nom user</th><th>ID</th></tr>
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
						<tr><td><?=$d['nom']?><td><?=$d['promotion']?><td><?=$d['filiere']?></td><td><?=$d['montant$']?>$</td><td><?=$d['libelle']?></td><td><?=$d['recu']?></td><td><?=$d['datepaiement']?></td><td><?=$d['user']?></td><td><?=$d['idetudiant']?></td></tr>
					<?php
					}
					$resultats->closeCursor();
				}
				else echo '<tr><td colspan=4>aucun résultat trouvé</td></tr>'.
				$connect=null;
			?>
		</tbody>
		<tfoot>
		
    <tr><th>Nom De L'Etudiant</th><th>Promotion</th><th>Filiere</th><th>Montant</th><th>Libelle</th><th>N° recu</th><th>Date</th><th>Nom user</th><th>ID</th></tr>
		</tfoot>
	</table>

</div>
	<script type="text/javascript">
      $("#example").dataTable({

      });
   </script>
		
    </section> </fieldset>
	
  
</body>




<script type="text/javascript" charset="utf-8">
// Je recupere les html tags du combo
  var option = document.getElementById('inscription');
  var prix = document.getElementById('prix');
  
  // J'écoute le changement dans le combo
  option.addEventListener("change", function(){
    // récupéré la valeure selectione et je le met dans le span avec id prix
    prix.innerHTML=option.value;
  });
</script>
</html>