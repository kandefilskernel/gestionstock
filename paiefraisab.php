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
   @$fils="OK";
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
  $sels=$pdo->prepare("select datepaiement,etatdg from paiement where datepaiement=?  AND etatdg=?  limit 1");
  $sels->execute(array($K5,$fils));
  $tab1=$sels->fetchAll();
  if(count($tab1)>0)
  {
    $erreur="SVP TENTATIVE DE FRAUDE Toutes les informations de cette DATE ont été validées PAR LE DG!";
  }  
  else
  {
      $sel=$pdo->prepare("select recu from paiement where recu=? limit 1");
      $sel->execute(array($K1));
        $tab=$sel->fetchAll();
         if(count($tab)>0){
            $erreur="Recu existe déjà!Veuillez changer SVP";
          } 
         else
         {
            $ins=$pdo->prepare("insert into paiement(recu,idetudiant,carnet,montant$,datepaiement,libelle,user,etat,etatdg) values(?,?,?,?,?,?,?,?,?)");
            if($ins->execute(array(@$K1,@$K2,@$K3,@$K4,@$K5,@$K6,@$nom,@$etat,@$etatdg)))
               header("location:paiefrais.php");
           }   
   }
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
img {
  border-radius: 50%;
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
  <style>
img {
  border-radius: 50%;
}
</style>
</head>
<body class="dt-example"   bgcolor="#000000">
     
<div class="col-md-12">
						<ul class="menu">
							<li>
								<a href="deconnexion.php">Deconnexion(istam)</a>
                             </li>
                             <li>
								<a href="fraisab.php">Autres frais</a>
							</li>
							<li>
								<a href="ab.php">Menu</a>
							</li>
						</ul>
					
           
        </div> </br>
        
        <center><center> <div class="erreur" ><?php echo $erreur ?></div> </center>
  
        <img src="fils.png"  alt="Avatar" style="width:30px"/>
   <div class="col-md-12">
 <form name="fo" method="post" action="">

  <fieldset bgcolor="#f77777">
 
    <center><label >LE LIBELLE</label> <input  type="radio" name="N6" value="Inscription"/>Inscription....<input type="radio" name="N6" value="Reinscription"/>Reinscription....<input type="radio" name="N6" value="Speciale"/>Speciale....<input type="radio" name="N6" value="Mi-session"/>Mi-session....<input type="radio" name="N6" value="Attestation"/>Attestation..<input type="radio" name="N6" value="Releve"/>Rélevé</br>
   
    <label for="inscription"></label>
      <select name="N4" id="inscription">
      <option value="15">Inscription</option>
      <option value="20">Reinscription</option>
      <option value="30">Inscription Speciale</option>
      <option value="20">Rélevé</option>
      <option value="20">Attestation</option>
      <option value="20">Mi-session</option>
      <option value="20">Session</option>
    </select>
    <span id="prix">15</span></center></br>
    <center><input type="text" name="N1" placeholder="Saisir le recu"/>.<input type="text" name="N3" placeholder="Saisir le n° carnet" >.<input type="text" name="N2" placeholder="Saisir le ID" >Date:<input type="date" name="N5"/><input type="submit"  value="AJOUTER PAIEMENT" /><center>
    <hr>
    <center></center>
   </fieldset>
   </form></div>
</div>
</div> </br></br>
   <div class="container">
   <div class="row">
   <div class="col-md-12">
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
						<th>TEL</th>
            <th>PHOTO</th>
            
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
                   <td bgcolor="#777777"><?php echo($et['tel']) ?></td>
                   <center><td bgcolor="#F0FFFF"><img src="images/<?php echo($et['photo']) ?>"  alt="Avatar" style="width:40px; heith:40px"/></td></center>
                </tr>
              <?php  } ?>
          </tbody>
          <tfoot>
					<tr>
            <th>ID </th>
						<th>NOM ETUDIANT</th>
						<th>GENRE</th>
						<th>PROMOTION</th>
						<th>FILIERE</th>
						<th>TEL</th>
            <th>PHOTO</th>
					</tr>
				</tfoot>
   </table>	
   <script type="text/javascript">
      $("#example").dataTable({

      });
   </script>

    </section> </fieldset></div>

	
   <p class="inscription">LOGICIEL<span><a href="#">-PAIEMENT-</a></span>ISTAM <span>LUBUMBASHI</span></p>
   <footer>
                            
                            <center> <p> <p><em>Fils Kernel KANDE DEVELOPPEUR INFORMATIQUE, fistonkande24@gmail.com, +243815515896 <img src="kernel.jpg"  alt="Avatar" style="width:40px"/></em></p></center>
                                                     
                          
                            </footer>
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