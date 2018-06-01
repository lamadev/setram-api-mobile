<?php
//session_start();
include_once ("codes/classes/ClasseMouvement.php");
include_once ("codes/classes/ClasseAgence.php");
include_once ("codes/classes/ClasseTransaction.php");

$Format_Date = 'd/m/Y à H:i';
	$Format_Affiche = 'd/m/Y';
	$Format_Envoie = 'Y/m/d';
	$Aj=date($Format_Envoie,time());

	$Cdate=$Aj;

	$recherche=new agence();
	$Tab_Agence=$recherche->fx_ListeAgences();

$recherche=new mouvement();
$recherches=new transaction();

if ($_GET['Type']=="depot") {

	if (isset($_POST['Envoyer'])) {
		if (($_POST['Cdatee']=="") && ($_POST['Cdate']=="") && ($_POST['agenceExp']=="0")) {

			$DateAff=date($Format_Affiche,strtotime($Cdate));
			$Tab_Mouv=$recherches->fx_DepotAgencesDate_Jour($Aj);
			$Tab_Rubrik=$recherches->fx_DepotAgencesDate_SUMJr($Aj);

		}elseif (($_POST['Cdatee'] != "") && ($_POST['Cdate'] != "") && ($_POST['agenceExp']=="0")) {

			$DateDeb=date($Format_Affiche,strtotime($_POST['Cdatee']));
			$DateFin=date($Format_Affiche,strtotime($_POST['Cdate']));
			$DateAff="Du"." ".$DateDeb." "."au"." ".$DateFin;
			$Tab_Mouv=$recherches->fx_DepotAgences_Date($_POST['Cdatee'],$_POST['Cdate']);
			$Tab_Rubrik=$recherches->fx_DepotAgencesDate_SUM($_POST['Cdatee'],$_POST['Cdate']);

		}elseif (($_POST['Cdatee'] != "") && ($_POST['Cdate'] != "") && ($_POST['agenceExp'] != "0")) {

			$DateDeb=date($Format_Affiche,strtotime($_POST['Cdatee']));
			$DateFin=date($Format_Affiche,strtotime($_POST['Cdate']));
			$DateAff="Du"." ".$DateDeb." "."au"." ".$DateFin;
			$Tab_Mouv=$recherches->fx_DepotAgenc_Date($_POST['agenceExp'],$_POST['Cdatee'],$_POST['Cdate']);
			$Tab_Rubrik=$recherches->fx_DepotAgencDate_SUM($_POST['agenceExp'],$_POST['Cdatee'],$_POST['Cdate']);

		}elseif (($_POST['Cdatee'] == "") && ($_POST['Cdate'] == "") && ($_POST['agenceExp'] != "0")) {
			$DateAff=date($Format_Affiche,strtotime($Cdate));
			$Tab_Mouv=$recherches->fx_DepotAgencDate_Jour($_POST['agenceExp'],$Aj);
			$Tab_Rubrik=$recherches->fx_DepotAgencDate_SUMJr($_POST['agenceExp'],$Aj);
		}
		
	}else {
		$DateAff=date($Format_Affiche,strtotime($Cdate));
		$Tab_Mouv=$recherches->fx_DepotAgencesDate_Jour($Aj);
		$Tab_Rubrik=$recherches->fx_DepotAgencesDate_SUMJr($Aj);
	}

}elseif ($_GET['Type']=="retrait") {

	if (isset($_POST['Envoyer'])) {

		if (($_POST['Cdatee']=="") && ($_POST['Cdate']=="") && ($_POST['agenceExp']=="0")) {

			$DateAff=date($Format_Affiche,strtotime($Cdate));
			$Tab_Mouv=$recherches->fx_RetraitAgencesDate_Jour($Aj);
			$Tab_Rubrik=$recherches->fx_RetraitAgencesDate_SUMJr($Aj);

		}elseif (($_POST['Cdatee'] != "") && ($_POST['Cdate'] != "") && ($_POST['agenceExp']=="0")) {

			$DateDeb=date($Format_Affiche,strtotime($_POST['Cdatee']));
			$DateFin=date($Format_Affiche,strtotime($_POST['Cdate']));
			$DateAff="Du"." ".$DateDeb." "."au"." ".$DateFin;
			$Tab_Mouv=$recherches->fx_RetraitAgences_Date($_POST['Cdatee'],$_POST['Cdate']);
			$Tab_Rubrik=$recherches->fx_RetraitAgencesDate_SUM($_POST['Cdatee'],$_POST['Cdate']);

		}elseif (($_POST['Cdatee'] != "") && ($_POST['Cdate'] != "") && ($_POST['agenceExp'] != "0")) {

			$DateDeb=date($Format_Affiche,strtotime($_POST['Cdatee']));
			$DateFin=date($Format_Affiche,strtotime($_POST['Cdate']));
			$DateAff="Du"." ".$DateDeb." "."au"." ".$DateFin;
			$Tab_Mouv=$recherches->fx_RetraitAgenc_Date($_POST['agenceExp'],$_POST['Cdatee'],$_POST['Cdate']);
			$Tab_Rubrik=$recherches->fx_RetraitAgencDate_SUM($_POST['agenceExp'],$_POST['Cdatee'],$_POST['Cdate']);

		}elseif (($_POST['Cdatee'] == "") && ($_POST['Cdate'] == "") && ($_POST['agenceExp'] != "0")) {
			$DateAff=date($Format_Affiche,strtotime($Cdate));
			$Tab_Mouv=$recherches->fx_RetraitAgencDate_Jour($_POST['agenceExp'],$Aj);
			$Tab_Rubrik=$recherches->fx_RetraitAgencDate_SUMJr($_POST['agenceExp'],$Aj);
		}
		
	}else {
		$DateAff=date($Format_Affiche,strtotime($Cdate));
		$Tab_Mouv=$recherches->fx_RetraitAgencesDate_Jour($Aj);
		$Tab_Rubrik=$recherches->fx_RetraitAgencesDate_SUMJr($Aj);
	}

}elseif ($_GET['Type']=="transfert") {

	if (isset($_POST['Envoyer'])) {
		$DatDeb =$_POST['Cdatee'];
		$DatFin =$_POST['Cdate'];
		$Agces =$_POST['agenceExp']; 

		if (($DatDeb=="") && ($DatFin=="") && ($Agces=="0")) {
			
			$DateAff=date($Format_Affiche,strtotime($Cdate));
			$Tab_Mouv=$recherches->fx_TransfertAgces_Jour($Aj);
			$Tab_Rubrik=$recherches->fx_TransfertAgces_SUMJour($Aj);
			$Tab_Commis=$recherches->fx_TransfertAgces_CommisJour($Aj);

		}elseif (($_POST['Cdatee'] != "") && ($_POST['Cdate'] != "") && ($_POST['agenceExp']=="0")) {
			
			$DateDeb=date($Format_Affiche,strtotime($_POST['Cdatee']));
			$DateFin=date($Format_Affiche,strtotime($_POST['Cdate']));
			$DateAff="Du"." ".$DateDeb." "."au"." ".$DateFin;
			$Tab_Mouv=$recherches->fx_TransfertAgces_Date($_POST['Cdatee'],$_POST['Cdate']);
			$Tab_Rubrik=$recherches->fx_TransfertAgces_SUMDate($_POST['Cdatee'],$_POST['Cdate']);
			$Tab_Commis=$recherches->fx_TransfertAgces_CommisDate($_POST['Cdatee'],$_POST['Cdate']);

		}elseif (($_POST['Cdatee'] != "") && ($_POST['Cdate'] != "") && ($_POST['agenceExp'] != "0")) {

			$DateDeb=date($Format_Affiche,strtotime($_POST['Cdatee']));
			$DateFin=date($Format_Affiche,strtotime($_POST['Cdate']));
			$DateAff="Du"." ".$DateDeb." "."au"." ".$DateFin;
			$Tab_Mouv=$recherches->fx_TransfertAgc_Date($_POST['agenceExp'],$_POST['Cdatee'],$_POST['Cdate']);
			$Tab_Rubrik=$recherches->fx_TransfertAgc_SUMDate($_POST['agenceExp'],$_POST['Cdatee'],$_POST['Cdate']);
			$Tab_Commis=$recherches->fx_TransfertAgc_CommisDate($_POST['agenceExp'],$_POST['Cdatee'],$_POST['Cdate']);

		}elseif (($_POST['Cdatee'] == "") && ($_POST['Cdate'] == "") && ($_POST['agenceExp'] != "0")) {
			
			$DateAff=date($Format_Affiche,strtotime($Cdate));
			$Tab_Mouv=$recherches->fx_TransfertAgc_Jour($_POST['agenceExp'],$Aj);
			$Tab_Rubrik=$recherches->fx_TransfertAgc_SUMJour($_POST['agenceExp'],$Aj);
			$Tab_Commis=$recherches->fx_TransfertAgc_CommisJour($_POST['agenceExp'],$Aj);
		}
		
	}else {

		$DateAff=date($Format_Affiche,strtotime($Cdate));
		$Tab_Mouv=$recherches->fx_TransfertAgces_Jour($Aj);
		$Tab_Rubrik=$recherches->fx_TransfertAgces_SUMJour($Aj);
		$Tab_Commis=$recherches->fx_TransfertAgces_CommisJour($Aj);
	}

}elseif ($_GET['Type']=="depense") {

	if (isset($_POST['Envoyer'])) {

		if (($_POST['Cdatee']=="") && ($_POST['Cdate']=="") && ($_POST['agenceExp']=="0")) {

			$DateAff=date($Format_Affiche,strtotime($Cdate));
			$Tab_Mouv=$recherche->fx_DepenseAgces_Jour($Aj);
			$Tab_Rubrik=$recherche->fx_DepenseAgces_SumJr($Aj);

		}elseif (($_POST['Cdatee'] != "") && ($_POST['Cdate'] != "") && ($_POST['agenceExp']=="0")) {

			$DateDeb=date($Format_Affiche,strtotime($_POST['Cdatee']));
			$DateFin=date($Format_Affiche,strtotime($_POST['Cdate']));
			$DateAff="Du"." ".$DateDeb." "."au"." ".$DateFin;
			$Tab_Mouv=$recherche->fx_DepenseAgces_Date($_POST['Cdatee'],$_POST['Cdate']);
			$Tab_Rubrik=$recherche->fx_DepenseAgces_Sum($_POST['Cdatee'],$_POST['Cdate']);

		}elseif (($_POST['Cdatee'] != "") && ($_POST['Cdate'] != "") && ($_POST['agenceExp'] != "0")) {

			$DateDeb=date($Format_Affiche,strtotime($_POST['Cdatee']));
			$DateFin=date($Format_Affiche,strtotime($_POST['Cdate']));
			$DateAff="Du"." ".$DateDeb." "."au"." ".$DateFin;
			$Tab_Mouv=$recherche->fx_DepenseAgc_Date($_POST['agenceExp'],$_POST['Cdatee'],$_POST['Cdate']);
			$Tab_Rubrik=$recherche->fx_DepenseAgc_Sum($_POST['agenceExp'],$_POST['Cdatee'],$_POST['Cdate']);

		}elseif (($_POST['Cdatee'] == "") && ($_POST['Cdate'] == "") && ($_POST['agenceExp'] != "0")) {
			$DateAff=date($Format_Affiche,strtotime($Cdate));
			$Tab_Mouv=$recherche->fx_DepenseAgc_Jour($_POST['agenceExp'],$Aj);
			$Tab_Rubrik=$recherche->fx_DepenseAgc_SumJr($_POST['agenceExp'],$Aj);
		}
		
	}else {
		$DateAff=date($Format_Affiche,strtotime($Cdate));
		$Tab_Mouv=$recherche->fx_DepenseAgces_Jour($Aj);
		$Tab_Rubrik=$recherche->fx_DepenseAgces_SumJr($Aj);
	}

}elseif ($_GET['Type']=="conversion") {
	if (isset($_POST['Envoyer'])) {
		if (($_POST['Cdatee']=="") && ($_POST['Cdate']=="") && ($_POST['agenceExp']=="0")) {

			$DateAff=date($Format_Affiche,strtotime($Cdate));
			$Tab_Mouv=$recherche->fx_ConversionAgces_Jour($Aj);
			$Tab_Rubrik=$recherche->fx_ConversionAgces_SumJr($Aj);

		}elseif (($_POST['Cdatee'] != "") && ($_POST['Cdate'] != "") && ($_POST['agenceExp']=="0")) {

			$DateDeb=date($Format_Affiche,strtotime($_POST['Cdatee']));
			$DateFin=date($Format_Affiche,strtotime($_POST['Cdate']));
			$DateAff="Du"." ".$DateDeb." "."au"." ".$DateFin;
			$Tab_Mouv=$recherche->fx_ConversionAgces_Date($_POST['Cdatee'],$_POST['Cdate']);
			$Tab_Rubrik=$recherche->fx_ConversionAgces_Sum($_POST['Cdatee'],$_POST['Cdate']);

		}elseif (($_POST['Cdatee'] != "") && ($_POST['Cdate'] != "") && ($_POST['agenceExp'] != "0")) {

			$DateDeb=date($Format_Affiche,strtotime($_POST['Cdatee']));
			$DateFin=date($Format_Affiche,strtotime($_POST['Cdate']));
			$DateAff="Du"." ".$DateDeb." "."au"." ".$DateFin;
			$Tab_Mouv=$recherche->fx_ConversionAgc_Date($_POST['agenceExp'],$_POST['Cdatee'],$_POST['Cdate']);
			$Tab_Rubrik=$recherche->fx_ConversionAgc_Sum($_POST['agenceExp'],$_POST['Cdatee'],$_POST['Cdate']);

		}elseif (($_POST['Cdatee'] == "") && ($_POST['Cdate'] == "") && ($_POST['agenceExp'] != "0")) {
			$DateAff=date($Format_Affiche,strtotime($Cdate));
			$Tab_Mouv=$recherche->fx_ConversionAgc_Jour($_POST['agenceExp'],$Aj);
			$Tab_Rubrik=$recherche->fx_ConversionAgc_SumJr($_POST['agenceExp'],$Aj);
		}
		
	}else {
		$DateAff=date($Format_Affiche,strtotime($Cdate));
		$Tab_Mouv=$recherche->fx_ConversionAgces_Jour($Aj);
		$Tab_Rubrik=$recherche->fx_ConversionAgces_SumJr($Aj);
	}
}elseif ($_GET['Type']=="financement") {
	if (isset($_POST['Envoyer'])) {
		if (($_POST['Cdatee']=="") && ($_POST['Cdate']=="") && ($_POST['agenceExp']=="0")) {

			$DateAff=date($Format_Affiche,strtotime($Cdate));
			$Tab_Mouv=$recherche->fx_FinacementAgces_Jour($Aj);
			$Tab_Rubrik=$recherche->fx_FinancementAgces_SumJr($Aj);

		}elseif (($_POST['Cdatee'] != "") && ($_POST['Cdate'] != "") && ($_POST['agenceExp']=="0")) {

			$DateDeb=date($Format_Affiche,strtotime($_POST['Cdatee']));
			$DateFin=date($Format_Affiche,strtotime($_POST['Cdate']));
			$DateAff="Du"." ".$DateDeb." "."au"." ".$DateFin;
			$Tab_Mouv=$recherche->fx_FinancementAgces_Date($_POST['Cdatee'],$_POST['Cdate']);
			$Tab_Rubrik=$recherche->fx_FinancementAgces_Sum($_POST['Cdatee'],$_POST['Cdate']);

		}elseif (($_POST['Cdatee'] != "") && ($_POST['Cdate'] != "") && ($_POST['agenceExp'] != "0")) {

			$DateDeb=date($Format_Affiche,strtotime($_POST['Cdatee']));
			$DateFin=date($Format_Affiche,strtotime($_POST['Cdate']));
			$DateAff="Du"." ".$DateDeb." "."au"." ".$DateFin;
			$Tab_Mouv=$recherche->fx_FinancementAgc_Date($_POST['agenceExp'],$_POST['Cdatee'],$_POST['Cdate']);
			$Tab_Rubrik=$recherche->fx_FinancementAgc_Sum($_POST['agenceExp'],$_POST['Cdatee'],$_POST['Cdate']);

		}elseif (($_POST['Cdatee'] == "") && ($_POST['Cdate'] == "") && ($_POST['agenceExp'] != "0")) {
			$DateAff=date($Format_Affiche,strtotime($Cdate));
			$Tab_Mouv=$recherche->fx_FinacementAgc_Jour($_POST['agenceExp'],$Aj);
			$Tab_Rubrik=$recherche->fx_FinancementAgc_SumJr($_POST['agenceExp'],$Aj);
		}
		
	}else {
		$DateAff=date($Format_Affiche,strtotime($Cdate));
		$Tab_Mouv=$recherche->fx_FinacementAgces_Jour($Aj);
		$Tab_Rubrik=$recherche->fx_FinancementAgces_SumJr($Aj);
	}
}


	
	
	
						      
								
?>	