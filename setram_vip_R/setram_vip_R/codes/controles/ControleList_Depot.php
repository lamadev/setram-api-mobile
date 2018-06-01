<?php
include_once ("codes/classes/ClasseTransaction.php");
include ("codes/classes/ClasseAgence.php");

$recherche=new agence();
$Tab_Agence=$recherche->fx_ListeAgences();

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

	$Tab_Mouv=$recherche->fx_ListeDepot_Date($_POST['agenceExp'],$_POST['Cdatee'],$_POST['Cdate']);
}else {
	$DateAff=date($Format_Affiche,strtotime($Cdate));
	
	$Tab_Mouv=$recherche->fx_ListeDepot_Jour($_SESSION['IdAgence'],$Aj);
}
								
						      
								
?>	