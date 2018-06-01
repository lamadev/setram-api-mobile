<?php session_start();?>
<?php 
	//indique que le type de la réponse renvoyée sera du texte
	header('Content-Type: application/json');
	header("Content-Type: text/plain ; charset=utf-8");
	//header('Content-Type:text/html; charset=utf-8'); 
	// Anticache pour HTTP/1.1
	header("Cache-Control: no-cache , private");
	// Anticache pour HTTP/1.0
	header("Pragma: no-cache");
	//simulation du temps d'attente du serveur (2 secondes)
	//sleep(2);
	
	//include_once('../Classes/ClassesPublication.php');
	include_once("../classes/ClasseTransaction.php");
	include_once("../classes/ClasseCompte.php");
	
	$source="B";
	
	if(isset($_REQUEST['Montant'])) $Montant=$_REQUEST['Montant'];
	else $Montant="0";
	if(isset($_REQUEST['CodeMonnaie'])) $CodeMonnaie=$_REQUEST['CodeMonnaie'];
	
	if(isset($_REQUEST['MoyenTransact'])) $MoyenTransact=$_REQUEST['MoyenTransact'];
	if(isset($_REQUEST['CodeTypeTransact'])) $CodeTypeTransact=$_REQUEST['CodeTypeTransact'];
	if(isset($_REQUEST['IdCompte'])) $IdCompte=$_REQUEST['IdCompte'];
	if(isset($_REQUEST['IdAgent'])) $IdAgent=$_REQUEST['IdAgent'];
	if(isset($_REQUEST['IdAgence'])) $IdAgence=$_REQUEST['IdAgence'];
	
	if($Montant!="0"){
			$source="A";
		}
		
	if ($source=="A"){
		
		if($CodeTypeTransact=="Depot"){
			$Sens="E";
		}elseif($CodeTypeTransact=="Retrait"){
			$Sens="S";
			}
		
		$IdClient=0;
		$Enreg= new transaction();
		$Resu=$Enreg->fx_creertransaction($Montant,$CodeMonnaie,$Sens,$MoyenTransact,$CodeTypeTransact,$IdCompte,1);
	    if($Resu){ 
		    $Modif=new compte();
			$MSolde=$Modif->fx_ModiferSolde_Compte($IdCompte,$Montant,$Sens);
			$Effectue=$Enreg->fx_InsererEffectuer($IdAgent,$Resu,$IdAgence);
			$Res=$Modif->fx_Check_Solde($IdCompte);
			echo $Res;
			
		}else{
			echo 201;
		}
		
	}else{
		echo 200;
		}
/////////////////////////////////////////			

?>