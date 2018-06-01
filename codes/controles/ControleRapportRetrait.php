<?php
//session_start();
include_once ("codes/classes/classeTransaction.php");

$Format_Date = 'd/m/Y à H:i';
	$Format_Affiche = 'd/m/Y';
	$Format_Envoie = 'Y/m/d';
	$Aj=date($Format_Envoie,time());

	$Cdate=$Aj;

	

$recherche=new transaction();

if (isset($_POST['Envoyer'])) {
	$DateDeb=date($Format_Affiche,strtotime($_POST['Cdatee']));
	$DateFin=date($Format_Affiche,strtotime($_POST['Cdate']));
	$DateAff="Du"." ".$DateDeb." "."au"." ".$DateFin;
	$Tab_Mouv=$recherche->fx_RetraitAgenc_Date($_SESSION['IdAgence'],$_POST['Cdatee'],$_POST['Cdate']);
	$Tab_Rubrik=$recherche->fx_RetraitAgencDate_SUM($_SESSION['IdAgence'],$_POST['Cdatee'],$_POST['Cdate']);
}else {
	$DateAff=date($Format_Affiche,strtotime($Cdate));
	$Tab_Mouv=$recherche->fx_RetraitAgencDate_Jour($_SESSION['IdAgence'],$Aj);
	$Tab_Rubrik=$recherche->fx_RetraitAgencDate_SUMJr($_SESSION['IdAgence'],$Aj);
}
	
	
	
						      
								
?>	