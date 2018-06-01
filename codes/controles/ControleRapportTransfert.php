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
	if (($_POST['Cdatee']=="") && ($_POST['Cdate']=="")) {
		$DateDeb=date($Format_Affiche,strtotime($_POST['Cdatee']));
		$DateFin=date($Format_Affiche,strtotime($_POST['Cdate']));
		$DateAff="Du"." ".$DateDeb." "."au"." ".$DateFin;
		$Tab_Mouv=$recherche->fx_TransfertAgc_Date($_SESSION['IdAgence'],$_POST['Cdatee'],$_POST['Cdate']);
		$Tab_Rubrik=$recherche->fx_TransfertAgc_SUMDate($_SESSION['IdAgence'],$_POST['Cdatee'],$_POST['Cdate']);
		$Tab_Commis=$recherche->fx_TransfertAgc_CommisDate($_SESSION['IdAgence'],$_POST['Cdatee'],$_POST['Cdate']);
	}
	
}else {
	$DateAff=date($Format_Affiche,strtotime($Cdate));
	$Tab_Mouv=$recherche->fx_TransfertAgc_Jour($_SESSION['IdAgence'],$Aj);
	$Tab_Rubrik=$recherche->fx_TransfertAgc_SUMJour($_SESSION['IdAgence'],$Aj);
	$Tab_Commis=$recherche->fx_TransfertAgc_CommisJour($_SESSION['IdAgence'],$Aj);
}
	
	
	
						      
								
?>	