<?php
//session_start();
include_once ("codes/classes/classeMouvement.php");

$Format_Date = 'd/m/Y à H:i';
	$Format_Affiche = 'd/m/Y';
	$Format_Envoie = 'Y/m/d';
	$Aj=date($Format_Envoie,time());

	$Cdate=$Aj;

	

$recherche=new mouvement();

if (isset($_POST['Envoyer'])) {
	$DateDeb=date($Format_Affiche,strtotime($_POST['Cdatee']));
	$DateFin=date($Format_Affiche,strtotime($_POST['Cdate']));
	$DateAff="Du"." ".$DateDeb." "."au"." ".$DateFin;
	$Tab_Mouv=$recherche->fx_FinancementAgc_Date($_SESSION['IdAgence'],$_POST['Cdatee'],$_POST['Cdate']);
	$Tab_Rubrik=$recherche->fx_FinancementAgc_Sum($_SESSION['IdAgence'],$_POST['Cdatee'],$_POST['Cdate']);
}else {
	$DateAff=date($Format_Affiche,strtotime($Cdate));
	$Tab_Mouv=$recherche->fx_FinacementAgc_Jour($_SESSION['IdAgence'],$Aj);
	$Tab_Rubrik=$recherche->fx_FinancementAgc_SumJr($_SESSION['IdAgence'],$Aj);
}
	
	
	
						      
								
?>	