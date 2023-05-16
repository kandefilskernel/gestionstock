<?php
  //require_once("connexionBD.php");
  require_once("cn.php");
  $sql="SELECT * FROM user";
  $stmt =$pdo->prepare($sql);
  $stmt->execute();
  //return $stmt->fetchAll();
?>
<html>
    <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="fiston.css"><!-- followed by your custom css after-->
       
    </head>
    <body>
  
    <?php  require_once("entete.php") ?>
      <div class="col-md-12 col-xs-12  spacer">
        <div class="panel panel-info" >
           <div class="panel-heading">LISTE DES USERS </div>
           <div class="panel-body">
           <table class="myTable">
         <thead>
            <tr>
              <th>ID étudiant</th><th>Nom étudiat</th><th>Genre</th><th>Promotion</th><th>Filiere</th><th>Photo</th>
            </tr>
         </thead>
         <tbody>
              <?php while($et=$stmt->fetch()){  ?>
                <tr>
                   <td><?php echo($et['Nomuser']) ?></td>
                   <td><?php echo($et['Privilege']) ?></td>
                   <td><?php echo($et['Nomcomplet']) ?></td>
                </tr>
              <?php  } ?>
         </tbody>
       </table>
           </div>
        </div>
      
      </div>
     
    </body>
</html>