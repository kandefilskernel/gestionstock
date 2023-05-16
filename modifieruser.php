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
    $sql=$pdo->prepare("SELECT * FROM utilisateurs WHERE id=?");
    $params=array($code);
    $sql->execute($params);
    $etudiants=$sql->fetch();
     
 ?>
 <!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />

      <style>
         *{
            font-family:arial;
         }
         body{
            margin:20px;
         }
         a{
            color:#EE6600;
            text-decoration:none;
         }
         a:hover{
            text-decoration:underline;
         }
      </style>
      <style>
     p {
          color: navy;
          text-indent: 30px;
          text-transform: uppercase;
       }
     </style><style>
body
{
   width: 1125px;
   margin: auto;
   margin-top: 30px;
   margin-bottom: 20px;
   background-image:url(image/body.png);
   background-repeat: repeat-x;
   height: 100%;
}
#en_tete
{
        width: 1125px;
        height: 100px;
        background-repeat: no-repeat;
        margin-bottom: 10px;
}
#menu
{
   float: left;
   width: 155px;
   border: 1px ridge #d1d1d1;
}
.element_menu
{
   background-color: #f0f6f7;
   margin-bottom: 1px;
   padding-top: 5px;
}
.element_menu ul
{
   list-style-image: url(image/favicon.png);
   padding: 0px;
   padding-left: 20px;
   margin: 0px;
   margin-bottom: 3px;
}
.element_menu a
{
   color: #6FC69A;
}
.element_menu a:hover
{
   background-color: #2e91ab;
   color: #a1fcf9;
}
.lol
{
border-bottom: thin ridge #d1d1d1;
width: 155px;
padding-bottom: 5px;
}
.mdr
{
padding-left: 5px;
}
.Style1
{
        font-family: Arial, Helvetica, sans-serif;
}
#corps
{
        padding: 5px;
        background-color: #f0f6f7;
        font: Arial, Helvetica, sans-serif;
        border: 1px ridge #d1d1d1;
        margin-left: 5px;
        float: left;
}
#corps p
{
        width: 845px;
color: #0481ab;
}
#corps {
        width: 780px;
}
.Style2 {color: #0481ab}
.Style3 {font-family: Arial, Helvetica, sans-serif; color: #0481ab; }
</style>
<style type="text/css">
<!--
.Style4 {
        font-size: 12px
}
.Style7 {
        font-size: 36px
}
#divers
{
float: right;
width: 165px;
font: Arial, Helvetica, sans-serif;
border: 1px ridge #d1d1d1;
background-color: #f0f6f7;
}
-->
</style>
     <link rel="stylesheet"  href="style2.css" />
     <link  rel="stylesheet" href="http://use.fontawesome.com/releases/v5.13.0/css/all.css">

   </head>
   <body onLoad="document.fo.login.focus()">

        <p>ISTAM-LUBUMBASHI</p>
        <div class="col-md-12">
        <center><form  method="post"  action="editeruser.php" > 
      
        <fieldset>
           <legend>DONNEES A MODIFIER</legend> 
           <table>
           <tr>
              
               <input type="hidden"  name="id1"   value="<?php echo($etudiants['id']) ?>"/>
           </tr>
          
            <tr>
              <td><label>MOT DE PASSE:</label></td>
              <td><input type="text"  name="id2" class=""  value="<?php echo($etudiants['pass']) ?>"/></td><hr>
            </tr>
           
            </table>
            <button type="submit">MODIFIER</button>
           </fieldset>   
        </form></center></div>
        <p class="inscription">LOGICIEL<span>-PAIEMENT-</span>ISTAM <span>LUBUMBASHI</span></p>
   </body>
</html>