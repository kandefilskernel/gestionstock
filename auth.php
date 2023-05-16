<?php
  require_once("cn.php");
  $login=$_POST['login'];  
  $password=md5($_POST['password']);  
  $sql="SELECT * FROM user WHERE Login=?  AND Password=?";
  $stmt =$pdo->prepare($sql);
  $parrams=array($login,$password);
  $stmt->execute($parrams);
  if($user=$stmt->fetch()){
      session_start();
      $_SESSION['PROFILE']=$login;
      header("location:essai.php");
  }
  else{
    header("location:index.php");
  }
?> 