<?php
   session_start();
   if($_SESSION["autoriser"]!="oui"){
      header("location:index.php");
      exit();
   }
?>
<?php
    $code=$_GET['code'];
    require_once("cn.php");
    $sql=$pdo->prepare("SELECT * FROM etudiants WHERE idetudiant=?");
    $params=array($code);
    $sql->execute($params);
    $etudiants=$sql->fetch();
     
 ?>
 <!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />

      <style type="text/css">
     fieldset {
                 position:relative;
                 margin-top:2px;
                 height:200px;
                 background:white;
                 padding-top:10px;
             }
            
</style>
     <link rel="stylesheet"  href="style2.css" />
     <link  rel="stylesheet" href="http://use.fontawesome.com/releases/v5.13.0/css/all.css">
     <meta name="description" content="example-aggregate-functions-and-grouping-sum-with-group-by- php mysql examples | w3resource">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
     <style>
     thead {color: green;}
tbody {color: blue;}
tfoot {color: red;}

  table, th, td {
  border: 1px solid black;
  font-family: Arial, Helvetica, sans-serif; 
   font-size: 10px;
  </style>
  <style>
img {
  border-radius: 50%;
}
</style>
<meta name="description" content="example-aggregate-functions-and-grouping-sum-with-group-by- php mysql examples | w3resource">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
   </head>
   <body onLoad="document.fo.login.focus()">
 
   <div class="container">
<div class="row">
<div class="col-md-12">
        <center><form  method="post"  action="editabetudiant.php" enctype="multipart/form-data"> 
        <fieldset>
           <legend>DONNEES A MODIFIER</legend> 
           <table>
           
             
             <td><input type="hidden"  name="id1"   value="<?php echo($etudiants['idetudiant']) ?>"  size="40"/></td>
             
             <tr>
              <td><label>NOM:</label></td>
              <td><input type="text"  name="id2"   value="<?php echo($etudiants['nom']) ?>"/size="40"></td>
               </tr>
               <tr>
               <td> <label>PROMOTION:</label></td>
               <td><input type="text"  name="id3" class=""  value="<?php echo($etudiants['promotion']) ?>"/></td>
               </tr>
               <tr>
               <td><label>FILIERE:</label></td>
               <td><input type="text"  name="id4" class="" size="40"  value="<?php echo($etudiants['filiere']) ?>"/></td>
               </tr>
               <tr>
               <td><label>TEL:</label></td>
               <td><input type="text"  name="id5" class=""  value="<?php echo($etudiants['tel']) ?>"/></td>
               </tr>
               <tr>
               <td><label>GENRE:</label></td>
               <td> <input type="text"  name="id6" class=""  value="<?php echo($etudiants['genre']) ?>"/></td>
            
               </tr>
               <tr>
               <td><label>PHOTO:</label>
               <input type="file"  name="photo" /></td>
               <td><center><img src="images/<?php echo($etudiants['photo']) ?>"  alt="Avatar" style="width:110px"/></center>
               <center> <button type="submit">MISE A JOUR</button></center>  </td>
               </tr>
            
               
               
               </table>
           </fieldset>
           
        </form></center></div>
</div>
</div>
       
   </body>
   
</html>