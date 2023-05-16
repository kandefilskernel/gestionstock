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
<style>

   font-size:9px;

  </style>
</head>

   <body class="dt-example">
  
   <div class="container">
<div class="row">
<div class="col-md-12">
   <center><h1 style="font-size: 18px;">Institut Superieur Technique  des Arts et Metiers/Lubumbashi</h1>
<img src="fils.png"  alt="Avatar" style="width:40px"/>
<h1 style="font-size: 12px;">Liste des étudiants inscrits</h1></center>
<center><h1 style="font-size: 10px;">SERVICE ACADEMIQUE</h1></center><hr>

<section>
   <div class="table-responsive-sm">
      <table id="example" class="table table-bordered" style="width:100%">
				<thead>
					<tr color="red">
                  <th>ID </th>
						<th>NOM ETUDIANT</th>
						<th>GENRE</th>
						<th>PROMOTION</th>
						<th>FILIERE</th>
						
                 
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
						
                 
					</tr>
				</tfoot>
   </table>
   </div>
</div>
</div>	
   <script type="text/javascript">
      $("#example").dataTable({

      });
   </script>
	</div>
   
   <center><button onclick="myFunction()">Imprimer la liste</button></center>
 
<script>
function myFunction() {
    window.print();
}
</script>
	</div>

<center> <p class="inscription">LOGICIEL<span><a href="#">-PAIEMENT-</a></span>ISTAM <span>LUBUMBASHI</span></p> </center> 
 
   </body>
</html>