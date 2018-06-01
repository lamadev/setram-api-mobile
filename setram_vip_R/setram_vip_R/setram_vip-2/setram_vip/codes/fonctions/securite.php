<?php
session_start();
//if((!isset($_SESSION['idagent']))or($_SESSION['adresseIP']!=$_SERVER['REMOTE_ADDR'])or(!isset($_SESSION['IdAgence']))){
if((!isset($_SESSION['idagent']))or(!isset($_SESSION['IdAgence']))){
 header("location:Authentification.php");
 exit();

}


?>