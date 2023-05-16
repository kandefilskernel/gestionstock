<?php
    $code=$_GET['code'];
    require_once("cn.php");
    $sql=$pdo->prepare("DELETE FROM etudiants WHERE idetudiant=?");
    $params=array($code);
    $sql->execute($params);
    header("location:session2.php");
?>