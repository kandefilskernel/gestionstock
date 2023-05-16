<?php
   session_start();
   if($_SESSION["autoriser"]!="oui"){
      header("location:index.php");
      exit();
   }
?>
<?php
    $A1=$_POST["id1"];
    $A2=$_POST['id2'];
    $A3=$_POST['id3'];
    $A4=$_POST['id4'];
    $A5=$_POST['id5'];
    $A6=$_POST['id6'];
    @$nomPhoto=$_FILES["photo"]["name"];
    if($nomPhoto=="")
    {
        include("BD2.php");
        $sql=$pdo->prepare("UPDATE  etudiants SET nom=?, promotion=?, filiere=?, tel=?, genre=?   WHERE idetudiant=?");
        $params=array($A2,$A3,$A4,$A5,$A6,$A1,);
        $sql->execute($params);
    }
    else
    {
        @$fichierTempon=$_FILES['photo']['tmp_name'];
        move_uploaded_file($fichierTempon,'./images/'.$nomPhoto);
        include("BD2.php");
        $sql=$pdo->prepare("UPDATE  etudiants SET nom=?, promotion=?, filiere=?, tel=?, genre=?, photo=?   WHERE idetudiant=?");
        $params=array($A2,$A3,$A4,$A5,$A6,$nomPhoto,$A1,);
        $sql->execute($params);
    }
  
    header("location:session2.php");
     
 ?> 