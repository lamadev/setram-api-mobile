<?php
//session_start();
include_once ("codes/classes/classeTransaction.php");
include_once ("codes/classes/classeMouvement.php");
include_once ("codes/classes/classeAgence.php");

$Format_Date = 'd/m/Y à H:i';
	$Format_Affiche = 'd/m/Y';
	$Format_Envoie = 'Y/m/d';
	$Aj=date($Format_Envoie,time());

	$Cdate=$Aj;

	$recherche=new agence();
	$Tab_Agence=$recherche->fx_ListeAgences();

$recherche=new transaction();
$recherches=new mouvement();

if ($_GET['Type']=="GlobSup") {

	if (isset($_POST['Envoyer'])) {

		$DateDeb=date($Format_Affiche,strtotime($_POST['Cdatee']));
		$DateFin=date($Format_Affiche,strtotime($_POST['Cdate']));
		$DateAff="Du"." ".$DateDeb." "."au"." ".$DateFin;

		$Tab_Depot=$recherche->fx_Rapport_TransactAgc_Date($_SESSION['IdAgence'],$_POST['Cdatee'],$_POST['Cdate'],"Depot","E");
		$Tab_Retrait=$recherche->fx_Rapport_TransactAgc_Date($_SESSION['IdAgence'],$_POST['Cdatee'],$_POST['Cdate'],"Retrait","S");
		$Tab_Commiss=$recherche->fx_RapportCommis_AgcDate($_SESSION['IdAgence'],$_POST['Cdatee'],$_POST['Cdate']);
		$Tab_Finance=$recherches->fx_Rapport_Financement_Date($_SESSION['IdAgence'],$_POST['Cdatee'],$_POST['Cdate']);
		$Tab_Virement=$recherches->fx_Rapport_Mouvement_Date($_SESSION['IdAgence'],$_POST['Cdatee'],$_POST['Cdate'],"Virement","S");
		$Tab_Depense=$recherches->fx_Rapport_Mouvement_Date($_SESSION['IdAgence'],$_POST['Cdatee'],$_POST['Cdate'],"Depense","S");
		$Tab_Convers_E=$recherches->fx_Rapport_Mouvement_Date($_SESSION['IdAgence'],$_POST['Cdatee'],$_POST['Cdate'],"conversion","E");
		$Tab_Convers_S=$recherches->fx_Rapport_Mouvement_Date($_SESSION['IdAgence'],$_POST['Cdatee'],$_POST['Cdate'],"conversion","S");
		
	}else {

		$DateAff=date($Format_Affiche,strtotime($Cdate));

		$Tab_Depot=$recherche->fx_Rapport_TransactAgc_Jr($_SESSION['IdAgence'],$Aj,"Depot","E");
		$Tab_Retrait=$recherche->fx_Rapport_TransactAgc_Jr($_SESSION['IdAgence'],$Aj,"Retrait","S");
		$Tab_Commiss=$recherche->fx_RapportCommis_AgcJour($_SESSION['IdAgence'],$Aj);
		$Tab_Finance=$recherches->fx_Rapport_Financement_Jour($_SESSION['IdAgence'],$Aj);
		$Tab_Virement=$recherches->fx_Rapport_Mouvement_Jour($_SESSION['IdAgence'],$Aj,"Virement","S");
		$Tab_Depense=$recherches->fx_Rapport_Mouvement_Jour($_SESSION['IdAgence'],$Aj,"Depense","S");
		$Tab_Convers_E=$recherches->fx_Rapport_Mouvement_Jour($_SESSION['IdAgence'],$Aj,"conversion","E");
		$Tab_Convers_S=$recherches->fx_Rapport_Mouvement_Jour($_SESSION['IdAgence'],$Aj,"conversion","S");


	}

}elseif ($_GET['Type']=="GlobOperat") {


	if (isset($_POST['Envoyer'])) {

		$DateDeb=date($Format_Affiche,strtotime($_POST['Cdatee']));
		$DateFin=date($Format_Affiche,strtotime($_POST['Cdate']));
		$DateAff="Du"." ".$DateDeb." "."au"." ".$DateFin;

		$Tab_Depot=$recherche->fx_Rapport_TransactAgc_OperatDate($_SESSION['IdAgence'],$_SESSION['idagent'],$_POST['Cdatee'],$_POST['Cdate'],"Depot","E");
		$Tab_Retrait=$recherche->fx_Rapport_TransactAgc_OperatDate($_SESSION['IdAgence'],$_SESSION['idagent'],$_POST['Cdatee'],$_POST['Cdate'],"Retrait","S");
		$Tab_Commiss=$recherche->fx_RapportCommisAgc_OperatDate($_SESSION['IdAgence'],$_SESSION['idagent'],$_POST['Cdatee'],$_POST['Cdate']);
		$Tab_Finance=$recherches->fx_Rapport_Financement_OperatDate($_SESSION['IdAgence'],$_SESSION['idagent'],$_POST['Cdatee'],$_POST['Cdate']);
		$Tab_Virement=$recherches->fx_Rapport_Mouvement_OperatDate($_SESSION['IdAgence'],$_SESSION['idagent'],$_POST['Cdatee'],$_POST['Cdate'],"Virement","S");
		$Tab_Depense=$recherches->fx_Rapport_Mouvement_OperatDate($_SESSION['IdAgence'],$_SESSION['idagent'],$_POST['Cdatee'],$_POST['Cdate'],"Depense","S");
		$Tab_Convers_E=$recherches->fx_Rapport_Mouvement_OperatDate($_SESSION['IdAgence'],$_SESSION['idagent'],$_POST['Cdatee'],$_POST['Cdate'],"conversion","E");
		$Tab_Convers_S=$recherches->fx_Rapport_Mouvement_OperatDate($_SESSION['IdAgence'],$_SESSION['idagent'],$_POST['Cdatee'],$_POST['Cdate'],"conversion","S");
		
	}else {

		$DateAff=date($Format_Affiche,strtotime($Cdate));

		$Tab_Depot=$recherche->fx_Rapport_TransactAgc_OperatJr($_SESSION['IdAgence'],$_SESSION['idagent'],$Aj,"Depot","E");
		$Tab_Retrait=$recherche->fx_Rapport_TransactAgc_OperatJr($_SESSION['IdAgence'],$_SESSION['idagent'],$Aj,"Retrait","S");
		$Tab_Commiss=$recherche->fx_RapportCommisAgc_OperatJour($_SESSION['IdAgence'],$_SESSION['idagent'],$Aj);
		$Tab_Finance=$recherches->fx_Rapport_Financement_OperatJour($_SESSION['IdAgence'],$_SESSION['idagent'],$Aj);
		$Tab_Virement=$recherches->fx_Rapport_Mouvement_OperatJour($_SESSION['IdAgence'],$_SESSION['idagent'],$Aj,"Virement","S");
		$Tab_Depense=$recherches->fx_Rapport_Mouvement_OperatJour($_SESSION['IdAgence'],$_SESSION['idagent'],$Aj,"Depense","S");
		$Tab_Convers_E=$recherches->fx_Rapport_Mouvement_OperatJour($_SESSION['IdAgence'],$_SESSION['idagent'],$Aj,"conversion","E");
		$Tab_Convers_S=$recherches->fx_Rapport_Mouvement_OperatJour($_SESSION['IdAgence'],$_SESSION['idagent'],$Aj,"conversion","S");


	}

}elseif ($_GET['Type']=="admin") {
	if (isset($_POST['Envoyer'])) {

		if (($_POST['Cdatee']=="") && ($_POST['Cdate']=="") && ($_POST['agenceExp']=="0")) {
			
			$DateAff=date($Format_Affiche,strtotime($Cdate));

			$Tab_Depot=$recherche->fx_RapportGlob_Transact_Jr($Aj,"Depot","E");
			$Tab_Retrait=$recherche->fx_RapportGlob_Transact_Jr($Aj,"Retrait","S");
			$Tab_Commiss=$recherche->fx_RapportCommis_GlobJour($Aj);
			$Tab_Finance=$recherches->fx_Rapport_Financement_GlobJour($Aj);
			$Tab_Virement=$recherches->fx_Rapport_Mouvement_GlobJour($Aj,"Virement","S");
			$Tab_Depense=$recherches->fx_Rapport_Mouvement_GlobJour($Aj,"Depense","S");
			$Tab_Convers_E=$recherches->fx_Rapport_Mouvement_GlobJour($Aj,"conversion","E");
			$Tab_Convers_S=$recherches->fx_Rapport_Mouvement_GlobJour($Aj,"conversion","S");

		}elseif (($_POST['Cdatee'] != "") && ($_POST['Cdate'] != "") && ($_POST['agenceExp']=="0")) {
			
			$DateDeb=date($Format_Affiche,strtotime($_POST['Cdatee']));
			$DateFin=date($Format_Affiche,strtotime($_POST['Cdate']));
			$DateAff="Du"." ".$DateDeb." "."au"." ".$DateFin;

			$Tab_Depot=$recherche->fx_RapportGlob_Transact_Date($_POST['Cdatee'],$_POST['Cdate'],"Depot","E");
			$Tab_Retrait=$recherche->fx_RapportGlob_Transact_Date($_POST['Cdatee'],$_POST['Cdate'],"Retrait","S");
			$Tab_Commiss=$recherche->fx_RapportCommis_GlobDate($_POST['Cdatee'],$_POST['Cdate']);
			$Tab_Finance=$recherches->fx_Rapport_Financement_GlobDate($_POST['Cdatee'],$_POST['Cdate']);
			$Tab_Virement=$recherches->fx_Rapport_Mouvement_GlobDate($_POST['Cdatee'],$_POST['Cdate'],"Virement","S");
			$Tab_Depense=$recherches->fx_Rapport_Mouvement_GlobDate($_POST['Cdatee'],$_POST['Cdate'],"Depense","S");
			$Tab_Convers_E=$recherches->fx_Rapport_Mouvement_GlobDate($_POST['Cdatee'],$_POST['Cdate'],"conversion","E");
			$Tab_Convers_S=$recherches->fx_Rapport_Mouvement_GlobDate($_POST['Cdatee'],$_POST['Cdate'],"conversion","S");

		}elseif (($_POST['Cdatee'] != "") && ($_POST['Cdate'] != "") && ($_POST['agenceExp'] != "0")) {
			
		$DateDeb=date($Format_Affiche,strtotime($_POST['Cdatee']));
		$DateFin=date($Format_Affiche,strtotime($_POST['Cdate']));
		$DateAff="Du"." ".$DateDeb." "."au"." ".$DateFin;

		$Tab_Depot=$recherche->fx_Rapport_TransactAgc_Date($_POST['agenceExp'],$_POST['Cdatee'],$_POST['Cdate'],"Depot","E");
		$Tab_Retrait=$recherche->fx_Rapport_TransactAgc_Date($_POST['agenceExp'],$_POST['Cdatee'],$_POST['Cdate'],"Retrait","S");
		$Tab_Commiss=$recherche->fx_RapportCommis_AgcDate($_POST['agenceExp'],$_POST['Cdatee'],$_POST['Cdate']);
		$Tab_Finance=$recherches->fx_Rapport_Financement_Date($_POST['agenceExp'],$_POST['Cdatee'],$_POST['Cdate']);
		$Tab_Virement=$recherches->fx_Rapport_Mouvement_Date($_POST['agenceExp'],$_POST['Cdatee'],$_POST['Cdate'],"Virement","S");
		$Tab_Depense=$recherches->fx_Rapport_Mouvement_Date($_POST['agenceExp'],$_POST['Cdatee'],$_POST['Cdate'],"Depense","S");
		$Tab_Convers_E=$recherches->fx_Rapport_Mouvement_Date($_POST['agenceExp'],$_POST['Cdatee'],$_POST['Cdate'],"conversion","E");
		$Tab_Convers_S=$recherches->fx_Rapport_Mouvement_Date($_POST['agenceExp'],$_POST['Cdatee'],$_POST['Cdate'],"conversion","S");

		}elseif (($_POST['Cdatee'] == "") && ($_POST['Cdate'] == "") && ($_POST['agenceExp'] != "0")) {
			
			$DateAff=date($Format_Affiche,strtotime($Cdate));

			$Tab_Depot=$recherche->fx_Rapport_TransactAgc_Jr($_POST['agenceExp'],$Aj,"Depot","E");
			$Tab_Retrait=$recherche->fx_Rapport_TransactAgc_Jr($_POST['agenceExp'],$Aj,"Retrait","S");
			$Tab_Commiss=$recherche->fx_RapportCommis_AgcJour($_POST['agenceExp'],$Aj);
			$Tab_Finance=$recherches->fx_Rapport_Financement_Jour($_POST['agenceExp'],$Aj);
			$Tab_Virement=$recherches->fx_Rapport_Mouvement_Jour($_POST['agenceExp'],$Aj,"Virement","S");
			$Tab_Depense=$recherches->fx_Rapport_Mouvement_Jour($_POST['agenceExp'],$Aj,"Depense","S");
			$Tab_Convers_E=$recherches->fx_Rapport_Mouvement_Jour($_POST['agenceExp'],$Aj,"conversion","E");
			$Tab_Convers_S=$recherches->fx_Rapport_Mouvement_Jour($_POST['agenceExp'],$Aj,"conversion","S");
		}
		
	}else {

		$DateAff=date($Format_Affiche,strtotime($Cdate));

		$Tab_Depot=$recherche->fx_RapportGlob_Transact_Jr($Aj,"Depot","E");
		$Tab_Retrait=$recherche->fx_RapportGlob_Transact_Jr($Aj,"Retrait","S");
		$Tab_Commiss=$recherche->fx_RapportCommis_GlobJour($Aj);
		$Tab_Finance=$recherches->fx_Rapport_Financement_GlobJour($Aj);
		$Tab_Virement=$recherches->fx_Rapport_Mouvement_GlobJour($Aj,"Virement","S");
		$Tab_Depense=$recherches->fx_Rapport_Mouvement_GlobJour($Aj,"Depense","S");
		$Tab_Convers_E=$recherches->fx_Rapport_Mouvement_GlobJour($Aj,"conversion","E");
		$Tab_Convers_S=$recherches->fx_Rapport_Mouvement_GlobJour($Aj,"conversion","S");


	}

}


	
	
	
						      
								
?>	