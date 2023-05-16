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
  $sql="SELECT * FROM dg ORDER BY nom ASC";
  $stmt =$pdo->prepare($sql);
  $stmt->execute();
  //return $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
   <head>
   <link rel="icon" type="image/png" href="fils.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, user-scalable=no">

   <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="resources/syntax/shCore.css">
	<link rel="stylesheet" type="text/css" href="resources/demo.css">
   <link rel="stylesheet" type="text/css" href="datatables.min.css">
   <link rel="stylesheet"  href="style2.css" />
	<style type="text/css"  type="text/css" class="init"></style>
   <link rel="stylesheet" media="screen and (max-width: 1280px)" href="petite_resolution.css" /> <!-- Pour ceux qui ont une résolution inférieure à 1280px -->
   <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
   <script type="text/javascript" language="javascript" src="js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="resources/syntax/shCore.js"></script>
   <script type="text/javascript" language="javascript" src="resources/demo.js"></script>
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
  <style>
img {
  border-radius: 50%;
}
</style>
</head>

   <body class="dt-example">
   <div class="container">
						<ul  class="menu">
							<li>
								<a href="deconnexion.php">Deconnexion(istam)</a>
                     </li>
                     <li>
								<a href="dg.php">Menu</a>
                     </li>
                     <li>
								<a href="dg.php"><?php echo $bienvenue?></a>
							</li>
                   
							
							
						</ul>
					
           
        </div>
        <center><h1 style="font-size: 24px;">Les users de l'Institut Superier d'Arts et Metiers/Lubumbashi</h1></center><hr>
                
   <div>
   
</br>
<div class="container">
<div class="row">
<div class="col-md-12">
<fieldset>
	<section>
      <table id="example" class="table table-bordered" style="width:100%">
				<thead>
					<tr color="red">
                  <th>ID </th>
						<th>DATE CREATION</th>
						<th>NOM</th>
						<th>PRENOM</th>
						<th>LOGIN</th>
						<th>PASS WORD</th>
                  
                  <th>MODIFIER</th>
                 
					</tr>
         </thead>
         <tbody>
         <?php while($et=$stmt->fetch()){  ?>
                <tr  bgcolor="Silver">
                   <td bgcolor="#F0FFFF"> <?php echo($et['id']) ?></td>
                  
                   <td bgcolor="#F0FFFF"><?php echo($et['date']) ?></td>
                   <td><?php echo($et['nom']) ?></td>
                   <td bgcolor="#FFFFFF"><?php echo($et['prenom']) ?></td>
                   <td bgcolor="#777777"><?php echo($et['login']) ?></td>
                   <td bgcolor="#F0FFFF"><?php echo($et['pass']) ?></td>
                 
                   <td><a href="modifierDG.php?code=<?php echo($et['id']) ?>">Modifier</a></td>
                   
                </tr>
              <?php  } ?>
          </tbody>
          <tfoot>
          <tr color="red">
                  <th>ID </th>
						<th>DATE CREATION</th>
						<th>NOM</th>
						<th>PRENOM</th>
						<th>LOGIN</th>
						<th>PASS WORD</th>
                  
                  <th>MODIFIER</th>
                 
					</tr>
				</tfoot>
   </table>	
   <script type="text/javascript">
      $("#example").dataTable({

      });
   </script>
		
   </section></fieldset>	</div>
</div>
</div>
	
<center><p class="inscription">LOGICIEL<span><a href="#">-PAIEMENT-</a></span>ISTAM <span>LUBUMBASHI</span></p></center>
   <footer>
                            
   <center> <p> <p><em>Fils Kernel KANDE DEVELOPPEUR INFORMATIQUE, fistonkande24@gmail.com, +243815515896 <img src="kernel.jpg"  alt="Avatar" style="width:40px"/></em></p></center>
                            
 
   </footer>
   </body>
</html>